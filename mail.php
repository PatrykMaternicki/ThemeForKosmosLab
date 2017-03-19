<?php
$response = json_decode($_POST['json'],true);
$adress = "maternicki.patryk@gmail.com";
$title = "Wiadomość z strony KosmosLab od".$response[0]." ".$response[1];
$info = "From:".$response[3]." \r\n";
$info .= 'MIME-Version: 1.0'."\r\n";
$info .= 'Content-type: text/html; charset=utf-8'."\r\n";
$message = "<html>
<head>
</head>
<body>
      Otrzymałeś wiadomość z serwisu kosmosLab:
      Wiadomość:
      ".$response[3]."
</body>
</html>";
mail($adress, $title, $message, $info);
?>
