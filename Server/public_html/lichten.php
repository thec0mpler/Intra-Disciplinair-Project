<?php require_once "../header.php"; ?>
    <br>
        <h1>Lampbediening</h1>
<p>
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
    </p>



<?php require_once "../footer.php"; ?>
