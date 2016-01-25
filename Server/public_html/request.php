<!DOCTYPE html>
<html>
<head>
    <title></title>

    <script src="/assets/js/jquery-2.2.0.min.js"></script>
</head>
<body>

<script type="text/javascript">
    $.ajax({
        url: '/api/?json=%7B%22from%22%3A101%2C%22action%22%3A%22light%5C%2Fswitch%22%2C%22light%22%3A1%2C%22status%22%3A1%7D',
    }).done(function(data) {
        console.log(data);
    });
</script>

</body>
</html>
