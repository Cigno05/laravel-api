@extends('layouts.app')
@section('title')
Index-pro
@endsection

@section('content')


<div class="container">
    <div class="row">
        <form action="{{route('projects.index')}}" method="GET" class="type-form d-flex flex-column align-items-center">

            <div class="form-group mb-3">
                <label class="form-label" for="type_id">Type of Project</label>
                <select class="form-control" name="type_id" id="type_id">
                    <option value="">Select Type...</option>
                    @foreach ($types as $type)                 
                        <option @selected($type->id == old('type_id')) value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="button-form mb-3">
                <button class="btn btn-dark me-2">Filter</button>
                <a href="{{route('projects.index')}}" class="btn btn-dark">Reset</a>
            </div>

        </form>
    </div>
    <div class="row">
        @foreach ($projects as $project)
            <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4 card-group">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title mb-4">{{ $project->title }}</h1>
                        <p class="card-text">Created: {{ $project->creation_date }}</p>
                        <p class="card-text">Project Type: {{ $project->type ? $project->type->name : '' }}</p>
                        <p class="card-text">Technologies used:</p>

                        <ul class="list-unstyled d-flex flex-row flex-wrap gap-2 justify-content-center">
                            @foreach ($project->technologies as $technology)
                                <li>
                                    {{ ucfirst($technology->name) }}
                                </li>
                            @endforeach
                        </ul>
                        <p><a href="{{ route('projects.show', $project) }}" class="card-link">Info <i
                                    class="fa-solid fa-circle-info"></i></a></p>
                        <div class="d-flex justify-content-center gap-3">
                            <p><a href="{{ $project->link }}" class="card-link">My Github <i
                                        class="fa-brands fa-github"></i></a></p>
                            <p><a href="{{ $project->link }}/{{ $project->slug }}" class="card-link">Project Github </a><i
                                    class="fa-brands fa-github"></i></a></p>
                        </div>

                    </div>
                </div>

            </div>

        @endforeach
    </div>
</div>


@endsection