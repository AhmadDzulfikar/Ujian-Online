@extends('layouts.master')
@section('content')
    @php
        use Carbon\Carbon;

        function count_time($time_start, $minute, $dt)
        {
            $format = $dt->format('Y-m-d');
            $tm = Carbon::createFromFormat('Y-m-d H:i:m', $format . ' ' . $time_start)
                ->addMinutes($minute)
                ->format('H:i:m');

            return $tm;
        }
    @endphp
    <section class="section">
        {{-- <div class="section-header">
            <h1>
                Dashboard
            </h1>
        </div> --}}
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4 class="mb-3">Data Guru</h4>
                        </div>
                        <div class="card-body">
                            {{ $guru }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Data Siswa</h4>
                        </div>
                        <div class="card-body">
                            {{ $siswa }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Data Mapel</h4>
                        </div>
                        <div class="card-body">
                            {{ $mapel }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-square"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Data Kelas</h4>
                        </div>
                        <div class="card-body">
                            {{ $kelas }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Ujian Hari {{ $dt->isoFormat('dddd, D MMMM Y') }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Mapel</th>
                                <th>Waktu Mulai</th>
                                <th>Alokasi Waktu</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ujians as $ujian)
                                <tr>
                                    <td>{{ $ujian->nama }}</td>
                                    <td>{{ $ujian->mapel->nama }}</td>
                                    <td>{{ $ujian->waktu_mulai }}</td>
                                    <td>{{ $ujian->alokasi_waktu }}</td>
                                    {{-- <td>{{ }}</td> --}}
                                    <td>
                                        @if (
                                            $dt->format('H:i:m') >= $ujian->waktu_mulai &&
                                                $dt->format('H:i:m') < count_time($ujian->waktu_mulai, $ujian->alokasi_waktu, $dt))
                                            <span style="color:#09ce09">Berlangsung</span>
                                        @else
                                            <span style="color:red
                                        ">Berakhir</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    {{-- <h1>{{ Auth::guard('admin')->user() }}</h1> --}}
@endsection
