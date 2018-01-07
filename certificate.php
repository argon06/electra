<?
include 'includes/setting.php';
include 'includes/function.php';

$result = mysql_query("SELECT * FROM games WHERE game_id = $_POST[game_id]");
$row = mysql_fetch_array($result);


$comfort         = $row['comfort'];
$input   		 = $row['input'];
$user_name       = $row['user_name'];
$user_surname    = $row['user_surname'];
$user_patronymic = $row['user_patronymic']; 
$k               = round($row['k'],0);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Энергоэффективная квартира</title>
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<style type="text/css">
		@media screen, print {
		.cert { 
			position: absolute;
			z-index: -15;
			}
		.name {
			width: 400px;
			font: Verdana bold;
			font-size: 130%;
			color: #169b63;
			z-index: 15;
			position: relative; 
			left: 170px;
			top: 255px;
			}
		.text {
			width: 320px;
			font: Verdana bold;
			font-size: 130%;
			color: #169b63;
			z-index: 16;
			position: relative;
			left: 250px;
			top: 500px;
			}
			}
	</style>
</head>
 <body>
 <div  class="cert"><img src="./images/sertificate.png"> </div>
	<div class="name"><?print "$user_surname $user_name $user_patronymic";?></div>
	<div class="text">
		Класс энергоэффективности:<?energo ($input);?> 
		<br>
		Уровень комфорта:<?comfort ($comfort);?> 
		<br>
		Итоговый балл: <span style="font-size:150%; color:red;"><strong><?print "$k";?></strong></span> ед
		<br><br><br><br><br><br><br><br><br><br><br>
	</div>


 </body>
</html>
<?

killses ();
?>