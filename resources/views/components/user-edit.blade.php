@extends('layout')

@section('content')

<div class="add-cont">

    <form method="POST" action= {{"/user/".$user->id."/edit"}}>
      @csrf

      <div class="button" onclick="window.location='{{ url()->previous() }}'">
            Return
    </div>

        <div class="form-elem">
            <label for="name">Name:
                @error('name')
                <span>{{$message}}</span>
                @enderror
            </label>
            <input type="name" name="name" value="{{$user->name}}"/>
        </div>

        <div class="form-elem">
            <label for="email">Email:
                @error('email')
                <span>{{$message}}</span>
                @enderror
            </label>
            <input type="email" name="email" value="{{$user->email}}" placeholder="example@email.org" />
        </div>

        <div class="form-elem">
            <label for="pin">Pin:
                @error('old_pin')
                <span>{{$message}}</span>
                @enderror
            </label>
            <input type="pin" name="old_pin" value="{{$user->pin}}"/>
        </div>

        <div class="form-elem">
            <label for="pin">New pin:
                @error('pin')
                <span>{{$message}}</span>
                @enderror
            </label>
            <input type="pin" name="pin" />
        </div>

        <div class="form-elem">
            <label for="pin_confirmation">New pin confirmation:
                @error('pin_confirmation')
                <span>{{$message}}</span>
                @enderror
            </label>
            <input type="pin" name="pin_confirmation" />
        </div>

        <div class="form-elem">
            <label for="job">Job:
                @error('job')
                <span>{{$message}}</span>
                @enderror
            </label>

            <div>
                <input type="radio" name="job" value="Cook" {{ old('job')=="Cook" ? "checked ='checked'" : '' }}>
                    <label for="cook">Chef</label>
            </div>
            <div>
                <input type="radio" name="job" value="Deliverer" {{ old('job')=="Deliverer" ? "checked ='checked'" : '' }}>
                    <label for="deliverer">Deliverer</label>
            </div>
        </div>


        <div>
        <button type="submit" class="button">
            Confirm Edit User
        </button>
        </div>
    </form>
</div>
@endsection
