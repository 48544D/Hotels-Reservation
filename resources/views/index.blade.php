<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Hotelz</title>
</head>
<body>
    <x-navbar>
      <li><a href="/#hotels">Hotels</a></li>
      <li><a href="#">Suggestions</a></li>
      <li><a href="#social">Social</a></li>
      <li><a href="#contact">Contact</a></li>
    </x-navbar>

    <main>
        <section class="home" id="home">
          <div class="container">
            <h1>Make Memories</h1>
            <p>Discover the place where you have fun & enjoy a lot</p>
          </div>
        </section>
        
        <div id="hotels">
          @include('partials._search')
        </div>

        <x-hotels-cards :hotels="$hotels" />

        <x-footer />
    </main>
    
</body>
</html>