<div class="log-bg"></div>
<div class="log-cont">
    <div class="logo-cont">
        <div class="logo"></div>
        <div class="welcome"> <span style="font-weight: 600"> Future <span style="color:#0082ff">Fridges</span> </span> <br> Smart Portal</div>
    </div>

    <form method="POST" action="/users/authenticate">
      @csrf

      <div>
        <input type="text" name="pin" value="{{old('pin')}}" placeholder="PIN" />
            @error('pin')
            <p>{{$message}}</p>
            @enderror
      </div>
      <div>
        <button type="submit">
          Sign In
        </button>
      </div>
    </form>

    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
    </div>
