{{-- reset login --}}
@foreach ($peserta as $p)
    <div class="modal fade" tabindex="-1" role="dialog" id="reset{{ $p->id }}">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset Login Peserta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin mereset user Ini?
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-danger">Ya</button>

                </div>
            </div>
        </div>
    </div>
@endforeach


{{-- paksa berhenti ujian --}}
@foreach ($peserta as $p)
    <div class="modal fade" tabindex="-1" role="dialog" id="paksa{{ $p->id }}">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Paksa Berhenti Ujian Peserta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin memberhentikan ujian user Ini?
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-danger">Ya</button>

                </div>
            </div>
        </div>
    </div>
@endforeach
