<?php
$link=mysqli_connect('localhost', 'monty', 'Aa123!!!', 'lab');
if(!$link){
    print('Не получилось подключиться к Mysql '.mysqli_connect_error());
}
else{
    print('Соединение успешно установлено');
}
mysqli_set_charset($link,"utf8")
?>
<br>Просто закинул sql-скрипт:
<?php
$sql='SELECT name, last_name, first_name, returned_at 
FROM log_taking INNER JOIN books ON log_taking.book_id = books.id 
    inner join readers on log_taking.reader_id = readers.id 
where not returned_at is null;';
$result=mysqli_query($link, $sql);
while ($row=mysqli_fetch_array($result)){
    print("<br>Название книги: ".$row['name']." Зовут: ".$row['last_name']." ".$row['first_name']." Взята: ".$row['returned_at']);
}
?>
<br>Решение по заданию:
<?php
$sql='SELECT name, last_name, first_name, returned_at, taken_at 
FROM log_taking INNER JOIN books ON log_taking.book_id = books.id 
    inner join readers on log_taking.reader_id = readers.id';
$result=mysqli_query($link, $sql);
while ($row=mysqli_fetch_array($result)){
    print("<br><b>".$row['last_name'].' '.$row['first_name'].'</b> взял книгу <i>"'.$row['name'].'</i>" ');
    if ($row['returned_at']!=null){
        print($row['taken_at'].', вернул ее '.$row['returned_at']);
    }
    else{
        print($row['taken_at'].' и не вернул ее');
    }
}
if (!$result){
    print('Произошла ошибка при выполнении запроса');
}
?>

