<?php

date_default_timezone_set('GMT-3');
$week = [0 => 'Воскресенье', 1 => 'Понедельник', 2 => 'Вторник', 3 => 'Среда', 4 => 'Четверг', 5 => 'Пятница', 6 => 'Суббота'];
$months = ['Январь' , 'Февраль' , 'Март' , 'Апрель' , 'Май' , 'Июнь' , 'Июль' , 'Август' , 'Сентябрь' , 'Октябрь' , 'Ноябрь' , 'Декабрь'];

// 1. Выведите 23 сентября 2031 года 12:58:59 в формате timestamp.

echo '23 сентября 2031 года 12:58:59 в формате timestamp: ' . date('d-M-Y H:i:s', mktime(12,58,59, 9, 23, 2031)) . '<br>';

// 2. Найдите разницу между 1 сентября 2010 года, 7:25:59 и текущим моментом времени в секундах.

$startDate = new DateTime('2010-09-01 07:25:59');
echo 'Разница между 1 сентября 2010 года 7:25:59 и текущим моментом времени в секундах = ' . $startDate->diff(new DateTime())->s . '<br>';

// 3. Выведите текущую дату-время в формате '2025.12.31 12:59:59'.

echo  'Текущая дата: ' . date('Y.m.d H:i:s') . '<br>';

// 4. Выведите 1-го сентября текущего года в формате '2020.09.01'.

echo '1-го сентября текущего года: ' . date('y.m.d', mktime(0,0,0, 9, 1, 2020)) . '<br>';

// 5. Узнайте, какой день недели (словом) был 1 сентября 2010 года.

$date = date('y.m.d', mktime(0,0,0, 9, 1, 2010));
echo 'Узнайте, какой день недели (словом) был 1 сентября 2010 года: ' . $week[date('w', $date)] . '<br>';

// 6. Дана дата в формате '31-12-2025'. С помощью функций mktime и explode переведите эту дату в формат timestamp.
echo date('d-M-Y H:i:s', mktime(0,0,0, 12, 31, 2025)) . '<br>';

// 7. Выведите текущее время в формате timestamp.
echo 'Текущее время в формате timestamp: ' . time() . '<br>';

// 8. Выведите 1 марта 2025 года в формате timestamp
echo date('d-M-Y', mktime(0,0,0, 3, 1, 2025)) . '<br>';

// 9. Выведите 31 декабря текущего года в формате timestamp. Скрипт должен работать независимо от года, в котором он запущен.
$year = 2020;
echo '31 декабря текущего года в формате timestamp: ' . date('d-M-Y', mktime(0,0,0, 12, 31, $year)) . '<br>';

// 10. Найдите количество секунд, прошедших с 13:12:59 15-го марта 2000 года до настоящего момента времени.
$date = new DateTime('2000-03-14 13:12:59');
$currentDate = new DateTime();
echo 'Количество секунд, прошедших с 13:12:59 15-го марта 2000 года до настоящего момента времени = ' . ($currentDate->getTimestamp() - $date->getTimestamp()) . '<br>';

// 11. Найдите количество целых часов, прошедших с 7:23:48 текущего дня до настоящего момента времени.
$date1 = new DateTime();
$date1->setTime(7, 23,48);
$date2 = new DateTime();
$diff = $date2->diff($date1);
$hours = $diff->h;
echo $hours . '<br>';

// 12. Выведите на экран текущий год, месяц, день, час, минуту, секунду.
echo date("Y-m-d H:i:s") . '<br>';

// 13. Выведите текущую дату-время в форматах '2025-12-31', '31.12.2025', '31.12.13', '12:59:59'.
echo date("Y-m-d") . '<br>';
echo date("d.m.Y") . '<br>';
echo date("d.m.y") . '<br>';
echo date("H:i:s") . '<br>';

// 14. С помощью функций mktime и date выведите 12 февраля 2025 года в формате '12.02.2025'.
echo date('d.m.Y', mktime(0,0,0, 2, 12, 2025)) . '<br>';

// 15. Создайте массив дней недели $week. Выведите на экран название текущего дня недели с помощью массива $week и функции date.
// Узнайте какой день недели был 06.06.2006, и в ваш день рождения.

echo 'Текущий день недели: ' . $week[date('w')] . '<br>';
echo 'День недели 06.06.2006 - ' . $week[date('w', mktime(0, 0, 0, 06, 06, 2006))] . '<br>';
echo 'День недели 12.12.2019 - ' . $week[date('w', mktime(0, 0, 0, 12, 12, 2019))] . '<br>';

// 16. Создайте массив месяцев $month. Выведите на экран название текущего месяца с помощью массива $month и функции date.
$months = [1 => 'Январь' , 'Февраль' , 'Март' , 'Апрель' , 'Май' , 'Июнь' , 'Июль' , 'Август' , 'Сентябрь' , 'Октябрь' , 'Ноябрь' , 'Декабрь'];
echo 'Текущий месяц - ' . date($months[date('n')]) . '<br>';

// 17. Найдите количество дней в текущем месяце. Скрипт должен работать независимо от месяца, в котором он запущен.
echo 'Количество дней в текущем месяце = ' . date('t', mktime(0, 0, 0, date('n'))) . '<br>';

