@extends('layouts.user')

@section('content')
    <style>
        .heading-info {
            font-size: 16px;
            font-weight: 700 !important
        }

        .background-img {
            background-image: url('assets/img/bg.png');
        }
    </style>
    @if (session('message'))
        <div class="alert alert-danger" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="card" id="sample-login">
        <form action="{{ route('siswa.submit-token') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="">
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Mata Pelajaran </p>
                        <select name="mapel_id" id="mapel" class="form-control">
                            <option value="">--Pilih Mapel --</option>
                            @foreach ($mapels as $mapel)
                                <option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Nama Ujian</p>
                        <select name="ujian_id" id="ujian" class="form-control" disabled>
                            <option value="">-- Pilih Ujian --</option>
                            @foreach ($ujians as $ujian)
                                <option value="{{ $ujian->id }}">{{ $ujian->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-start">
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Status Test</p>
                        <input type="text" readonly value="Dimulai" class="form-control" style="pointer-events: none">
                    </div>
                </div>
                <div class="d-flex justify-content-start" style="gap: 5%">
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Tanggal Ujian</p>
                        <input type="date" readonly id="tanggal" class="form-control" style="pointer-events: none">
                    </div>
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Waktu Ujian</p>
                        <input type="time" id="waktu_mulai" readonly class="form-control" style="pointer-events: none">
                    </div>
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Alokasi Ujian</p>
                        <input type="text" readonly id="alokasi" class="form-control" placeholder="Alokasi Waktu"
                            style="pointer-events: none">
                    </div>
                </div>
                <div class="d-flex align-items-center" style="gap: 5%">
                    <div class="form-group">
                        <p class="text-primary mb-0 heading-info">Token Ujian</p>
                        <input type="text" id="token" style="width: 16rem"
                            value="{{ $token->status == 'disabled' ? '' : 'AUTO' }}" name="token" class="form-control"
                            disabled required>
                    </div>
                    <div class="form-group"><button type="submit"class="btn btn-primary">Mulai</button></div>

                </div>
            </div>
        </form>
    </div>
    <script>
        let mapel = document.getElementById('mapel')
        mapel.addEventListener('input', () => {
            let ujian = document.getElementById('ujian')
            let tanggal = document.getElementById('tanggal')
            let waktuMulai = document.getElementById('waktu_mulai')
            let token = document.getElementById('token')

            fetch('/api/get-ujian?mapel_id=' + mapel.value).then(res => res.json()).then(datas => {
                ujian.innerHTML = ''
                ujian.innerHTML += `<option value="" selected disabled>-- Pilih Ujian --</option>`

                datas.forEach(data => {
                    ujian.innerHTML += `<option value='${data.id}'>${data.nama}</option>`
                })
                ujian.removeAttribute('disabled')

                tanggal.value = ''
                waktuMulai.value = ''
                alokasi.value = ''
                ujian.addEventListener('input', () => {
                    datas.forEach(data => {
                        if (data.id == ujian.value) {
                            console.log(data)
                            tanggal.value = data.tanggal
                            waktuMulai.value = data.waktu_mulai
                            alokasi.value = data.alokasi_waktu
                            token.removeAttribute('disabled')
                        }
                    })
                })

            })

            // console.log(dataUjian)
        })
    </script>
@endsection
