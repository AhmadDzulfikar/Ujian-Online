<div class="modal fade" tabindex="-1" role="dialog" id="tambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.store.mapel') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="font-weight-bold" for="">Nama</label>
                        <input type="text" placeholder="Nama Mapel" name="nama" id=""
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="font-weight-bold" for="">Guru</label>
                        <select name="guru_id" id="" class="form-control">
                            <option value="">-- Pilih Guru---</option>
                            @foreach ($gurus as $guru)
                                <option value="{{ $guru->id }}"> [{{ $guru->nip }}] {{ $guru->fullname }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

@foreach ($mapels as $mapel)
    <div class="modal fade" tabindex="-1" role="dialog" id="edit{{ $mapel->id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Mapel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.update.mapel', $mapel->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="font-weight-bold" for="">Nama</label>
                            <input type="text" placeholder="Nama Mapel" name="nama" id=""
                                class="form-control" value="{{ $mapel->nama }}">
                        </div>
                        <div class="mb-3">
                            <label class="font-weight-bold" for="">Guru</label>
                            <select name="guru_id" id="" class="form-control">
                                <option value="">-- Pilih Guru---</option>
                                @foreach ($gurus as $guru)
                                    <option value="{{ $guru->id }}"
                                        {{ $mapel->guru_id === $guru->id ? 'selected' : '' }}> [{{ $guru->nip }}]
                                        {{ $guru->fullname }}
                                    </option>
                                @endforeach
                            </select>
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

@foreach ($mapels as $mapel)
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus{{ $mapel->id }}">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Mapel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data Ini?
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form action="{{ route('admin.delete.mapel', $mapel->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
