<?
include '../includes/setting.php';
if (isset($_POST['en_lvl']))      {$en_lvl = $_POST['en_lvl'];}
if (isset($_POST['min_level']))      {$min_level = $_POST['min_level'];}
if (isset($_POST['max_level']))        {$max_level = $_POST['max_level'];}
if (isset($_POST['stars'])) {$stars = $_POST['stars'];}


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


if (isset($en_lvl) && isset($min_level) && isset($max_level)) {
	$result = mysql_query ("UPDATE energy SET min_level='$min_level', max_level='$max_level' WHERE en_lvl='$en_lvl'");
		if ($result == 'true') {
				echo "<p>Таблица <em>'energy'</em> успешно обновлена!</p>";
			}
			else {
				echo "<p>Таблица <em>'energy'</em> не обновлена!</p>";
			}
	}
	else {
		echo "<p>Таблица <em>'energy'</em> не изменена!</p>";
	}

if (isset($stars) && isset($min_level) && isset($max_level)) {
	$result = mysql_query ("UPDATE comfort SET min_level='$min_level', max_level='$max_level' WHERE stars='$stars'");
		if ($result == 'true') {
				echo "<p>Таблица <em>'comfort'</em> успешно обновлена!</p>";
			}
			else {
				echo "<p>Таблица <em>'comfort'</em> не обновлена!</p>";
			}
	}
	else {
		echo "<p>Таблица <em>'comfort'</em> не изменена!</p>";
	}
?>


<!-- end .content --></div>
  <!-- end .container --></div>
	</body>
</html>