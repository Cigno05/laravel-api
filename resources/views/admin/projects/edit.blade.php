@extends('layouts.app')

@section('pageTitle')

edit-pro

@endsection

@section('content')

<section class="edit-page">
    <div class="container w-50 mt-5">
        <h1>Edit your project!</h1>


        <form action="{{ route('projects.update', $project) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $project->title) }}">
            </div>

            <div class="mb-3">
                <label for="type_id">Project Type</label>
                <select class="form-control" name="type_id" id="type_id">
                    <option value="">-- Select Type --</option>
                    @foreach ($types as $type)                        
                        <option @selected($type->id == old('type_id', $project->type_id)) value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex gap-2">

                @foreach ($technologies as $technology)
                    <div class="form-check ">
                        <input @checked(in_array($technology->id, old('technologies', $project->technologies->pluck('id')->all()))) name="technologies[]"
                            class="form-check-input" type="checkbox" value="{{$technology->id}}"
                            id="technology-{{$technology->id}}">
                        <label class="form-check-label" for="technology-{{$technology->id}}">
                            {{$technology->name}}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" row="10" class="form-control" id="description"
                    name="description">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="creation_date" class="form-label">Creation Date</label>
                <input type="date" class="form-control" id="creation_date" name="creation_date"
                    value="{{ old('creation_date', $project->creation_date) }}">
            </div>

            <div class="d-flex gap-2">

            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>


    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

</section>


@endsection