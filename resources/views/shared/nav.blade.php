<link rel="stylesheet" href="{{ URL::asset('stylesheet/nav.css') }}" />

<div class="nav">
    <img class="menu" onClick="showNav()" src="{{ URL::asset('svg/menu.svg') }}">
    <nav class="burger-drill">
        <div>
            <img class="option" src="{{ URL::asset('svg/home.svg') }}">
            <a href="/index"><p class="optiontext">Home</p></a>
        </div>
        <div>
            <img class="option" src="{{ URL::asset('svg/add.svg') }}">
            <a href="/newjob"><p class="optiontext">Post an ad</p></a>
        </div>
        <div>
            <img class="option" src="{{ URL::asset('svg/admin.svg') }}">
            <p class="optiontext">Admin panel</p>
        </div>
        <div>
            <img class="option" src="{{ URL::asset('svg/profile.svg') }}">
            <p class="optiontext">Profile</p>
        </div>
        <div>
            <img class="option" src="{{ URL::asset('svg/signin.svg') }}">
            <p class="optiontext">Sign in</p>
        </div>
        <div>
            <img class="option" src="{{ URL::asset('svg/signout.svg') }}">
            <a href="/login"><p class="optiontext">Log Out</p></a>
        </div>
    </nav>
</div>

<script>
    function showNav() {
        document.body.classList.toggle('burger-is-toggled');
    }
</script>