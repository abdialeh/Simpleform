Modded Simpleform Module (Ajax Post Support & Possible To Use A Model File)
==========
[TR]
Mod�l� eski halinde kullanabilirsiniz, modda gelen �zellikler (ajax post ve model dosyas� kullan�m imkan�).
Modlu simpleform mod�l� ile model dosyas� kullanma imkan� geliyor ve "tag" kullanman�za gerek kalmadan size ajax post deste�i getiriyor, her�ey eskisi gibi �al���yor, mod�l taglar� hari� (art�k ihtiyac�n�z yok)!

Form olu�turma i�lemi normal simpleform mod�l� gibi. /modules/Simpleform/config/config.php dosyas� i�eriside formumuzun ilk �nce olu�turulmas� gerekiyor.
Olu�turdu�unuz form i�in form post urlsi olarak "<ion:base_url />simpleform/run_form" vermeniz yeterli olacakt�r.

Form cevab� JSON olarak �u �ekilde d�necek :

{
	"message_type" : "success / veya / error",
	"heading" : "Mesaj Ba�l���",
	"message" : "Mesaj ��eri�i"
}

Size bu javascript mesaj�n� ekrana yazd�rmak kal�yor sadece.

E�erki bir model dosyas� kullanmak isterseniz, /modules/Simpleform/config/config.php dosyas� i�erisine model dosyas�n� kullanmak istedi�iniz formun oldu�u k�sma :

$config['simpleform_YourFormName_model'] = array(
	'modelName' => 'YourModelName',
	'modelFunction' => 'YourModelFunctionName'
);

bu alanlar� eklemeniz ve gerekli k�s�mlar� do�ru doldurman�z yeterlidir. Bu �ekilde model dosyas� kullanarak veri taban�na kay�t da yapabilirsiniz!


[EN]
You can use module like old way, specification of mod (ajax post and model file support).
You can use model file with modded simpleform module and you don't need to use "tags" with ajax post support everything working like normal simpleform module, without module tags(you don't need more)!