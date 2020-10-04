<?php

const PATHTOTESTFILE = "Files\\test.txt";

// 1.	Пусть в корне вашего сайта лежит файл test.txt. Считайте данные из этого файла и выведите их на экран.
echo file_get_contents(PATHTOTESTFILE);

// 2.	Пусть в корне вашего сайта лежит файл test.txt. Запишите в него текст '12345'.
file_put_contents(PATHTOTESTFILE, '12345');
echo file_get_contents(PATHTOTESTFILE) . '<br>';

// 3.	Создайте файл test.txt и запишите в него текст '12345'. Пусть изначально файла с таким именем не существует
$fileDescriptor = fopen(PATHTOTESTFILE, 'wb+');
fwrite($fileDescriptor, '12345');
fclose($fileDescriptor);
echo file_get_contents(PATHTOTESTFILE) . '<br>';

// 4.	Создайте файл new.txt с пустым текстом. Пусть изначально файла с таким именем не существует.
$fileDescriptor = fopen("Files\\new.txt", 'wb+');
fclose($fileDescriptor);

// 5.	Дан массив с именами файлов ['1.txt', '2.txt', '3.txt']. Переберите его циклом и создайте файлы с такими именами и пустым текстом.
$files = ['1.txt', '2.txt', '3.txt'];
foreach ($files as $file){
    $fileDescriptor = fopen('Files\\' . $file, 'wb+');
    fclose($fileDescriptor);
}

// 6.	Пусть в корне вашего сайта лежит файл test.txt, в котором записан текст '12345'.
// Откройте этот файл, запишите в конец текста восклицательный знак и сохраните новый текст обратно в файл.
file_put_contents(PATHTOTESTFILE, '!', FILE_APPEND);
echo file_get_contents(PATHTOTESTFILE) . '<br>';

// 7.	Пусть в корне вашего сайта лежит файл test.txt, в котором записано некоторое число.
// Откройте этот файл, возведите число в квадрат и запишите обратно в файл.
// P.s. поскольку не уточняется, записать его в конец, вместо находящегося тами т.д. - я записал вместо имеющегося
$numberFromFile = file_get_contents(PATHTOTESTFILE);
file_put_contents(PATHTOTESTFILE, $numberFromFile ** 2);

// 8.	Пусть в корне вашего сайта лежит файл count.txt. Изначально в нем записано число 0. Сделайте так,
// чтобы при обновлении страницы наш скрипт каждый раз увеличивал это число на 1.
// То есть у нас получится счетчик обновления страницы в виде файла.
$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
if($pageWasRefreshed ) {
    $numberOfUpdates = file_get_contents('Files\\count.txt');
    file_put_contents('Files\\count.txt', ++$numberOfUpdates);
}

// 9.	Пусть в корне вашего сайта лежат файлы 1.txt, 2.txt и 3.txt. Вручную сделайте массив с именами этих файлов.
// Переберите его циклом, прочитайте содержимое каждого из файлов, слейте его в одну строку и запишите в новый файл new.txt.
// Изначально этого файла не должно быть.
$resultString = '';
foreach ($files as $file){
    $resultString += file_get_contents('Files\\' . $file);
}

$fileDescriptor = fopen('Files\\new.txt', 'wb+');
fwrite($fileDescriptor, $resultString);
fclose($fileDescriptor);

// 10.	Пусть в корне вашего сайта лежат файлы 1.txt, 2.txt и 3.txt. Вручную сделайте массив с именами этих файлов.
// Переберите его циклом и в текст каждого файла в конец запишите восклицательный знак.
foreach ($files as $file){
    file_put_contents('Files\\' . $file, '!', FILE_APPEND);
}

// 11.	Пусть в корне вашего сайта лежит файл old.txt. Переименуйте его на new.txt.
// P.s. по скольку уже есть new.txt, переименовываю в new2.txt.
rename('Files\\old.txt', 'Files\\new2.txt');

// 12.	Пусть в корне вашего сайта лежит файл test.txt. Пусть также в корне вашего сайта лежит папка dir.
// Переместите файл в эту папку.
// P.s. сделал test2.txt. и перемещаю его, поскольку есть задания, завязанные на test.txt
if (copy('Files\\test2.txt', 'dir\\test2.txt')) {
    unlink('Files\\test2.txt');
}

// 13.	Пусть в корне вашего сайта лежит папка dir1, а в ней файл test.txt. Пусть также в корне вашего сайта лежит папка dir2.
// Переместите файл в эту папку.
if (copy('dir1\\test.txt', 'dir2\\test2.txt')) {
    unlink('dir1\\test.txt');
}

