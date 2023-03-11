@extends('layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>
            Status Peserta Ujian
        </h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    id
                                </th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peserta as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->nis }}</td>
                                    <td>{{ $p->fullname }}</td>
                                    <td>{{ $p->kelas->nama }}</td>
                                    <td></td>
                                    <td>
                                        <a href="" class="btn btn-success" data-toggle="modal"
                                            data-target="#reset{{ $p->id }}">
                                            reset login
                                        </a>
                                        <a href="" class="btn btn-danger" data-toggle="modal"
                                            data-target="#paksa{{ $p->id }}">
                                            paksa berhenti
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@include('proktor/status-peserta/action')
@endsection
