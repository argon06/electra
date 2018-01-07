<?
include 'includes/setting.php';
include 'includes/head.php';
include 'includes/menu.php';
include 'includes/function.php';

//расчет $max_input
$resul = mysql_query ("SELECT SUM(input) FROM hb_equipment");
$myrows = mysql_fetch_row($resul); 

//эталонные значения
$max_cash = 0;
$min_comfort = 48;
$max_input = $myrows[0]; //рассчитывается из базы
$max_costs = $max_input * 2;
$max_energy_consumption_comfort = $max_input/$min_comfort; //Энергозатратность комфорта (количество электроэнергии затраченной на получение единицы комфорта)
$max_profitability = ((200000-$max_cash)/$min_comfort); //Эффективность затрат (количество средств затраченных на получение единицы комфорта)



?>
    <!-- end .sidebar1 -->
</div>
<div class="content">
<?
if(!isset($_SESSION['cash']) AND($_SESSION['cash']=='')) {
print "<p>Сначала нужно пройти тренинг! Выберите <b>Начать тренинг</b> в левом меню, пожалуйста.</p>";
}	
else {	
$cash            			= $_SESSION['cash'];
$power           			= $_SESSION['power'];
$comfort         			= $_SESSION['comfort'];
$input   		 			= $_SESSION['input'];
$user_name       			= $_SESSION['user_name'];
$user_surname    			= $_SESSION['user_surname'];
$user_patronymic			= $_SESSION['user_patronymic'];
$costs 			  			= $input * 2;
$energy_consumption_comfort = $input/$comfort;
$profitability 				= ((200000-$cash)/$comfort);
$k							= round((((1-($energy_consumption_comfort/$max_energy_consumption_comfort))*70)+ ((1-($profitability/$max_profitability))*30)),0);
$_SESSION['k']              = $k;
if($k > 0) {
	if ($input < 1107 AND $comfort > 49) {
		$result = mysql_query ("INSERT INTO games (cash, power, comfort, input, user_name, user_surname, user_patronymic, k, date) VALUES ('$cash', '$power', '$comfort', '$input', '$user_name', '$user_surname', '$user_patronymic', '$k', NOW())");
		if ($result == 'true'){
			print "<p>Ваш результат учтен!</p>";
			} else {
print "<p class=\"notification\">Ой! Что-то пошло не так... Попробуйте заново!</p>";}
}else {print "<p class=\"notification\">Вы не выполнили условие игры. Ваш результат не будет учитывается в рейтинге</p>";}
?>

	<h3 class="title"><?print "$user_name $user_patronymic,";?> поздравляем с окончанием тренинга! Ваш результат:</h3>
	<ul>
		<li>Класс энергоэффективности:<?energo ($input);?> 
		</li>
		<li>Уровень комфорта:<?comfort ($comfort);?> 
		</li>
		<li>Итоговый балл: <span style="font-size:150%; color:red;"><strong><?print "$k";?></strong></span> ед</li>
	</ul>
<?
											?>


	
	<div style="width: 250px; margin: 20px auto;">
		<a class="button" href="rating.php" target="_self">
			<span>Рейтинг игроков</span>
		</a>
	</div>

	<img src="images/certificate.png" style="float:right;"/> 
<?
}
else {
print "<div style=\"font-size:120%; color:red; margin:10px; text-align:center;\">Вы не установили никакого оборудования, ваш результат не учитывается.</div>";
}



}
include 'includes/foot.php';
?>