<?
include '../includes/setting.php';
if (isset($_POST['name']))      {$name = $_POST['name'];}
if (isset($_POST['power']))      {$power = $_POST['power'];}
if (isset($_POST['input']))        {$input = $_POST['input'];}
if (isset($_POST['k_working'])) {$k_working = $_POST['k_working'];}
if (isset($_POST['k_comfort']))        {$k_comfort = $_POST['k_comfort'];}
if (isset($_POST['price']))      {$price = $_POST['price'];}
if (isset($_POST['equipment_id']))      {$equipment_id = $_POST['equipment_id'];}

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
<?
if(isset($_POST['delete']) AND $_POST['delete'] == 1) {
	$result = mysql_query("DELETE FROM games");
	if ($result == 'true') {
		echo "<p>Таблица с рейтингом очищена!</p>";
							}
		else {echo "<p>Ошибка!</p>";}
}

print " <div class=\"delete\">
			<strong>Вы уверены что хотите очистить таблицу \"Рейтинг\"? После того, как таблица будет очищена, данные будут удалены безвозвратно.</strong>
			<form action=\"\" method =\"POST\"> 
				<input type=\"hidden\" name=\"delete\" value=\"1\" />
				<input type=\"submit\" value=\"Очистить\" />
			</form>
		</div>";

?>


<!-- end .content --></div>
  <!-- end .container --></div>
	</body>
</html>