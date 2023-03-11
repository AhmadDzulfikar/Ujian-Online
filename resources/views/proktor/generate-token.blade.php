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
                <form action="{{ route('proktor.generate-token-ujian') }}" method="POST">
                    @csrf
                <button type="submit" class="btn btn-primary">generate</button>
            </form>
            </div>
            <div class="card-footer">
                @foreach ($tokens as $token)
                <p>Token : {{ $token->token }}</p>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
