<?php

require './vendor/autoload.php';

const ROOT = __DIR__;

$router = new \tbf\components\Router();
$router->run();




$prod = new \tbf\App\Models\Product();
$prod->price = 50;
$prod->title = 'Какойто гриб';
$prod->rus_name = 'Невкусный гриб';
$prod->img = 'img';
$prod->cat = 'poisonous';
$prod->descr = "Какойто очень невкусныйгриб";
$prod->insert();
$prod->update(29, 'img' , 'cartinka');


//var_dump($data);





//// форматирование даты на кирилиицу
//setlocale(LC_ALL , 'russian');
//
//$dataNow = strftime('%d-%h-%Y %H-%M');
//$dataNow = iconv('windows-1251','utf-8' , $dataNow);
///////////////////////////////////////////////////////////////
//$year = strftime('%Y');
//
//$chas =(int)strftime('%H');
//$welcom = '';
//if ($chas > 0 and $chas < 6 ){
//    $welcom = 'Доброй ночи';
//}elseif($chas >= 6 and $chas < 12){
//    $welcom = 'Доброе утро';
//}elseif ($chas >= 12 and $chas < 18){
//    $welcom = 'Добрый день';
//}elseif ($chas >= 18 and $chas < 23){
//    $welcom = 'Добрый вечер';
//}else{
//    $welcom = 'Доброй ночи';
//}
//
//echo $welcom;
//
//$size = ini_get('post_max_size');
//$letter = $size[strlen($size)-1]; //получение последнего символа строки
//$size = (int)$size;
//
//switch ($letter){
//    case 'M':
//        $bukv = 'M'; break;
//    case 'K':
//        $bukv = 'K'; break;
//}

?>
<!--<!DOCTYPE html>-->
<!--<html>-->
<!---->
<!--<head>-->
<!--    <title>О сайте</title>-->
<!--    <meta charset="utf-8" />-->
<!--    <link rel="stylesheet" href="style.css" />-->
<!--</head>-->
<!---->
<!--<body>-->
<!---->
<!--<div id="header">-->
<!--    <!-- Верхняя часть страницы -->-->
<!--    <img src="logo.gif" width="187" height="29" alt="Наш логотип" class="logo" />-->
<!--    <span class="slogan">приходите к нам учиться</span>-->
<!--    <!-- Верхняя часть страницы -->-->
<!--</div>-->
<!---->
<!--<div id="content">-->
<!--    <!-- Заголовок -->-->
<!--    <h1>--><?php //echo $welcom. ', Гость' ?><!--</h1>-->
<!--    <!-- Заголовок -->-->
<!--    --><?php //echo 'Сегодня ' . $dataNow;
//    echo "<br>";
//    echo $bukv;
//
//
//    ?>
<!--    <!-- Область основного контента -->-->
<!--    <p>-->
<!--        Сайт создан на общественных началах и управляется на некоммерческой основе. Все фотографии и материалы предоставлены и используются с ведома и при участии администрации школы.-->
<!--    </p>-->
<!--    <h3>Цели создания проекта</h3>-->
<!--    <ol>-->
<!--        <li>поднятие престижа нашей школы.</li>-->
<!--        <li>для информирования родителей будущих учеников нашей школы.</li>-->
<!--        <li>для возобновления утраченных связей между выпускниками и учителями, с предоставлением им информационного пространства для общения.</li>-->
<!--        <li>для общения учеников во внеурочное время.</li>-->
<!--    </ol>-->
<!--    <h3>Советы и предупреждения</h3>-->
<!--    <p>-->
<!--        Сайт оптимизирован под все браузеры. Наилучшее качество просмотра достигается при разрешении экрана монитора - 1280 на 1024 точек.-->
<!--    </p>-->
<!--    <!-- Область основного контента -->-->
<!--</div>-->
<!--<div id="nav">-->
<!--    <h2>Навигация по сайту</h2>-->
<!--    <!-- Меню -->-->
<!--    <ul>-->
<!--        <li><a href='index.php'>Домой</a>-->
<!--        </li>-->
<!--        <li><a href='about.php'>О нас</a>-->
<!--        </li>-->
<!--        <li><a href='contact.php'>Контакты</a>-->
<!--        </li>-->
<!--        <li><a href='table.php'>Таблица умножения</a>-->
<!--        </li>-->
<!--        <li><a href='calc.php'>Калькулятор</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--    <!-- Меню -->-->
<!--</div>-->
<!--<div id="footer">-->
<!--    <!-- Нижняя часть страницы -->-->
<!--    &copy; Супер Мега Веб-мастер, 2000 &ndash; --><?//= $year ?>
<!--    <!-- Нижняя часть страницы -->-->
<!--</div>-->
<!--</body>-->
<!---->
<!--</html>-->


