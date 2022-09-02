                    <?php
                    include "../baglanti.php";
                    $altkat = $_POST["altkat"];
                    $altkategori = "select * from altkategoriler where kat_id='$altkat'";
                    $statement2 = $baglan->prepare($altkategori);
                    $statement2->bind_result($altkatid,$altkatadi,$id);
                    $statement2->execute();
                    
                    while($statement2->fetch())
                    {
                        echo '<option value='.$altkatid.'>'.$altkatadi.'</option>';
                    }
                    
                    ?>