<?php
$link= new PDO('mysql:host=localhost;dbname=lab;charset=utf8', 'lab2', 'Eee123!!!');
$status = $link->getAttribute(PDO::ATTR_CONNECTION_STATUS);
print($status);

$query=$link->prepare('delete from log_taking where id = :id');
try{
    if(!array_key_exists('id',$_GET)){
        throw(new Exception("doesn't exist query parameter: id"));
    }
    $query->execute([':id'=>$_GET['id']]);
    $row_count=$query->rowCount();
    if($row_count>0){
        echo $row_count, 'удалена';
    }else{
        echo 'Нет записей для удаления';
    }
}catch (Exception $exception){
    echo $exception->getMessage();
}
?>