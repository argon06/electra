<?
include 'includes/setting.php';
include 'includes/head.php';
include 'includes/menu.php';
include 'includes/function.php';
killses ();
?>

    <!-- end .sidebar1 -->
</div>
<div class="content">
<h3 class="title" align="center">Рейтинг игроков</h3>
<table align="center" border="0" cellspacing="2" cellpadding="4" class="rating">
	<tr class="caption">
		<td> <strong>Фамилия,<br> имя</strong>
		<td> <strong>Дата</strong>	
		<td> <strong>Использовано<br> средств</strong>
		<td> <strong>Класс<br>энергоэффективности</strong>
		<td> <strong>Комфорт</strong>
		<td> <strong>Итоговый<br> балл</strong>
		<td bgcolor="white"> 
	</tr>
<?
$result1 = mysql_query("SELECT * FROM games");
$row1 = mysql_fetch_array($result1);
if ($row1[game_id] != '') {

$result = mysql_query("SELECT * FROM games ORDER BY k DESC");
$row = mysql_fetch_array($result);
do {
	print "<tr> 
			<td align=\"left\"> $row[user_surname]<br> $row[user_name]
			<td> $row[date]";
			$cash= 200000 - $row[cash];
			$cash_format = number_format($cash, 0, ',', ' ');
			$input = $row[input];
			$comfort = $row[comfort];
	print "<td>$cash_format
			<td>";energo ($input); 
	print "<td>";comfort ($comfort);
			$k = round($row[k],0);
	print "<td> <span style=\"font-size:150%; color:red;\">$k</span>
		   <td> 
				<form method=\"POST\" action=\"certificate.php\" target=\"_blanck\">
					<input type=\"hidden\" name=\"game_id\" value=\"$row[game_id]\">
					<input type=\"submit\" value=\"Сертификат\">
				</form>
		</tr>";
}
while ($row = mysql_fetch_array($result));
}
?>
</table>
<br>
<br>
<br>
<br>
<img src="images/rating2.jpg" style="float:right;"/> 



<?
include 'includes/foot.php';
?>