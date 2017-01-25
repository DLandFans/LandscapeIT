<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Landscape IT Testing</title>
</head>
<body>

@php

    $getdata = file_get_contents('http://api.landscapeit.dev/vislib/v1');
    $object = json_decode($getdata, true);
    var_dump($object);

@endphp

</body>
</html>
