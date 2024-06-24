<?php 
if (isset($_GET['page'])) {
    $requested_page = $_GET['page'];
}
else {
    $requested_page = 'home';
}

switch($requested_page) {
   case "contact":
      include(__DIR__."/pagePHP/contact.php");
      break;
   case "home":
      include(__DIR__."/pagePHP/home.php");
      break;
   default:
      include(__DIR__."/pagePHP/404.php");
}
?>