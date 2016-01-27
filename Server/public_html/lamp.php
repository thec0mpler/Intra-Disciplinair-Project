<?php require_once "../header.php"; ?>

<div class="container">
    <h1>Lampbediening</h1>

    <?php
    $lampen = $dbh->query("
        SELECT id, locatie, status
        FROM lamp
        WHERE woning = " . $woning)->fetchAll();

    foreach ($lampen as $lamp) {
        if ($lamp["status"] == 1)
            $src = "/assets/images/lamp_aan.png";
        else
            $src = "/assets/images/lamp_uit.png";

        echo "<p>" . $lamp["locatie"] . "</p>";
        //echo '<img onclick="schakelLamp(this)" class="lamp" data-id="' . $lamp["id"] . '" src="' . $src  .'" width="100%" height="100%">';
        echo '
            <a href="#" onclick="schakelLamp(this); return false;">
                <img class="lamp" data-id="' . $lamp["id"] . '" src="' . $src  .'" width="100%" height="100%">
            </a>';
    }
    ?>
</div>

<?php require_once "../footer.php"; ?>
