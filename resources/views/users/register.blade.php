<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Register</title>
</head>
<body>
    <x-navbar></x-navbar>

    <main>
        <div class="login-form">
            <div class="form-container">
                <div class="form-container-header">
                    <h2>
                        Register
                    </h2>
                </div>

                <div class="form-container-body">
                    <form action="/register" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label
                                for="name"
                                >Username</label
                            >
                            <input
                                type="text"
                                name="name"
                                class="border"
                                value="{{old('name')}}"
                            />

                            @error('name')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label
                                for="email"
                                >Email</label
                            >
                            <input
                                type="email"
                                name="email"
                                class="border"
                                value="{{old('email')}}"
                            />

                            @error('email')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label
                                for="password"
                                >Password</label
                            >
                            <input
                                type="password"
                                name="password"
                                class="border"
                                value="{{old('password')}}"
                            />

                            @error('password')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label
                                for="password_confirmation"
                                >Confirm Password</label
                            >
                            <input
                                type="password"
                                name="password_confirmation"
                                class="border"
                                value="{{old('password_confirmation')}}"
                            />

                            @error('password_confirmation')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>

                        
                        <div class="button-group">
                            <button type="submit">Register</button>

                            <p>Already have an account? <a href="/register">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>