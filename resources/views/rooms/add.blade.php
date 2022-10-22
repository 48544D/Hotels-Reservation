<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/style.css">
    <title>Rooms</title>
</head>
<body>
    <x-navbar></x-navbar>
    <main>
        <div class="submit-form">
            <div class="form-container">
                <div class="form-container-header">
                    <h2>
                        Select Your Rooms
                    </h2>
                    <p>Add rooms to the hotel</p>
                </div>

                <div class="form-container-body">
                    <form action="/hotels" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="Hotelname" value="{{$name}}">
                        <input type="hidden" name="Hotelemail" value="{{$email}}">
                        <input type="hidden" name="Hotelcity" value="{{$city}}">
                        <input type="hidden" name="Hotelwebsite" value="{{$website}}">
                        <input type="hidden" name="Hotellogo" value="{{$logo}}">
                        <input type="hidden" name="Hoteldescription" value="{{$description}}">

                        

                        <button type="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>