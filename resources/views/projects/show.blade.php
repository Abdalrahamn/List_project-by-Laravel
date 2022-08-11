@extends('layouts.app')

@section('title', 'Show project')

@section('content')
<header class="d-flex justify-content-between align-item-center my-5">
    <div class="h4 text-dark">
        <a href="/projects">Projects - {{ $project->title}}</a>
    </div>

    <div>
        <a href="/projects/{{$project->id}}/edit" class="btn btn-primary  btn-lg" role="button">Edit project</a>
    </div>
</header>
    <section class="row">
        <div class="col-lg-4">
            <div class="card">
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
                        <h5 class="card-title font-weight-bold">
                            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                        </h5>
                        <div class="card-text mt-4">
                            {{ Str::limit($project->description, 100) }}
                        </div>
                        @include('projects.footer')
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="action="projects/{{$project->id}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <select name="status" class="custom-select" onchange="this.form.submit()">
                                <option>Status</option>
                                <option value="0"{{($project->status == 0) ? 'seleted' : ""}}>in process</option>
                                <option value="1"{{($project->status == 1) ? 'seleted' : ""}}>completed</option>
                                <option value="2"{{($project->status == 2) ? 'seleted' : ""}}>cancele</option>
                            </select>
                        </form>
                    </div>
                </div>
           </div>
        </div>
        <div class="col-8">
            @foreach ($project->tasks as $task) 
                <div class="card py-2 px-2 d-flex flex-row justify-content-between  my-2">

                    <div class="{{$task->done ? 'checked muted': 'unchecked'}}">
                        {{ $task->body }}
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="px-3">
                            <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST" class="d-flex" >
                                @csrf
                                @method("PATCH")
                                <input type="checkbox" name="done" class=" form-check-input cursor-pointer " {{$task->done ? 'checked': ''}} onchange="this.form.submit()">
                            </form>
                        </div>
    
                        <div class="d-flex" style="width: 30px;">
                            <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="" class="btn-delete">
                            </form>
                        </div>
                    </div>

                </div>
            @endforeach

            <div class="card">
                    <form action="/projects/{{ $project->id }}/tasks" method="POST" class="d-flex flex-row justify-content-between">
                        @csrf
                            <input type="text" name="body" class="form-control p-2 m-2 border-0" style="background: #fff;" placeholder="add new task">
                            <button type="submit" class="btn btn-primary p-2 m-2"> Add </button>
                    </form>
           </div>
    </section>

@endsection