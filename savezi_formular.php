<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id != 0){
    $query = $db->query("SELECT * FROM savezi WHERE id_saveza = $id");
    $rezultati = $query->fetchAll();
    $id_saveza = $rezultati[0]["id_saveza"];
    $ime = $rezultati[0]["ime"];
    $vladar = $rezultati[0]["vladar"];
    $foto = $rezultati[0]["foto"];
}else{
    $id_saveza = 0;
    $ime = "";
    $vladar = 0;
    $foto= "";
}

?>

<h3>Savezi</h3>
<div class="row" style="margin-top:26px">
    <div class="medium-12 large-12 columns">
    <form method="post" action="savezi_sql.php" enctype="multipart/form-data" name="form" id="forma-savezi">
    <input type="hidden" name="id_saveza" value="<?php echo $id_saveza;?>">
    Ime Saveza
    <input type="text" name="ime" value="<?php echo $ime;?>">
    Vladar
    <select name="vladar">
    <option value="0"> -- </option>
    <?php
        $query = $db->query("SELECT * FROM vladari");
        $rezultati = $query->fetchAll();
        foreach($rezultati as $izv){
            if($vladar == $izv["id_vladara"]){
                $selected = " selected";
            }else{
                $selected = "";
            }
            echo "<option value='" . $izv["id_vladara"] . "'" . 
            $selected ." >" . $izv["ime"] . " " .  $izv["prezime"] . "</option>";
        }
        ?>   </select>
    Slika
    <input type="text" name="foto" value="<?php echo $foto;?>" >
    <?php
        if($foto == ""){
            $slika = "dummy.jpg";
        }else{
            $slika = $foto;
        }
    ?>
	<img src="slike/<?php echo $slika; ?>" width="150"><br><br>

    <input type="submit" name="submit" value="Dodaj/Uredi" class="button">
    </form>

    </div>
</div>
