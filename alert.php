<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="notifyme.css">
<script type="text/javascript" src="notifyme.js"></script>
<style>
.wrapper{
    
 position:absolute;
 left:30%;
  /* Center vertically and horizontally */
  display: flex;
  justify-content: center;
  align-items: center;
}
.alert{
    
     font-size: 16px;
  color: white;
  background: rgba(0, 0, 0, 0.9);
  line-height: 1.3em;
  padding: 10px 15px;
  margin: 5px 10px;
  position: relative;
  border-radius: 5px;
  transition: opacity 0.5s ease-in;
  
}
@media (max-width: 767px) and (min-width: 481px) {
  .alert-area {
    left: 100px;
    right: 100px;
  }
}

@media (min-width: 768px) {
  .alert-area {
    width: 350px;
    left: auto;
    right: 0;
  }
}
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
.alert-area {
  max-height: 100%;
  position: fixed;
  bottom: 5px;
  left: 20px;
  right: 20px;
  z-index:9999;
}
</style>
</head>
<body>
<?php

if($eklenme == 1)
{
    
?>
    <script>
    $(document).ready(function(){
        	notifyme.config({
				showtime: 4000,
				position: "topright"
			});
    
        notifyme.create({
				title: "Başarılı!",
				text: "Ürün Sepete Eklendi.",
				type: "success"
			});
    });
    </script>

<?php } else if($guncellenme == 1) {?>

<script>
    $(document).ready(function(){
        	notifyme.config({
				showtime: 4000,
				position: "topright"
			});
    
        notifyme.create({
				title: "Başarılı!",
				text: "Ürün Güncellendi.",
				type: "success"
			});
    });
    </script>


<?php
}
?>

</body>
</html>
