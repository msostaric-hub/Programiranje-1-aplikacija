<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$query = $db->query("SELECT * FROM savezi");
$rezultati = $query->fetchAll();
?>
<table>
	<tr>
	<th>Popis Saveza:</th>
	<th></th>
	<tr>
<?php

foreach($rezultati as $stavka){
	echo "<tr>
			<td><a href='savezi.php?id=" . $stavka["id_saveza"] . "'>" .  $stavka['ime'] . "</a></td>
		  	<td>";
	


	echo "</td>
		  </tr>";
}
?>
</table>
