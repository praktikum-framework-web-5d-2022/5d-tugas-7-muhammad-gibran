@extends('Layouts.app')
@section('title','Data Game')

@section('content')
<style>
    .bg-blue {
        background-color: blue;
        color: white;
    }
</style>
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Data Game</h2>
            <p>Masukkan data game dengan lengkap</p>
            @if (session()->has('message'))
            <div class="my-3">
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            </div>
            @endif
            <form action="{{route('game.update', ['game' => $game->id])}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="mb-4">
                    <label for="developer" class="form-label">Developer</label>
                    <input type="text" name="developer" id="developer" placeholder="Masukkan Nama Developer" class="form-control" value="{{old('developer')?? $game->developer}}">
                    @error('developer')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="game" class="form-label">Game</label>
                    <input type="text" name="game" id="game" placeholder="Masukkan Nama Game" class="form-control" value="{{old('game')?? $game->game}}">
                    @error('game')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn bg-info"><b class="text-white">Simpan</b></button>
                <p></p>
            </form>
        </div>
    </div>
</div>
@endsection