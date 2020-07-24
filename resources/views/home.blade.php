@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form class="col-md-8" method="post" action="{{route('holidays')}}">
            @csrf
            <div class="card">
                <div class="card-header">{{ __('South African Public Holidays') }}</div>
                <div class="card-body">
                    <div class="input-group mb-3 input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">enter year, e.g 2020</span>
                        </div>
                        <input type="text" class="form-control" placeholder="year" id="year" name="year">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        </div>
        </div>
    </div>
</div>
@endsection
