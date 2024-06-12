@extends('layouts.app')

@section('pageTitle')

create-tech

@endsection

@section('content')

<section class="edit-page">
    <div class="container w-50 mt-5">
        <h1>Create a new project technology!</h1>


        <form action="{{ route('technologies.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input technology="text" class="form-control" id="name" name="name" placeholder="New name"
                    value="{{ old('name') }}">
            </div>

            


            <button technology="submit" class="btn btn-primary">Create</button>
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