<?session_start();
if (isset($_SESSION['user_name'])) {
session_destroy();
}
include 'includes/setting.php';
include 'includes/head.php';
include 'includes/menu.php';
include 'includes/function.php';
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- end .sidebar1 -->
</div>
<div class="content">
<?
//checking name, surname, patronymic
	if(!isset($_POST['user_surname']) OR ($_POST['user_surname']=='') OR !isset($_POST['user_name']) OR ($_POST['user_name']=='') OR !isset($_POST['user_patronymic']) OR ($_POST['user_patronymic']=='')){
?><br><br><br>
	<div class="intro">
	<h3 class="title">Давайте познакомимся!</h3>
	<br>
	<form name="introduce" method="POST">
		<b>Введите Вашу фамилию:</b>
		<br>
		<input name="user_surname" type="text" size="35">
		<br>
		<b>Введите Ваше имя:</b>
		<br>
		<input name="user_name" type="text" size="35">
		<br>
		<b>Введите Ваше отчество:</b>
		<br>
		<input name="user_patronymic" type="text" size="35">
		<br><br>
		<input type="submit" value="Познакомиться!">
		<p class="notification">Все поля обязательны для заполнения!</p>
	</form> 
	</div>
<? 
  //иначе выводим ФИО и предлагаем выбрать комнату
  } else {
  $user_name = clear($_POST['user_name']);
  $user_surname = clear($_POST['user_surname']);
  $user_patronymic = clear($_POST['user_patronymic']);
  $_SESSION['user_name'] = $user_name;
  $_SESSION['user_surname'] = $user_surname;
  $_SESSION['user_patronymic'] = $user_patronymic;
  ?>
  <p>Приветствую Вас, <?print "$user_name $user_patronymic!";?> </p>
  <p>Коротко о правилах:</p>
  <ul>
  <li>Пользователю необходимо обустроить квартиру набором бытовой техники в пределах установленного лимита затрат (200 000 рублей) с целью достижения определенного уровня комфорта <img src="./images/stars/star5.png" title="две звезды"> и уровня энергоэффективности <img src="./images/class/a.png" title="Класс D">;
  <li>При выборе электроприборов необходимо учитывать их уровень комфорта, потребление электроэнергии и время использования (коэффициент использования);
  <li>Комнаты можно заполнять в любом порядке;
  <li>Установленные электроприборы замене не подлежат;
  <li>Проходить игру можно неограниченное количество раз;
  <li>При подведении итогов игры учитываются достигнутые уровни энергопотребления, комфорта и оставшиеся денежные средства, на основе этих данных выставляется итоговый балл.
  </ul>
  <?
  
  if(!isset($_SESSION['cash']) OR ($_SESSION['cash']=='')){
	$_SESSION['cash'] = 200000;
	$_SESSION['power'] = 0;
	$_SESSION['comfort'] = 0;
} else {
	$cash = $_SESSION['cash'];
	$power = $_SESSION['power'];
	$comfort = $_SESSION['comfort'];
}
?>
<h3 class="title">Начнем игру!</h3>
<!--Начало блока кнопок -->
<table align="center">
<tr align="center">
<td>
<div style="width: 200px; margin: 20px auto;">
<a class="button" href="zal.php">
			<span>Зал</span>
		</a>
</div>
<td>
<div style="width: 200px; margin: 20px auto;">
<a class="button" href="kitchen.php">
			<span>Кухня</span>
		</a>
</div>
<td>
<div style="width: 200px; margin: 20px auto;">
<a class="button" href="bathroom.php">
			<span>Санузел</span>
		</a>
</div>
</table>
<!--Конец блока кнопок -->

<?

  }
include 'includes/foot.php';
?>