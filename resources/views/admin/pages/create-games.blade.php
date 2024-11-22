@extends('admin.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Game</h1>

    {{-- show all error --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('store-game') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card my-2">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="title" class="form-label">Judul <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="eFootball"
                            required>
                    </div>
                    <div class="col">
                        <label for="genre" class="form-label">Genre</label>
                        <input type="text" class="form-control" name="genre" id="genre" placeholder="Sport">
                    </div>
                    <div class="col">
                        <label for="release_date" class="form-label">Release Date</label>
                        <input type="date" class="form-control" name="release_date" id="release_date">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="platform">Platform <span style="color: red">*</span></label>
                        <select class="form-select" id="platform" name="platform" required>
                            <option value="">--pilih platform--</option>
                            <option value="Playstation 3">Playstation 3</option>
                            <option value="Playstation 4">Playstation 4</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="is_active">Top Games</label>
                        <select class="form-select" id="is_active" name="is_active">
                            <option value="1">Inactive</option>
                            <option value="0">Active</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="uploadImg" class="form-label">Upload Image <span style="color: red">*</span></label>
                        <input class="form-control" type="file" name="uploadImg" id="uploadImg" accept="image/*"
                            required onchange="previewImage(event)">
                    </div>
                    <div class="col">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="1"></textarea>
                    </div>
                </div>
                {{-- <div class="row"> --}}
                    <!-- Image Preview -->
                    <img id="preview" style="display: block; width:300px;  margin-top:20px; object-fit:fill;">
                {{-- </div> --}}
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <button class="btn btn-success" type="submit">Submit</button>
                <a class="btn btn-secondary" href="/admin/games">kembali</a>
            </div>
        </div>
    </form>

    <script>
        // image priview create game
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                // preview.style.display = "block";
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.style.display = "none";
        }
    }
    </script>
    @endsection