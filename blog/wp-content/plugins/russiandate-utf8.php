<?php
/*
Plugin Name: TheRussianDate
Plugin URI: http://www.yaroshevich.ru/php/the-wp-russian-date
Description: russian formated date 
Version: 1.01
Author: Vasil Yaroshevich
Author URI: http://www.yaroshevich.ru
License: GPL
Last modified: 11/24/2006 07:48PM MSK
*/


/*
Добавляет функцию the_russian_time(), которая используется аналогично
стандартной функции the_time(), в дополнение к которой добавлена обработка
символа "R" для вывода названия месяца на русском языке в родительном падеже.

Пример: the_russian_time('j R Y г.') выведет дату в виде "23 ноября 2006 г."
*/

function the_russian_time($template='') {

$RinTemplate = strpos($template, "R");

if ($RinTemplate===FALSE) {
	echo get_the_time($template);
} else {
	if($RinTemplate > 0) {
		echo get_the_time(substr($template, 0,$RinTemplate));
	}
	
	$months= array (
	"января",
	"февраля",
	"марта",
	"апреля",
	"мая",
	"июня",
	"июля",
	"августа",
	"сентября",
	"октября",
	"ноября",
	"декабря"
	);
	echo $months[get_the_time('n')-1];
	the_russian_time(substr($template,$RinTemplate+1)); 	
}
}

function the_russian_comment_time($template='') {
	$RinTemplate = strpos($template, "R");

if ($RinTemplate===FALSE) {
	echo get_comment_time($template);
} else {
	if($RinTemplate > 0) {
		echo get_comment_time(substr($template, 0,$RinTemplate));
	}
	
	$months= array (
	"января",
	"февраля",
	"марта",
	"апреля",
	"мая",
	"июня",
	"июля",
	"августа",
	"сентября",
	"октября",
	"ноября",
	"декабря"
	);
	echo $months[get_comment_time('n')-1];
	the_russian_comment_time(substr($template,$RinTemplate+1)); 	
}
}


?>