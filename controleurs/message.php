<!-- message.php -->
<!-- permet d'afficher un message après une action -->
<!-- usage: index.php?uc=message&message=Action fini! -->
<?php
$message = $_REQUEST['message'];

if(isset($message)) {
    include("vues/message.php");
    header( "refresh:5; url=index.php"); // montre le message pendant 5s puis retourne à la page principale
}