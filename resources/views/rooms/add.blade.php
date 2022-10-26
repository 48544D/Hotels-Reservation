<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    
    <script src="../js/app.js"></script>
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
                    <form action="/hotels" method="post" enctype="multipart/form-data" onsubmit="return CheckboxesValidation();">
                        @csrf
                        <input type="hidden" name="name" value="{{$name}}">
                        <input type="hidden" name="email" value="{{$email}}">
                        <input type="hidden" name="city" value="{{$city}}">
                        <input type="hidden" name="website" value="{{$website}}">
                        <input type="hidden" name="logo" value="{{$logo}}">
                        <input type="hidden" name="description" value="{{$description}}">

                        <div class="d-flex flex-column gap-2">
                            <div class="room-select">
                                <div class="form-check d-flex flex-column">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="rooms[]" id="standard_room" value="standard" onchange="displaySelectedInput();">
                                    <h5>Standard</h5>
                                  </label>

                                  <div class="d-flex align-self-center">
                                      <p class="m-0 me-2" name="standard_number">
                                          Enter Standard rooms number : 
                                      </p>
                                      <input class="w-25 border" type="number" min="1" name="standard_number" value="1">
                                  </div>
                                </div>
                            </div>
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
                                      <input class="w-25 border" type="number" min="1" name="deluxe_number" value="1">
                                  </div>
                                </div>
                            </div>
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
                                      <input class="w-25 border" type="number" min="1" name="vip_number" value="1">
                                  </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>