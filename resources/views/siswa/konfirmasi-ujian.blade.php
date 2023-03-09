@extends('layouts.user')

@section('content')
    {{-- <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form> --}}
    {{-- {{ Auth::guard('siswa')->user() }} --}}

    <style>
        .heading-info {
            font-size: 16px;
            font-weight: 700 !important
        }
    </style>
    <div class="card" id="sample-login">
        <form>
            {{-- <div class="card-header">
                <h4>Login</h4>
            </div> --}}
            <div class="card-body">
                <div class="">
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Nama Ujian</p>
                        {{-- <p>qwdqdqfqfqwfqfqfq</p> --}}
                        <input type="text" style="width: 50%" readonly value="PAT Agama" class="form-control">
                    </div>
                </div>
                <div class="d-flex justify-content-start" style="gap: 5%">
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Status Test</p>
                        <input type="text" readonly value="Dimulai" class="form-control">
                    </div>
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Sub Test</p>
                        <input type="text" readonly value="Matematika" class="form-control">
                    </div>
                </div>
                <div class="d-flex justify-content-start" style="gap: 5%">
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Tanggal Ujian</p>
                        <input type="date" readonly value="2023-06-23" class="form-control">
                    </div>
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Waktu Ujian</p>
                        <input type="time" readonly value="07:00" class="form-control">
                    </div>
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Alokasi Ujian</p>
                        <input type="time" readonly value="09:00" class="form-control">
                    </div>
                </div>
                <div class="d-flex align-items-center" style="gap: 5%">
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Token Ujian</p>
                        <input type="text" style="width: 16rem" value="" class="form-control">
                    </div>
                    <div class="form-group"><button type="submit"
                            onclick="$.cardProgress('#sample-login', {dismiss: true,onDismiss: function() {alert('Dismissed :)')}});return false;"
                            class="btn btn-primary">Mulai</button></div>
                </div>
            </div>
        </form>
    </div>
@endsection
