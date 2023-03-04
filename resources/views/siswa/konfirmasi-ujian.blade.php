@extends('layouts.app')

@section('content')
    preview
    {{ Auth::guard('siswa')->user() }}
@endsection
