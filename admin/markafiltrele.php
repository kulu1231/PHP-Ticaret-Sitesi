 <?php
                    include "../baglanti.php";
                    $katid=$_POST["katno"];
                    $marka = "select * from markalar where kat_id='$katid'";
                    $statement = $baglan->prepare($marka);
                    $statement->bind_result($markaid,$markaadi,$katno);
                    $statement->execute();
                    
                    while($statement->fetch())
                    {
                        echo '<option value='.$markaid.'>'.$markaadi.'</option>';
                    }
                    
                    ?>