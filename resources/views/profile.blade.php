@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card mb-3">

                <div class="text-center">
                    <img src="{{asset('storage/' . auth()->user()->image)}}"{{-- "images/users/default.png" --}} alt="Add pic" width="85px" height="85px" class="profile-img">
                    <h3>
                        {{auth()->user()->name}}
                    </h3>
                </div>
                <div class="card-body">
                    <form action="/profile" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group my-1">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{auth()->user()->email}}">
                            @error('email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        
                        <div class="form-group my-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            @error('password_confirmation')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control" >
                            @error('image')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group my-1">
                            <button type="submit" class="btn btn-primary btn-s">Update</button>
                            <a href="/projects" class="btn btn-secondary btn-s">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>

    <script>
        document.getElementById('image').onchange = uploadOnChange;

        function uploadOnChange(){
            let filename = this.value;
            let lastIndex = filename.lastIndexOf("\\");

            if (lastIndex >= 0){
                filename = filename.substring(lastIndex +1);
            }
            document.getElementById('image-label').innerHTML = filename;
        }
    </script>
@endsection