// 14.	Пусть в корне вашего сайта лежит файл test.txt. Скопируйте его в файл copy.txt.
copy('Files\\test.txt', 'Files\\copy.txt');

// 15.	Пусть в корне вашего сайта лежит файл test.txt. Пусть также в корне вашего сайта лежит папка dir.
// Скопируйте файл test.txt в папку dir. Копию файла также назовите test.txt.
copy('Files\\test.txt', 'dir\\test.txt');

// 16.	Пусть в корне вашего сайта лежит файл test.txt. Удалите его.
unlink('Files\\test.txt');

// 17.	Пусть в корне вашего сайта лежат файлы 1.txt, 2.txt и 3.txt. Вручную сделайте массив с именами этих файлов.
// Переберите его циклом и удалите все эти файлы.
foreach ($files as $file){
    unlink('Files\\' . $file);
}

// 18.	Проверьте, лежит ли в корне вашего сайта файл test.txt.
if(file_exists('Files\\test.txt')){
    // ...
}

// 19.	Проверьте, лежит ли в корне вашего сайта файл test.txt. Если да - удалите его, если нет - создайте.
if(file_exists('Files\\test.txt')){
    unlink('Files\\test.txt');
}
else{
    $fileDescriptor = fopen(PATHTOTESTFILE, 'wb+');
    fclose($fileDescriptor);
}

// 20.	Дан массив с именами файлов ['1.txt', '2.txt', '3.txt']. Переберите его циклом и проверьте каждый файл на существование.
// Выведите на экран имя каждого файла и рядом текст "существует" или "не существует".
foreach ($files as $file){
    echo file_exists('Files\\' . $file) ? $file . ' существует.' . '<br>' : $file . ' не существует.' . '<br>';
}

// 21.	Пусть в корне вашего сайта лежит файл test.txt. Узнайте его размер, выведите на экран.
echo 'test.txt занимает ' . filesize('Files\\test.txt')  . ' байт.' .'<br>';

// 22.	Модифицируйте предыдущую задачу так, чтобы размер файла выводился в килобайтах.
echo 'test.txt занимает ' . number_format(filesize('Files\\test.txt') / 1024, 2) . ' килобайт.' .'<br>';

// 23.	Положите в корень вашего сайта какую-нибудь картинку размером более мегабайта. Узнайте размер этого файла и переведите его в мегабайты.
// Картинка весит менее 1 мб
echo 'test.txt занимает ' . number_format(filesize('Files\\img.jpg') / 1048576, 2) . ' мегабайт.' .'<br>';

// 24.	Положите в корень вашего сайта какой-нибудь фильм размером более гигабайта. Узнайте размер этого файла и переведите его в гигабайты.
// Фильм класть не стал(на гитхаб бы загружался долго), представим, что у нас есть файл film.mp4
echo 'test.txt занимает ' . number_format(filesize('Files\\film.mp4') / 1073741824, 2) . ' гигабайт.' .'<br>';

// 25.	Дан файл test.txt. Прочитайте его текст, получите массив его строк.
$fileHandler = fopen('Files\\test.txt', 'rb');
if($fileHandler){
    $stringArray = [];
    while (($buffer = fgets($fileHandler)) !== false){
        $stringArray = $buffer;
    }
    fclose($fileHandler);
    print_r($stringArray .'<br>');
}

// 26.	Дан файл test.txt. В нем на каждой строке написано какое-то число. Найдите сумму этих чисел и запишите ее в файл sum.txt.
$fileHandler = fopen('Files\\test.txt', 'rb');
if($fileHandler){
    $number = null;
    while (($buffer = fgets($fileHandler)) !== false){
        $number += $buffer;
    }
    fclose($fileHandler);
    echo 'Сумма чисел из файла = ' . $number .'<br>';
}

// 27.	Дан массив. Запишите элементы этого массива в файл test.txt так, чтобы каждый элемент начинался с новой строки.
$someArray = [1, 5, 2.55];
$fileHandler = fopen('Files\\test2.txt', 'wb+');
foreach ($someArray as $arrayValue){
    fwrite($fileHandler, $arrayValue . "\r\n");
}
fclose($fileHandler);

// 28.	Дан файл test2.txt. В нем на каждой строке написано какое-то число. С помощью функции file найдите сумму этих чисел и выведете ее на экран.
$fileHandler = fopen('Files\\test2.txt', 'rb');
echo 'Сумма чисел из файла = ' . array_sum(file('Files\\test2.txt')) .'<br>';
fclose($fileHandler);

