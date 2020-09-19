<?php
// 1.	Создайте переменную $var и присвойте ей значение 'hello'. Обращаясь к отдельным символам этой строки
// выведите на экран символ 'h', символ 'e', символ 'o'.

$var = 'hello';
echo $var[0] . $var[1] . $var[4];

// 2.    Напишите скрипт, который считает количество секунд в часе.

define("SECONDS", 3600);
function NumberOfSecondsPerHour($hours){
    return $hours * SECONDS;
}
echo "<br>" . "Количество секунд в 1 часе = " . NumberOfSecondsPerHour(1);

// 3.	Переделайте приведенный код так, чтобы в нем использовались операции +=, -=, *=, /=, ++, --.
// Количество строк кода при этом не должно измениться.

$var = 1;
$var += 12;
$var -= 14;
$var *= 5;
$var /= 7;
++$var;
--$var;
echo "<br>" . $var;

// 4.	Дан массив с элементами 'Привет,', 'мир' и '!'. Необходимо вывести на экран фразу 'Привет, мир!'.

$helloWorldArray = array('Привет,', 'мир', '!');
echo "<br>" . implode("", $helloWorldArray);

// 5.	 Решим немного другую задачу: дан массив с элементами 'Привет, ', 'мир' и '!'.
// Необходимо записать в переменную $text фразу 'Привет, мир!', а затем вывести на экран содержимое этой переменной.

$text = implode("", $helloWorldArray);
echo "<br>" . $text;

// 6.    Дан массив ['Привет, ', 'мир', '!']. Необходимо записать в первый элемент (то есть элемент с номером ноль) этого
// массива слово 'Пока, ' (то есть вместо слова 'Привет, ' будет 'Пока, ').

$helloWorldArray[0] = 'Пока,';
echo "<br>" . implode("", $helloWorldArray);

// 7.	 Создайте массив заработных плат $arr. Выведите на экран зарплату Пети и Коли.

$salaryArray = ['Коля'=>'1000$', 'Вася'=>'500$', 'Петя'=>'200$'];
echo "<br>" . "Заработная плата Коли = " . $salaryArray['Коля'] . ", Пети = " . $salaryArray['Петя'];

// 8.	Создайте массив $arr с элементами 1, 2, 3, 4, 5 двумя различными способами.
$numberArray1 = [1, 2, 3, 4, 5];
$numberArray2 = [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5];

// 9.	Дан многомерный массив $arr
// Выведите с его помощью слово 'голубой'.
// Выведем теперь слово 'красный':
// Выведем 'red':

$multiArray = ['ru'=> ['голубой', 'красный', 'зеленый'], 'en' => ['blue', 'red', 'green']];
echo "<br>" . $multiArray['ru'][0] . ", " . $multiArray['ru'][1] . ", " . $multiArray['en'][1];

// 10.	Если переменная $a равна 10, то выведите 'Верно', иначе выведите 'Неверно'.
$a = 10;
echo ($a === 10) ? ("<br>" . 'Верно') : ("<br>" . 'Неверно');

// 11.	В переменной $min лежит число от 0 до 59. Определите в какую четверть часа попадает это число
// (в первую, вторую, третью или четвертую).

function getQuarterOfAnHour($someValue){
    if($someValue > 0 && $someValue < 60){
        $quarters = [1 => range(0, 15), 2 => range(16, 30), 3 => range(31, 45), 4 => range(46, 59)];
        foreach ($quarters as $k => $v){
            if(in_array($someValue, $v, true)) {
                return $k;
            }
        }
    }
    throw new RuntimeException("Указано неверное число");
}

echo "<br>" . getQuarterOfAnHour(random_int(0, 59));

// 12.	Переменная $lang может принимать два значения: 'ru' и 'en'. Если она имеет значение 'ru',
// то в переменную $arr запишем массив дней недели на русском языке, а если имеет значение 'en' – то на английском.
// Решите задачу через 2 if, через switch-case и через многомерный массив без ифов и switch.

$lang = 'ru';

// 2 if
if($lang === 'ru'){
    // Записываем массив дней недели на русском языке
}

if($lang === 'en'){
    // Записываем массив дней недели на английском языке
}

