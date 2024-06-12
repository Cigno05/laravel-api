@extends('layouts.app')

@section('title')

show

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4">{{ $project->title }}</h1>
                    <p class="card-text">Project Type: {{ $project->type ? $project->type->name : '' }}</p>
                    <p class="card-text">Project Description: <br>{{ $project->description }}</p>
                    <p class="card-text">Created: {{ $project->creation_date }}</p>
                    <p class="card-text">Technologies used:</p>
                    
                    <!-- aggiungere un if -->
                    <ul class="list-unstyled d-flex flex-row flex-wrap gap-2 justify-content-center">
                        @foreach ($project->technologies as $technology)
                            <li>{{ ucfirst($technology->name) }}</li>
                        @endforeach
                    </ul>
                    <div class="d-flex justify-content-center gap-3">
                        <p><a href="{{ $project->link }}" class="card-link">My Github <i
                                    class="fa-brands fa-github"></i></a></p>
                        <p><a href="{{ $project->link }}/{{ $project->slug }}" class="card-link">Project Github </a><i
                                class="fa-brands fa-github"></i></a></p>
                    </div>

                    <div class="d-flex gap-2 mb-2 justify-content-center">
                        @auth
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-dark">Edit</a>
                        <form class="form-delete" action="{{ route('projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-dark btn-delete">Delete</button>

                            <div class="my-modal">
                                <div class="modal-container">
                                    <h5 class="text-center me-5">Delete this project?</h5>
                                    <span class="btn btn-dark modal-run mx-5">Yes, Delete</span>
                                    <span class="btn btn-dark modal-stop">No, Comeback</span>
                                </div>
                            </div>

                        </form>
                        @endif
                    </div>
                    <p><a href="{{route('projects.index')}}" class="card-link pb-0">Comeback to my projects</a></p>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection