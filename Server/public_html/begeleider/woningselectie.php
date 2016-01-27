<?php
$begeleider = true;
require_once "../../header.php";

$woningen = $dbh->query("
    SELECT id, nummer
    FROM woning")->fetchAll();
?>

<div class="container">
    <h1>Kies een woning</h1>

    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle button" type="button" data-toggle="dropdown">
            Selecteer een woning
            <span class="caret"></span>
        </button>

        <ul class="dropdown-menu">
            <?php
            foreach ($woningen as $woning) {
                echo "<li><a href=\"woning.php?id=" . $woning["id"] . "\">" . $woning["nummer"] . "</a></li>";
            }
            ?>
        </ul>
    </div>
</div>

<?php require_once "../../footer.php"; ?>
