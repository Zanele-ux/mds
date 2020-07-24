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
                        <button type="submit" class="btn btn-primary">Download</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
