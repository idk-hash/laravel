@extends('layout')

@section('content')

<div class="user-cont">
    @if (is_array($users) || is_object($users))
        @foreach($users as $user)
            <div class="item user-item" >
                <div style="flex-basis:30%"> {{$user->name}} </div>
                <div>{{$user->job}}</div>
                <div class="option" onclick="window.location='{{ url('/user-edit/'.$user->id) }}'">Edit</div>
                <div class="option" onclick="window.location='{{ url('/user-delete/'.$user->id) }}'">Delete</div>
            </div>
        @endforeach
    @endif
</div>

<div class="option" onclick="switchAdd();">Add User</div>

<div class="add-overlay">
    <div class="add-option-cont">
        <div class="return" onclick="switchAdd();">
            <svg style="padding: 25%;" viewBox="0 0 110 110">
                <path d="M 10,10 l 90,90 M 100,10 l -90,90" stroke="black" stroke-width="10" stroke-linecap="round" ></path>
            </svg>
        </div>

        <form method="POST" action="/users/add">
        @csrf

            <div class="form-elem">
                <label for="staff_id">Staff ID:
                    @error('staff_id')
                    <span>{{$message}}</span>
                    @enderror
                </label>
                <input type="text" name="staff_id" value="{{ old('staff_id') }}" placeholder="1234" />
            </div>

            <div class="form-elem">
                <label for="name">Name:
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
                </label>
                <input type="name" name="name" value="{{ old('name') }}"/>
            </div>

            <div class="form-elem">
                <label for="email">Email:
                    @error('email')
                    <span>{{$message}}</span>
                    @enderror
                </label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="example@email.org" />
            </div>

            <div class="form-elem">
                <label for="password">Password:
                    @error('password')
                    <span>{{$message}}</span>
                    @enderror
                </label>
                <input type="password" name="password" />

            </div>

            <div class="form-elem">
                <label for="password_confirmation">Password confirmation:
                    @error('password_confirmation')
                    <span>{{$message}}</span>
                    @enderror
                </label>
                <input type="password" name="password_confirmation" />
            </div>

            <div class="form-elem">
                <label for="job">Job:
                    @error('job')
                    <span>{{$message}}</span>
                    @enderror
                </label>

                <div>
                    <input type="radio" name="job" value="Cook" {{ old('job')=="Cook" ? "checked ='checked'" : '' }}>
                        <label for="cook">Cook</label>
                </div>
                <div>
                    <input type="radio" name="job" value="Deliverer" {{ old('job')=="Deliverer" ? "checked ='checked'" : '' }}>
                        <label for="deliverer">Deliverer</label>
                </div>
            </div>


            <div>
            <button type="submit" class="option">
                Confirm Add User
            </button>
            </div>
        </form>
    </div>
</div>

<div class="edit-overlay"></div>

<script>
    function switchAdd()
        {document.getElementsByClassName("add-overlay")[0].classList.toggle("o-open");}
</script>

@endsection
