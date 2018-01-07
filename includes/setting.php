<?php
session_start();
// Энергоэффективная нефтедобыча

//Глобальные настройки
//------------------------------------------------------------------------------
error_reporting(0);

$debug = true;
$debug = false;

$year=date("Y");
$m=date("m")+0;
$date=date("d.m.Y");
$time=date("H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];


//Пытаемся соединиться с БД.
//------------------------------------------------------------------------------

	$link = mysql_connect("localhost", "electra", "carmen_electra") or die("Ошибка подключения к MySQL!");
	
	if($link){
		mysql_select_db("electra", $link);

		//Принудительно выставляем кодировку
		mysql_query("SET NAMES utf8;");
		
		return $link;
	}
	else{
		error(4);
		exit;
	}
	
 ?>