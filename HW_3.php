<?php

// 1. Спросите город пользователя с помощью формы. Результат запишите в переменную $city. Выведите на экран фразу 'Ваш город: %Город%'.
?>
    <form name="userCityForm" method="POST" action="">
        <label>В каком городе вы проживаете? <input type="text" name="userCity"></label>
        <input type="submit" name="userCityForm1Submit" value="Подтверждаю">
    </form>
<?php

if (isset($_POST['userCityForm1Submit'])) {
   $city = $_POST['userCity'];
   print('Ваш город: ' . $city . '<br>');
}

// 2. Решим предыдущую задачу так, чтобы пользователь не мог вводить теги и сломать нам сайт.
// Для этого при записи содержимого поля в переменную $city обработаем его (содержимое, то есть $_REQUEST['city'])
// функцией strip_tags, которая удалит теги (можно вместо нее обработать функцией htmlspecialchars):
?>
    <form name="userCityForm" method="POST" action="">
        <label>В каком городе вы проживаете? <input type="text" name="userCity"></label>
        <input type="submit" name="userCityForm2Submit" value="Подтверждаю">
    </form>
<?php

if (isset($_POST['userCityForm2Submit'])) {
    $city = htmlspecialchars($_POST['userCity']);
    print('Ваш город: ' . $city . '<br>');
}

// 3. Давайте сделаем так, чтобы форма после отправки скрывалась:
// 4. Спросите имя пользователя с помощью формы. Результат запишите в переменную $name. Выведите на экран фразу 'Привет, %Имя%'.
?>
    <form name="userNameForm" method="POST" action="">
        <label>Как вас зовут? <input type="text" name="userName"></label>
        <input type="submit" name="userNameFormSubmit" value="Подтверждаю">
    </form>
<?php

if (isset($_POST['userNameFormSubmit'])) {
    $userName = htmlspecialchars($_POST['userName']);
    print('Привет, ' . $userName . '.' . '<br>');
}

// 5. Спросите у пользователя имя, возраст, а также попросите его ввести сообщение (его сделайте в textarea).
// Выведите эти данные на экран в формате, приведенном под данной задачей.
// Позаботьтесь о том, чтобы пользователь не мог вводить теги (просто удаляйте их) и таким образом сломать сайт.
?>
    <form name="userPersonalDataForm" method="POST" action="">
        <label>Как вас зовут? <input type="text" name="userName"></label>
        <label>Ваш возраст? <input type="number" min="1" name="userAge"></label>
        <label>Ваше сообщение: <textarea name="userMessage"></textarea></label>
        <input type="submit" name="userPersonalDataFormSubmission" value="Подтверждаю">
    </form>
<?php

if (isset($_POST['userPersonalDataFormSubmission'])) {
    $userName = htmlspecialchars($_POST['userName']);
    $userAge = htmlspecialchars($_POST['userAge']);
    $userMessage = htmlspecialchars($_POST['userMessage']);
    echo 'Привет, ' . $userName . ', ' . $userAge . ' лет.' . '<br>';
    echo 'Твое сообщение: ' . $userMessage . '<br>';
}

// 6. Спросите возраст пользователя. Если форма была отправлена и введен возраст, то выведите его на экран, а форму уберите.
// Если же форма не была отправлена (это будет при первом заходе на страницу) - просто покажите ее.
?>
    <form name="userAgeForm" method="POST" action="">
        <label>Ваш возраст? <input type="number" min="1" name="userAge"></label>
        <input type="submit" name="userAgeFormSubmit" value="Подтверждаю">
    </form>
<?php

if (isset($_POST['userAgeFormSubmit'])) {
    $userAge = htmlspecialchars($_POST['userAge']);
    echo 'Ваш возраст: ' . $userAge . '<br>';
}

// 7. Спросите у пользователя логин и пароль (в браузере должен быть звездочками). Сравните их с логином $login и паролем $pass,
// хранящихся в файле. Если все верно - выведите 'Доступ разрешен!', в противном случае - 'Доступ запрещен!'.
// Сделайте так, чтобы скрипт обрезал концевые пробелы в строках, которые ввел пользователь.
?>
    <form name="loginPassword" method="POST" action="">
        <label>Введите логин: <input type="text" name="userLogin"></label>
        <label>Введите пароль: <input type="password" min="1" name="userPassword"></label>
        <input type="submit" name="loginPasswordFormSubmit" value="Подтверждаю">
    </form>
<?php

define('LOGIN', 'ADMIN');
define('PASSWORD', 'ADMIN');

if(isset($_POST['loginPasswordFormSubmit'])){
    $userLogin = htmlspecialchars($_POST['userLogin']);
    $userPass = htmlspecialchars($_POST['userPassword']);
    echo trim($userLogin) === LOGIN && trim($userPass) === PASSWORD ? 'Доступ разрешен' : 'Доступ запрещен';
}

// 8. Спросите имя пользователя с помощью формы. Результат запишите в переменную $name. Сделайте так, чтобы после отправки
// формы значения ее полей не пропадали
?>
    <form name="userNameForm" method="POST" action="">
        <label>Укажите ваше имя: <input type="text" name="userName" value="<?php echo $_POST['userName'] ?? '' ?>"></label>
        <input type="submit" name="userNameFormSubmit" value="Подтверждаю">
    </form>
<?php

if(isset($_POST['userNameFormSubmit'])){
    $userName = htmlspecialchars($_POST['userName']);
    echo 'Ваше имя: ' . $userName . '<br>';
}

// 9. Спросите у пользователя имя, а также попросите его ввести сообщение (textarea). Сделайте так, чтобы после отправки
// формы значения его полей не пропадали

?>
    <form name="userNameMessageForm" method="POST" action="">
        <label>Укажите ваше имя: <input type="text" name="userName" value="<?php echo $_POST['userName'] ?? '' ?>"></label>
        <label>Введите сообщение:  <textarea name="userMessage"><?php echo $_POST['userMessage'] ?? '' ?>"</textarea></label>
        <input type="submit" name="userNameMessageFormSubmit" value="Подтверждаю">
    </form>
<?php

if(isset($_POST['userNameMessageFormSubmit'])){
    $userName = htmlspecialchars($_POST['userName']);
    $userMessage = htmlspecialchars($_POST['userMessage']);
    echo 'Ваше имя: ' . $userName . '<br>';
    echo 'Ваше сообщение: ' . $userMessage . '<br>';
}