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
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ session('tab') != 'password' ? ' active' : null }}" href="#account" role="tab" data-toggle="tab">Account</a>
            </li>
            |
            <li class="nav-item">
                <a class="nav-link {{ session('tab') == 'password' ? ' active' : null }}" href="#password" role="tab" data-toggle="tab">Change password</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade {{ session('tab') != 'password' ? ' show active' : null }}" id="account" role="tabpanel">
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
    
                            <input type="submit" value="Save" />
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade {{ session('tab') == 'password' ? ' show active' : null }}" id="password" role="tabpanel">
                <div class="passwordChange">
                    <h2>Change Your Password</h2>
                    <div class="passwordChange-info">
                        <form method="POST" action="/updatePassword">
                            @csrf
                            <label>Old Password</label>
                            <input
                                placeholder="Your Old Password.."
                                type="password"
                                name="oldPass"
                                required
                            />
                            @error('oldPass')
                                <p class="text-error
                                ">{{ $message }}</p>
                            @enderror

                            <label>New Password</label>
                            <input
                                placeholder="New Password.."
                                type="password"
                                name="password"
                                required
                            />
                            @error('password')
                                <p class="text-error
                                ">{{ $message }}</p>
                            @enderror
                            
                            <label>Confirm your Password</label>
                            <input
                                placeholder="Confirm Password.."
                                type="password"
                                name="password_confirmation"
                                required
                            />
                            @error('password_confirmation')
                                <p class="text-error
                                ">{{ $message }}</p>
                            @enderror

                            <input type="submit" value="Save" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $('.nav-link').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    </script>
</body>
</html>