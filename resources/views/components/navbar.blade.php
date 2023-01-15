<!--navbar css--->
<link rel="stylesheet" href="../css/navbar.css">

<!---fontawesome--->
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
/>

<!---boostrap--->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    yellow: "#cc8d18da",
                },
            },
        },
    };
</script>
<script src="../js/app.js"></script>

<!---navbar--->
<header>
    <div class="logo">
        <a href="/">Hotelz</a>
    </div>
    <div class="navigation">
        <ul>
            {{$slot}}
        </ul>
    </div>
    @auth
        <form class="login" action="/logout" method="POST">
            @csrf
            <div class="dropdown">
                <i class="fa-solid fa-user dropbtn"></i>
                <div class="dropdown-content">
                    @client
                        <a href="/dashboard">Dashboard</a>
                    @endclient
                    @admin
                        <a href="/dashboard">Admin</a>
                    @endadmin
                    <button href="/logout">Logout</button>
                </div>
            </div>
        </form>
    @else
        <div class="login">
            <a href="/login"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
        </div>
    @endauth
</header>