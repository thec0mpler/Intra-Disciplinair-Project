</div>

<script type="text/javascript" src="/assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
    function opdrachtServer(opdracht, succes) {
        succes = typeof succes !== 'undefined' ? succes : false;

        var json = JSON.stringify(opdracht);
        json = encodeURIComponent(json);

        $.ajax({
            url: "/api/?json=" + json,
        }).done(function(data) {
            console.log(data);
            if (succes)
                succes(data);
        }).fail(function(data) {
            alert("Er is iets fout gegaan.\nAls dit vaker gebeurd, neem dan contact op met uw zorginstelling.");
            console.log(data);
        });
    }

    function schakelLamp(element) {
        element = element.getElementsByTagName("img")[0];

        var lamp_id = element.dataset.id;
        var lamp_status = (element.src.match("lamp_aan") ? true : false)

        var server_opdracht = {
            "from": <?php echo $gebruiker; ?>,
            "action": "light/switch",
            "light": parseInt(lamp_id),
            "status": (!lamp_status ? 1 : 0)
        }

        opdrachtServer(server_opdracht, function() {
            if (lamp_status)
                element.src = "/assets/images/lamp_uit.png";
            else
                element.src = "/assets/images/lamp_aan.png";
        });
    }

    function schakelCamera(element) {
        var camera_id = element.dataset.gebruiker;
        var camera_status = element.dataset.status;

        var server_opdracht = {
            "from": <?php echo $gebruiker; ?>,
            "action": "camera/switch",
            "woning": parseInt(camera_id),
            "status": parseInt(camera_status)
        }

        opdrachtServer(server_opdracht, function(data) {
            if (camera_status == 1) {
                document.getElementById("stream-on").style.display = "none";
                document.getElementById("stream-off").style.display = "block";
            } else {
                document.getElementById("stream-on").style.display = "block";
                document.getElementById("stream-off").style.display = "none";
            }

            document.getElementById("stream").src = document.getElementById("stream").src;
        });
    }

    function hulpoproep() {
        var server_opdracht = {
            "from": <?php echo $gebruiker; ?>,
            "action": "emergency"
        }

        opdrachtServer(server_opdracht, function(data) {
            var response = JSON.parse(data);

            if (response.code == 200) {
                var server_opdracht = {
                    "from": <?php echo $gebruiker; ?>,
                    "action": "camera/switch",
                    "woning": <?php echo $gebruiker; ?>,
                    "status": 1
                }
                opdrachtServer(server_opdracht);

                alert("Uw hulpoproep is verzonden");
            } else {
                alert("Fout bij verwerken");
            }
        });
    }
</script>

</body>
</html>
