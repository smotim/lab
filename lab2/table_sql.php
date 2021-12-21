<pre><?php require('mysqli_connection.php') ?></pre></dd>
<?php
$sql='SELECT name, last_name, first_name, returned_at 
FROM log_taking INNER JOIN books ON log_taking.book_id = books.id 
    inner join readers on log_taking.reader_id = readers.id 
where not returned_at is null;';
$result=mysqli_query($link, $sql);
print("<td>Название книги</td>"."<td>Имя</td>"."<td>Фамилия</td>")
while ($row=mysqli_fetch_array($result)){
    print("<br>Название книги: ".$row['name']." Зовут: ".$row['last_name']." ".$row['first_name']." Взята: ".$row['returned_at']);
}

?>