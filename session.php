<?php
//session_start je potrebno pozvati na početku svake skripte koja treba korisitti session varijable. U ovom primjeru radi se include session.php skripte 
session_start();


$ime_i_prezime = isset($_SESSION["ime_i_prezime"]) ? $_SESSION["ime_i_prezime"] : "";


if(!isset($_SESSION["korisnik"])){
	//ukoliko ne postoji $_SESSION["korisnik"] znači na korisnik nije ulogiran. $_SESSION["korisnik"] varijablu podesimo prilikom logiranja i ona traje koliko traje session
	header("Location:login.php");
}
?>