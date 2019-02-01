<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Zcapt</title>


</head>
<body>

<script>

    alert("Welcome to zcapt. Please configure your local environment first");
    window.location.href="{{ url('/enveditor') }}";
</script>
</body>

</html>
