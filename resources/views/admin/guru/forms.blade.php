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
                <form action="{{ route('admin.store.guru') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="font-weight-bold" for="">NIP</label>
                        <input type="text" placeholder="NIP" name="nip" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="font-weight-bold" for="">Nama Lengkap</label>
                        <input type="text" placeholder="Nama Lengkap" name="fullname" id=""
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="font-weight-bold" for="">Nama Panggilan</label>
                        <input type="text" placeholder="Nama Panggilan" name="username" id=""
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="font-weight-bold" for="">Email</label>
                        <input type="text" placeholder="Email" name="email" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="font-weight-bold" for="">Password</label>
                        <input type="password" placeholder="Password" name="password" id=""
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

@foreach ($gurus as $guru)
    <div class="modal fade" tabindex="-1" role="dialog" id="edit{{ $guru->id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.update.guru', $guru->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="font-weight-bold" for="">NIP</label>
                            <input value="{{ $guru->nip }}" type="text" placeholder="NIP" name="nip"
                                id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="font-weight-bold" for="">Nama Lengkap</label>
                            <input value="{{ $guru->fullname }}" type="text" placeholder="Nama Lengkap"
                                name="fullname" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="font-weight-bold" for="">Nama Panggilan</label>
                            <input value="{{ $guru->username }}" type="text" placeholder="Nama Panggilan"
                                name="username" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="font-weight-bold" for="">Email</label>
                            <input value="{{ $guru->email }}" type="text" placeholder="Email" name="email"
                                id="" class="form-control">
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

@foreach ($gurus as $guru)
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus{{ $guru->id }}">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data Ini?
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form action="{{ route('admin.delete.guru', $guru->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
