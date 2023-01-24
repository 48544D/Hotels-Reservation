<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <x-navbar />

    <main>
        <div class="account">
            <h2>Manage Your Account</h2>
            <div class="account-info">
                <form method="POST" action="/update">
                    @csrf
                    <label>Your current Name</label>
                    <input
                        type="text"
                        name="name"
                        placeholder="name"
                        value="{{ auth()->user()->name }}"
                        required
                    />
                    @error('name')
                        <p class="text-error">{{ $message }}</p>                        
                    @enderror

                    <label>Your current Email</label>
                    <input 
                        value="{{ auth()->user()->email }}"
                        type="email"
                        name="email"
                        required
                    />
                    @error('email')
                        <p class="text-error">{{ $message }}</p>
                    @enderror

                    <label>confirm your Password</label>
                    <input
                        placeholder="Your Password.."
                        type="password"
                        name="pass"
                        required
                    />
                    @error('pass')
                        <p class="text-error">{{ $message }}</p>
                    @enderror

                    <input type="submit" value="Save" /> | <a href="/changePass">Change Password</a>
                </form>
            </div>
        </div>
    </main>
</body>
</html>