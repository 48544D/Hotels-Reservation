<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">

    <!--Font awesome-->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    
    <title>Create</title>
</head>
<body>
    <x-navbar></x-navbar>
    <x-flash-message />
    
    <main>
        <div class="submit-form">
            <div class="form-container">
                <div class="form-container-header">
                    <h2>
                        Create a Hotel
                    </h2>
                    <p>Add a hotel to find clients</p>
                </div>

                <div class="form-container-body">
                    <form action="/rooms/add" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label
                                for="name"
                                >Hotel Name</label
                            >
                            <input
                                type="text"
                                name="name"
                                value="{{old('name')}}"
                            />

                            @error('name')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label
                                for="email"
                                >Hotel Email</label
                            >
                            <input
                                type="email"
                                name="email"
                                value="{{old('email')}}"
                            />

                            @error('email')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label
                                for="city"
                                >Hotel City</label
                            >
                            <input
                                type="text"
                                name="city"
                                value="{{old('city')}}"
                            />

                            @error('city')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label
                                for="website"
                                >Hotel Website</label
                            >
                            <input
                                type="text"
                                name="website"
                                value="{{old('website')}}"
                            />

                            @error('website')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="logo">
                                Hotel Logo
                            </label>
                            <input
                                type="file"
                                name="logo"
                            />
                            @error('logo')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label
                                for="description"
                                >Hotel Description</label
                            >
                            <textarea
                                type="text"
                                name="description">{{old('description')}}</textarea>

                            @error('description')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <button type="submit">Next <i class="fa-solid fa-angles-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>