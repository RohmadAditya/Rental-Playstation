@extends('admin.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Games</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a class="btn btn-primary my-2" href="games-create">tambah data</a>

    <div class="card">
        {{-- <div class="card-header">
            Games
        </div> --}}
        <div class="card-body">
            <table id="myTable" class="display compact">
                <thead>
                    <tr>
                        {{-- <th>#</th> --}}
                        <th>Judul Game</th>
                        <th>Platform</th>
                        <th>Top Games</th>
                        <th>Genre</th>
                        {{-- <th>Description</th> --}}
                        {{-- <th>Release Date</th> --}}
                        <th>Cover Image</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                    <tr>
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ $game->title }}</td>
                        <td>{{ $game->platform }}</td>
                        <td>{{ ($game->is_topgames == 0) ? 'Active' : 'Inactive' }}</td>
                        <td>{{ $game->genre }}</td>
                        {{-- <td>{{ $game->description }}</td> --}}
                        {{-- <td>{{ $game->release_date }}</td> --}}
                        <td><img src="{{ asset('storage/' . $game->img_url) }}" alt="image" style="width: 70px;"></td>
                        <td>
                            <!-- Default dropstart button -->
                            <div class="btn-group dropstart">
                                <button type="button" class="btn btn-warning btn-sm dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Opsi
                                </button>
                                <ul class="dropdown-menu">
                                    {{-- <li><a class="dropdown-item" href="#">Detail</a></li> --}}
                                    <li><a class="dropdown-item text-primary" href="#">Update</a></li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                    <!-- Tambahkan baris lainnya di sini -->
                </tbody>
            </table>
        </div>
    </div>


</div>
@endsection