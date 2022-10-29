<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Hotels</title>
</head>
<body>
    <x-navbar></x-navbar>
    
    <main>
        <x-hotels-cards :hotels="$hotels" />
    </main>
</body>
</html>