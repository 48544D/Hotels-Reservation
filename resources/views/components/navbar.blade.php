<!--navbar css--->
<link rel="stylesheet" href="../css/navbar.css">

<!---fontawesome--->
<script
    src="https://kit.fontawesome.com/84ffe9b9c0.js"
    crossorigin="anonymous"
></script>


<!---navbar--->
<header>
    <div class="logo">
        <a href=""><p>Hotelz</p></a>
    </div>
    <form action="/search" method="GET" class="search-bar">
        <input type="text" placeholder="Search.." name="query" />
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    <div class="navigation">
        <ul>
            {{$slot}}
        </ul>
    </div>
</header>