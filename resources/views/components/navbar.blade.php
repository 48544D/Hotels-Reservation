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

<!---navbar--->
<header>
    <div class="logo">
        <a href="/">Hotelz</a>
    </div>
    <form action="/search" method="GET" class="search-bar">
        <input type="text" placeholder="Search.." name="query" />
        <button type="submit"><i class="fa-solid fa-search"></i></button>
    </form>
    <div class="navigation">
        <ul>
            {{$slot}}
        </ul>
    </div>
</header>