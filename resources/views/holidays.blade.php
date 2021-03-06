@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-md-8" method="post" action="{{route('holidays')}}">
                <div class="card">
                    <div class="card-header">{{ __('South African Public Holidays') }}</div>
                    <div class="card-body">

                        <ul>
                     @foreach($holidays as $holiday)
                         <li> {{ $holiday->name }} {{  $holiday->day}}</li>
                         @endforeach
                        </ul>
                        <td><a href="{{action('HolidayController@download', $year)}}">Download PDF</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
