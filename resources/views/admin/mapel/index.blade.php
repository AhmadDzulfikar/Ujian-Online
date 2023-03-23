@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>
                Data Mapel
            </h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <div class="col-12 col-md-8">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                            <i class="fas fa-plus"></i> Tambah Mapel
                        </button>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-end">
                        <div class="row d-flex justify-content-between">
                            <div class="col-12 col-md-6 pr-0">
                                <button class="btn btn-success">
                                    <i class="fas fa-file-excel"></i> Export Excel
                                </button>
                            </div>
                            <div class="col-12 col-md-6 pr-0">
                                <button class="btn btn-danger">
                                    <i class="fas fa-file-pdf"></i> Export Excel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No.
                                    </th>
                                    <th>Nama</th>
                                    <th>Guru</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mapels as $mapel)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $mapel->nama }}</td>
                                        <td>{{ $mapel->guru->fullname }}</td>
                                        <td>
                                            <a href="" class="btn btn-success" data-toggle="modal"
                                                data-target="#edit{{ $mapel->id }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger" data-toggle="modal"
                                                data-target="#hapus{{ $mapel->id }}">
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
    @include('admin.mapel.forms')
@endsection
