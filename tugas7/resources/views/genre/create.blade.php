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
            <h2>Tambah List Genre Game</h2>
            <p>Silahkan masukkan genre game!</p>
            @if (session()->has('message'))
            <div class="my-3">
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            </div>
            @endif
            <form action="{{route('genre.store')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="kode" class="form-label">Kode</label>
                    <input type="text" name="kode" id="kode" placeholder="Masukkan Kode Genre" class="form-control" value="{{old('kode')}}">
                    @error('kode')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="genre" class="form-label">Genre</label>
                    <input type="text" name="genre" id="genre" placeholder="Masukkan genre game" class="form-control" value="{{old('genre')}}">
                    @error('genre')
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