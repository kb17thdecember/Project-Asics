@extends('admin.layout')
@section('append-du-lieu-view')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">News</h1>

<!-- Register form -->
<div class="card shadow mb-4">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5 container">
                    <div class="text-center">
                        @php
                            $process = "Edit";
                            $currentUri = Route::current()->uri();
                            if($currentUri == "admin/news/create")
                                $process = "Create";
                        @endphp
                        <h1 class="h4 text-gray-900 mb-4">{{ $process }} news</h1>
                    </div>
                    <form method="post" action="{{ $action }}" enctype="multipart/form-data">
                        @csrf
                        <!-- name -->
                        <div class="form-group row">
                            <label class="col-2" for="name">Name</label>
                            <input type="text" class="form-control col-10" id="name" name="name" value="{{ isset($record->name)?$record->name:'' }}" required>
                        </div>
                        <br>

                        <!-- Hot -->
                        <div class="form-group row">
                            <div class="col-2"></div>
                            <div class="col-10" style="padding-left: 0;">
                                <input type="checkbox" id="hot" name="hot" @if(isset($record->hot) && $record->hot == 1) checked @endif>
                                <label class="form-check-label" for="hot">Hot</label>
                            </div>
                        </div>
                        <br>

                        <!-- Photo -->
                        <div class="form-group row">
                            <label class="col-2" for="photo">Photo</label>
                            <input style="padding-left: 0;" type="file" class="form-control-file col-10" id="photo" name="photo">
                        </div>
                        <br>

                        <!-- Description -->
                        <div class="form-group row">
                            <div class="col-2" for="description">Description</div>
                            <div class="col-10" style="padding: 0;">
                                <textarea class="form-control" id="description" name="description">{{ isset($record->description)?$record->description:'' }}</textarea>
                                <script>
                                    ClassicEditor
                                        .create( document.querySelector( '#description' ) )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                </script>    
                            </div>
                        </div>
                        <br>

                        <!-- Content -->
                        <div class="form-group row">
                            <div class="col-2" for="contentt">Content</div>
                            <div class="col-10" style="padding: 0;">
                                <textarea class="form-control" id="contentt" name="content">{{ isset($record->content)?$record->content:'' }}</textarea>
                                <script>
                                    ClassicEditor
                                        .create( document.querySelector( '#contentt' ) )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                </script>
                            </div>
                        </div>
                        <br>

                        <!-- Submit -->
                        <div class="form-group row justify-content-center">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection