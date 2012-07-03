<?php

$lang['module_simpleform_about'] = "Bu modül internet sitenize kolayca form eklemenizi sağlar";
$lang['module_simpleform_doc_title'] = "Modülü nasıl kurabilirim";
$lang['module_simpleform_doc_content'] = "
	<h4>1. config.php dosyasının ayarlanması :</h4>
	<p>Her formun <b>/modules/Simpleform/config/config.php</b> dosyasında bulunması gerekiyor<p>
	<pre>
// XXXXX işaretli alanların form adınızı içermesi gerekiyor, küçük harfler ile.
// Örnek : \$config['simpleform_contact_email'] = 'eposta@adresiniz.tld';

\$config['simpleform_XXXXX_email'] = 'eposta@adresiniz.tld';

// Mail Başlığı : Modülün çeviri dostası içerisinde : Simpleform/language/xxx/simpleform_lang.php
// Bu alandaki çeviri, \$lang['module_simpleform_email_title'] Mail başlığınız olarak kullanılacak

\$config['simpleform_XXXXX_email_title'] = 'module_simpleform_email_title';

// Mail görünümü form gönderiminde kullanılacak (.php uzantısız.
// /modules/Simpleform/views klasörü altında olması gerekiyor

\$config['simpleform_XXXXX_email_view'] = 'mail';

// Form için alanlar ve kurallar

\$config['simpleform_XXXXX'] = array(
	'name' => 'trim|required|min_length[4]|xss_clean',
	'email' => 'trim|required|min_length[5]|valid_email|xss_clean',
	'message' => 'required|xss_clean',
	'city' => 'antispam'
);
	</pre>

	<h4>2. Formu içerecek bir Sayfa / Makale Oluşturun</h4>
	<p>
		Form oluşturmak için, basitçe bir sayfa görünümü oluşturun, ve oluşturduğunuz görünümünü formu eklemek istediğiniz sayfaya bağlayın (aynı şey makaleler içinde geçerlidir)
	</p>
	<p>
		Bu görünüm Simpleform taglarını içermelidir. <br/>
		Tagları pekiştirmek için buradaki dosyaya gözatabilirsiniz : <b>views/form_view.php</b>.
	</p>
	
	<h4>3. Buradaki dosyayı düzenleyin : libraries/simpleform_action.php</h4>
	<p>
		Eğer gerekli ise <b>process_data()</b> fonksiyonu içerisini düzenleyin.<br/>
		Birden fazla form için veya ihtiyaçlarınıza uygun şekilde düzenleyin.
	</p>
	
";

$lang['module_simpleform_field_email'] = "E-Posta";
$lang['module_simpleform_field_name'] = "İsim";
$lang['module_simpleform_field_fullname'] = "Ad - Soyad";
$lang['module_simpleform_field_firstname'] = "Adınız";
$lang['module_simpleform_field_lastname'] = "Soyadınız";
$lang['module_simpleform_field_username'] = "Kullanıcı Adı";
$lang['module_simpleform_field_password'] = "Parola";
$lang['module_simpleform_field_password2'] = "Parola tekrarı";
$lang['module_simpleform_field_title'] = "Başlık";
$lang['module_simpleform_field_title_mr'] = "Bay.";
$lang['module_simpleform_field_title_ms'] = "Bayan.";
$lang['module_simpleform_field_infomails_desc'] = "E-Posta yoluyla bilgilendirmek istiyorum.";
$lang['module_simpleform_field_newsletter_desc'] = "E-Posta yoluyla yeniliklerden haberdar olmak istiyorum.";
$lang['module_simpleform_field_terms_desc'] = "Kullanım şartlarını okudum ve kabul ediyorum.";
$lang['module_simpleform_field_terms'] = "Şartlar";
$lang['module_simpleform_field_company'] = "Şirket";
$lang['module_simpleform_field_street'] = "Sokak";
$lang['module_simpleform_field_city'] = "Şehir";
$lang['module_simpleform_field_country'] = "Ülke";
$lang['module_simpleform_field_housenumber'] = "Kapı No";
$lang['module_simpleform_field_zip'] = "Posta Kodu";
$lang['module_simpleform_field_website'] = "İnternet Sitesi URL";
$lang['module_simpleform_field_subject'] = "Konu";
$lang['module_simpleform_field_message'] = "Mesaj";
$lang['module_simpleform_field_villa'] = 'Villa';
$lang['module_simpleform_field_note'] = "Not";
$lang['module_simpleform_field_checkin'] = "Giriş Tarihi";
$lang['module_simpleform_field_checkout'] = "Çıkış Tarihi";

$lang['module_simpleform_all_fields_required'] = "Tüm alanlar zorumludur";
$lang['module_simpleform_required_fields'] = "Lütfen zorunlu alanları doldurunuz.";

$lang['module_simpleform_button_send'] = "Gönder";
$lang['module_simpleform_button_save'] = "Kaydet";

