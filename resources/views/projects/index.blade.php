@extends('layouts.app')

@section('title', 'Project')

@section('content')
<header class="d-flex justify-content-between align-item-center my-5">
    <div class="h4 text-dark">
        <a href="/projects">Projects</a>
    </div>

    <div>
        <a href="/projects/create" class="btn btn-primary  btn-lg" role="button">Create project</a>
    </div>
</header>
    
<section>

    <div class="row">
        @forelse ($projects as $project)
        <div class="mb-4 col-4 ">
            <div class="card" >
                <div class="card-body">
                    <div class="status">
                        @switch($project->status)
                            @case(1)
                                <span class="text-success">completed</span>
                            @break
                            @case(2)
                                <span class="text-danger">canceled</span>
                             @break
                            @default
                                <span class="text-warning">in process</span>
                        @endswitch

                        <h5 class="card-title font-weight-bold title" >
                            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                        </h5>
                        
                        <div class="card-text mt-4">
                            {{ Str::limit($project->description, 40) }}
                        </div>

                        @include('projects.footer')
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="align-content-center m-auto text-center mt-5">
            <p>The list is empty.</p>
            <div class="mt-5">
                <a href="/projects/create" role="button" class="btn btn-primary btn-lg d-inline-flex align-content-center" >Create new project just now</a>
            </div>
        </div>
    @endforelse
    </div>
</section>
@endsection