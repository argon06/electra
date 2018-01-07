<?
include '../includes/setting.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Энергоэффективная квартира</title>
		<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<link href="../includes/style.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div class="container">
			<div class="header">
				<h2 class="header_text"> Проект тренинга «Энергоэффективная квартира»</h2>
				<div style="text-align:right; margin-right:15px; color: red;"><em>Раздел администратора</em></div>
			</div>
<?
if((isset($_SESSION['user'])) OR ($_SESSION['user'] == 1)){
?>
<!--Начало блока кнопок -->
<table align="center" border="0" cellspacing="0" cellpadding="0">
	<tr align="center">
		<td>
			<div style="width: 150px; margin: 10px auto;">
				<a class="button" href="zal.php">
					<span>Зал</span>
				</a>
			</div>
		<td>
			<div style="width: 150px; margin: 10px auto;">
				<a class="button" href="kitchen.php">
					<span>Кухня</span>
				</a>
			</div>
		<td>
			<div style="width: 150px; margin: 10px auto;">
				<a class="button" href="bathroom.php">
					<span>Санузел</span>
				</a>
			</div>
		<td align="center">
			<div style="width: 150px; margin: 10px auto;">
				<a class="button" href="levels.php">
					<span>Критерии</span>
				</a>
			</div>
		<td>
			<div style="width: 190px; margin: 10px auto;">
				<a class="button" href="delete.php">
					<span><div style="font-size:85%;">Очистить рейтинг</div></span>
				</a>
			</div>
		<td align="center">
			<div style="width: 150px; margin: 10px auto;">
				<a class="buttonred" href="../index.php">
					<span>Выход</span>
				</a>
			</div>
</table>
<!--Конец блока кнопок -->

			<div class="admin">
<?
if((!isset($_POST[en_lvl])) OR ($_POST[en_lvl] == '')) {
?>
<h3 class="title">Класс энергоэффективности</h3>
<div style="margin-left: 15px;">
	<hr color="#C0C0C0" size="3">
</div>
<div style="margin: 0 auto;">
<table align="center" width="100%" border="1" cellspacing="0" cellpadding="0" class="rating" style=" margin-left: 15px; font-size: 80%;">
	<tr class="caption">
		<td> <strong>Класс</strong>
		<td> <strong>Минимальное значение</strong>
		<td> <strong>Максимальное значение</strong>
		<td> &nbsp
	</tr>
<?
$result = mysql_query("SELECT * FROM energy");
$row = mysql_fetch_array($result);

do {
	print "<tr onMouseOver=\"this.style.background='#f1f9df'\" onMouseOut=\"this.style.background='#fff'\"> 
			<td align=\"left\"> $row[en_lvl]
			<td> $row[min_level]
			<td> $row[max_level]
			<td> 
				<form method=\"POST\">
					<input type=\"hidden\" name=\"en_lvl\" value=\"$row[en_lvl]\">
					<input type=\"submit\" value=\"Править\">
				</form>

		</tr>
		";
}
while ($row = mysql_fetch_array($result));
?></table> <?
} else {
$result = mysql_query("SELECT * FROM energy WHERE en_lvl = '$_POST[en_lvl]'");
$row = mysql_fetch_array($result);
print "
<div style=\"margin: 0 0 0 140px;\">
<form method=\"POST\" action=\"edit_lvl.php\" target=\"_self\">
Класс: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input value=\"$row[en_lvl]\" name=\"en_lvl\" type=\"text\" size=\"10\" disabled><br>
Минимальное значение:&nbsp
<input value=\"$row[min_level]\" name=\"min_level\" type=\"text\" size=\"10\"><br>
Максимальное значение: 
<input value=\"$row[max_level]\" name=\"max_level\" type=\"text\" size=\"10\"><br>
<input type=\"hidden\" name=\"en_lvl\" value=\"$row[en_lvl]\">
<input type=\"submit\" value=\"Сохранить\">
</form>
</div>
";
}
?>

<br>
<?
if((!isset($_POST[stars])) OR ($_POST[stars] == '')) {
?>
<h3 class="title">Уровни комфорта</h3>
<table align="center" width="100%" border="1" cellspacing="0" cellpadding="0" class="rating" style=" margin-left: 15px; font-size: 80%;">
	<tr class="caption">
		<td> <strong>Уровень</strong>
		<td> <strong>Минимальное значение</strong>
		<td> <strong>Максимальное значение</strong>
		<td> &nbsp
	</tr>
<?
$result = mysql_query("SELECT * FROM comfort");
$row = mysql_fetch_array($result);

do {
	print "<tr onMouseOver=\"this.style.background='#f1f9df'\" onMouseOut=\"this.style.background='#fff'\"> 
			<td align=\"left\"> $row[stars]
			<td> $row[min_level]
			<td> $row[max_level]
			<td> 
				<form method=\"POST\">
					<input type=\"hidden\" name=\"stars\" value=\"$row[stars]\">
					<input type=\"submit\" value=\"Править\">
				</form>
		</tr>
		";
}
while ($row = mysql_fetch_array($result));

?>
</table>
</div>
<?
} else {
//редактирование данных
$result = mysql_query("SELECT * FROM comfort WHERE stars = $_POST[stars]");
$row = mysql_fetch_array($result);

print "
<div style=\"margin: 0 0 0 140px;\">
<form method=\"POST\" action=\"edit_lvl.php\" target=\"_self\">
Уровень: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input value=\"$row[stars]\" name=\"stars\" type=\"text\" size=\"10\" disabled><br>
Минимальное значение:&nbsp
<input value=\"$row[min_level]\" name=\"min_level\" type=\"text\" size=\"10\"><br>
Максимальное значение: 
<input value=\"$row[max_level]\" name=\"max_level\" type=\"text\" size=\"10\"><br>
<input type=\"hidden\" name=\"stars\" value=\"$row[stars]\">
<input type=\"submit\" value=\"Сохранить\">
</form>
</div>
";
}
} else {print "<p>Вам сюда нельзя!</p>";}
?>


<!-- end .admin --></div>
  <!-- end .container --></div>
	</body>
</html>