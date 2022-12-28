@extends('Layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Developer</th>
                                <th>Game</th>
                                <th>Genre</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="d-flex justify-content-between">
                                <h2>Data Game</h2>
                                <div>
                                    <a href="{{route('genre.create')}}" class="btn bg-success"><b class="text-white">Tambah Genre</b></a>
                                    <a href="{{route('game.create')}}" class="btn bg-info"><b class="text-white">Tambah Game</b></a>
                                </div>
                            </div>
                            @foreach ($games as $game)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$game->developer}}</td>
                                <td>{{$game->game}}</td>
                                <td>@forelse ($game->genres as $item)
                                    <ul>
                                        <li>{{$item->genre}}</li>
                                    </ul>

                                    @empty
                                    Tidak Memiliki Genre

                                    @endforelse
                                </td>
                                <td align="center">
                                    <div class="d-flex">
                                        <a href="{{route('games.take',['game'=>$game->id])}}" class="btn btn-info">Tentukan Genre</a>
                                        <a href="{{route('game.edit', $game->id)}}" class="btn btn-warning ms-1">Edit</a>
                                        <form action="{{route('game.destroy', $game->id)}}" method="post" class="ms-1">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection