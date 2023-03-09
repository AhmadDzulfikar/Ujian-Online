@extends('layouts.master')
@section('content')
    

    <h1>{{ Auth::guard('guru')->user() }}</h1>
@endsection