// switch-case
switch ($lang){
    case 'ru':  break; // Записываем массив дней недели на русском языке
    case 'en':  break; // Записываем массив дней недели на английском языке
}

// многомерный массив без ифов и switch
// P.s. логику уже дальше писать не стал
$langMultiArray = ["ru" => [], "en" => []];

// 13.   Дан массив с элементами 'html', 'css', 'php', 'js', 'jq'. С помощью цикла foreach выведите эти слова в столбик.

$frontEndArray = array('html', 'css', 'php', 'js', 'jq');
echo "<br>";
foreach ($frontEndArray as $arrayValue){
    echo $arrayValue . "<br>";
}

// 14.	 Дан массив с элементами 10, 20, 15, 17, 24, 35. Найдите сумму элементов этого массива. Запишите ее в переменную $result.

$result = array_sum([10, 20, 15, 17, 24, 35]);
echo $result . "<br>";

// 15.	 Выведите столбец чисел от 1 до 100.

foreach (range(1, 100) as $value){
    echo $value . "<br>";
}

// 16.	Найдите корень из числа 1000. Округлите его в большую и меньшую стороны. В массив $arr запишите первым
// элементом корень из числа, вторым элементом - округление в меньшую сторону, третьим элементом - в большую.

$sqrtFromNumber = sqrt(1000);
$someArray = [$sqrtFromNumber, floor($sqrtFromNumber), ceil($sqrtFromNumber)];
foreach ($someArray as $value){
    echo $value . "<br>";
}

// 17.	Заполните массив 30-ю случайными числами от 1 до 10.

$someArray2 = [];
for ($i = 0; $i < 31; $i++){
    $someArray2[$i] = random_int(1, 10);
}

foreach ($someArray2 as $value){
    echo $value . "<br>";
}

// 18.	Дана строка 'minsk'. Сделайте из нее строку 'MINSK'.

$str1 = 'minsk';
echo strtoupper($str1) . "<br>";

// 19.	Дана строка 'минск'. Сделайте из нее строку 'МИНСК'.
//$str2 = 'минск';
//echo mb_strtoupper($str2, 'UTF-8') . "<br>";

// 20.	Дана строка 'MINSK'. Сделайте из нее строку 'Minsk'.

$str3 = 'MINSK';
echo ucfirst(strtolower($str3)) . "<br>";

// 22.	Создайте массив, заполненный числами от 1 до 100. Найдите сумму элементов данного массива

echo array_sum(range(1, 100)) . "<br>";

// 23.	Дан массив с элементами 'a', 'b', 'c', 'd', 'e'. С помощью функции array_map сделайте из него массив 'A', 'B', 'C', 'D', 'E'.

function toUpper($string)
{
    return strtoupper($string);
}
$someArray4 = ['a', 'b', 'c', 'd', 'e'];
$someArray5 = array_map('toUpper', $someArray4);

// 24.	В переменной $day лежит какое-то число из интервала от 1 до 31.
// Определите в какую декаду месяца попадает это число (в первую, вторую или третью).

$day = random_int(1, 31);
function getDecadeOfTheMonth($day){
    if($day > 0 && $day < 32){
        $decades = [1 => range(0, 10), 2 => range(11, 20), 3 => range(21, 30)];
        foreach ($decades as $k => $v){
            if(in_array($day, $v, true)) {
                return $k;
            }
        }
    }
    throw new Exception("Указано неверное число");
}
echo getDecadeOfTheMonth($day). "<br>";

// 25.	 В переменной $month лежит какое-то число из интервала от 1 до 12.
// Определите в какую пору года попадает этот месяц (зима, лето, весна, осень).

function getTimeOfTheYear($month){
    if($month > 0 && $month < 13){
        $decades = ["Зима" => [12, 1, 2], "Весна" => range(3, 5), "Лето" => range(6, 8), "Осень" => range(9, 11)];
        foreach ($decades as $k => $v){
            if(in_array($month, $v, true)) return $k;
        }
    }
    throw new RuntimeException("Указано неверное число");
}

echo getTimeOfTheYear(random_int(1, 12)) . "<br>";

