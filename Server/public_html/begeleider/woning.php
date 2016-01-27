<?php
$begeleider = true;
require_once "../../header.php";

$woning = $dbh->query("
        SELECT woning.id, woning.nummer, gebruiker.voornaam, gebruiker.tussenvoegsel, gebruiker.achternaam
    FROM woning
    JOIN gebruiker on woning.id = gebruiker.woning
    WHERE woning.id = " . intval($_GET["id"]))->fetch();

if (!$woning)
    exit("Geen woning geselecteerd.");
?>

<div class="container">
    <h1>Woning <?php echo $woning["nummer"]; ?></h1>

    <dl>
        <dt>Naam</dt>
        <dd><?php echo $woning["voornaam"] . ($woning["tussenvoegsel"] . " " ?? " ") . $woning["achternaam"]; ?></dd>
    </dl>

    <p>{video}</p>
    <p>{informatie bewoner?}</p>
</div>

<?php require_once "../../footer.php"; ?>
