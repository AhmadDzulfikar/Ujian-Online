@extends('layouts.user')

@section('content')
    @foreach ($soals as $soal)
        <p>{{ $soal }}</p>
    @endforeach
@endsection