// 26. В переменной $year хранится год. Определите, является ли он високосным (в таком году есть 29 февраля).
// Год будет високосным в двух случаях: либо он делится на 4, но при этом не делится на 100, либо делится на 400.
// Так, годы 1700, 1800 и 1900 не являются високосными, так как они делятся на 100 и не делятся на 400.
// Годы 1600 и 2000 - високосные, так как они делятся на 400.

function isLeapYear($year){
    if(is_int($year)){
        return ($year % 4 === 0 && $year % 100 !== 0) || $year % 400 === 0;
    }
    throw new RuntimeException("Передан неправильный год");
}

echo isLeapYear(1700) ? "1700 - високосный год" . "<br>" : "1700 не високосный год" . "<br>";
echo isLeapYear(1600) ? "1600 - високосный год" . "<br>" : "1600 не високосный год" . "<br>";

// 27.	 Дана строка с символами, например, 'abcde'. Проверьте, что первым символом этой строки является буква 'a'.
// Если это так - выведите 'да', в противном случае выведите 'нет'.

$someString1 = 'abcde';
echo $someString1[0] === 'a' ? "да" . "<br>" : "нет" . "<br>";

// 28.	 Дана строка с цифрами, например, '12345'. Проверьте, что первым символом этой строки является цифра 1, 2 или 3.
//  Если это так - выведите 'да', в противном случае выведите 'нет'.

$string = '12345';
echo $string[0] === "1" || $string[1] === "2" || $string[2] === "3" ? "да" . "<br>" : "нет" . "<br>";

// 29.	 Дана строка из 3-х цифр. Найдите сумму этих цифр. То есть сложите как числа первый символ строки, второй и третий.
$string = '123';
echo array_sum([$string[0], $string[1], $string[2]]) . "<br>";

// 30.	 Дана строка из 6-ти цифр. Проверьте, что сумма первых трех цифр равняется сумме вторых трех цифр.
// Если это так - выведите 'да', в противном случае выведите 'нет'.
$string = '123321';
echo array_sum([$string[0], $string[1], $string[2]]) === array_sum([$string[3], $string[4], $string[5]]) ?
    "Да" . "<br>" : "Нет" . "<br>";

// 31.	 Дан массив с элементами 2, 5, 9, 15, 0, 4. С помощью цикла foreach и оператора if выведите на экран столбец
// тех элементов массива, которые больше 3-х, но меньше 10.
// P.s. вместо foreach и if использовал array_map & callback

function printNumbersGreater3AndLess10($number){
    if($number > 3 && $number < 10){
        echo $number . "<br>";
    }
}
$array = [2, 5, 9, 15, 0, 4];
array_map('printNumbersGreater3AndLess10', $array);
//32.	 Дан массив с числами. Числа могут быть положительными и отрицательными. Найдите сумму положительных элементов этого массива.
$numbers = [2, -5, 9, -15, 0, -4];
$totalSum = array_sum(array_filter($numbers, function ($num){
    return $num > 0;
}));
echo $totalSum . "<br>";

//33.	 Дан массив с элементами 1, 2, 5, 9, 4, 13, 4, 10. С помощью цикла foreach и оператора if проверьте есть ли в
// массиве элемент со значением, равным 4. Если есть - выведите на экран 'Есть!' и выйдите из цикла. Если нет - ничего делать не надо.

// P.s. вместо цикла foreach и оператора if использую in_array
$numbers = [1, 2, 5, 9, 4, 13, 4, 10];
if(in_array(4, $numbers, true)) echo 'Есть!' . "<br>";

//34.	 Дан массив числами, например: ['10', '20', '30', '50', '235', '3000'].
// Выведите на экран только те числа из массива, которые начинаются на цифру 1, 2 или 5.

$numbers = [10, 20, 30, 50, 235, 3000];
function IsDigitBeginFrom1Or2Or5($number){
    if(strpos($number, '1') === 0 || strpos($number, '2') === 0 || strpos($number, '5') === 0){
        echo $number . "<br>";
    }
}

array_map('IsDigitBeginFrom1Or2Or5', $numbers);

