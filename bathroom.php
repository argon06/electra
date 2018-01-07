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
if(($_POST['equipment_id']==34) OR ($_POST['equipment_id']==35) OR ($_POST['equipment_id']==36)) {
$_SESSION['bathroom_dush'] = 1;}
if(($_POST['equipment_id']==28) OR ($_POST['equipment_id']==29) OR ($_POST['equipment_id']==30)) {
$_SESSION['bathroom_stiralka'] = 1;}
if(($_POST['equipment_id']==50) OR ($_POST['equipment_id']==51) OR ($_POST['equipment_id']==52)) {
$_SESSION['bathroom_svet'] = 1;}
if(($_POST['equipment_id']==59) OR ($_POST['equipment_id']==60) OR ($_POST['equipment_id']==61)) {
$_SESSION['bathroom_tochsvet'] = 1;}
if(($_POST['equipment_id']==63)) {
$_SESSION['bathroom_floor'] = 1;}

?>
<table class="equipment">
	<tr bgcolor="#169b63">
		<td align="center" colspan="2"><div style="color:#fff;"><strong>Доступное оборудование</strong></div>
	<tr><?if($_SESSION['bathroom_stiralka'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/bathroom/1.png\">
		<td>Стиральная машина";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/bathroom/1.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Стиральная машина</del>";}?>
	<tr><?if($_SESSION['bathroom_dush'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/bathroom/2.png\">
		<td>Душевая кабина";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/bathroom/2.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Душевая кабина</del>";}?>
	<tr><?if($_SESSION['bathroom_svet'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/bathroom/3.png\">
		<td>Основное освещение";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/bathroom/3.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Основное освещение</del>";}?>
	<tr><?if($_SESSION['bathroom_floor'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/bathroom/4.png\">
		<td>Теплый пол";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/bathroom/4.png\">
		<td><div style=\"color: #a1a1a1;\"><del>Теплый пол</del>";}?>
	<tr><?if($_SESSION['bathroom_tochsvet'] != 1){print "
		<td width=\"48px\"><img src=\"./images/equipment/bathroom/3.png\">
		<td>Дополнительное освещение";
		}else{print "
		<td width=\"48px\"><img style=\"opacity: 0.5;\" src=\"./images/equipment/bathroom/3.png\">
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
		if(($_POST['equipment_id']==34) OR ($_POST['equipment_id']==35) OR ($_POST['equipment_id']==36)) {
		$_SESSION['bathroom_dush'] = 1;}
		if(($_POST['equipment_id']==28) OR ($_POST['equipment_id']==29) OR ($_POST['equipment_id']==30)) {
		$_SESSION['bathroom_stiralka'] = 1;}
		if(($_POST['equipment_id']==50) OR ($_POST['equipment_id']==51) OR ($_POST['equipment_id']==52)) {
		$_SESSION['bathroom_svet'] = 1;}
		if(($_POST['equipment_id']==59) OR ($_POST['equipment_id']==60) OR ($_POST['equipment_id']==61)) {
		$_SESSION['bathroom_tochsvet'] = 1;}
		if(($_POST['equipment_id']==63)) {
		$_SESSION['bathroom_floor'] = 1;}
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
	<img id="room" src="images/bathroom.jpg" alt="" usemap="#Navigation" />
	<p>
		<map id="Navigation" name="Navigation">
			<area shape="poly" coords="219,209,317,201,342,201,368,203,394,209,420,216,425,528,376,548,360,551,328,553,303,551,302,422,305,418,300,390,221,384" href="#"  onclick="document.getElementById('dush').style.display='block'; return false;" title="Душевая кабина" />
			<area shape="poly" coords="136,393,218,385,301,390,305,418,301,424,300,553,225,584,171,574,171,432,135,427" href="#"  onclick="document.getElementById('stiralka').style.display='block'; return false;" title="Стиральная машина" />
			<area shape="poly" coords="296,69,399,45,456,79,458,91,362,108,295,80" href="#"  onclick="document.getElementById('svet').style.display='block'; return false;" title="Основное освещение" />
			<area shape="poly" coords="5,133,143,168,130,178,3,150" href="#"  onclick="document.getElementById('tochsvet').style.display='block'; return false;" title="Дополнительное освещение" />
			<area shape="poly" coords="55,630,171,585,224,589,300,558,360,557,425,530,645,557,645,633" href="#"  onclick="document.getElementById('floor').style.display='block'; return false;" title="Теплый пол" />
		</map>
   </p>
</div>

<?
equipment ("dush", "bathroom_dush", "душевую кабину", "34", "35", "36", $user_name);
equipment ("stiralka", "bathroom_stiralka", "стиральную машину", "28", "29", "30", $user_name);
equipment ("tochsvet", "bathroom_tochsvet", "дополнительное освещение", "59", "60", "61", $user_name);
equipment ("svet", "bathroom_svet", "основное освещение", "50", "51", "52", $user_name);
equipment ("floor", "bathroom_floor", "теплый пол", "63", "0", "0", $user_name);
buttons ();
include 'includes/foot.php';
?>