@extends('layouts.app')

@section('title', 'Edit project')

@section('content')
<div class="justify-content-center row">
    <div class="col-8">
        <div class="card p-4">
            <h4 class="pb-6 text-center text-weight-bold">
                Edit project
            </h4>

            <form action="/projects/{{$project->id}}" method="POST" >
                @method("PATCH")
                @include('projects.form')

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary" style="margin-right: 6px" > Edit</button>
                    <a type="submit" href="/projects" class="btn btn-secondary"> Cancel</a>
                </div>
            </form>
       </div>
   </div>
</div>
@endsection