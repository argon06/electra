<?php
// Энергоэффективная нефтедобыча
// (с) Нагорнов С.А. 2011г.


//набор пользовательских функций
//------------------------------------------------------------------------------


//очистка передаваемых переменных
//------------------------------------------------------------------------------
function clear($in){
  $out = str_replace('\'','',$in);
  $out = str_replace('"','',$in);
  $out = str_replace('  ',' ',$in);
  $out = strip_tags($in);
  return $out;
 }
function score() {
		print "
			<table class=\"score\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
				<tr>
					<td>Доступные денежные средства:
					<td>";$cash_format = number_format($cash, 0, ',', ' ');
						print "$cash_format рублей &nbsp
					<td>&nbsp
				<tr>
					<td>Текущее потребление эл/эн в месяц:&nbsp
					<td>";$input_format = number_format($input, 0, ',', ' ');
					print "$input_format кВт.ч
					<td>";if ($input<=614) {
								echo "<img src=\"./images/class/a.png\" title=\"$input\">";
						} elseif ($input>=615 AND $input<=779) {
								echo "<img src=\"./images/class/b.png\" title=\"$input\">";
						} elseif ($input>=780 AND $input<=943) {
								echo "<img src=\"./images/class/c.png\" title=\"$input\">";
						} elseif ($input>=944 AND $input<=1107) {
								echo "<img src=\"./images/class/d.png\" title=\"$input\">";
						} elseif ($input>=1108 AND $input<=1271) {
								echo "<img src=\"./images/class/e.png\" title=\"$input\">";
						} elseif ($input>=1272 AND $input<=1435) {
								echo "<img src=\"./images/class/f.png\" title=\"$input\">";
						} elseif ($input>=1436) {
								echo "<img src=\"./images/class/g.png\" title=\"$input\">";
						}
		print "	<tr>
					<td>Текущий уровень комфорта:
					<td>$comfort ед
					<td>";if ($comfort<=48) {
								echo "<img src=\"./images/stars/star1.png\" title=\"$comfort\">";
						} elseif ($comfort>=49 AND $comfort<=67) {
								echo "<img src=\"./images/stars/star2.png\" title=\"$comfort\">";
						} elseif ($comfort>=68 AND $comfort<=86) {
								echo "<img src=\"./images/stars/star3.png\" title=\"$comfort\">";
						} elseif ($comfort>=87 AND $comfort<=105) {
								echo "<img src=\"./images/stars/star4.png\" title=\"$comfort\">";
						} elseif ($comfort>=106) {
								echo "<img src=\"./images/stars/star5.png\" title=\"$comfort\">";
						}
	print "	</table>"; 
}