// Model Dosyası Çevirileri
$lang['module_simpleform_model_text_success'] = "İşlem Başarılı!";
$lang['module_simpleform_model_text_success_message'] = "İletişim formu başarıyla gönderildi, en kısa sürede size geri dönüş sağlanayacağız!";
$lang['module_simpleform_model_text_error'] = "İşlem Başarısız!";
$lang['module_simpleform_model_text_error_message'] = "Form gönderimi esnasında bir hata oluştu, lütfen tekrar deneyiniz.";

$lang['module_simpleform_text_error'] = "Hata !";
$lang['module_simpleform_text_error_message'] = "Form gönderilemedi!, Lütfen hataları kontrol edin.";
$lang['module_simpleform_text_success'] = "Başarılı !";
$lang['module_simpleform_text_success_message'] = "Mesajınız başarıyla iletildi !";
$lang['module_simpleform_text_thanks'] = "Mesajınız için teşekkür ederiz. En kısa sürede size geri dönüş yapacağız.";

$lang['module_simpleform_text_vip_success'] = "VIP isteği başarıyla gönderildi !";
$lang['module_simpleform_text_vip_thanks'] = "En kısa sürede size geri dönüş yapacağız.";

$lang['module_simpleform_email_title'] = "İletişim Formundan Gelen Bir Mesajınız Var";
$lang['module_simpleform_reservation_title'] = "Rezervasyon Formundan Gelen Bir Rezervasyon Talebiniz Var";
$lang['module_simpleform_vip_email_title'] = "VIP İsteği !";


$lang['module_simpleform_error_javascript_required'] = "Bu formu gönderebilmek için javascript özelliğini aktive etmeniz gerekiyor.";
$lang['module_simpleform_error_spam'] = "Gereksiz mesajınız için teşekkürler !";
$lang['module_simpleform_error_required'] = "<strong>%s</strong> doldurulması zorunlu alan.";
$lang['module_simpleform_error_isset'] = "<strong>%s</strong> alan bir değer içermelidir.";
$lang['module_simpleform_error_valid_email'] = "<strong>%s</strong> alanı doğru bir e-posta adresi içermelidir.";
$lang['module_simpleform_error_valid_emails'] = "<strong>%s</strong> alanı doğru e-posta adresleri içermelidir.";
$lang['module_simpleform_error_valid_url'] = "<strong>%s</strong> alanı doğru bir URL içermelidir.";
$lang['module_simpleform_error_valid_ip'] = "<strong>%s</strong> alanı doğru bir IP adresi içermelidir.";
$lang['module_simpleform_error_min_length'] = "<strong>%s</strong> alanı en az %s karakter uzunluğunda olmalıdır.";
$lang['module_simpleform_error_max_length'] = "<strong>%s</strong> alanı %s karakter uzunluğunu geçemez.";
$lang['module_simpleform_error_exact_length'] = "<strong>%s</strong> alanı tam olarak %s karakter uzunluğunda olmalıdır.";
$lang['module_simpleform_error_alpha'] = "<strong>%s</strong> alanı sadece alfabetik karakterleri içerebilir.";
$lang['module_simpleform_error_alpha_numeric'] = "<strong>%s</strong> alanı yalnızca alfasayısal karakterler içerebilir.";
$lang['module_simpleform_error_alpha_dash'] = "<strong>%s</strong> alanı sadece alfa nümerik, alt çizgi ve tire gibi karakterler içermelidir.";
$lang['module_simpleform_error_numeric'] = "<strong>%s</strong> alanı sadece sayı içermelidir.";
$lang['module_simpleform_error_is_numeric'] = "<strong>%s</strong> alanı yalnızca sayısal karakter içermelidir.";
$lang['module_simpleform_error_integer'] = "<strong>%s</strong> alanı bir tamsayı içermelidir.";
$lang['module_simpleform_error_matches'] = "<strong>%s</strong> alanları eşleşmiyor.";
$lang['module_simpleform_error_is_natural'] = "<strong>%s</strong> alanı sadece pozitif sayılar içermelidir.";
$lang['module_simpleform_error_is_natural_no_zero']	= "<strong>%s</strong> alanı sıfırdan büyük bir sayı içermelidir.";
$lang['module_simpleform_error_restricted_field'] = "İzin verilmeyen veri yayınlandı.";
$lang['module_simpleform_error_terms'] = "Kullanım koşullarını kabul etmek zorundasınız.";
$lang['module_simpleform_error_upload_something'] = "Dosya yüklenirken bir problemle karşılaşıldı.";
$lang['module_simpleform_error_upload_file_size'] = "Yüklenen dosya boyutu 1 MB. dan büyük olamaz.";
$lang['module_simpleform_error_upload_file_type'] = "Sadece JPEG, PNG ve GIF uzantılı dosyalara izin veriliyor.";