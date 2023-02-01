@extends('layout')

@section('content')

    <div class="user-cont">
        @if ((is_array($reports) || is_object($reports)) && (!$reports->isEmpty()))
            @foreach($reports as $report)
                <div class="item user-item" onclick="window.location='{{ url('/user-edit/'.$report->id) }}'" >
                    <div style="flex-basis:30%"> {{$report->id}} </div>
                    <div class="option">Edit</div>
                    <div class="option">Delete</div>
                </div>
            @endforeach
        @else
            <div class="item user-item" style="justify-content: center;">No reports found</div>
        @endif

        <div class="option" onclick="switchAdd();">Add Report</div>

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
                <label for="report">Report:
                    @error('report')
                    <span>{{$message}}</span>
                    @enderror
                </label>
                <input style="height:45vh" type="text" name="report" />
            </div>

            <div>
            <button type="submit" class="option">
                Confirm Add Report
            </button>
            </div>
        </form>
    </div>
</div>
    </div>

<script>
    function switchAdd()
        {document.getElementsByClassName("add-overlay")[0].classList.toggle("o-open");}
</script>

@endsection
