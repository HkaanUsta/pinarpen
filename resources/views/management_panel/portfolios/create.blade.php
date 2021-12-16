@extends('management_panel.layouts.master')
@section('title','Create Portfolio')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif
                @if(Session::get("success"))
                    <div class="alert alert-success">
                        {{Session::get("success")}}
                    </div>
                @endif
                <form method="POST" action="{{url("/admin/portfolios/")}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image">Portfolio Image</label>
                        <input type="file" name="title_image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Portfolio Name</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Portfolio Content</label>
                        <input type="text" name="content" id="spec" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Portfolio Images</label>
                        <input type="file" name="images[]" id="image" class="form-control" multiple>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Create Portfolio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

