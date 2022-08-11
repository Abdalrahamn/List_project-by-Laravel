<div class="card-footer mt-2 p-0">
    <div class="d-flex py-0 px-2">

        <div class="d-flex align-items-center">
            <img src="/images/clock.svg" alt="">
            <div class="mx-2 ">
                {{ $project->created_at->diffForHumans() }}
            </div>
        </div>

        <div class="d-flex align-items-center px-1 pr-12">
            <div class="px-1">
                {{ count($project->tasks) }}
            </div>
            <img src="/images/list-check.svg" alt="">
        </div>

        <div class="d-flex align-items-center mr-auto" style="margin-top: 10px;">
            <form action="projects/{{$project->id}}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" value="" class="btn-delete">
            </form>
        </div>
    </div>
</div>
