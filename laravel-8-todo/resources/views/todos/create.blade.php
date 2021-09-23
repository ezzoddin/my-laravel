@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">

                {{--
                                @include('section.errors')
                --}}

                <div class="card">
                    <div class="card-header">
                        ایجاد تسک جدید
                    </div>

                    <div class="card-body">
                        <form action="{{ route('todos.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">عنوان</label>
                                <input type="text"
                                       class="form-control @error('title')  border border-danger  @enderror " id="title"
                                       name="title" value="{{ old('title') }}">
                                @error('title')
                                <p class="invalid-feedback d-block">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">توضیحات</label>
                                <textarea class="form-control  @error('description')  border border-danger  @enderror  "
                                          id="description" rows="5" name="description">
                                    {{ old('description') }}
                                </textarea>
                                @error('description')
                                <p class="invalid-feedback d-block">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-dark">ارسال</button>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>

@endsection
