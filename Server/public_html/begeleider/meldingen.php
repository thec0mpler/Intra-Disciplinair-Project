<?php
$begeleider = true;
require_once "../../header.php";

$meldingen = $dbh->query("
    SELECT hulpoproep.timestamp, status, gebruiker.voornaam, gebruiker.tussenvoegsel, gebruiker.achternaam
    FROM hulpoproep
    JOIN gebruiker on hulpoproep.gebruiker = gebruiker.id
    ORDER BY hulpoproep.timestamp DESC")->fetchAll();
?>

<div class="container">
    <h1>Meldingen</h1>

    <table class="table meldingen">
        <thead>
            <th>Tijd</th>
            <th>Wie</th>
            <th>Status</th>
        </thead>
        <?php
        if (empty($meldingen))
            echo "<tr><td colspan=\"3\"><i>Geen meldingen</i></td></tr>";
        else {
            foreach ($meldingen as $melding) {
                $gebruiker = $melding["voornaam"] . ($melding["tussenvoegsel"] . " " ?? " ") . $melding["achternaam"];
                $status_naam = ($melding["status"] == 0 ? "Onbehandeld" : "Behandeld");
                $status_class = ($melding["status"] == 0 ? "status-open" : "status-closed");
                $melding_date = (new DateTime("@" . $melding["timestamp"]))->format("Y-m-d H:i:s")
                ?>
                <tr>
                    <td><?php echo $melding_date; ?></td>
                    <td><?php echo $gebruiker; ?></td>
                    <td class="status">
                        <ul class="options">
                            <li class="<?php echo $status_class; ?> active"><?php echo $status_naam; ?></li>
                        </ul>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        <!-- <tr>
            <td>1 minuut geleden</td>
            <td>Jonathan Peeman</td>
            <td class="status-open">Onbehandeld</td>
        </tr>
        <tr>
            <td>1 minuut geleden</td>
            <td>Jonathan Peeman</td>
            <td class="status-closed">Behandeld</td>
        </tr> -->
    </table>
</div>

<?php require_once "../../footer.php"; ?>
