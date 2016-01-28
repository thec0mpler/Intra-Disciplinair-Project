<?php
$begeleider = true;
require_once "../../header.php";

$woning = $dbh->query("
    SELECT woning.id, woning.nummer, gebruiker.voornaam, gebruiker.tussenvoegsel, gebruiker.achternaam, raspberrypi.ip
    FROM woning
    LEFT JOIN gebruiker on woning.id = gebruiker.woning
    LEFT JOIN raspberrypi on woning.raspberrypi = raspberrypi.id
    WHERE woning.id = " . intval($_GET["id"]))->fetch();

$lampen = $dbh->query("
    SELECT locatie, status
    FROM lamp
    WHERE woning = " . intval($_GET["id"]))->fetchAll();

if (!$woning)
    exit("Geen woning geselecteerd.");
?>

<div class="container">
    <h1>Woning <?php echo $woning["nummer"]; ?></h1>

    <dl>
        <dt>Naam</dt>
        <dd><?php echo $woning["voornaam"] . ($woning["tussenvoegsel"] . " " ?? " ") . $woning["achternaam"]; ?></dd>

        <dt>Lampen</dt>
        <dd>
            <?php
            foreach ($lampen as $lamp) {
                echo $lamp["locatie"] . ": " . ($lamp["status"] == 0 ? "Uit" : "Aan") . "<br>";
            }
            ?>
        </dd>

        <dt>Camera</dt>
        <dd><img src="http://<?php echo $woning["ip"]; ?>:8081" alt="Gebruiker heeft camera uit staan." /></dd>
    </dl>
</div>

<?php require_once "../../footer.php"; ?>