// 18. Сделайте поле ввода, в которое пользователь вводит год (4 цифры), а скрипт определяет високосный ли год.
 if(isset($_POST['leapYearFormSubmit'])){
    $userYear = htmlspecialchars($_POST['userYear']);
    echo ($userYear % 4 === 0 && $userYear % 100 !== 0) || $userYear % 400 === 0 ? $userYear . ' - вискокосный год' : $userYear . ' не вискокосный год.' . '<br>';
 }
 else{
     ?>
         <form name="leapYearForm" method="POST" action="">
             <label>Введите год: <input name="userYear" type="text" maxlength="4"></label>
             <input type="submit" name="leapYearFormSubmit" value="Подтверждаю">
         </form>
     <?php
 }

// 19. Сделайте форму, которая спрашивает дату в формате '31.12.2025'. С помощью функций mktime и explode переведите
// эту дату в формат timestamp. Узнайте день недели (словом) за введенную дату.

if(isset($_POST['dateToTimestampForm1Submit'])){
    $userDate = explode('.', $_POST['userDate']);
    echo $week[date('w', mktime(0, 0, 0, $userDate[2], $userDate[1], $userDate[0]))] . '<br>';
}
else{
    ?>
        <form name="dateToTimestampForm" method="POST" action="">
            <label>Введите дату: <input name="userDate" type="date"></label>
            <input type="submit" name="dateToTimestampForm1Submit" value="Узнать название дня недели">
        </form>
    <?php
}

// 20. Сделайте форму, которая спрашивает дату в формате '2025-12-31'. С помощью функций mktime и explode переведите эту
// дату в формат timestamp. Узнайте месяц (словом) за введенную дату.

if(isset($_POST['dateToTimestampForm2Submit'])){
    $userDate = explode('-', $_POST['userDate']);
    echo $months[date('n', mktime(0, 0, 0, $userDate[1], $userDate[0], $userDate[2]))] . '<br>';
}
else{
    ?>
        <form name="dateToTimestampForm" method="POST" action="">
            <label>Введите дату: <input name="userDate" type="text" placeholder="дд-мм-гггг"></label>
            <input type="submit" name="dateToTimestampForm2Submit" value="Узнать название месяца">
        </form>
    <?php
}
// 21. Сделайте форму, которая спрашивает две даты в формате '2025-12-31'. Первую дату запишите в переменную $date1,
// а вторую в $date2. Сравните, какая из введенных дат больше. Выведите ее на экран.

if(isset($_POST['userDatesSubmit'])){
    $userDate1 = DateTime::createFromFormat('d-m-Y', $_POST['userDate1']);
    $userDate2 = DateTime::createFromFormat('d-m-Y', $_POST['userDate2']);
    echo $userDate1 > $userDate2 ? 'Первая дата больше, чем вторая' : 'Вторая дата больше, чем первая' . '<br>';
}
else{
    ?>
        <form name="userDates" method="POST" action="">
            <label>Введите первую дату: <input name="userDate1" type="text" placeholder="дд-мм-гггг"></label>
            <label>Введите вторую дату: <input name="userDate2" type="text" placeholder="дд-мм-гггг"></label>
            <input type="submit" name="userDatesSubmit" value="Узнать какая дата больше">
        </form>
    <?php
}

// 22. Для решения задач данного блока вам понадобятся следующие функции: strtotime.

// 23. Дана дата в формате '2025-12-31'. С помощью функции strtotime и функции date преобразуйте ее в формат '31-12-2025'.
echo date('d-m-Y', strtotime('2025-12-31')) . '<br>';

// 24. Сделайте форму, которая спрашивает дату-время в формате '2025-12-31T12:13:59'. С помощью функции strtotime и
// функции date преобразуйте ее в формат '12:13:59 31.12.2025'.

if(isset($_POST['userDateSubmit'])){
    $userDate = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['userDate']);
    echo date('H:i:s d-m-Y', strtotime($_POST['userDate'])) . '<br>';
}
else{
    ?>
    <form name="userDate" method="POST" action="">
        <label>Введите дату: <input name="userDate" type="text" placeholder="гггг-мм-дд чч:мм:cc"></label>
        <input type="submit" name="userDateSubmit" value="Преобразовать">
    </form>
    <?php
}

// 25. В переменной $date лежит дата в формате '2025-12-31'. Прибавьте к этой дате 2 дня, 1 месяц и 3 дня, 1 год.
// Отнимите от этой даты 3 дня.

echo '2025-12-31' . ' + 2 дня = ' . date('Y-m-d' ,strtotime('2025-12-31' . ' + 2 days')) . '<br>';
echo '2025-12-31' . ' + 1 месяц и 3 дня = ' . date('Y-m-d' ,strtotime('2025-12-31' . ' + 1 month + 3 days')) . '<br>';
echo '2025-12-31' . ' + 1 год = ' . date('Y-m-d' ,strtotime('2025-12-31' . ' + 1 year')) . '<br>';

// 26. Узнайте сколько дней осталось до Нового Года. Скрипт должен работать в любом году.
$year = 2020;
echo 'До нового года осталось ' . floor((strtotime('31-12-' . $year) - time()) / 60 / 60 / 24) . ' дней.' . '<br>';

// 27. Сделайте форму с одним полем ввода, в которое пользователь вводит год. Найдите все пятницы 13-е в этом году. Результат выведите в виде массива дат.



// 28. Узнайте какой день недели был 100 дней назад.
echo $week[date('w' , strtotime('now' . ' - 100 days'))] . ' был 100 дней назад' . '<br>';