// 35.	 Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8, 9. С помощью цикла foreach создайте строку '-1-2-3-4-5-6-7-8-9-'.
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$resultString = '-';
foreach ($array as $value){
    $resultString .= $value .'-';
}
echo $resultString;

//36.	 Составьте массив дней недели. С помощью цикла foreach выведите все дни недели, а выходные дни выведите жирным.
$weekDays = ["Monday" => 1, "Tuesday" => 2, "Wednesday" => 3, "Thursday" => 4, "Friday" => 5, "Saturday" => 6, "Sunday" => 7];
echo '<br>';
foreach ($weekDays as $key => $value){
    if($value === 6 || $value === 7){
        echo "<b>{$key}&nbsp</b>";
    }
    else{
        echo $key . " ";
    }
}

//37.	 Составьте массив дней недели. С помощью цикла foreach выведите все дни недели, а текущий день выведите курсивом.
// Текущий день должен храниться в переменной $day.

echo '<br>';
foreach ($weekDays as $key => $value){
    if($key === date("l")){
        echo "<b>{$key}&nbsp</b>";
    }
    else{
        echo $key . " ";
    }
}

// 38.	 С помощью цикла for заполните массив числами от 1 до 100. То есть у вас должен получится массив [1, 2, 3... 100].
$array = range(1, 100);

// 39. Дан массив $arr. С помощью цикла foreach запишите английские названия в массив $en, а русские - в массив $ru.
$arr = ['green'=>'зеленый', 'red'=>'красный', 'blue'=>'голубой'];
$en = [];
$ru = [];

echo '<br>';
foreach ($arr as $key => $value){
    if(preg_match("~^\p{Latin}+$~u", $key)){
        $en[] = $key;
    }
    else{
        $ru[] = $key;
    }

    if(preg_match("~^\p{Latin}+$~u", $value)){
        $en[] = $value;
    }
    else{
        $ru[] = $value;
    }
}

//var_dump($en);
//var_dump($ru);

// 40. Дано число $num=1000. Делите его на 2 столько раз, пока результат деления не станет меньше 50.
// Какое число получится? Посчитайте количество итераций, необходимых для этого (итерация — это проход цикла).
// Решите задачу сначала через цикл while, а потом через цикл for.

$num = 1000;
$countOfIterations = 0;
while ($num >= 50){
    $countOfIterations++;
    $num /= 2;
}

echo "Количество итераций = " . ($countOfIterations - 1) . '<br>';

$num = 1000;
for ($countOfIterations = 0 ; $num >= 50; $countOfIterations++){
    $num /= 2;
}

echo "Количество итераций = " . ($countOfIterations - 1) . '<br>';

// 41.	Дано число, например 30. У этого числа есть делители - числа, на которое оно делится без остатка.
// Делители числа 30 — это 1, 2, 3, 5, 6, 10, 15, 30. Задача: сделайте массив делителей нашего числа.
// Число может быть любым, не обязательно, 30.

function getNumberDivisors($number) {
    $divisors = array ();
    for($i = 1; $i < $number; $i ++) {
        if ($number % $i === 0) {
            $divisors [] = $i;
        }
    }
    return $divisors;
}

//var_dump(getNumberDivisors(30));

//42.	 Дан массив [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]. Узнайте, сколько первых элементов массива нужно сложить, чтобы сумма получилась больше 10.

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
function getCountOfElements($array){
    $countOfElements = count($array);
    $sum = $array[0];

    for ($i = 1; $i < $countOfElements; $i++){
        $sum += $array[$i];
        if($sum > 10){
            return $i;
        }
    }
    return -1;
}
echo getCountOfElements($array) . '<br>';

// 43.	Преобразуйте строку 'var_test_text' в 'varTestText'. Скрипт, конечно же, должен работать с любыми аналогичными строками.
$tmpString = 'var_test_text';
echo lcfirst(str_replace('_', '', ucwords($tmpString, '_'))) . '<br>';

// 45.	 Дан массив с числами. Выведите на экран все числа, в которых есть цифра 3.
$array = [1, 2, 3, 4, 35, 6, 7, 38, 9, 310];
array_map(static function ($num){if(strpos($num, '3') !== false){echo $num . '<br>';} }, $array);