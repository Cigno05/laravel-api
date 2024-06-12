@extends('layouts.app')

@section('pageTitle')

create-typ

@endsection

@section('content')

<section class="edit-page">
    <div class="container w-50 mt-5">
        <h1>Create a new project type!</h1>


        <form action="{{ route('types.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="New name"
                    value="{{ old('name') }}">
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