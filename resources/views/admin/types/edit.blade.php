@extends('layouts.app')

@section('pageTitle')

edit.typ

@endsection

@section('content')

    <section class="edit-page">
        <div class="container w-50 mt-5">
            <h1>Edit your type project!</h1>

                
                <form action="{{ route('types.update', $type) }}" method="POST">
                    
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="New name"
                        value="{{ old('name', $type->name) }}">
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