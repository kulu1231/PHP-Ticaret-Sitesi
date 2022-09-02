<?php 

include "../baglanti.php";// Veritabanı bağlantısını satırı.

$sorgu="Select * from altkategoriler";//veritabanını seçiyor ve liste genel sorgumuzu oluştuyoruz.
$stat = $baglan->prepare($sorgu);
$stat->bind_result($altid,$altadi,$kid);
$stat->execute();

while($stat->fetch()) //Kayıtların listelenmesi

{



$Id=$altid;



if ($Id==$_GET['id']) // Kaydın ID değeri ile düzelt linkinden ajax ile gelen id değerini karşılaştırıyoruz.

//Eğer şart sağlanırsa verilen input text ile görüntülecek

{

if ($_GET['komut']=="duzelt") // güncelle komutunu geldi ise veri güncellenecek.

{

//Burada formdan ajax ile gelen veriler değişkenlere atanıyor.



$altkatadi=$_GET['altkatadi'];

$katid = $_GET["katid"];




"Update altkategoriler set altKATAdi='$altkatadi',kat_id='$katid'

where altKATID='$Id'"; //  Kaydın id değerine göre formda ajax ile gelen veriler veritabanındakiler ile değiştiriliyorr.



?>

<!--Güncelleme işleminden sonra listenin eksi halini alması için fonsiyonumuz boş değerlerle çalıştırlıyor.-->

<script type="text/javascript">

islem('','');

</script>


<?php
}

else //Güncelle komut gelmedi ise veriler form halinde görüntülencek

{

?>



<table >

<tr>

<form>


<td><input type="text" value='<?php echo $altadi?>' name="altkatadi"/></td>

<td><input type="text" value='<?php echo $kid?>' name="kat_id"/></td>

</form>

<td width="155"><div align="center">

<a href="javascript:islem('','')">İptal</a> <!--İşlemi iptal etmel için fonksiyon boş değerler ile çalşıtırlıyor.-->

| <a href="javascript:islem('<?php echo $altid?>','duzelt')">Güncelle</a> <!-- Güncelleme için komut değikeni düzelt olarak gönderiliyor.-->

</div></td>

</tr></table>


<?php
}

}

else //ID değeri boş gelmiş ise liste normal olarak görüntüleniyor.

{



?>



<table width="650" border="0" cellpadding="1" cellspacing="1" bordercolor="#999999">

<tr bgcolor="#f3f3f3">
  <td><input type="text" value='<?php echo $altadi?>' name="altkatadi"/></td>

<td><input type="text" value='<?php echo $kid?>' name="kat_id"/></td>


<td width="156">

<div align="center">



<a href="javascript:islem('<?php echo $Id?>','')">Düzelt</a> <!--islem fonksiyonunu veritanından eşitlenen id değikeni ile çağırıyoruz.-->



</div>



</td>

</tr></table>


<?php
}

}

?> ?>