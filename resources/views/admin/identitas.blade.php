@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>
                Identitas Applikasi
            </h1>
        </div>

        <div class="section-body">

            <div class="mb-3">
                <center>
                    <img src="{{ $identitas->foto }}" class="rounded-circle" style="width: 150px;" alt="Avatar" />

                </center>

            </div>

            <form class="form form-vertical" action="{{ url('admin/identitas/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Identitas Aplikasi</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table bordered">
                            <tr>
                                <th>Foto</th>
                                <td>
                                    <input type="file" class="form-control" name="foto" />
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Applikasi</th>
                                <td>
                                    <input type="text" class="form-control" name="nama"
                                        value="{{ $identitas->nama }}" />
                                </td>
                            </tr>

                            <tr>
                                <th>Alamat Lengkap</th>
                                <td>
                                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{ $identitas->alamat }}</textarea>
                                </td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ $identitas->email }}" />
                                </td>
                            </tr>

                            <tr>
                                <th>No Telp</th>
                                <td>
                                    <input type="number" class="form-control" name="nomor"
                                        value="{{ $identitas->nomor }}" />
                                </td>
                            </tr>

                        </table>

                        <div class="col-12 d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
        </div>
    </div>
</section>
    @endsection
