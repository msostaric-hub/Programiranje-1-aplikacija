<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id != 0){
   	$upit = $db->query("DELETE FROM savezi WHERE id_saveza = " . $id);
	header("Location:savezi.php");

	$rezultati = $query->fetchAll();
    $id_saveza = $rezultati[0]["id_saveza"];
    $ime = $rezultati[0]["ime"];
    $vladar = $rezultati[0]["vladar"];
    $foto = $rezultati[0]["foto"];
}else{
    $id_saveza = 0;
    $ime = "";
    $vladar = 0;
    $foto = "";
}

?>
<h3>Savezi</h3>

<div class="row" style="margin-top:26px">
	<div class="medium-12 large-12 columns">
    <form method="post" action="savezi_sql.php" enctype="multipart/form-data" name="form" id="forma-savezi">
    <input type="hidden" name="id_saveza" value="<?php echo $id_saveza;?>">
    Želite li stvarno pobrisati savez? "<b><?php echo $ime; ?></b>"

    <input type="submit" name="submit" value="Potvrdi" class="button">&nbsp;&nbsp;
    <input type="submit" name="submit" value="Odustani" class="button">
    </form>
    
    
    </div>
</div>    
<?php
include("template_podnozje.html");
?>