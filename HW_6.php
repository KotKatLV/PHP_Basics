<?php

// 1.	Сделайте объект какого-нибудь класса. Примените к объекту функцию get_class и узнайте имя класса, которому принадлежит объект.
class Human{
    public string $name;
    public string $surname;
    public string $patronymic;

    public function GetFullName() : void{
        echo 'Это метод GetFullName';
    }

    public function __construct(){
        $this->name = 'Вася';
        $this->surname = 'Васильев';
        $this->patronymic = 'Васильевич';
    }
}

$kostya = new Human();
echo get_class($kostya) . '<br>';

// 2.	Сделайте два класса: Test1 и Test2. Пусть оба класса имеют свойство name.
class Test1{
    public string $name;

    public function __construct($name){
        $this->name = $name;
    }
}

class Test2{
    public string $name;

    public function __construct($name){
        $this->name = $name;
    }
}

// 3.	Создайте некоторое количество объектов этих классов и запишите в массив $arr в произвольном порядке.
// Переберите этот массив циклом и для каждого объекта выведите значение его свойства name и имя класса, которому принадлежит объект.
$testArr = [new Test1('имя 1'), new Test2('имя 2'), new Test1('имя 3'), new Test2('имя 4')];
foreach ($testArr as $obj){
    echo $obj->name . '<br>';
}

// 4.	method1, method2 и method3. С помощью функции get_class_methods получите массив названий методов класса Test.
class Test{
    public function __construct(){
        echo var_dump(get_class_vars('Test'));
    }

    public function method1() : void{
        echo 'Это method1' . '<br>';
    }

//    public function method2() : void{
//        echo 'Это method2' . '<br>';
//    }

    public function method3() : void{
        echo 'Это method3' . '<br>';
    }

    public string $prop1;
//    public string $prop2;
    private string $prop3;
    private string $prop4;
}

echo var_dump(get_class_methods('Test')) . '<br>';

// 5.	Создайте объект класса Test, запишите его в переменную $test.С помощью функции get_class_methods получите массив
// названий методов объекта. Переберите его циклом и в цикле вызовите каждый метод класса, используя объект $test.
$test = new Test();
$testClassMethods = get_class_methods('Test');
foreach ($testClassMethods as $method){
    $test->$method();
}

// 6.	Сделайте класс Test с публичными свойствами prop1 и prop2, а также с приватными свойствами prop3 и prop4.

// 7.	класса Test. Выведите массив доступных свойств
var_dump(get_class_vars('Test'));

// 8.	Вызовите функцию get_class_vars внутри класса Test (например, в конструкторе). Выведите массив доступных свойств.
// добавил в конструктор функцию get_class_vars

// 9.	Сделайте класс Test с публичными свойствами prop1 и prop2, а также с приватными свойствами prop3 и prop4.
// Создайте объект этого класса.С помощью функции get_object_vars получите массив свойств созданного объекта.
$testClassVars = get_object_vars($test);

// 10.	Пусть у вас есть класс Test1 и нет класса Test2. Проверьте, что выведет функция class_exists для класса Test1 и для класса Test2.
// Оставил класс Test2
echo class_exists('Test1') . ' ' . class_exists('Test2') . '<br>';

// 11.	Пусть GET параметром в адресную строку передается название класса. Проверьте, существует ли такой класс. Выведите соответствующее сообщение на экран.
$url = 'http://www.thebestsiteever.com?className=Vasya';
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
echo class_exists($params['className']) ? "Класс {$params['className']} существует." : "Класс {$params['className']} не существует." . '<br>';

// 12.	Сделайте класс Test с методом method1 и без метода method2.Проверьте, что выведет функция method_exists для метода method1 и для метода method2.
echo method_exists($test, 'method1') . '<br>';
echo method_exists($test, 'method2') . '<br>';

// 13.	Пусть GET параметрами в адресную строку передаются название класса и его метод. Проверьте, существует ли такой класс.
// Если существует - проверьте существование переданного метода. Если и метод существует - создайте объект данного класса,
// вызовите указанный метод и выведите результат его работы на экран.
$url = 'http://www.thebestsiteever.com?className=Human&method=GetFullName';
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
if(class_exists($params['className']) && in_array($params['method'], get_class_methods($params['className']), true)){
    $obj = new $params['className']();
    $method = $params['method'];
    $obj->$method();
}

// 14.	Сделайте класс Test со свойством prop1 и без свойства prop2.Проверьте, что выведет функция property_exists для свойства prop1 и для свойства prop2.
var_dump(property_exists('Test', 'prop1')) . '<br>';
var_dump(property_exists('Test', 'prop2')) . '<br>';

// 15.	Дан массив со свойствами класса. Дан также класс, имеющий часть из этих свойств.
// Переберите этот массив циклом, для каждого свойства проверьте, существует ли оно в классе и, если существует, выведите на экран значение этого свойства
$classProp = ['name', 'surname', 'patronymic'];
$human = new Human();
foreach ($classProp as $prop){
    if(property_exists('Human', $prop)){
        echo $human->$prop . '<br>';
    }
}

// 16.	Сделайте класс ChildClass наследующий от ParentClass. С помощью функции get_parent_class выведите на экран родителя класса ParentClass.
class GrandParentClass{

}

class ParentClass extends GrandParentClass {

}

class ChildClass extends ParentClass{

}

$chlClass = new ChildClass();
echo get_parent_class($chlClass);

// 17.	Сделайте класс ChildClass наследующий от ParentClass, который в свою очередь наследует от GrandParentClass
// Выше сделал

// 18.	С помощью функции is_subclass_of проверьте, является ли  класс ChildClass потомком GrandParentClass.
var_dump($chlClass instanceof GrandParentClass);

// 19.	С помощью функции is_subclass_of проверьте, является ли класс ParentClass потомком GrandParentClass.
$prtClass = new ParentClass();
var_dump($prtClass instanceof GrandParentClass);

// 20.	С помощью функции is_subclass_of проверьте, является ли класс ChildClass потомком ParentClass.
var_dump($chlClass instanceof ParentClass);

// 21.	Сделайте класс ChildClass наследующий от ParentClass. Создайте объект класса ChildClass, запишите его в переменную $obj.
$obj = new ChildClass();

// 22.	С помощью функции is_a проверьте, принадлежит ли объект $obj классу ChildClass.
var_dump($obj instanceof ChildClass);

// 23.	С помощью функции is_a проверьте, принадлежит ли объект $obj классу ParentClass.
var_dump($obj instanceof ParentClass);

// 24.	Выведите на экран список всех объявленных классов.
var_dump(get_declared_classes());