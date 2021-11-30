Если бы подключение было неудачным, вывелось бы null:<br>
<?php
$link= new PDO('mysql:host=localhost;dbname=lab;charset=utf8', 'lab2', 'Eee123!!!');
$status = $link->getAttribute(PDO::ATTR_CONNECTION_STATUS);
print($status);
?>
<?php
$ins_log_taking=$link->prepare('insert into log_taking(reader_id, book_id, taken_at, returned_at)
values(:reader_id, :book_id, :taken_at, :returned_at)');
$readers_ids=$link->query('select id from readers')->fetchAll(PDO::FETCH_COLUMN);
$book_ids=$link->query('select id from books')->fetchAll(PDO::FETCH_COLUMN);

$now=new DateTime();
$taken=$now->format('Y-m-d');
$returned=null;
if (rand(0,1)==1){
    $returned=$now
        ->add(date_interval_create_from_date_string('7 days'))
        ->format('Y-m-d');
}
try {
    $ins_log_taking->execute([
            ':reader_id'=>array_rand($readers_ids),
            ':book_id'=>array_rand($book_ids),
            ':taken_at'=>$taken,
            ':returned_at'=>$returned
    ]);
}
catch (Exception $err){
    echo $err->getMessage();
}
echo ' +',$link->lastInsertId();
?>