<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">

    <title>Choose rooms</title>
</head>
<body>
    <x-navbar></x-navbar>
    <x-flash-message />

    <script>
        onload = function() {
            displaySelectedInput();
        }
    </script>

    <main>
        <div class="submit-form">
            <div class="form-container">
                <div class="form-container-header">
                    <h2>
                        Select Your Rooms
                    </h2>
                    <p>Choose rooms to reserve</p>
                </div>

                <div class="form-container-body">
                    <form action="/reservations/create" method="post" onsubmit="return CheckboxesValidation();">
                        @csrf

                        <input type="hidden" name="hotel_id" value="{{$hotel_id}}">
                        <input type="hidden" name="people_number" value="{{$people_number}}">
                        <input type="hidden" name="start_date" value="{{$start_date}}">
                        <input type="hidden" name="end_date" value="{{$end_date}}">

                        <div class="d-flex flex-column gap-2">
                            @unless ($standard_rooms == 0)
                            <div class="room-select">
                                <div class="form-check d-flex flex-column">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="rooms[]" id="standard_room" value="standard" onchange="displaySelectedInput();">
                                    <h5>Standard</h5>
                                  </label>

                                  <div class="d-flex align-self-center">
                                      <label class="m-0 me-2" name="standard_number">
                                          Enter Standard rooms number : 
                                      </label>
                                      <input class="border form-control-sm" type="number" min="1" max="{{$standard_rooms}}" name="standard_number" value="1">
                                  </div>
                                </div>
                            </div>
                            @endunless

                            @unless ($deluxe_rooms == 0)
                            <div class="room-select">
                                <div class="form-check d-flex flex-column">
                                  <label class="form-check-label me-auto">
                                    <input type="checkbox" class="form-check-input" name="rooms[]" id="deluxe_room" value="deluxe" onchange="displaySelectedInput();">
                                    <h5>Deluxe</h5>
                                  </label>


                                  <div class="d-flex align-self-center">
                                      <p class="m-0 me-2" name="deluxe_number">
                                          Enter Deluxe rooms number : 
                                      </p>
                                      <input class="border form-control-sm" type="number" min="1" max="{{$deluxe_rooms}}" name="deluxe_number" value="1">
                                  </div>
                                </div>
                            </div>
                            @endunless

                            @unless ($vip_rooms == 0)
                            <div class="room-select">
                                <div class="form-check d-flex flex-column">
                                  <label class="form-check-label me-auto">
                                    <input type="checkbox" class="form-check-input" name="rooms[]" id="vip_room" value="vip" onchange="displaySelectedInput();">
                                    <h5>VIP</h5>
                                  </label>
                                  
                                  <div class="d-flex align-self-center">
                                      <p class="m-0 me-2" name="vip_number">
                                          Enter VIP rooms number : 
                                      </p>
                                      <input class="border form-control-sm" type="number" min="1" max="{{$vip_rooms}}" name="vip_number" value="1">
                                  </div>
                                </div>
                            </div>
                        </div>
                        @endunless

                        <button type="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>