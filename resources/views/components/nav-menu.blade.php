<div class="cont-menu">
    <div class="nav nav-open" onclick="switchNav()" ></div>
    <div class="nav logout" onclick="window.location='{{ url('/logout') }}'"> </div>
</div>
<div class="menu" id="menu">
    <ul>
        @if (\App\Models\Fridge::all()->pluck('isOpen')->first() === "X")
        <li onclick="window.location='{{ url('/switchfridge') }}'" >
            Open Fridge</li>
        @else
        <li onclick="window.location='{{ url('/switchfridge') }}'" >
            Close Fridge</li>
        @endif
        <span class="seperator"></span>
        <li onclick="window.location='{{ url('/content') }}'" >
            Content</li>
        <span class="seperator"></span>
        @admin
        <li onclick="window.location='{{ url('/users') }}'" >
            Users</li>
        <span class="seperator"></span>
        @endadmin
        <li onclick="window.location='{{ url('/reports') }}'" >
            Reports</li>
        <span class="seperator"></span>
    </ul>
</div>

<script>
    var isOpen = false;
    function switchNav()
        {if (isOpen) document.getElementById("menu").style.maxHeight = "0";
        else         document.getElementById("menu").style.maxHeight = "253px";
        isOpen = !isOpen;}
</script>