//$name = имя для  <div id="$name">, <form name=\"$name\", имя - onclick
//$s_name = имя для $_SESSION
//$r_name = русское имя - Выберите ... , вы уже приобрели...
//$eq_id1 = value
//$eq_id2 = value
//$eq_id3 = value
function equipment ($name, $s_name, $r_name, $eq_id1, $eq_id2, $eq_id3, $user_name) {
print
"<div id=\"$name\">
 <form name=\"$name\" method=\"post\" action=\"\">";
 
	if($_SESSION[$s_name] != 1) {
	print "<p><b>Выберите $r_name:</b></p><Br>
	<p align=\"left\">";
	if ($eq_id1 != 0) {
	print "<input type=\"radio\" name=\"equipment_id\" value=\"$eq_id1\">";
														$result1 = mysql_query("SELECT * FROM hb_equipment WHERE equipment_id = $eq_id1");
														$row1 = mysql_fetch_array($result1);
														$price_format = number_format($row1[price], 0, ',', ' ');
														$power_format = number_format($row1[power], 0, ',', ' ');
														print "<img src='images/equipment/$row1[photo]'> $row1[name]<br><b>Цена:</b>  $price_format рублей <b>Комфорт:</b>  $row1[k_comfort] ед <b>Мощность:</b>  $power_format Вт<br><b>Коэффициент использования:</b> $row1[k_working] ";
														print "<Br>";
														}
	if ($eq_id2 != 0) {
	print "<input type=\"radio\" name=\"equipment_id\" value=\"$eq_id2\">";
														$result1 = mysql_query("SELECT * FROM hb_equipment WHERE equipment_id = $eq_id2");
														$row1 = mysql_fetch_array($result1);
														$price_format = number_format($row1[price], 0, ',', ' ');
														$power_format = number_format($row1[power], 0, ',', ' ');
														print "<img src='images/equipment/$row1[photo]'> $row1[name]<br><b>Цена:</b>  $price_format рублей <b>Комфорт:</b>  $row1[k_comfort] ед <b>Мощность:</b>  $power_format Вт<br><b>Коэффициент использования:</b> $row1[k_working] ";
														print "<Br>";
														}
	if ($eq_id3 != 0) {
	print "<input type=\"radio\" name=\"equipment_id\" value=\"$eq_id3\">";
														$result1 = mysql_query("SELECT * FROM hb_equipment WHERE equipment_id = $eq_id3");
														$row1 = mysql_fetch_array($result1);
														$price_format = number_format($row1[price], 0, ',', ' ');
														$power_format = number_format($row1[power], 0, ',', ' ');
														print "<img src='images/equipment/$row1[photo]'> $row1[name]<br><b>Цена:</b>  $price_format рублей <b>Комфорт:</b>  $row1[k_comfort] ед <b>Мощность:</b>  $power_format Вт<br><b>Коэффициент использования:</b> $row1[k_working] ";
														print "<Br>";
														}
  print "</p>
  <p><input type=\"submit\" value=\"Приобрести!\"></p>
 </form>
 ";}
 else{
 print "<br>$user_name, вы уже приобрели $r_name!<br><br>";
   }
   
print "<button type=\"button\" value=\"Закрыть\" onclick=\"document.getElementById('$name').style.display='none'; return false;\">Закрыть</button>
</div>";
}

//очистка сессий
function killses () {
unset($_SESSION['kitchen_holodilnik']);
unset($_SESSION['kitchen_chainik']);
unset($_SESSION['kitchen_panel']);
unset($_SESSION['kitchen_vityajka']);
unset($_SESSION['kitchen_shkaff']);
unset($_SESSION['kitchen_pech']);
unset($_SESSION['kitchen_svet']);
unset($_SESSION['kitchen_tochsvet']);
unset($_SESSION['kitchen_floor']);
unset($_SESSION['bathroom_dush']);
unset($_SESSION['bathroom_stiralka']);
unset($_SESSION['bathroom_svet']);
unset($_SESSION['bathroom_tochsvet']);
unset($_SESSION['bathroom_floor']);
unset($_SESSION['zal_tv']);
unset($_SESSION['zal_comp']);
unset($_SESSION['zal_pilesos']);
unset($_SESSION['zal_utug']);
unset($_SESSION['zal_condition']);
unset($_SESSION['zal_svet']);
unset($_SESSION['zal_tochsvet']);
unset($_SESSION['zal_floor']);
unset($_SESSION['user_name']);
unset($_SESSION['user_surname']);
unset($_SESSION['user_patronymic']);
unset($_SESSION['cash']);
unset($_SESSION['comfort']);
unset($_SESSION['input']);
unset($_SESSION['user']);
session_destroy();
}

// функция вывода кнопок в игре
function buttons () {
print "
<table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
	<tr align=\"center\">
		<td>
			<div style=\"width: 200px; margin: 10px auto;\">
				<a class=\"button\" href=\"zal.php\">
					<span>Зал</span>
				</a>
			</div>
		<td>
			<div style=\"width: 200px; margin: 10px auto;\">
				<a class=\"button\" href=\"kitchen.php\">
					<span>Кухня</span>
				</a>
			</div>
		<td>
			<div style=\"width: 200px; margin: 10px auto;\">
				<a class=\"button\" href=\"bathroom.php\">
					<span>Санузел</span>
				</a>
			</div>
	<tr>
		<td colspan=\"3\" align=\"center\">
			<div style=\"width: 200px; margin: 10px auto;\">
				<a class=\"buttonred\" href=\"result.php\">
					<span>Завершить игру</span>
				</a>
			</div>
</table>";
}

//рисует класс энергоэффективности в зависимости от $input
function energo ($input) {
	$result2 = mysql_query("SELECT * FROM energy");
	$row2 = mysql_fetch_array($result2);
	do {
		if ($input>=$row2['min_level'] AND $input<=$row2['max_level']) {
			echo "<img src=\"./images/class/$row2[en_lvl].png\" title=\"$input\">";
		}
	}
	while ($row2 = mysql_fetch_array($result2)); 
}

//рисует звездочки в зависимости от $comfort
function comfort ($comfort) {
	$result3 = mysql_query("SELECT * FROM comfort");
	$row3 = mysql_fetch_array($result3);
	do {
		if ($comfort>=$row3['min_level'] AND $comfort<=$row3['max_level']) {
			echo "<img src=\"./images/stars/$row3[stars].png\" title=\"$comfort\">";
		}
	}
	while ($row3 = mysql_fetch_array($result3)); 
}
?>