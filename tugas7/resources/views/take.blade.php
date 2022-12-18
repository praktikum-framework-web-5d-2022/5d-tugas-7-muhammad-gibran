@extends('Layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-4">
            <div class="card-body">
                <h3 class"fw-bold">Ambil jadwal</h3>
                <form action="{{route('games.takeStore',['game'=>$game->id])}}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="genre_id" class="form-label">Pilih genre</label>
                        <div class="form-group">
                            @foreach ($genres as $item)
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="genre_id[]" id="{{$item->id}}" class="form-check-input" value="{{$item->id}}">
                                <label for="{{$item->id}}" class="form-check-label">{{$item->genre}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">Ambil</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection