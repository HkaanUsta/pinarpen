@extends('layouts.master')
@section('body-class', 'works')
@section('content')
<div class="container d-flex flex-column">
    <div class="content-title">
        <h2>yaptıklarımız</h2>
    </div>
    <div class="content works-content">
        <div class="works-item">
            @foreach($portfolios as $portfolio)
                <a style="color: #000 !important;" href="{{url("portfolios/$portfolio->slug/$portfolio->id")}}">{{$portfolio->title}}</a>
            @endforeach
        </div>

    </div>
</div>
@endsection