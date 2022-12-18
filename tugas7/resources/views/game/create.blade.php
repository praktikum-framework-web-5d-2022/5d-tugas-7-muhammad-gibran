@extends('Layouts.app')
@section('title','Data Game')

@section('content')
<style>
    .bg-blue {
        background-color: blue;
        color: white;
    }

    .bt-blue {
        background-color: blue;
        color: white;
    }
</style>
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col-md-12">
            <h2>Tambah List Game</h2>
            <p>Silahkan masukkan data game anda!</p>
            @if (session()->has('message'))
            <div class="my-3">
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            </div>
            @endif
            <form action="{{route('game.store')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="developer" class="form-label">Developer</label>
                    <input type="text" name="developer" id="developer" placeholder="Masukkan Nama Developer" class="form-control" value="{{old('developer')}}">
                    @error('dev')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="game" class="form-label">Game</label>
                    <input type="text" name="game" id="game" placeholder="Masukkan Nama game" class="form-control" value="{{old('game')}}">
                    @error('game')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-info"><b class="text-white">Tambah</b></button>
                <p></p>
            </form>
        </div>
    </div>
</div>
@endsection