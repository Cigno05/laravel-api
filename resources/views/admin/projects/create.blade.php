@extends('layouts.app')

@section('pageTitle')

create-pro

@endsection

@section('content')

    <section>
        <div class="container w-50 mt-5">
            <h1>Add a new project!</h1>

            <form action="{{ route('projects.store') }}" method="POST">

                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Project Title"
                        value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="type_id">Project Type</label>
                    <select class="form-control" name="type_id" id="type_id">
                        <option value="">-- Select Type --</option>
                        @foreach ($types as $type)                        
                            <option @selected($type->id == old('type_id')) value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3 ">
                <label class="form-label fw-bold" for="technology_id">Select Project technologies</label>
                
                <div class="d-flex gap-2">

                    @foreach ($technologies as $technology)
                        <div class="form-check ">
                            <input @checked( in_array($technology->id, old('technologies', []))) name="technologies[]" class="form-check-input" type="checkbox" value="{{$technology->id}}" id="technology-{{$technology->id}}">
                            <label class="form-check-label" for="technology-{{$technology->id}}">
                                {{$technology->name}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" row="10" class="form-control" id="description" name="description"
                        placeholder="Project description" value="{{ old('description') }}"></textarea>
                </div>

                <div class="mb-3">
                    <label for="creation_date" class="form-label">Creation Date</label>
                    <input type="date" class="form-control" id="creation_date" name="creation_date">
                </div>




                <button type="submit" class="btn btn-primary">Create</button>
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