@extends('layouts.master')
@section('body-class', 'about')
@section('content')
<div class="container content-container">
        <div class="content-title">
            <h2>hakkımızda</h2>
        </div>
        <!-- Buraya hakkımızda yazısı gelecek -->
        <div class="content about-content">
            <div class="content-left">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto aut quis ullam veniam nemo esse architecto animi facilis. Laborum facilis similique tempore quaerat sit fugiat! Quam laboriosam tempora impedit aspernatur, voluptates numquam minima veritatis, error distinctio fuga quos aliquam voluptatem consectetur quod harum facilis rerum debitis animi unde voluptas est commodi. Necessitatibus quo ut optio fugit quasi magni, molestias est, et iusto molestiae vero possimus sequi veniam temporibus minus ipsa dolore sit. Quia repudiandae laboriosam est quasi aperiam iusto voluptatum, earum optio suscipit impedit enim a accusantium dolore unde fuga rerum illo ipsum asperiores labore? Facere ducimus ad iure numquam?</p>
            </div>
            <div class="content-right">
                <img src="{{asset('storage/img/home-background.jpg')}}" alt="">
            </div>
        </div>
        
</div>
@endsection