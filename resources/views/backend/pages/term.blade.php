@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <h5 class="card-header"> Terms And conditions </h5>
        <div class="card-body">
            <form method="post" action="{{ route('setting.save') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="term_and_condition" class="col-form-label"> Write Your Terms And conditions  <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="term_and_condition" name="term_and_condition">{{ setting('term_and_condition') ?? ''}}</textarea>
                </div>

                <div class="form-group mb-3 p-4 " style="float: right">
                    <button class="btn btn-success" type="submit">Update  Terms And conditions</button>
                </div>
            </form>
        </div>
    </div>

 
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#term_and_condition').summernote({
                placeholder: "Write  your terms and conditions .....",
                tabsize: 2,
                height: 450
            });
        });
    </script>
@endpush
