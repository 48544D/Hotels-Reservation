<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>
<body>
    <x-navbar></x-navbar>
    
    <main>
        <div class="submit-form">
            <div class="form-container">
                <div class="form-container-header">
                    <h2>
                        Login
                    </h2>
                    <p>Login with your account</p>
                </div>

                <div class="form-container-body">
                    <form action="/login" method="post" >
                        @csrf
                        <div class="form-group">
                            <label
                                for="email"
                                >Email</label
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
                                for="password"
                                >Password</label
                            >
                            <input
                                type="password"
                                name="password"
                                value="{{old('password')}}"
                            />

                            @error('password')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <p class="m-0">
                                Don't have an account?
                                <a href="/register" class="text-laravel">Register</a>
                            </p>
                            <button type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>