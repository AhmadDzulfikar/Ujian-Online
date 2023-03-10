@extends('layouts.user')

@section('content')
    <center>
        <div class="card">
            <div class="card-body">
                <h4>Terimakasih Sudah Mengerjakan Ujian</h4>
            </div>


            <a class="btn btn-success" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();
        ">
                {{ __('Logout') }}
            </a>

        </div>
    </center>



    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@endsection
