@extends('layouts.master')
@section('body-class', 'services')
@section('content')
<div class="container d-flex flex-column">
    <div class="content-title">
        <h2>hizmetler</h2>
    </div>
    <div class="content services-content">
        <!-- Buraya hizmetler gelecek -->
        <div class="service-item">
            <img src="https://images.unsplash.com/photo-1537199322506-85bfd51c0601?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=991&q=80" alt="kapı">
            <div class="inner-shadow">
                <h3>kapı</h3>
            </div>
            <div class="service-hover-specs">
                <ul>
                    <!-- Buraya hizmetin özellikleri gelecek -->
                    <li>
                        <h5>Spec 1</h5>
                    </li>
                </ul>        
            </div>
        </div>
        
    </div>
</div>
@endsection