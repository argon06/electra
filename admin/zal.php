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
if(!isset($_POST[equipment_id]) OR ($_POST[equipment_id] == '')) {
?>
<h3 class="title">Зал</h3>
<div style="margin-left: 15px;">
	<hr color="#C0C0C0" size="3">
</div>
<h3 class="title">Основные электроприборы</h3>
<div style="margin: 0 auto;">
<table align="center" width="100%" border="1" cellspacing="0" cellpadding="0" class="rating" style=" margin-left: 15px; font-size: 80%;">
	<tr class="caption">
		<td width="43%"> <strong>Название</strong>
		<td> <strong>Мощность</strong>
		<td> <strong>Потребление</strong>
		<td> <strong>Коэффициент<br>эксплуатации</strong>
		<td> <strong>Комфорт</strong>
		<td> <strong>Стоимость</strong>
		<td> &nbsp
	</tr>
<?
$result = mysql_query("SELECT * FROM hb_equipment WHERE room_id=1 AND additional=0");
$row = mysql_fetch_array($result);

do {
	print "<tr onMouseOver=\"this.style.background='#f1f9df'\" onMouseOut=\"this.style.background='#fff'\"> 
			<td align=\"left\"> $row[name]
			<td> $row[power]
			<td> $row[input]
			<td> $row[k_working]
			<td> $row[k_comfort]
			<td> $row[price]
			<td> 
						<form method=\"POST\">
							<input type=\"hidden\" name=\"equipment_id\" value=\"$row[equipment_id]\">
							<input type=\"submit\" value=\"Править\">
						</form>

		</tr>
		";
}
while ($row = mysql_fetch_array($result));

?>
</table>
<br>
<h3 class="title">Дополнительные электроприборы</h3>
<table align="center" width="100%" border="1" cellspacing="0" cellpadding="0" class="rating" style=" margin-left: 15px; font-size: 80%;">
	<tr class="caption">
		<td width="43%"> <strong>Название</strong>
		<td> <strong>Мощность</strong>
		<td> <strong>Потребление</strong>
		<td> <strong>Коэффициент<br>эксплуатации</strong>
		<td> <strong>Комфорт</strong>
		<td> <strong>Стоимость</strong>
		<td> &nbsp
	</tr>
<?
$result = mysql_query("SELECT * FROM hb_equipment WHERE room_id=1 AND additional=1");
$row = mysql_fetch_array($result);

do {
	print "<tr onMouseOver=\"this.style.background='#f1f9df'\" onMouseOut=\"this.style.background='#fff'\"> 
			<td align=\"left\"> $row[name]
			<td> $row[power]
			<td> $row[input]
			<td> $row[k_working]
			<td> $row[k_comfort]
			<td> $row[price]
			<td> 
						<form method=\"POST\">
							<input type=\"hidden\" name=\"equipment_id\" value=\"$row[equipment_id]\">
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
$result = mysql_query("SELECT * FROM hb_equipment WHERE equipment_id = $_POST[equipment_id]");
$row = mysql_fetch_array($result);

print "
<div style=\"margin: 0 0 0 140px;\">
<form method=\"POST\" action=\"edit.php\" target=\"_self\">
Название: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input value=\"$row[name]\" name=\"name\" type=\"text\" size=\"45\"><br>
Мощность: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input value=\"$row[power]\" name=\"power\" type=\"text\" size=\"15\"><br>
Потребление: &nbsp&nbsp&nbsp
<input value=\"$row[input]\" name=\"input\" type=\"text\" size=\"15\"><br>
К.эксплуатации: 
<input value=\"$row[k_working]\" name=\"k_working\" type=\"text\" size=\"15\"><br>
Комфорт: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input value=\"$row[k_comfort]\" name=\"k_comfort\" type=\"text\" size=\"15\"><br>
Стоимость: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input value=\"$row[price]\" name=\"price\" type=\"text\" size=\"15\"><br>
<input type=\"hidden\" name=\"equipment_id\" value=\"$row[equipment_id]\">
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