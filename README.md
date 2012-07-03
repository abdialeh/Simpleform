Modded Simpleform Module (Ajax Post Support & Possible To Use A Model File)
==========
[TR]
Modülü eski halinde kullanabilirsiniz, modda gelen özellikler (ajax post ve model dosyasý kullaným imkaný).
Modlu simpleform modülü ile model dosyasý kullanma imkaný geliyor ve "tag" kullanmanýza gerek kalmadan size ajax post desteði getiriyor, herþey eskisi gibi çalýþýyor, modül taglarý hariç (artýk ihtiyacýnýz yok)!

Form oluþturma iþlemi normal simpleform modülü gibi. /modules/Simpleform/config/config.php dosyasý içeriside formumuzun ilk önce oluþturulmasý gerekiyor.
Oluþturduðunuz form için form post urlsi olarak "<ion:base_url />simpleform/run_form" vermeniz yeterli olacaktýr.

Form cevabý JSON olarak þu þekilde dönecek :

{
	"message_type" : "success / veya / error",
	"heading" : "Mesaj Baþlýðý",
	"message" : "Mesaj Ýçeriði"
}

Size bu javascript mesajýný ekrana yazdýrmak kalýyor sadece.

Eðerki bir model dosyasý kullanmak isterseniz, /modules/Simpleform/config/config.php dosyasý içerisine model dosyasýný kullanmak istediðiniz formun olduðu kýsma :

$config['simpleform_YourFormName_model'] = array(
	'modelName' => 'YourModelName',
	'modelFunction' => 'YourModelFunctionName'
);

bu alanlarý eklemeniz ve gerekli kýsýmlarý doðru doldurmanýz yeterlidir. Bu þekilde model dosyasý kullanarak veri tabanýna kayýt da yapabilirsiniz!


[EN]
You can use module like old way, specification of mod (ajax post and model file support).
You can use model file with modded simpleform module and you don't need to use "tags" with ajax post support everything working like normal simpleform module, without module tags(you don't need more)!