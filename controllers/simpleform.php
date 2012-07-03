<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Simpleform extends Base_Controller {

    // Additional errors, that are added to the error-string besides form_validation-errors
    public $additional_err = array();
    public $additional_notices = array();
    public $additional_success = array();
    public $data;

    /**
     * Constructor
     *
     */
    public function __construct() {
        parent::__construct();
        if (!isset($this->form_validation))
            $this->load->library('form_validation');
    }

    function index() {
        print "Simpleform";
    }

    function run_form() {

        if ($this->input->post('form_name') !== FALSE && config_item('simpleform_' . $this->input->post('form_name'))) {
            $form_name = $this->input->post('form_name');

            if (self::check_form($form_name)) {
                try {
                    // Email Lib
                    if (!isset($this->email))
                        $this->load->library('email');

                    // Clear Data!
                    $this->email->clear();

                    // Prepare Posted Form Data
                    self::prepare_mail_data($form_name);

                    // Email Title
                    $data['form_data'] = $this->data;
                    $data['email_title'] = lang(config_item('simpleform_' . $form_name . '_email_title'));

                    // Get Email Title
                    $email_title = (config_item('simpleform_' . $form_name . '_email_title')) ? lang(config_item('simpleform_' . $form_name . '_email_title')) : Settings::get("site_title");

                    // Title : Standard email title
                    $this->email->subject($email_title);

                    // From : Standard website's email
                    $this->email->from(Settings::get("site_email"), Settings::get("site_title"));

                    // To : As defined in config.php
                    if (config_item('simpleform_' . $form_name . '_email')) {
                        $this->email->to(config_item('simpleform_' . $form_name . '_email'));
                    } else {
                        throw new Exception(
                                'SimpleForm module error : No destination Email set in "<b>' . MODPATH . 'Simpleform/config/config.php</b>" for the form called : <b>' . $form_name . '</b><br/>' .
                                'Please setup the config item : $config[\'simpleform_' . $form_name . '_email\']'
                        );
                    }

                    // Email view
                    if (file_exists(MODPATH . 'Simpleform/views/' . config_item('simpleform_' . $form_name . '_email_view') . EXT)) {
                        $this->email->message($this->load->view(config_item('simpleform_' . $form_name . '_email_view'), $data, TRUE));

                        $useModel = (config_item('simpleform_' . $form_name . '_model')) ? config_item('simpleform_' . $form_name . '_model') : '';

                        // If we have UseModel config array
                        if ($useModel != '' && !empty($useModel['modelName']) && !empty($useModel['modelFunction'])) {

                            $this->load->model($useModel['modelName'], '', true);
                            
                            // Check model function available? and function return TRUE!
                            if ($this->$useModel['modelName']->$useModel['modelFunction']($this->data)) {
                                
                                // If model usage succes send mail
                                $this->email->send();
                                
                                // Sending JSON Success message
                                $result_message = array(
                                    'message_type' => 'success',
                                    'heading' => lang('module_simpleform_model_text_success'),
                                    'message' => lang('module_simpleform_model_text_success_message')
                                );

                                echo json_encode($result_message);

                                $this->additional_success['profile'] = lang("module_usermanager_text_registered") . " <a href=''>" . lang("module_usermanager_text_registered_here") . "</a>.";
                            } else {
                                
                                // Sending JSON error message
                                $result_message = array(
                                    'message_type' => 'error',
                                    'heading' => lang('module_simpleform_model_text_error'),
                                    'message' => lang('module_simpleform_model_text_error_message')
                                );

                                echo json_encode($result_message);
                            }

                        // Just send email don't use model
                        } else {

                            // Send email
                            $this->email->send();

                            // Sending JSON Success message
                            $result_message = array(
                                'message_type' => 'success',
                                'heading' => lang('module_simpleform_text_success'),
                                'message' => lang('module_simpleform_text_success_message')
                            );
                            echo json_encode($result_message);

                            $this->additional_success['profile'] = lang("module_usermanager_text_registered") . " <a href=''>" . lang("module_usermanager_text_registered_here") . "</a>.";
                        }
                    } else {
                        
                        // Sending JSON error message
                        $result_message = array(
                            'message_type' => 'error',
                            'heading' => lang('module_simpleform_text_error'),
                            'message' => lang('module_simpleform_text_error_message')
                        );

                        echo json_encode($result_message);
                    }
                } catch (Exception $e) {
                    $this->additional_err['register'] = $e->getMessage();
                }
            } else {

                $result_message = array(
                    'message_type' => 'error',
                    'heading' => lang('module_simpleform_fill_fields_required'),
                    'message' => self::error_string()
                );
                echo json_encode($result_message);
            }
        }

        self::check_additional_errors();
    }

    function prepare_mail_data($form_name) {
        foreach (config_item('simpleform_' . $form_name) as $key => $value)
            if ($value != 'antispam')
                $this->data[$key] = $this->input->post($key);
    }

    public function notice_string() {
        $ret = '';

        if (!isset($this->additional_notices))
            return '';

        foreach ($this->additional_notices as $key => $val)
            $ret .= "<p>" . $val . "</p>";

        return $ret;
    }

    public function success_string() {
        $ret = '';

        if (!isset($this->additional_success))
            return '';

        foreach ($this->additional_success as $key => $val)
            $ret .= "<p>" . $val . "</p>";

        return $ret;
    }

    public function error_string() {
        self::check_additional_errors();

        return (isset($this->form_validation) && $this->form_validation->error_string() ? $this->form_validation->error_string() : "");
    }

    /**
     * Check For Additional Errors
     */
    public function check_additional_errors() {
        foreach ($this->additional_err as $key => $val)
            $this->form_validation->_error_array[$key] = $val;

        if (sizeof($this->form_validation->_error_array) > 0) {
            unset($this->additional_err);
            $this->additional_err = array();
            return true;
        }

        return false;
    }

    function check_form($form_name) {
        Cache()->clear_cache();
        // If rules are defined in the config file...
        if (config_item('simpleform_' . $form_name)) {
            $form_fields = config_item('simpleform_' . $form_name);

            // Set the rules
            foreach ($form_fields as $key => $val) {
                $this->form_validation->set_rules($key, "lang:module_simpleform_field_" . $key, $val);

                if (!($val['default_value'] === FALSE))
                    if ($this->input->post($key) === FALSE)
                        if (!$val['special_field'] === 'checkbox') // Because of Checkboxes
                            $_POST[$key] = $val['default_value'];

                if ($this->input->post($key) === FALSE)
                    $_POST[$key] = '';

                if ($this->input->post($key) === "on" && $val['special_field'] === "checkbox")
                    $_POST[$key] = '1';

                // AntiSpam
                if ($val == 'antispam') {
                    self::antispam($this->input->post($key));
                }
            }

            // Check the rules
            if ($this->form_validation->run()) {
                if (self::check_additional_errors()) {
                    return FALSE;
                }
                return TRUE;
            }
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Called by check_form() 
     * 
     */
    private function antispam($str) {
        if ($str != config_item('form_antispam_key')) {
            $this->additional_err['spam'] = lang('module_simpleform_error_spam');
            return false;
        }
        return true;
    }

}
