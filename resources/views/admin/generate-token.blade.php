@extends('layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>
            Generate Token
        </h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.generate-token-ujian') }}" method="POST">
                @csrf
                @foreach ($ujians as $ujian)
                <input type="checkbox" name="ujian_id[]" value="{{ $ujian->id }}" id=""> {{ $ujian->nama }} <br>
                @endforeach
                <button type="submit" class="btn btn-primary">generate</button>
            </form>
            </div>
        </div>
    </div>
</section>   
@endsection