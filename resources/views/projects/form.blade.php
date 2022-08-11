
@csrf
<div class="form-group mb-3">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}" placeholder="title of your project" >
    @error('title')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description" placeholder="desc of your project" rows="3">{{$project->description}}</textarea>
    @error('description')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
