<?php

// 1.	Сделайте функцию, которая возвращает квадрат числа. Число передается параметром.

function getSquareNumber($number){
    return $number * $number;
}
echo '5 в квадрате = ' . getSquareNumber(5) . '<br>';

// 2.	Сделайте функцию, которая возвращает сумму двух чисел. Числа передаются параметрами функции.

function getSumNumbers($num1, $num2){
    return $num1 + $num2;
}
echo '5 + 5 = ' . getSumNumbers(5, 5) . '<br>';

// 3.	Сделайте функцию, которая отнимает от первого числа второе и делит на третье.
function someArithmeticOperations($num1, $num2, $num3){
    return ($num1 - $num2) / $num3;
}
echo '2 - 4 / 2 = ' . someArithmeticOperations(2, 4,2) . '<br>';

// 4.	Сделайте функцию, которая принимает параметром число от 1 до 7, а возвращает день недели на русском языке.

function getWeekDayName($day){
    $weekDaysRu = [1 => 'Понедельник', 2 => 'Вторник', 3 => 'Среда', 4 => 'Четверг', 5 => 'Пятница', 6 => 'Суббота', 7 => 'Воскресенье'];
    if($day > 0 && $day < 8){
        return $weekDaysRu[$day];
    }
    throw new RuntimeException('Указа неверный день');
}
echo getWeekDayName(5) . ' - 5-й день недели' . '<br>';

// 5.	Дан массив с числами. Создайте из него новый массив, где останутся лежать только положительные числа.
// Создайте для этого вспомогательную функцию isPositive, которая параметром будет принимать число и возвращать true,
// если число положительное, и false - если отрицательное.

$sourceArray = [1, -2, 3, -4, 5, -6];
$resultArray = array_filter($sourceArray, static function ($number){return $number > 0;});
//var_dump($resultArray);

// 6.	Сделайте функцию isNumberInRange, которая параметром принимает число и проверяет, что оно больше нуля и меньше 10.
// Если это так - пусть функция возвращает true, если не так - false.

function isNumberInRange($num){
    return $num > 0 && $num < 10;
}

// 7.    Дан массив с числами. Запишите в новый массив только те числа, которые больше нуля и меньше 10-ти.
// Для этого используйте вспомогательную функцию isNumberInRange из предыдущей задачи.

$sourceArray = [1, -20, 30, -4, 50, 6];
$resultArray = array_filter($sourceArray, "isNumberInRange");
//var_dump($resultArray);

// 8.	 Сделайте функцию getDigitsSum (digit — это цифра), которая параметром принимает целое число и возвращает сумму его цифр.

function getDigitsSum($digit){
    return array_sum(str_split($digit));
}

echo 'Сумма чисел 56 = ' . getDigitsSum(56) . '<br>';

// 9.	 Найдите все года от 1 до 2020, сумма цифр которых равна 13.
// Для этого используйте вспомогательную функцию getDigitsSum из предыдущей задачи.

$years = range(1, 2020);
$resultArray = array_filter($years, "getDigitsSum");
//var_dump($resultArray);

// 10.	 Сделайте функцию isEven() (even - это четный), которая параметром принимает целое число и проверяет: четное оно или нет.
// Если четное - пусть функция возвращает true, если нечетное - false.

function isEven($number){
    return $number % 2 === 0;
}

// 11.	 Дан массив с целыми числами. Создайте из него новый массив, где останутся лежать только четные из этих чисел.
// Для этого используйте вспомогательную функцию isEven из предыдущей задачи.

$sourceArray = [1, -2, 3, -4, 5, -6];
$resultArray = array_filter($years, "isEven");

// 12.	 Сделайте функцию getDivisors, которая параметром принимает число и возвращает массив его делителей
// (чисел, на которое делится данное число).

function getDivisors($number){
    $divisors = [];
    for($i = 1; $i < $number; $i ++) {
        if ($number % $i === 0) {
            $divisors [] = $i;
        }
    }
    return $divisors;
}

// 13.	 Сделайте функцию getCommonDivisors, которая параметром принимает 2 числа, а возвращает массив их общих делителей.
// Для этого используйте вспомогательную функцию getDivisors из предыдущей задачи.

function getCommonDivisors($number1, $number2){
    $number1Divisors = getDivisors($number1);
    $number2Divisors = getDivisors($number2);
    return array_intersect($number1Divisors, $number2Divisors);
}

var_dump(getCommonDivisors(15, 30));