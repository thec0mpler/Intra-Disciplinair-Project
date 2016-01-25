<?php require_once "../header.php"; ?>

<script type="text/javascript">
function hulpoproep() {
    return alert('Uw hulpoproep is verzonden');
}
</script>

<br>
<p>
Hulp nodig?
</p>
<button class="hulpbutton" type="button" onclick=hulpoproep()> Ja </button>
<button class="hulpbutton" type="button" onclick="location.href='index.php'">Nee</button>


<?php require_once "../footer.php"; ?>
