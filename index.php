<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700|Old+Standard+TT&display=swap&subset=cyrillic" rel="stylesheet">
    <title>Лабораторная работа по PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="page">
<header class="page-header">
    <ul class="nav">
        <li><a href="index.php">Лабораторная работа №1</a></li>
        <li><a href="lab2/lab2.php">Лабораторная работа №2</a></li>
        <li><a href="#">Лабораторная работа №3</a></li>
        <li><a href="#">Лабораторная работа №4</a></li>
    </ul>
    <p class="page-title">Лабораторная работа №1</p>
</header>
<main>
<dl>
    <p>Если еще не смотрели текстовую часть отчета, скачать docx-файл можно <a href="lab1/Отчет по PHP 1.docx" download>здесь</a> (он лежит в папке с сайтом)</p>
    <h3>Элементы языка. Типы</h3>
    <dt>Вывод простой строки</dt>
        <dd><code>&lt;?php echo('Hello world!'); ?&gt;</code></dd>
        <dd>Получим <i><pre>Hello world!</pre></i></dd>
    <dt>Чтобы отформатировать строку, можно использовать:</dt>
        <dd>
            <pre><code>&lt;?php
                $s = 'monkey';
                printf("[%010s]\n",   $s);
                ?&gt;
            </code></pre>
        </dd>
        <dd>Выведет <i><pre><?php
            $s = 'monkey';
            printf("[%010s]\n",   $s); // строка дополняется нулями слева
            ?></pre></i>
        </dd>
    <dt><i class="functionName">Var_dump</i> можно исользовать для вывода массива с индексами</dt>
        <dd><pre><code>&lt;?php
            $a = array("Так работает var_dump",
                    array("он выводит и этот вложенный массив", 10, "в котором могут быть разные типы переменных"));
            var_dump($a);
                ?&gt;</code></pre></dd>
        <dd>Выведет <i></i><pre><?php
            $a = array("Так работает var_dump", array("он выводит и этот вложенный массив", 10, "в котором могут быть разные типы переменных"));
            var_dump($a);
            ?></i></pre></dd>
    <dt>Матрицу сравнений я оформил в Word</dt>
    <h3>Работа с условиями</h3>
    <dt>Нечетные числа от 1 до 50 через <i class="functionName">While</i>:</dt>
        <dd><pre><code>&lt;?php
                $num=-1;
                while(($num+=2)<51)
                    echo $num, ' ';
                ?&gt;</code></pre></dd>
    <dt>И через <i class="functionName">For</i>:</dt>
        <dd><pre><code>&lt;?php
                for ($i = 1; $i <= 50; $i+=2) {
                    echo $i, ' ';
                }
                ?&gt;</code></pre></dd>
    <dd>Выведет <i><pre><?php
        $num=-1;
        while(($num+=2)<51)
            echo $num, ' ';
        ?><br></pre></i></dd>
    <h3>Работа с массивами</h3>
    <dt>Создание вектора и сортировка пузырьком:</dt>
        <dd><pre><code>&lt;?php
                $array = array(7, 243, 234, 9, 54, 45, 2, 34, 8, 101);
                for ($j = 0; $j < count($array) - 1; $j++)
                {
                    for ($i = 0; $i < count($array) - $j - 1; $i++)
                    {
                        if ($array[$i] > $array[$i + 1])
                        {
                            $tmp_var = $array[$i + 1];
                            $array[$i + 1] = $array[$i];
                            $array[$i] = $tmp_var;
                        }
                    }
                }
                var_dump($array);
                ?&gt;</code></pre></dd>
        <dd>Выведет <i><pre><?php
                $array = array(7, 243, 234, 9, 54, 45, 2, 34, 8, 101);
                for ($j = 0; $j < count($array) - 1; $j++)
                {
                for ($i = 0; $i < count($array) - $j - 1; $i++)
                {
                if ($array[$i] > $array[$i + 1])
                {
                $tmp_var = $array[$i + 1];
                $array[$i + 1] = $array[$i];
                $array[$i] = $tmp_var;
                }
                }
                }
                var_dump($array);
                ?></pre></i></dd>
    <dt>То же самое можно сделать через <i class="functionName">Sort</i>:</dt>
        <dd><pre><code>&lt;?php
                sort($array);
                var_dump($array)
                ?&gt;</code></pre></dd>
    <dt>Создаю второй вектор и заполняю 8-ми его через <i class="functionName">array_fill</i>:</dt>
        <dd><pre><code>&lt;?php$
                    array2=array_fill(0, 10, 8);
                    ?&gt;</code></pre></dd>
        <dd>Получился такой массив: <i><pre><?php $array2=array_fill(0, 10, 8);
                var_dump($array2)?></pre></i></dd>
    <dt>Через <i class="functionName">array_merge</i> слил два массива</dt>
        <dd><pre><code>&lt;?php
                var_dump($new_arr = array_merge($array, $array2));
                ?&gt;</code></pre></dd>
        <dd>Выведет <i><pre><?php
            var_dump($new_arr = array_merge($array, $array2));
            ?></pre></i></dd>
    <dt>Создал ассоциативный массив из трех жанров с двумя фильмами в каждом и проверил существование массива с заданным ключом:</dt>
        <dd><pre><code>&lt;?php

                $movies['Комедии'] = ["Бриллиантовая рука", "Иван Васильевич меняет профессию"];
                $movies['Записи пар'] = ["PHP Лекция 1", "PHP Лекция 2"];
                $movies['Военные'] = ["Цельнометаллическая оболочка", "Уроки Фарси"];
                if (array_key_exists('Записи пар', $movies))
                {
                echo "Найден жанр 'Записи пар'.";

                }
                else echo "Нет такого жанра";
                ?&gt;</code></pre></dd>
        <dd>Выведет <i><pre><?php

                $movies['Комедии'] = ["Бриллиантовая рука", "Иван Васильевич меняет профессию"];
                $movies['Записи пар'] = ["PHP Лекция 1", "PHP Лекция 2"];
                $movies['Военные'] = ["Цельнометаллическая оболочка", "Уроки Фарси"];
                if (array_key_exists('Записи пар', $movies))
                {
                    echo "Найден жанр 'Записи пар'.";

                }
                else echo "Нет такого жанра";
                ?></pre></i></dd>
    <dt>В том же массиве movies попробуем найти ключ массива по заданному значению</dt>
        <dd><pre><code>&lt;?php
                print_r(array_keys($movies, "Бриллиантовая рука"));
                ?&gt;</code></pre></dd>
        <dd>Но в выводе получим просто <i><pre><?php
                print_r(array_keys($movies, "Бриллиантовая рука"));
                ?></pre></i></dd>
    <dt>Похоже, что <i class="functionName">array_keys</i> не умеет работать с вложенными массивами. Тогда попробуем ввести все значения массива "Комедии":</dt>
        <dd><pre><code>&lt;?php
            print_r(array_keys($movies, ["Бриллиантовая рука", "Иван Васильевич меняет профессию"]));
            ?&gt;</code></pre></dd>
        <dd>Теперь вывод будет верным: <i><pre><?php
            print_r(array_keys($movies, ["Бриллиантовая рука", "Иван Васильевич меняет профессию"]));
            ?></pre></i></dd>
    <dt>Попробуем отфильтровать массив, который мы раньше сортировали. Выведем только нечетные числа с помощью <i class="functionName">array_filter</i>:</dt>
        <dd><pre><code>&lt;?php
                function odd($var)
                {
                return $var & 1;
                }
                echo "Нечётные:\n";
                print_r(array_filter($array, "odd"));
                ?&gt;</code></pre></dd>
        <dd>Выведет: <i><pre><?php
                function odd($var)
                {
                    // является ли переданное число нечётным
                    return $var & 1;
                }
                echo "Нечётные:\n";
                print_r(array_filter($array, "odd"));
                ?></pre></i></dd>
    <dt>И с этим же массивом попробуем <i class="functionName">array_flip</i>. Индексы и значения поменяются местами:</dt>
        <dd><pre><code>&lt;?php
                $flipped = array_flip($array);
                print_r($flipped);
                ?&gt;</code></pre></dd>
        <dd>Выведет: <i><pre><?php
                $flipped = array_flip($array);
                print_r($flipped);
                ?>
            </pre></i></dd>
    <dt>Массив array наполнен случайными значениями. Попробуем найти максимальное и минимальное значение и поменять их местами:</dt>
        <dd><pre><code>&lt;?php
        $minVal = 0;
        $maxVal = 0;
        for ($i = 1; $i < count($array); $i++) {
            if ($array[$i] > $array[$maxVal]) $maxVal = $i;
            if ($array[$i] < $array[$minVal]) $minVal = $i;
        }
        $array[$minVal] += $array[$maxVal];
        $array[$maxVal] = $array[$minVal] - $array[$maxVal];
        $array[$minVal] = $array[$minVal] - $array[$maxVal];
        print_r($array);
            ?&gt;</code></pre></dd>
        <dd>Было: <i><pre>
                <?php
                print_r($array)
                ?>
            </pre></i></dd>
        <dd>Выведет: <i><pre><?php
                $minVal = 0;
                $maxVal = 0;
                for ($i = 1; $i < count($array); $i++) {
                    if ($array[$i] > $array[$maxVal]) $maxVal = $i;
                    if ($array[$i] < $array[$minVal]) $minVal = $i;
                }
                $array[$minVal] += $array[$maxVal];
                $array[$maxVal] = $array[$minVal] - $array[$maxVal];
                $array[$minVal] = $array[$minVal] - $array[$maxVal];
                print_r($array);
                ?>
            </pre></i></dd>
    <h3>Работа с функциями</h3>
    <dt>Реализуем функцию, которая принимает в себя массив и осуществляет в нём поиск по определенному условию. Например, нечетные элементы, кратные 3:</dt>
        <dd><pre><code>&lt;?php
            function search($arrayOfInt)
            {
                foreach($arrayOfInt as $k => $v)
                {
                    if($v % 3 === 0)
                        if($v & 1)
                             echo $v, ' ';
                }
            }?&gt;
                </code></pre></dd>
        <dd>С прошлых заданий у нас остались массивы $array и $array2. Создадим еще один и выведем все:</dd>
        <dd><pre><code>
                    print_r($array);
                    print_r([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
                    print_r($array2);
                </code></pre></dd>
        <dd>Выведет:<pre><?php
            print_r($array);
            print_r([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
            print_r($array2);
            ?></pre></dd>
        <dd>Теперь попробуем вывести их с использованием фнукции <i class="functionName">search</i>, которую только что создали:</dd>
        <dd><pre><code>&lt;?php
                    print_r(search($array));
                    print_r(search([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]));
                    print_r(search($array2));
            ?&gt;</code></pre></dd>
        <dd>Получим:<pre><?php
                function search($arrayOfInt)
                {
                    foreach($arrayOfInt as $k => $v)
                    {
                        if($v % 3 === 0)
                            if($v & 1)
                                echo $v, ' ';
                    }
                }
                print_r(search($array));
                print_r(search([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]));
                print_r(search($array2));
            ?></pre></dd>
    <h3>Работа со строками</h3>
    <dt>Создадим и выведем строковую переменную, которая содержит адрес электронной почты с опечаткой:</dt>
        <dd><pre><code>&lt;?php
                    $mail='timofeykasmolin2gmail.com';
                    echo $mail
            ?&gt;</code></pre></dd>
        <dd>Получим:<pre><?php
                $mail='timofeykasmolin2gmail.com';
                echo $mail
            ?></pre></dd>
    <dt>Теперь проверим содежит ли строка знак '@':</dt>
        <dd><pre><code>&lt;?php
            $symbol='@';
            if (strpos($mail, $symbol))
                echo 'Электронная почта введена верно';
            else echo 'Вы допустили ошибку при вводе'
            ?&gt;</code></pre></dd>
        <dd>Получим:<pre><?php
                $symbol='@';
                if (strpos($mail, $symbol))
                    echo 'Электронная почта введена верно';
                else echo 'Вы допустили ошибку при вводе'
            ?></pre></dd>
    <dt>Попробуем определить и вывести домен почты. Для этого создадим переменную $mail2:</dt>
        <dd><pre><code>&lt;?php
            $mail2='timofey.smolin@urfu.me';
            ?&gt;</code></pre></dd>
        <dd>Первый способ. Через <i class="functionName">explode</i></dd>
        <dd><pre><code>&lt;?php
                $split = explode("@", $mail2);
                echo"Эта почта в домене ", $split[1];
            ?&gt;</code></pre></dd>
        <dd>Получим:<pre><?php
                $mail2='timofey.smolin@urfu.me';
                $split = explode("@", $mail2);
                echo"Эта почта в домене ", $split[1];
            ?></pre></dd>
        <dd>Второй способ. Через цикл <i class="functionName">for</i> и несколько стандартных функций:</dd>
        <dd><pre><code>&lt;?php
            $key=0;
            $string = str_split($mail2);
            $index=array_search('@',$string);
            for ($key = 0; $key < $index; $key++){
                unset($string[$key]);
            }
            echo 'Эта почта в домене ', implode($string)
        ?&gt;</code></pre></dd>
        <dd>Вывод будет аналогичным:<pre><?php
            $key=0;
            $string = str_split($mail2);
            $index=array_search('@',$string);
            for ($key = 0; $key < $index; $key++){
                unset($string[$key]);
            }
            echo 'Эта почта в домене ', implode($string)
            ?></pre></dd>
    <dt>Создадим массив строк и преобразеум его в строку, «склеив» элементы через символ запятой:</dt>
        <dd>Первый способ через функцию <i class="functionName">implode</i>:</dd>
        <dd><pre><code>&lt;?php
            $straray=['Создадим', 'массив', 'строк', 'и', 'преобразуем', 'его', 'в', 'строку'];
            echo implode(",", $straray);
            ?&gt;</code></pre></dd>
        <dd>Получим:<pre><?php
                $straray=['Создадим', 'массив', 'строк', 'и', 'преобразуем', 'его', 'в', 'строку'];
                echo implode(",", $straray);
            ?></pre></dd>
        <dd>Второй способ через цикл <i class="functionName">for</i>. Скорее всего он предпочтительней,
            т.к не использует стандартную функцию:</dd>
        <dd><pre><code>&lt;?php
        for ($key = 0; $key < count($straray); $key++)
            echo $straray[$key], ',';
            ?&gt;</code></pre></dd>
        <dd>Получим:<pre><?php
                for ($key = 0; $key < count($straray); $key++)
                    echo $straray[$key], ',';
            ?></pre></dd>
    <dt>Создадим массив, состоящий из целочисленных и вещественных значений. Посчитаем этот массив в цикле,
        преобразовывая все элементы в вещественные значения с точностью в два знака после запятой:</dt>
        <dd><pre><code>&lt;?php
                $floatArray=[4.556, 8, 9.111, 7, 11.119, 555];
                for ($key = 0; $key < count($floatArray); $key++)
                    $formatArray[]=(float)number_format($floatArray[$key], 2, '.', ' ');
                var_dump($formatArray);
            ?&gt;</code></pre></dd>
        <dd>Получим:<pre><?php
                $floatArray=[4.556, 8, 9.111, 7, 11.119, 555];
                for ($key = 0; $key < count($floatArray); $key++)
                    $formatArray[]=(float)number_format($floatArray[$key], 2, '.', ' ');
                var_dump($formatArray);
            ?></pre></dd>
    <dt>Создадим массив строк и сохраним его в файл <i>johny.txt</i></dt>
        <dd><pre><code>&lt;?php
            $johnyIHardlyKnewYa=['Where are the legs with which you run, hurroo hurroo',
            'Where are the legs with which you run, hurroo hurroo',
            'Where are the legs with which you run',
            'When first you went to carry a gun', 'Indeed your dancing days are done, Johnny I hardly knew ya'];
            function tofile($value, $filename)
        {
            $str_value = serialize($value);

            $f = fopen($filename, 'w');
            fwrite($f, $str_value);
            fclose($f);
        }
            tofile($johnyIHardlyKnewYa, 'johny.txt');
            ?&gt;</code></pre></dd>
        <?php
                $johnyIHardlyKnewYa=['Where are the legs with which you run, hurroo hurroo',
                    'Where are the legs with which you run, hurroo hurroo',
                    'Where are the legs with which you run',
                    'When first you went to carry a gun', 'Indeed your dancing days are done, Johnny I hardly knew ya'];
            function tofile($value, $filename)
            {
                $str_value = serialize($value);

                $f = fopen($filename, 'w');
                fwrite($f, $str_value);
                fclose($f);
            }
            tofile($johnyIHardlyKnewYa, 'johny.txt');
            ?>
        <dd>Теперь напишем функцию для вывода данных на страницу:</dd>
        <dd><pre><code>&lt;?php
        function fromFile($filename)
        {
            $file = file_get_contents($filename);
            $value = unserialize($file);
            return $value;
        }
        print_r(fromFile('johny.txt'));
            ?&gt;</code></pre></dd>

    <?php
    function fromFile($filename)
    {
        $file = file_get_contents($filename);
        $value = unserialize($file);
        return $value;
    }
    ?>
        <dd>Получим <a href="johny.txt" download>(Скачать созданный файл)</a>:<pre><?php
                print_r(fromFile('johny.txt'));
            ?></pre></dd>
    <h3>Финальная задача</h3>
    <dt>Решение последней задачи. Файл <a href="lab1/elections.txt" download>elections.txt</a> лежит в папке сайта еще до запуска. Сначала прочитаем файл и выведем результат подсчета голосов:</dt>
        <dd><pre><code>&lt;?php
            $myFile = "elections.txt";
                $lines = file($myFile);
                $mn=(explode(' ', $lines[0]));
                $n=(int)$mn[0];
                $m=(int)$mn[1];
                $result=[];
                for ($i = 1; $i <= $m; $i++){
                    for ($k=1; $k<=$n; $k++) {
                        if ($lines[$i]==$k)
                            $result[$k]+=1;
                    }
                }
                var_dump($result);
                ?&gt;</code></pre></dd>
        <dd>Выведет (здесь номер элемента в массиве соотвествует номеру кандидата, а значение - количеству голосов):</dd>
            <dd><pre><?php
                $myFile = "elections.txt";
                $lines = file($myFile);
                $mn=(explode(' ', $lines[0]));
                $n=(int)$mn[0];
                $m=(int)$mn[1];
                $result=[];
                for ($i = 1; $i <= $m; $i++){
                    for ($k=1; $k<=$n; $k++) {
                        if ($lines[$i]==$k)
                            $result[$k]+=1;
                    }
                }
                var_dump($result);
            ?></pre></dd>
        <dd>Теперь нужно перевести результат в проценты и сохранить в файл <i>rElections.txt</i>. Округлим до сотых.</dd>
        <dd><pre><code>&lt;?php
                $rElections = fopen("rElections.txt", "wb");
                $rElectionsGet = '';
                for ($i = 1; $i <= count($result); $i++) {
                    $rElectionsGet .= 'кандидат ' . $i . ' набрал ' . round(($result[$i] / $m * 100), 2) . '%, ';
                    $rElectionsGet.=PHP_EOL;
                }
                echo $rElectionsGet;
                //file_put_contents($rElections, $rElectionsGet, FILE_APPEND | LOCK_EX);
                fwrite($rElections, $rElectionsGet);
                fclose($rElections);
                ?&gt;</code></pre></dd>
    <dd>В файле <a href="rElections.txt" download>rElections.txt</a> будет записано:</dd>
        <dd><pre><?php
                $rElections = fopen("rElections.txt", "wb");
                $rElectionsGet = '';
                for ($i = 1; $i <= count($result); $i++) {
                    $rElectionsGet .= 'кандидат ' . $i . ' набрал ' . round(($result[$i] / $m * 100), 2) . '%';
                    $rElectionsGet.=PHP_EOL;
                }
                echo $rElectionsGet;
                //file_put_contents($rElections, $rElectionsGet, FILE_APPEND | LOCK_EX);
                fwrite($rElections, $rElectionsGet);
                fclose($rElections);
            ?></pre></dd>
</dl>
</main>
<footer class="page-footer">
    <div class="container">
        <p>© Смолин Тимофей</p>
        <p>02.10.2021</p>
    </div>
</footer>
</body>
