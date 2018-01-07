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
if(($_POST['equipment_id']==25) OR ($_POST['equipment_id']==26) OR ($_POST['equipment_id']==27)) {
$_SESSION['kitchen_holodilnik'] = 1;}
if(($_POST['equipment_id']==31) OR ($_POST['equipment_id']==32) OR ($_POST['equipment_id']==33)) {
$_SESSION['kitchen_chainik'] = 1;}
if(($_POST['equipment_id']==19) OR ($_POST['equipment_id']==20) OR ($_POST['equipment_id']==21)) {
$_SESSION['kitchen_panel'] = 1;}
if(($_POST['equipment_id']==44) OR ($_POST['equipment_id']==45) OR ($_POST['equipment_id']==46)) {
$_SESSION['kitchen_vityajka'] = 1;}
if(($_POST['equipment_id']==22) OR ($_POST['equipment_id']==23) OR ($_POST['equipment_id']==24)) {
$_SESSION['kitchen_shkaff'] = 1;}
if(($_POST['equipment_id']==41) OR ($_POST['equipment_id']==42) OR ($_POST['equipment_id']==43)) {
$_SESSION['kitchen_pech'] = 1;}
if(($_POST['equipment_id']==47) OR ($_POST['equipment_id']==48) OR ($_POST['equipment_id']==49)) {
$_SESSION['kitchen_svet'] = 1;}
if(($_POST['equipment_id']==56) OR ($_POST['equipment_id']==57) OR ($_POST['equipment_id']==58)) {
$_SESSION['kitchen_tochsvet'] = 1;}
if(($_POST['equipment_id']==62)) {
$_SESSION['kitchen_floor'] = 1;}
?>
<table class="equipment">
	<tr bgcolor="#169b63">
		<td align="center" colspan="2"><div style="color:#fff;"><strong>Доступное оборудование</strong></div>
	<tr><?if($_SESSION['kitchen_holodilnik'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/kitchen/1.png\">
		<td>Холодильник";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/kitchen/1.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Холодильник</del>";}?>
	<tr><?if($_SESSION['kitchen_chainik'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/kitchen/2.png\">
		<td>Чайник";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/kitchen/2.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Чайник</del>";}?>
	<tr><?if($_SESSION['kitchen_panel'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/kitchen/3.png\">
		<td>Варочная панель";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/kitchen/3.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Варочная панель</del>";}?>
	<tr><?if($_SESSION['kitchen_svet'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/kitchen/5.png\">
		<td>Основное освещение";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/kitchen/5.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Основное освещение</del>";}?>
	<tr><?if($_SESSION['kitchen_floor'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/kitchen/7.png\">
		<td>Теплый пол";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/kitchen/7.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Теплый пол</del>";}?>
	<tr><?if($_SESSION['kitchen_vityajka'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/kitchen/6.png\">
		<td>Вытяжка";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/kitchen/6.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Вытяжка</del>";}?>
	<tr><?if($_SESSION['kitchen_shkaff'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/kitchen/4.png\">
		<td>Духовой шкаф";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/kitchen/4.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Духовой шкаф</del>";}?>
	<tr><?if($_SESSION['kitchen_pech'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/kitchen/8.png\">
		<td>Микроволновая печь";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/kitchen/8.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Микроволновая печь</del>";}?>
	<tr><?if($_SESSION['kitchen_tochsvet'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/kitchen/5.png\">
		<td>Дополнительное освещение";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/kitchen/5.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Дополнительное освещение</del>";}?>
</table>
    <!-- end .sidebar1 --></div>
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
		if(($_POST['equipment_id']==25) OR ($_POST['equipment_id']==26) OR ($_POST['equipment_id']==27)) {
		$_SESSION['kitchen_holodilnik'] = 1;}
		if(($_POST['equipment_id']==31) OR ($_POST['equipment_id']==32) OR ($_POST['equipment_id']==33)) {
		$_SESSION['kitchen_chainik'] = 1;}
		if(($_POST['equipment_id']==19) OR ($_POST['equipment_id']==20) OR ($_POST['equipment_id']==21)) {
		$_SESSION['kitchen_panel'] = 1;}
		if(($_POST['equipment_id']==44) OR ($_POST['equipment_id']==45) OR ($_POST['equipment_id']==46)) {
		$_SESSION['kitchen_vityajka'] = 1;}
		if(($_POST['equipment_id']==22) OR ($_POST['equipment_id']==23) OR ($_POST['equipment_id']==24)) {
		$_SESSION['kitchen_shkaff'] = 1;}
		if(($_POST['equipment_id']==41) OR ($_POST['equipment_id']==42) OR ($_POST['equipment_id']==43)) {
		$_SESSION['kitchen_pech'] = 1;}
		if(($_POST['equipment_id']==47) OR ($_POST['equipment_id']==48) OR ($_POST['equipment_id']==49)) {
		$_SESSION['kitchen_svet'] = 1;}
		if(($_POST['equipment_id']==56) OR ($_POST['equipment_id']==57) OR ($_POST['equipment_id']==58)) {
		$_SESSION['kitchen_tochsvet'] = 1;}
		if(($_POST['equipment_id']==62)) {
		$_SESSION['kitchen_floor'] = 1;}
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


?>
<div class="room">
	<img src="images/kitchen.jpg" alt="Кухня" usemap="#Navigation" />
	<p>
		<map id="Navigation" name="Navigation">
			<area shape="poly" coords="1,134,64,134,127,132,177,145,190,571,96,635,19,616" href="#" onclick="document.getElementById('holodilnik').style.display='block'; return false;" title="Холодильник" />
			<area shape="poly" coords="204,379,243,367,255,374,270,376,280,369,280,361,325,365,275,387" href="#"  onclick="document.getElementById('panel').style.display='block'; return false;" title="Варочная панель" />
			<area shape="poly" coords="286,397,325,380,325,505,288,530," href="#"  onclick="document.getElementById('shkaff').style.display='block'; return false;" title="Духовой шкаф" />
			<area shape="poly" coords="248,372,265,375,279,371,279,349,270,341,269,326,258,325,259,340,250,351" href="#"  onclick="document.getElementById('chainik').style.display='block'; return false;" title="Чайник" />
			<area shape="poly" coords="432,120,499,119,489,71,442,70" href="#"  onclick="document.getElementById('svet').style.display='block'; return false;" title="Основное освещение" />    
			<area shape="poly" coords="163,75,211,62,386,98,388,112,321,115,165,77" href="#"  onclick="document.getElementById('tochsvet').style.display='block'; return false;" title="Дополнительное освещение" />
			<area shape="poly" coords="232,91,256,100,257,143,324,183,235,183" href="#"  onclick="document.getElementById('vityajka').style.display='block'; return false;" title="Вытяжка" />
			<area shape="poly" coords="414,308,427,304,485,307,484,351,473,359,412,353" href="#"  onclick="document.getElementById('pech').style.display='block'; return false;" title="Микроволновая печь" />
			<area shape="poly" coords="103,633,191,572,212,578,281,530,287,533,326,502,350,482,374,484,437,500,437,632" href="#"  onclick="document.getElementById('floor').style.display='block'; return false;" title="Теплый пол" />
		</map>
	</p>
</div>

<?
equipment ("holodilnik", "kitchen_holodilnik", "холодильник", "25", "26", "27", $user_name);
equipment ("panel", "kitchen_panel", "варочную панель", "19", "20", "21", $user_name);
equipment ("shkaff", "kitchen_shkaff", "духовой шкаф", "22", "23", "24", $user_name);
equipment ("chainik", "kitchen_chainik", "чайник", "31", "32", "33", $user_name);
equipment ("tochsvet", "kitchen_tochsvet", "дополнительное освещение", "56", "57", "58", $user_name);
equipment ("svet", "kitchen_svet", "основное освещение", "47", "48", "49", $user_name);
equipment ("vityajka", "kitchen_vityajka", "вытяжку", "44", "45", "46", $user_name);
equipment ("pech", "kitchen_pech", "микроволновую печь", "41", "42", "43", $user_name);
equipment ("floor", "kitchen_floor", "теплый пол", "62", "0", "0", $user_name);
buttons ();
include 'includes/foot.php';
?>