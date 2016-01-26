</div>

<script type="text/javascript" src="/assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript">
    function opdrachtServer(opdracht) {
        var json = JSON.stringify(opdracht);
        json = encodeURIComponent(json);

        $.ajax({
            url: "/api/?json=" + json,
        }).done(function(data) {
            console.log(data);
        }).error(function() {
            alert("ERROR");
        });
    }
</script>

</body>
</html>
