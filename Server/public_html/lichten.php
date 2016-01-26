<?php require_once "../header.php"; ?>

<h1>Lampbediening</h1>

<?php
$gebruiker = 1;
$woning = 1;

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
    echo '<img onclick="schakelLamp(this)" class="lamp" data-id="' . $lamp["id"] . '" src="' . $src  .'" width="100%" height="100%">';
}
?>

<script type="text/javascript">
    function schakelLamp(element) {
        var lamp_id = element.dataset.id;
        var lamp_status = (element.src.match("lamp_aan") ? true : false)

        var server_opdracht = {
            "from": <?php echo $gebruiker; ?>,
            "action": "light/switch",
            "light": parseInt(lamp_id),
            "status": (!lamp_status ? 1 : 0)
        }

        opdrachtServer(server_opdracht);

        if (lamp_status) {
            element.src = "/assets/images/lamp_uit.png";
        } else {
            element.src = "/assets/images/lamp_aan.png";
        }
    }
</script>

<!-- <p>
    <br>
    <br>
<p> Lamp 1</p>
<img id="myImage" onclick="changeImage()" src="/assets/images/lamp_aan.png" width="100%" height="100%">

<p>klik om de lamp aan of uit te zetten</p>

<script>
function changeImage() {
    var image = document.getElementById('myImage');
        if (image.src.match("lamp_aan")) {
        image.src = "/assets/images/lamp_uit.png";}
        else {
        image.src = "/assets/images/lamp_aan.png";
    }
}
</script>
<p> Lamp 2 </p>
<img id="myImage2" onclick="changeImage2()" src="/assets/images/lamp_aan.png" width="100%" height="100%">
<script>
function changeImage2() {
    var image = document.getElementById('myImage2');
        if (image.src.match("lamp_aan")) {
        image.src = "/assets/images/lamp_uit.png";}
        else {
        image.src = "/assets/images/lamp_aan.png";
    }
}
</script>
<p>
=======funtie lamp aan/uit=====
lamp 1 + 2
=======funtie lamp aan/uit=====</p>
    </p> -->



<?php require_once "../footer.php"; ?>
