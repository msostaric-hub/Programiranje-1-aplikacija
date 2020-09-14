<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id == 0){
	echo "<h3>Savezi <small>(<a href='savezi_formular.php'>dodaj novi</a>)</small></h3>";
	$query = $db->query("SELECT * FROM savezi");
}else{
	$query = $db->query("SELECT * FROM savezi WHERE id_saveza = " . $id);
	$rezultati = $query->fetchAll();
    echo "<h1>" . $rezultati[0]["ime"] . "</h1>";
    $query = $db->query("SELECT * FROM savezi WHERE vladar = " . $id);
	
}

$rezultati = $query->fetchAll();

foreach($rezultati as $savez){
	echo "<div class=\"row\" style=\"margin-top:26px\">";
		echo "<div class=\"medium-3 large-3 columns\">";
		echo "</div>";
		echo "<div class=\"medium-6 large-6 columns\">";
			echo "<strong>" . $savez["ime"] . "</strong></br>";

			$query = $db->query("SELECT * FROM vladari WHERE savez = " . $savez["id_saveza"]);
			$vladari = $query->fetchAll();
			foreach($vladari as $vladar){
				echo "<p>Vladar: ";
				echo $vladar["ime"] . " " . $vladar["prezime"] . "<br>" . "<br>";
			}
	
			echo "<a href='savezi_formular.php?id=" . $savez["id_saveza"] . "'>uredi</a><br><a href='savezi_brisanje.php?id=" . $savez["id_saveza"] . "'>pobriši</a>";

		echo "</div>";
		echo "<div class=\"medium-3 large-3 columns\">";
		
        echo "<img src='slike/" . $savez["foto"] . "'>";
		echo "</div>";

	echo "</div>";
}

?>