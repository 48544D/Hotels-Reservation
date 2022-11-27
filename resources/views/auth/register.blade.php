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
        <div class="submit-form">
            <div class="form-container">
                <div class="form-container-header">
                    <h2>
                        Register
                    </h2>
                    <p>Register a new user</p>
                </div>

                <div class="form-container-body">
                    <form action="/register" method="post">
                        @csrf
                        <div class="form-group">
                            <label
                                for="name"
                                >Name</label
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
                                >password</label
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
                            <label
                                for="password_confirmation"
                                >Confirm Password</label
                            >
                            <input
                                type="password"
                                name="password_confirmation"
                                value="{{old('password_confirmation')}}"
                            />

                            @error('password_confirmation')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label
                                >Role</label
                            >
                            <div class="flex gap-2">
                                <input style="width: 20px;" type="radio" name="role" id="admin" value="1">
                                <label for="admin">Admin</label>
                            </div>
                            <div class="flex gap-2">
                                <input style="width: 20px;" type="radio" name="role" id="client" value="0">
                                <label for="client">Client</label>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <p class="m-0">
                                Already have an account?
                                <a href="/login" class="text-laravel"
                                    >Login</a
                                >
                            </p>
                            <button type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>