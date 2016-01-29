<?php
require_once "../header.php";

$raspberrypi = $dbh->query("
    SELECT raspberrypi.ip, camera.status as camera_status
    FROM woning
    LEFT JOIN raspberrypi on woning.raspberrypi = raspberrypi.id
    LEFT JOIN camera on woning.id = camera.woning
    WHERE woning.id = " . intval($gebruiker))->fetch();
?>

<div class="container">
    <h1>Camerabediening</h1>

    <center>
        <img id="stream" alt="Camera staat uit" src="http://<?php echo $raspberrypi["ip"]; ?>:8081/">
    </center>

    <a href="#" onclick="javascript:schakelCamera(this); return false;" id="stream-on" data-gebruiker="<?php echo $gebruiker; ?>" data-status="1" class="btn btn-success button"<?php echo ($raspberrypi["camera_status"] == 1 ? " style=\"display: none;\"" : ""); ?>>Aanzetten</a>
    <a href="#" onclick="javascript:schakelCamera(this); return false;" id="stream-off" data-gebruiker="<?php echo $gebruiker; ?>" data-status="0" class="btn btn-danger button"<?php echo ($raspberrypi["camera_status"] == 0 ? " style=\"display: none;\"" : ""); ?>>Uitzetten</a>
</div>

<?php require_once "../footer.php"; ?>
