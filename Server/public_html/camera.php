<?php
require_once "../header.php";

$raspberrypi = $dbh->query("
    SELECT raspberrypi.ip
    FROM woning
    LEFT JOIN raspberrypi on woning.raspberrypi = raspberrypi.id
    WHERE woning.id = " . intval($gebruiker))->fetch();
?>

<div class="container">
    <h1>Camerabediening</h1>

    <center>
        <img alt="Camera staat uit" src="http://<?php echo $raspberrypi["ip"]; ?>:8081/">
    </center>

    <a href="#" onclick="javascript:schakelCamera(this); return false;" data-gebruiker="<?php echo $gebruiker; ?>" data-status="1" class="camera-toggle-on btn btn-success button">Aan</a>
    <a href="#" onclick="javascript:schakelCamera(this); return false;" data-gebruiker="<?php echo $gebruiker; ?>" data-status="0" class="camera-toggle-off btn btn-danger button">Uit</a>
</div>

<?php require_once "../footer.php"; ?>
