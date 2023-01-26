<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>Edit you reservation</title>
</head>
<body>
    <x-navbar />

    <main>
        <div class="editReservation">
            <h2>Edit you reservation</h2>
            <div class="editReservation-info">
                <form method="POST" action="/reservations/edit" onsubmit="return check()">
                    @csrf
                    <input type="hidden" name="id" value="{{ $reservation->id }}" />
                    <label for="people_number">People Number</label>
                    <input
                    type="number"
                    class="form-control"
                    id="people_number"
                    name="people_number"
                    placeholder="People Number"
                    value="{{ $reservation->people_number }}"
                    min="1"
                    />
                    @error('people_number')
                        <p class="text-error
                        ">{{ $message }}</p>
                    @enderror

                    <label for="start_date">Start Date</label>
                    <input
                    type="date"
                    class="form-control"
                    id="start_date"
                    name="start_date"
                    value="{{ $reservation->start_date }}"
                    required
                    />
                    @error('start_date')
                        <p class="text-error
                        ">{{ $message }}</p>
                    @enderror
                    
                    <label for="end_date">End Date</label>
                    <input
                    type="date"
                    class="form-control"
                    id="end_date"
                    name="end_date"
                    value="{{ $reservation->end_date }}"
                    required
                    />
                    @error('end_date')
                        <p class="text-error
                        ">{{ $message }}</p>
                    @enderror

                    <input type="submit" value="Save" />
                </form>
            </div>
        </div>
    </main>
</body>
</html>