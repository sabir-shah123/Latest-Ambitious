@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <h5 class="card-header"> Edit Settings </h5>
        <div class="card-body">
            <form method="post" action="{{ route('settings.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="company_name" class="col-form-label">Company Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="company_name" required
                        value="{{ $data->company_name ?? '' }}">
                    @error('company_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="short_des" class="col-form-label">Short Description <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" id="quote" name="short_des">{{ $data->short_des }}</textarea>
                    @error('short_des')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="description" name="description">{{ $data->description }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputPhoto" class="col-form-label">Logo <span class="text-danger">*</span></label>
                    <div class="input-group">
                        {{-- <span class="input-group-btn">
                  <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span> --}}
                        <input id="thumbnail12" class="form-control dropify" type="file" name="logo"
                            data-default-file="{{ asset($data->logo) }}">
                    </div>
                    <div id="holder1" style="margin-top:15px;max-height:100px;"></div>

                    @error('logo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
                    <div class="input-group">
                        {{-- <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span> --}}
                        <input id="thumbnail1 " class="form-control dropify" type="file" name="photo"
                            data-default-file="{{ asset($data->photo) }}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address" class="col-form-label">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="address" required value="{{ $data->address }}">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" required value="{{ $data->email }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone" class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" required value="{{ $data->phone }}">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3 p-4 " style="float: right">
                    <button class="btn btn-success" type="submit">Update Company Settings</button>
                </div>
            </form>
        </div>
    </div>

    {{-- payments --}}
    <div class="card">
        <div class="row mt-4">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <h5 class="card-header"> Stripe Payment Connection </h5>
                    <div class="card-body">
                        @php
                            $pays = ['publishable_key', 'secret_key'];
                        @endphp
                        <form method="post" action="{{ route('setting.save') }}" enctype="multipart/form-data">
                            @csrf
                            @foreach ($pays as $pay)
                                <div class="form-group">
                                    <label for="short_des"
                                        class="col-form-label">{{ ucfirst(str_replace('_', ' ', $pay)) }}
                                        <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="{{ $pay }}"
                                        value="{{ setting($pay, auth()->id(), '') }}"
                                        placeholder="xxxxxxxxxx">
                                    @error($pay)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endforeach
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-right p-4">
                            <input type="submit" class="btn btn-primary " value="Save Keys" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="card">
        <div class="row mt-4">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <h5 class="card-header">Social Links</h5>
                    <div class="card-body">
                        @php
                            $socials = ['facebook_link', 'twitter_link', 'instagram_link', 'linkedin_link', 'youtube_link'];
                        @endphp
                        <form method="post" action="{{ route('setting.save') }}" enctype="multipart/form-data">
                            @csrf
                            @foreach ($socials as $social)
                                <div class="form-group">
                                    <label for="short_des"
                                        class="col-form-label">{{ ucfirst(str_replace('_', ' ', $social)) }}
                                        <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="{{ $social }}"
                                        value="{{ setting($social, auth()->id(), '') }}"
                                        placeholder="https://{{ $social }}.com/">
                                    @error($social)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endforeach
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-right p-4">
                            <input type="submit" class="btn btn-primary " value="Save Setting" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="row mt-4">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <h5 class="card-header"> General Setting </h5>
                    <div class="card-body">
                        @php
                            $g_settings = ['currency_code', 'currency_symbol'];
                        @endphp
                        <form method="post" action="{{ route('setting.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @foreach ($g_settings as $set)
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="short_des"
                                                class="col-form-label">{{ ucfirst(str_replace('_', ' ', $set)) }}
                                                <span class="text-danger"></span></label>
                                            <input type="text" class="form-control" name="{{ $set }}"
                                                value="{{ setting($set, auth()->id(), '') }}" placeholder="Enter your "
                                                {{ ucfirst(str_replace('_', ' ', $set)) }}>
                                            @error($set)
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-right p-4">
                            <input type="submit" class="btn btn-primary " value="Save Setting" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $('#lfm').filemanager('image');
        $('#lfm1').filemanager('image');
        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 150
            });
        });

        $(document).ready(function() {
            $('#quote').summernote({
                placeholder: "Write short Quote.....",
                tabsize: 2,
                height: 100
            });
        });
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Write detail description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush
