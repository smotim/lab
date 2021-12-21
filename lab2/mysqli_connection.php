<?php
$link= new PDO('mysql:host=localhost;dbname=lab;charset=utf8', 'lab2', 'Eee123!!!');
$status = $link->getAttribute(PDO::ATTR_CONNECTION_STATUS);
print($status);
?>