<?php
include "baglanti.php";
$il = $_POST["il"];
$ilce = "select * from ilceler where sehirID='$il'";
$stat=$baglan->prepare($ilce);
$stat->bind_result($ilceid,$ilceadi,$sehirid);
$stat->execute();

while($stat->fetch())
{
    echo '<option value='.$ilceid.'>'.$ilceadi.'</option>';
}



?>