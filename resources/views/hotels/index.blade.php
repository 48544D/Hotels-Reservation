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
        @unless (count($hotels) == 0)
            <div class="hotel-container">
                @foreach ($hotels as $hotel)
                    <div class="hotel-card">
                        <img src="{{asset('storage/' . $hotel->logo)}}" alt="">

                        <div class="hotel-card-info">
                            <div class="hotel-card-header">
                                <h3>
                                    <a href="hotels/{{$hotel->id}}">{{$hotel->name}}</a>
                                </h3>
                                <div class="hotel-website"><a href="{{$hotel->website}}"> {{$hotel->website}} </a></div>
                            </div>

                            <div class="hotel-city">
                                <i class="fa-solid fa-location-dot"></i> {{$hotel->city}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
        <div class="center">
            <h2 style="font-family: 'ubuntu', sans-serif">No Hotels To Show</h2>
        </div>
        @endunless
        <div>
            {{$hotels->links()}}
        </div>
    </main>
</body>
</html>