<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Simpleform tags
*
* @author	Ionize Dev Team
*/
class Simpleform_Tags extends TagManager 
{
	/**
	* Index
	*
	* Returns the requested action.
	*
	* @access	public
	* @return	mixed
	*/
	public static function index(FTL_Binding $tag)
	{
		$ci = &get_instance();
		if( ! isset($ci->simpleform_action))
			$ci->load->library('simpleform_action');

		$processed = $ci->simpleform_action->pseudo_construct($tag);

		return $tag->expand();
	}
	
	/**
	* Print simpleform
	*
	* @access	public
	* @return	parsed view
	*/
	public static function simple_form(FTL_Binding $tag)
	{   
		return $tag->parse_as_nested(file_get_contents(MODPATH . 'Simpleform/views/form_view' . EXT));
	}
	
	/**
	* Validation tag
	*
	* @access	public
	* @usage	<ion:quote:validation 	[attr="has_errors"] [form_name="<form_name>"] [is_like="<1/0>"] // Container-tag. If true, the inner html/tags will be shown. If form_name is set, it'll only check for errors for the specified form.
	* 									[attr="error_string"] // Returns an error string if has_errors is true
	* 									[attr="has_notices"] [form_name="<form_name>"] [is_like="<1/0>"] // Container-tag. If true, the inner html/tags will be shown. If form_name is set, it'll only check for errors for the specified form.
	* 									[attr="notice_string"] // Returns a notice string if has_notices is true
	* 									[attr="has_success"] [form_name="<form_name>"] [is_like="<1/0>"] // Container-tag. If true, the inner html/tags will be shown. If form_name is set, it'll only check for errors for the specified form. Is true if data was saved.
	* 									[attr="success_string"] // Returns a success string if has_success is true
	*			/>
	* @return	mixed
	*/
	public static function validation(FTL_Binding $tag)
	{
		$ci = &get_instance();
		
		if( ! isset($ci->simpleform_validation))
			$ci->load->library('simpleform_validation');

		switch($tag->attr['attr'])
		{
			case 'has_errors':
				return $ci->simpleform_validation->has_errors($tag);
				break;
			case 'error_string':
				return $ci->simpleform_validation->error_string($tag);
				break;
			case 'has_notices':
				return $ci->simpleform_validation->has_notices($tag);
				break;
			case 'notice_string':
				return $ci->simpleform_validation->notice_string($tag);
				break;
			case 'has_success':
				return $ci->simpleform_validation->has_success($tag);
				break;
			case 'success_string':
				return $ci->simpleform_validation->success_string($tag);
				break;
			default:
				return $tag->expand();
		}
	}
	
	/**
	 * Returns a field value from a form
	 *
	 * @usage	<ion:simpleform:field [attr="<field_name>"]	[from_post_data="<form_name>"]		// The wished field from the given form
	 *
	 */
	public static function field(FTL_Binding $tag)
	{
		$ret = '';
		
		$ci = &get_instance();

		include MODPATH . 'Simpleform/config/config.php';
		
		if(isset($tag->attr['from_post_data']) && $ci->input->post('form_name') === $tag->attr['from_post_data'])
		{
			$ret = ! ($ci->input->post($tag->attr['name']) === FALSE) ? $ci->input->post($tag->attr['name']) : $ret;
		}		
		
		// If only the post data is requested
		if( ! isset($tag->attr['is_like']))
			return $ret;
		
		// If the post data is compared to is_like
		else
			return $tag->attr['is_like'] === $ret ? $tag->expand() : "";	
	}
}

/* End of file tags.php */
/* Location: /modules/Simpleform/libraries/tags.php */
