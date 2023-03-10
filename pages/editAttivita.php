<?php
include_once dirname(__FILE__) . '/../functions/getActivity.php';
include_once dirname(__FILE__) . '/../functions/updateActivity.php';
include_once dirname(__FILE__) . '/../functions/checkLogin.php';
include_once dirname(__FILE__) . '/../functions/addActivity.php';
session_start();
$user = checkLogin();
if ($user["ruolo"] != "Admin")
{
    header('Location: index.php');
}
$attivita = array(
    "codice" => "",
    "nome" => "",
    "CFU" => "",
    "ore_lezione" => "",
    "ore_tirocinio" => "",
    "ore_laboratorio" => "",
    "tipo_insegnamento" => "",
    "semestre" => "",
    "descrizione_semestre" => "",
    "anno1" => "",
    "anno2" => "");

$opzione = "Aggiungi";

if (isset($_GET["attivita"]))
{
    $opzione = "Modifica";
    $attivita = getActivity($_GET["attivita"])->fetch_assoc();
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(updateActivity($_GET["attivita"], $_POST))
        {
            echo "<script>alert('Attività modificata')
                    location.href = 'index.php?page=1'</script>";
        }
    }
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(addActivity($_POST))
    {
        echo "<script>alert('Attivita aggiunta')
                location.href = 'index.php?page=1'</script>";
    }
}
?>

<div class="row">
    <form action="" method="post">
        <?php if (!isset($_GET["attivita"]))
            {?>
            <div class="col-12">
                <label for="codice">Codice</label>
                <input type="text" name="codice" class="form-control">
            </div>
        <?php }?>
        <div class="col-12">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="<?php echo $attivita["nome"] ?>">
        </div>
        <div class="col-12">
            <label for="cfu">CFU</label>
            <input type="text" name="cfu" class="form-control" value="<?php echo $attivita["CFU"] ?>">
        </div>
        <div class="col-12">
            <label for="ore_lezione">Ore lezione</label>
            <input type="text" name="ore_lezione" class="form-control" value="<?php echo $attivita["ore_lezione"] ?>">
        </div>
        <div class="col-12">
            <label for="ore_tirocinio">Ore tirocinio</label>
            <input type="text" name="ore_tirocinio" class="form-control" value="<?php echo $attivita["ore_tirocinio"] ?>">
        </div>
        <div class="col-12">
            <label for="ore_laboratorio">Ore laboratorio</label>
            <input type="text" name="ore_laboratorio" class="form-control" value="<?php echo $attivita["ore_laboratorio"] ?>">
        </div>
        <div class="col-12">
            <label for="tipo_insegnamento">Tipo insegnamento</label>
            <input type="text" name="tipo_insegnamento" class="form-control" value="<?php echo $attivita["tipo_insegnamento"] ?>">
        </div>
        <div class="col-12">
            <label for="semestre">Semestre</label>
            <input type="text" name="semestre" class="form-control" value="<?php echo $attivita["semestre"] ?>">
        </div>
        <div class="col-12">
            <label for="descrizione_semestre">Descrizione semestre</label>
            <input type="text" name="descrizione_semestre" class="form-control" value="<?php echo $attivita["descrizione_semestre"] ?>">
        </div>
        <div class="col-12">
            <label for="anno1">Anno 1</label>
            <input type="text" name="anno1" class="form-control" value="<?php echo $attivita["anno1"] ?>">
        </div>
        <div class="col-12">
            <label for="anno2">Anno 2</label>
            <input type="text" name="anno2" class="form-control" value="<?php echo $attivita["anno2"] ?>">
        </div>
        <div class="col-12 mt-3">
            <input type="submit" class="btn btn-primary" value='<?php echo $opzione ?>'>
        </div>
    </form>
</div>