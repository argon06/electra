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
				<a class="titlea" href="../index.php"><h2 class="header_text"> Проект тренинга «Энергоэффективная квартира»</h2></a>
				<div style="text-align:right; margin-right:15px; color: red;"><em>Раздел администратора</em></div>
			</div>
<?
$result = mysql_query("SELECT * FROM users");
$row = mysql_fetch_array($result);
//checking name, surname, patronymic
	if(($_POST[login]!=$row[login]) OR ($_POST[password]!=$row[password])){
?><br><br><br>
	<div class="intro">
	<h3 class="title">Вход в раздел администратора</h3>
	<form name="sign" method="POST">
		<b>Логин:</b><br>
		<input name="login" type="text" size="35">
		<br><b>Пароль:</b><br>
		<input name="password" type="password" size="35">
		<br><input type="submit" value="Войти">
		<p class="notification">Все поля обязательны для заполнения!</p>
	</form> 
	</div>
	<br><br><br>
<? 
  } else {	
	$_SESSION['user'] = 1;
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
	<div style="border: 3px solid #0a0;	border-radius: 5px;	background-color:#dfd;	padding: 5px;	width: 1000px; font-size: 85%; text-align: center;">В этом разделе можно редактировать параметры оборудования, очистить таблицу с рейтингом.<br>Будте внимательны при работе с данными. Все изменения вступают в силу сразу же. Восстановление данных невозможно.
	</div>
 <!-- end .admin --></div>
<?

 
  }
?>

  <!-- end .container --></div>
	</body>
</html>