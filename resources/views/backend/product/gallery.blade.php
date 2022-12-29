@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow-2">
        <div class="card-header bg-info">
            <h3 class="text-white text-center"><b>Add Gallery Images</b></h3>
        </div>
        <div class="card-body">

            <form method="post" action="{{ route('product.gallery.save') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="card">
                    <div class="header">
                        <h2>SELECT GALLERY IMAGES</h2>
                    </div>
                    <div class="body">
                        <input id="input-id" type="file" name="gallaryimage[]" class="file check-size"
                            data-preview-file-type="text" multiple required>
                    </div>
                </div>
                <br><br>
                <button type="submit" class="btn btn-primary shadow-2" style="float: right; margin-top: -30px">Add
                    Images</button>
            </form><br><br><br><br>
        </div>
    </div>

    <div class="card shadow-2">
        <div class="card-header bg-info">
            <h3 class="text-white text-center"><b>Existing Images</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                @if(count($product->images) > 0)
                @foreach ($product->images as $gi)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="body">
                                <div class="image-area">
                                    <img src="{{ asset($gi->image) }}" alt="Preview">
                                    <a class="remove-image" href="{{ route('product.gallery.delete', $gi->id) }}"
                                        style="display: inline;">&#215;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
                <div class="col-md-12 text-right">
                    <a href="{{ route('product.gallery.delete.all', $product->id) }}" class="btn btn-danger">Delete All
                        Gallery Images</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />

    <style>
        .image-area {
            position: relative;
            width: 100%;
            background: #333;
        }

        .image-area img {
            max-width: 100%;
            height: auto;
        }

        .remove-image {
            display: none;
            position: absolute;
            top: -10px;
            right: -10px;
            border-radius: 10em;
            padding: 2px 6px 3px;
            text-decoration: none;
            font: 700 21px/20px sans-serif;
            background: #555;
            border: 3px solid #fff;
            color: #FFF;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5), inset 0 2px 4px rgba(0, 0, 0, 0.3);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
            -webkit-transition: background 0.5s;
            transition: background 0.5s;
        }

        .remove-image:hover {
            background: #E54E4E;
            padding: 3px 7px 5px;
            top: -11px;
            right: -11px;
        }

        .remove-image:active {
            background: #E54E4E;
            top: -10px;
            right: -11px;
        }
    </style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>

    <script>
        $(function() {
            $('.fileinput-upload-button').hide();
            $("#input-pd").fileinput({
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-block",
                fileType: "any",
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false,
                initialPreviewAsData: true,
                initialPreview: [
                    "{{ asset($product->image) }}"
                ],
                initialPreviewConfig: [{
                    caption: "{{ asset($product->image) }}",
                    size: {{ filesize(public_path($product->photo)) }},
                    width: "120px",
                    url: "{!! route('product.gallery.delete') !!}",
                    key: 1
                }],
                deleteUrl: "{!! route('product.gallery.delete') !!}",
                overwriteInitial: false,
                maxFileSize: 3048,
                maxFilesNum: 10,
                slugCallback: function(filename) {
                    return filename.replace('(', '_').replace(']', '_');
                }
            });
        });

        function showMyImage(fileInput) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    continue;
                }
                var img = document.getElementById("thumbnail");
                img.file = file;
                var reader = new FileReader();
                reader.onload = (function(aImg) {
                    return function(e) {
                        aImg.src = e.target.result;
                    };
                })(img);
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
