<?
include 'includes/setting.php';
include 'includes/head.php';
include 'includes/menu.php';
include 'includes/function.php';
//ФИО
$user_name = $_SESSION['user_name'];
$user_surname = $_SESSION['user_surname'];
$user_patronymic = $_SESSION['user_patronymic']; 


//проверка на купленное оборудование что бы вычеркивать из списка
if(($_POST['equipment_id']==1) OR ($_POST['equipment_id']==2) OR ($_POST['equipment_id']==3)) {
$_SESSION['zal_tv'] = 1;}
if(($_POST['equipment_id']==7) OR ($_POST['equipment_id']==8) OR ($_POST['equipment_id']==9)) {
$_SESSION['zal_comp'] = 1;}
if(($_POST['equipment_id']==10) OR ($_POST['equipment_id']==11) OR ($_POST['equipment_id']==12)) {
$_SESSION['zal_pilesos'] = 1;}
if(($_POST['equipment_id']==13) OR ($_POST['equipment_id']==14) OR ($_POST['equipment_id']==15)) {
$_SESSION['zal_utug'] = 1;}
if(($_POST['equipment_id']==37) OR ($_POST['equipment_id']==38) OR ($_POST['equipment_id']==39)) {
$_SESSION['zal_condition'] = 1;}
if(($_POST['equipment_id']==16) OR ($_POST['equipment_id']==17) OR ($_POST['equipment_id']==18)) {
$_SESSION['zal_svet'] = 1;}
if(($_POST['equipment_id']==53) OR ($_POST['equipment_id']==54) OR ($_POST['equipment_id']==55)) {
$_SESSION['zal_tochsvet'] = 1;}
if(($_POST['equipment_id']==40)) {
$_SESSION['zal_floor'] = 1;}
?>

<table class="equipment">
	<tr bgcolor="#169b63" >
		<td align="center" colspan="2"><div style="color:#fff;"><strong>Доступное оборудование</strong></div>
	<tr><?if($_SESSION['zal_tv'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/zal/1.png\">
		<td>Телевизор";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/zal/1.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Телевизор</del>";}?>
	<tr><?if($_SESSION['zal_comp'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/zal/2.png\">
		<td>Компьютер";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/zal/2.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Компьютер</del>";}?>
	<tr><?if($_SESSION['zal_pilesos'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/zal/3.png\">
		<td>Пылесос";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/zal/3.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Пылесос</del>";}?>
	<tr><?if($_SESSION['zal_svet'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/zal/5.png\">
		<td>Основное освещение";}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/zal/5.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Основное освещение</del>";}?>
	<tr><?if($_SESSION['zal_floor'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/zal/7.png\">
		<td>Теплый пол";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/zal/7.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Теплый пол</del>";}?>
	<tr><?if($_SESSION['zal_condition'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/zal/6.png\">
		<td>Кондиционер";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/zal/6.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Кондиционер</del>";}?>
	<tr><?if($_SESSION['zal_utug'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/zal/4.png\">
		<td>Утюг";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/zal/4.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Утюг</del>";}?>
	<tr><?if($_SESSION['zal_tochsvet'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/zal/5.png\">
		<td>Дополнительное освещение";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/zal/5.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Дополнительное освещение</del>";}?>
</table>

<!-- end .sidebar1 -->
</div>
<div class="content">
<?
//Set default values for cash, power and comfort
if(!isset($_SESSION['cash']) OR ($_SESSION['cash']=='')){
	$_SESSION['cash'] = 200000;
	$_SESSION['power'] = 0;
	$_SESSION['comfort'] = 0;
	$_SESSION['input'] = 0;
} else {
		$cash = $_SESSION['cash'];
		$power = $_SESSION['power'];
		$comfort = $_SESSION['comfort'];
		$input = $_SESSION['input'];
}

//output the selected equipment
if(isset($_POST['equipment_id']) and ($_POST['equipment_id']!='')){
		//еще одна проверка на купленное оборудование
		if(($_POST['equipment_id']==1) OR ($_POST['equipment_id']==2) OR ($_POST['equipment_id']==3)) {
		$_SESSION['zal_tv'] = 1;}
		if(($_POST['equipment_id']==7) OR ($_POST['equipment_id']==8) OR ($_POST['equipment_id']==9)) {
		$_SESSION['zal_comp'] = 1;}
		if(($_POST['equipment_id']==10) OR ($_POST['equipment_id']==11) OR ($_POST['equipment_id']==12)) {
		$_SESSION['zal_pilesos'] = 1;}
		if(($_POST['equipment_id']==13) OR ($_POST['equipment_id']==14) OR ($_POST['equipment_id']==15)) {
		$_SESSION['zal_utug'] = 1;}
		if(($_POST['equipment_id']==37) OR ($_POST['equipment_id']==38) OR ($_POST['equipment_id']==39)) {
		$_SESSION['zal_condition'] = 1;}
		if(($_POST['equipment_id']==16) OR ($_POST['equipment_id']==17) OR ($_POST['equipment_id']==18)) {
		$_SESSION['zal_svet'] = 1;}
		if(($_POST['equipment_id']==53) OR ($_POST['equipment_id']==54) OR ($_POST['equipment_id']==55)) {
		$_SESSION['zal_tochsvet'] = 1;}
		if(($_POST['equipment_id']==40)) {
		$_SESSION['zal_floor'] = 1;}
		$equipment_id = $_POST['equipment_id'];
		$result = mysql_query("SELECT * FROM hb_equipment WHERE equipment_id = '$equipment_id'");
		$row = mysql_fetch_array($result);
		//accumulate values
		if(($_SESSION['cash']	= $_SESSION['cash'] - $row['price']) > 0) {
		$_SESSION['power']	= $_SESSION['power'] + $row['power'];
		$_SESSION['comfort']= $_SESSION['comfort'] + $row['k_comfort']; 
		$_SESSION['input']  = $_SESSION['input'] + $row['input'];
		$cash = $_SESSION['cash'];
		$power = $_SESSION['power'];
		$comfort = $_SESSION['comfort'];
		$input = $_SESSION['input'];
		}
		else {
		$_SESSION['cash']	= $_SESSION['cash'] + $row['price'];
		$cash = $_SESSION['cash'];
		$power = $_SESSION['power'];
		$comfort = $_SESSION['comfort'];
		$input = $_SESSION['input'];
		print "<p class=\"notification\">У вас недостаточно денег</p>";
		}
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
					<td>";energo ($input);
		print "	<tr>
					<td>Текущий уровень комфорта:
					<td>$comfort ед
					<td>";comfort ($comfort);
	print "	</table>"; 
		}
	else {
		print "
			<table class=\"score\" cellspacing=\"0\" cellpadding=\"0\">
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

?>

<div class="room">
 <img src="images/zal.jpg" alt="Навигация по сайту" usemap="#Navigation" />
   <p><map id="Navigation" name="Navigation">
    <area shape="poly" coords="83,241,213,242,215,321,123,329,124,314,116,312,115,268" href="#" onmouseover="this.src='./images/tv.png'" onclick="document.getElementById('tv').style.display='block'; return false;" title="Телевизор" />
    <area shape="poly" coords="48,275,80,269,115,269,116,308,83,310,47,302" href="#"  onclick="document.getElementById('comp').style.display='block'; return false;" title="Компьютер" />
    <area shape="poly" coords="309,382,309,356,271,351,263,310,249,289,217,301,214,325,244,375" href="#"  onclick="document.getElementById('pilesos').style.display='block'; return false;" title="Пылесос" />
    <area shape="poly" coords="515,282,542,285,544,303,516,302" href="#"  onclick="document.getElementById('utug').style.display='block'; return false;" title="Утюг" />
    <area shape="poly" coords="491,152,584,152,583,182,493,182" href="#"  onclick="document.getElementById('condition').style.display='block'; return false;" title="Кондиционер" />
    <area shape="poly" coords="361,99,376,99,376,130,410,129,412,145,318,147,315,130,355,128" href="#"  onclick="document.getElementById('svet').style.display='block'; return false;" title="Основное освещение" />
    <area shape="poly" coords="71,443,93,429,157,431,164,420,131,389,305,391,313,378,430,378,475,424,570,421,599,445" href="#"  onclick="document.getElementById('floor').style.display='block'; return false;" title="Теплый пол" />
	<area shape="poly" coords="431,251,460,252,471,296,452,378,428,297,436,252" href="#"  onclick="document.getElementById('tochsvet').style.display='block'; return false;" title="Дополнительное освещение" />
   </map></p>
</div>


<?
equipment ("tv", "zal_tv", "телевизор", "1", "2", "3", $user_name);
equipment ("comp", "zal_comp", "компьютер", "7", "8", "9", $user_name);
equipment ("pilesos", "zal_pilesos", "пылесос", "10", "11", "12", $user_name);
equipment ("utug", "zal_utug", "утюг", "13", "14", "15", $user_name);
equipment ("condition", "zal_condition", "кондиционер", "37", "38", "39", $user_name);
equipment ("tochsvet", "zal_tochsvet", "дополнительное освещение", "53", "54", "55", $user_name);
equipment ("svet", "zal_svet", "основное освещение", "16", "17", "18", $user_name);
equipment ("floor", "zal_floor", "теплый пол", "40", "0", "0", $user_name);
buttons ();
include 'includes/foot.php';
?>