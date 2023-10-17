<link rel="stylesheet" href="{{ URL::asset('stylesheet/nav.css') }}" />

<div class="nav">
    <img class="menu" onClick="showNav()" src="{{ URL::asset('svg/menu.svg') }}">
    <nav class="burger-drill">
    <div>
        <img class="option" src="{{ URL::asset('svg/home.svg') }}">
            <a href="/index"><p class="optiontext">Home</p></a>
            </div>
            @if(Auth::check())
            @if(Auth::user()->roleId == 1 || Auth::user()->roleId == 2 ) 
            <div>
                <img class="option" src="{{ URL::asset('svg/add.svg') }}">
                <a href="/newjob"><p class="optiontext">Post an ad</p></a>
            </div>
            @endif
            @endif
            @if(Auth::check())
            @if(Auth::user()->roleId == 1) 
            <div>
                <img class="option" src="{{ URL::asset('svg/admin.svg') }}">
                <a href="/admin"><p class="optiontext">Admin panel</p></a>
            </div>
            @endif
            @endif
            @if(Auth::check())
            <div>
                <img class="option" src="{{ URL::asset('svg/profile.svg') }}">
                <a href="/user"><p class="optiontext">Profile</p></a>
            </div>
            @endif
            @if(Auth::check() == false)
            <div>
                <img class="option" src="{{ URL::asset('svg/signin.svg') }}">
                <a href="/login"><p class="optiontext">Sign in</p></a>
            </div>
            @endif
            @if(Auth::check() == true)
            <div>
                <img class="option" src="{{ URL::asset('svg/signout.svg') }}">
                <a href="/logout"><p class="optiontext">Log Out</p></a>
            </div>
            @endif
    </nav>
</div>

<script>
    function showNav() {
        document.body.classList.toggle('burger-is-toggled');
    }
</script>