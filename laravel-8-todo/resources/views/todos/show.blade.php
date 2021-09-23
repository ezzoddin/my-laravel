@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="text-center mt-5 mb-3 text-break">{{ $todo->title }}</h4>
                <div class="card">

                    <div class="card-header">
                        توضیحات
                    </div>

                    <div class="card-body">
                        {{ $todo->description }}
                    </div>

                    <hr>

                    <div class="me-3 mb-3">
                        <a class="btn btn-sm btn-outline-dark" href="{{route('todos.edit', ['todo' => $todo->id])}}">
                            ویرایش
                        </a>
                    </div>


                </div>


            </div>
        </div>
    </div>

@endsection
