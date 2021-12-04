<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700|Old+Standard+TT&display=swap&subset=cyrillic" rel="stylesheet">
    <title>Лабораторная работа по PHP</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="page">
<header class="page-header">
    <ul class="nav">
        <li><a href="../index.php">Лабораторная работа №1</a></li>
        <li><a href="lab2.php">Лабораторная работа №2</a></li>
        <li><a href="#">Лабораторная работа №3</a></li>
        <li><a href="#">Лабораторная работа №4</a></li>
    </ul>
    <p class="page-title">Лабораторная работа №2</p>
</header>
<main>
    <dl>
        <p>Скачать отчет по лабораторной можно <a href="lab2/Отчет по PHP 2.docx" download>здесь</a></p>
        <h3>Работа с базой данных через MySQLI</h3>
        <dt>Сначала я скопипастил подключение к БД из записи лекции:</dt>
        <dd><pre><code>&lt;?php
                $link=mysqli_connect('localhost', 'monty', 'Aa123!!!', 'lab');
                if(!$link){
                    print('Не получилось подключиться к Mysql '.mysqli_connect_error());
                }
                else{
                    print('Соединение успешно установлено');
                }
                mysqli_set_charset($link,"utf8")
                ?&gt;</code></pre></dd>
        <dd>И получил<i><pre><?php
                    $link=mysqli_connect('localhost', 'monty', 'Aa123!!!', 'lab');
                    if(!$link){
                        print('Не получилось подключиться к Mysql '.mysqli_connect_error());
                    }
                    else{
                        print('Соединение успешно установлено');
                    }
                    mysqli_set_charset($link,"utf8")
                    ?></pre></i></dd>
        <dt>Потом написал запрос со скриптом, который до этого использовал в DataGrip:</dt>
        <dd><pre><code>&lt;?php
                    $sql='SELECT name, last_name, first_name, returned_at
FROM log_taking INNER JOIN books ON log_taking.book_id = books.id
    inner join readers on log_taking.reader_id = readers.id
where not returned_at is null;';
                    $result=mysqli_query($link, $sql);
                    while ($row=mysqli_fetch_array($result)){
                        print("<br>Название книги: ".$row['name']." Зовут: ".$row['last_name'].
                        " ".$row['first_name']." Взята: ".$row['returned_at']);
                    }
                    ?&gt;</code></pre></dd>
        <dd>Получилось<i><pre><?php
                    $sql='SELECT name, last_name, first_name, returned_at 
FROM log_taking INNER JOIN books ON log_taking.book_id = books.id 
    inner join readers on log_taking.reader_id = readers.id 
where not returned_at is null;';
                    $result=mysqli_query($link, $sql);
                    while ($row=mysqli_fetch_array($result)){
                        print("<br>Название книги: ".$row['name']." Зовут: ".$row['last_name']." ".$row['first_name']." Взята: ".$row['returned_at']);
                    }
                    ?></pre></i></dd>
        <dt>Теперь я сделал вывод красивее, сразу предусмотрев перенос строк, который попросят позже:</dt>
        <dd><pre><code>&lt;?php
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
?&gt;</code></pre></dd>
        <dd>Вывод получился такой:<i><pre><?php
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
                    ?></pre></i></dd>
        <h3>Работа с базой данных через PDO</h3>
        <?php require('add.php') ?>
        <h3>Работа с пользовательским параметром</h3>
        <?php require('delete.php') ?>
        <h3>Задание со звездочкой</h3>
    </dl>
</main>
