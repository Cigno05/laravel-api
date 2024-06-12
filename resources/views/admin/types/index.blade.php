@extends('layouts.app')
@section('title')
Index-typ
@endsection

@section('content')


<div class="container">
    <div class="row justify-content-center">
        @foreach ($types as $type)
        <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4 card-group">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">{{ ucfirst($type->name) }}</h1>
                    
                    <div class="button-container gap-2 d-flex justify-content-center">
                        @auth
                        <a href="{{ route('types.edit', $type) }}" class="btn btn-dark">Edit</a>
                        <form class="form-delete" action="{{ route('types.destroy', $type) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-dark btn-delete">Delete</button>

                            <div class="my-modal">
                                <div class="modal-container d-flex flex-column align-items-baseline gap-1">
                                    <h5 class="text-center me-5">Delete this type?</h5>
                                    <span class="btn btn-dark modal-run mx-5">Yes, Delete</span>
                                    <span class="btn btn-dark modal-stop">No, Comeback</span>
                                </div>
                            </div>

                        </form>
                        @endif
                    </div>

                </div>
            </div>

        </div>

        @endforeach

    </div>
</div>


@endsection