<?php
require('autoload.php');
session_start();

$body = new Body();
$body->addProp(new Calculadora());

echo (new Html($head, $body));

?>
