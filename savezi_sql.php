<?php
include("session.php");
include("pdo.php");

if($_POST["submit"] == "Odustani"){
	header("Location:popis_saveza.php");
}

if($_FILES["foto"]["name"]){

    $putanja = "slike/"; 
	move_uploaded_file($_FILES["foto"]["tmp_name"], $putanja . $_FILES["foto"]["name"]);

    $uploadana_slika = $_FILES["foto"]["name"];

}else{

    $uploadana_slika = $_POST["foto"];
}

if($_POST["id_saveza"] > 0 && $_POST["submit"] == "Dodaj/Uredi" ){
	$upit = $db->query("UPDATE savezi SET 
		ime = '" . $_POST["ime"] . "',
		vladar = '" . $_POST["vladar"] . "',
		foto = '" . $uploadana_slika . "'
		WHERE
		id_saveza = " . $_POST["id_saveza"] . "

		");
    header("Location:popis_saveza.php");
    
}elseif($_POST["id_saveza"] > 0 && $_POST["submit"] == "Potvrdi" ){
	$upit = $db->query("DELETE FROM savezi WHERE id_saveza = " . $_POST["id_saveza"]);
    header("Location:popis_saveza.php");
    
}elseif($_POST["id_saveza"] == 0){
	$upit = $db->query("INSERT INTO savezi 
		(ime, vladar, foto)VALUES
		('" . $_POST["ime"] . "',
		'" . $_POST["vladar"] . "',
		'" . $uploadana_slika . "')
		");
	header("Location:popis_saveza.php");
}

?>