// 29.	Дан файл test2.txt. В нем на каждой строке написано какое-то число. С помощью функции file найдите сумму этих
// чисел и запишите эту сумму обратно в конец файла, с новой строки.
$fileHandler = fopen('Files\\test2.txt', 'rb+');
file_put_contents('Files\\test2.txt', array_sum(file('Files\\test2.txt')), FILE_APPEND);

// 30.	Создайте в корне вашего сайта папку с названием dir.

// 31.	Дан массив со строками. Создайте в корне вашего сайта папки, названиями которых служат элементы этого массива
$dirs = ['dir3', 'dir4', 'dir5'];
foreach ($dirs as $dir){
    if (!mkdir('' . $dir, 0777, true) && !is_dir('' . $dir)) {
        throw new RuntimeException(sprintf('Directory "%s" was not created', '' . $dir));
    }
}

// 32.	Создайте в корне вашего сайта папку с названием test. Затем создайте в этой папке 3 файла: 1.txt, 2.txt, 3.txt.
if (!mkdir('Test', 0777, true) && !is_dir('Test')) {
    throw new RuntimeException(sprintf('Directory "%s" was not created', 'Test'));
}

foreach ($files as $file){
    $myFile = fopen('Test\\' . $file, "wb+");
    fclose($myFile);
}

// 33.	Удалите папку с названием dir.
rmdir('dir');

// 34.	Пусть в корне вашего сайта лежит папка old. Переименуйте ее на new.
rename('Old', 'New');

// 35.	Пусть в корне вашего сайта лежит папка dir, а в ней какие-то текстовые файлы. Выведите на экран столбец имен этих файлов.
$fileList = scandir('dir');
foreach ($fileList as $file){
    echo $file . '<br>';
}

// 36.	Пусть в корне вашего сайта лежит папка dir, а в ней какие-то текстовые файлы.
// Переберите эти файлы циклом, откройте каждый из них и запишите в конец восклицательный знак.
$fileList = scandir('dir');
foreach ($fileList as $file){
    file_put_contents('dir\\' . $file, '!', FILE_APPEND);
}

// 37.	Пусть в корне вашего сайта лежит папка dir, а в ней какие-то текстовые файлы. Переберите эти файлы циклом и выведите их тексты в браузер.
$fileList = scandir('dir');
foreach ($fileList as $file){
    echo $file . '<br>';
}

// 38.	Пусть дан путь к файлу. Проверьте, файл это или папка.
$somePath = '';
if(is_dir($somePath)){
    // ..
}
elseif (is_file($somePath)){
    // ..
}

// 39.	Пусть в корне вашего сайта лежит папка dir, а в ней какие-то файлы и подпапки. Выведите на экран столбец имен подпапок из папки dir.
$fileList = scandir('dir');
foreach ($fileList as $file){
    if(is_dir($file)){
        echo $file . '<br>';
    }
}

// 40.	Пусть в корне вашего сайта лежит папка dir, а в ней какие-то файлы и подпапки. Выведите на экран столбец имен файлов из папки dir.
$fileList = scandir('dir');
foreach ($fileList as $file){
    if(is_file($file)){
        echo $file . '<br>';
    }
}

// 41.	Пусть в корне вашего сайта лежит папка dir, а в ней какие-то текстовые файлы и подпапки.
// В подпапках в свою очередь также могут быть текстовые файлы и подпапки. Рекурсивно пройдитесь по всем вложенным папкам
// и выведите в браузер пути ко всем текстовым файлам.
$it = new RecursiveDirectoryIterator('dir0', RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
foreach($files as $file) {
    if ($file->isFile()){
        echo $file->getRealPath() . '<br>';
    }
}

// 42.	Пусть в корне вашего сайта лежит папка dir с текстовыми файлами и подпапками.
// Рекурсивно пройдитесь по всем вложенным папкам и в конец каждого текстового файла запишите восклицательный знак.
$it = new RecursiveDirectoryIterator('dir0', RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
foreach($files as $file) {
    if ($file->isFile()){
        file_put_contents($file->getRealPath(), '!', FILE_APPEND);
    }
}

// 43.	Пусть в корне вашего сайта лежит папка dir с текстовыми файлами и подпапками. Удалите папку dir вместе с ее содержимым.
$dir = 'dir0';
$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
foreach($files as $file) {
    if ($file->isDir()){
        rmdir($file->getRealPath());
    } else {
        unlink($file->getRealPath());
    }
}
rmdir($dir);