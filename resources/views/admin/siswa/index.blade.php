@extends('layouts.master')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>
                Data Siswa
            </h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswas as $siswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->fullname }}</td>
                                        <td>{{ $siswa->kelas->nama }}</td>
                                        <td>
                                            <a href="" class="btn btn-success" data-toggle="modal"
                                                data-target="#edit{{ $siswa->id }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger" data-toggle="modal"
                                                data-target="#hapus{{ $siswa->id }}">
                                                <i class="fas fa-trash"></i>
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
    @include('admin.siswa.forms')
@endsection
