<div class="modal fade" tabindex="-1" role="dialog" id="tambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.store.ujian') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="font-weight-bold" for="">Nama</label>
                        <input required type="text" placeholder="Nama Mapel" name="nama" id=""
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="font-weight-bold" for="">Mapel</label>
                        <select name="mapel_id" id="" class="form-control" required>
                            <option value="">-- Pilih Mapel---</option>
                            @foreach ($mapels as $mapel)
                                <option value="{{ $mapel->id }}"> [{{ $mapel->guru->fullname }}] {{ $mapel->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="font-weight-bold" for="">Waktu Mulai</label>
                        <input required type="time" placeholder="Waktu Mulai" name="waktu_mulai" id=""
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="font-weight-bold" for="">Alokasi Waktu</label>
                        <input required type="text" placeholder="Alokasi Waktu" name="alokasi_waktu" id=""
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="font-weight-bold" for="">Tanggal</label>
                        <input required type="date" placeholder="Tanggal Ujian" name="tanggal" id=""
                            class="form-control">
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

@foreach ($ujians as $ujian)
    <div class="modal fade" tabindex="-1" role="dialog" id="edit{{ $ujian->id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Ujian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.update.ujian', $ujian->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="font-weight-bold" for="">Nama</label>
                            <input required type="text" placeholder="Nama Mapel" name="nama" id=""
                                class="form-control" value="{{ $ujian->nama }}">
                        </div>
                        <div class="mb-3">
                            <label class="font-weight-bold" for="">Mapel</label>
                            <select name="mapel_id" id="" class="form-control" required>
                                <option value="">-- Pilih Mapel---</option>
                                @foreach ($mapels as $mapel)
                                    <option value="{{ $mapel->id }}" {{ $mapel->id == $ujian->mapel_id ? 'selected' : '' }}> [{{ $mapel->guru->fullname }}] {{ $mapel->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="mb-3">
                            <label class="font-weight-bold" for="">Waktu Mulai</label>
                            <input required type="time" placeholder="Waktu Mulai" name="waktu_mulai" id=""
                                class="form-control" value="{{ $ujian->waktu_mulai }}">
                        </div>
    
                        <div class="mb-3">
                            <label class="font-weight-bold" for="">Alokasi Waktu</label>
                            <input required type="text" placeholder="Alokasi Waktu" name="alokasi_waktu" id=""
                                class="form-control" value="{{ $ujian->alokasi_waktu }}">
                        </div>
    
                        <div class="mb-3">
                            <label class="font-weight-bold" for="">Tanggal</label>
                            <input required type="date" placeholder="Tanggal Ujian" name="tanggal" id=""
                                class="form-control" value="{{ $ujian->tanggal }}">
                        </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@foreach ($ujians as $ujian)
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus{{ $ujian->id }}">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Ujian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data Ini?
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form action="{{ route('admin.delete.ujian', $ujian->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
