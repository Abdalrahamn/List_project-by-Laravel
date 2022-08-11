@extends('layouts.app')

@section('title', 'Create project')

@section('content')
<div class="justify-content-center row">
    <div class="col-8">
          <div class="card p-4">
            <h4 class="pb-7 text-center text-weight-bold">
                New project
            </h4>
    
            <form action="/projects" method="POST" >
                
                @include('projects.form', ['project' => new App\Models\Project()])
    
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary" style="margin-right: 6px"> Create</button>
                    <a type="submit" href="/projects" class="btn btn-secondary"> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection