@extends('layouts.master')
@section('body-class', 'works')
@section('content')
<div class="container d-flex flex-column">
    <div class="content-title">
        <h2>yaptıklarımız</h2>
    </div>
    <div class="content works-content">
        <!-- Buraya instagram gönderileri gelecek -->
        <div class="works-item">
            <iframe src="https://graph.instagram.com/v11.0/10218560180051171/media" frameborder="0"></iframe>
        </div>

    </div>
</div>
@endsection