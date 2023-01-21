<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/hotel.css">
    <title>{{$hotel->name}}</title>
</head>
<body>
    <x-navbar />
    
    <x-flash-message />

    <main>
        <div class="wrapper">
            <div class="content">
                <div class="hotel_name">
                    <h2>{{ $hotel->name }}</h2>
                </div>

                <div class="hotel_info">
                    <div class="hotel_img">
                        <img src="{{$hotel->logo ? asset('storage/' . $hotel->logo) : asset('storage/images/no-image.jpg')}}" alt="" />
                    </div>

                    <div class="hotel_info_text">
                        <h2>Hotel Informations</h2>
                        <div class="info_text">
                        <i class="fa-solid fa-map-marker-alt"></i>
                        <p>{{ $hotel->city }}</p>
                        <i class="fa-solid fa-envelope"></i>
                        <a href="mailto:{{ $hotel->email }}">{{ $hotel->email }}</a>
                        <i class="fa-solid fa-globe"></i>
                        <a href="{{$hotel->website}}">{{$hotel->website}}</a>
                        </div>
                    </div>

                    <div class="hotel_description">
                        <h2>Description</h2>
                        <p>{{ $hotel->description }}</p>
                    </div>

                    <div class="book-now">
                        <form
                        method="POST"
                        action="/rooms/types"
                        onsubmit="return check()"
                        >
                        @csrf
                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}" />

                        <!--people number input-->
                        <div class="form-group">
                            <label for="people_number">People Number</label>
                            <input
                            type="number"
                            class="form-control"
                            id="people_number"
                            name="people_number"
                            placeholder="People Number"
                            value="1"
                            min="1"
                            />
                        </div>

                        <!--start date and end date fields-->
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input
                            type="date"
                            class="form-control"
                            id="start_date"
                            name="start_date"
                            placeholder="Start Date"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input
                            type="date"
                            class="form-control"
                            id="end_date"
                            name="end_date"
                            placeholder="End Date"
                            required
                            />
                        </div>

                        <!--submit button-->
                        <input type="submit" value="submit" class="btn btn-primary mt-3" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>