@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('topics.store') }}" method="post">@csrf
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Topic Name</label>
                            <input type="text" class="form-control" name="name" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <form method="post">
                                <textarea id="tinymce-mytextarea" name="description"></textarea>
                            </form>
                        </div>
                        <button type="submit" class="btn btn-primary btn-3">
                            <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Tambah Topic
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('page-header')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Knowlede Base
                    </div>
                    <h2 class="page-title">
                        Tambah Topic
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('libs')
    <script src="{{ asset('dist/libs/tinymce/tinymce.min.js?1740838748') }}" defer></script>
@endsection
@section('bottom-script')
    <script defer>
        document.addEventListener("DOMContentLoaded", function () {
            let options = {
                selector: "#tinymce-mytextarea",
                height: 300,
                menubar: false,
                statusbar: false,
                license_key: "gpl",
                plugins: [
                    "advlist",
                    "autolink",
                    "lists",
                    "link",
                    "image",
                    "charmap",
                    "preview",
                    "anchor",
                    "searchreplace",
                    "visualblocks",
                    "code",
                    "fullscreen",
                    "insertdatetime",
                    "media",
                    "table",
                    "code",
                    "help",
                    "wordcount",
                ],
                toolbar:
                    "undo redo | formatselect | " +
                    "bold italic backcolor | alignleft aligncenter " +
                    "alignright alignjustify | bullist numlist outdent indent | " +
                    "removeformat",
                content_style:
                    "body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }",
            };
            if (localStorage.getItem("tablerTheme") === "dark") {
                options.skin = "oxide-dark";
                options.content_css = "dark";
            }
            tinyMCE.init(options);
        });
    </script>
@endsection
