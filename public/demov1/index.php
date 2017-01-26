<?php header("Location: http://www.landscapeit.com/"); ?>
<?php //header("Refresh: 5;url=http://www.landscapeit.com/"); ?>
<html>
    <head>
        <title>Landscape IT</title>
        <meta http-equiv="refresh" content="5; URL=http://www.landscapeit.com" />
        <script type="text/javascript">
                    window.setTimeout(function() {
                        location.href = 'http://www.landscapeit.com';
                    }, 5000);
        </script>
    </head>
    <body>
        <p>Click here if you are not redirected automatically in 5 seconds<br />
            <a href="http://www.landscapeit.com">Landscape IT</a>.
        </p>
    </body>
</html>