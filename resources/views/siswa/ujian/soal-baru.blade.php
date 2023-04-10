@extends('layouts.user')

@section('content')
    <style>
        input[type="radio"] {
            -ms-transform: scale(1.5);
            /* IE 9 */
            -webkit-transform: scale(1.5);
            /* Chrome, Safari, Opera */
            transform: scale(1.5);
        }

        input[type="radio"] #ragu-ragu {
            color: yellow
        }
    </style>
    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <p class="btn btn-outline-secondary" id="countdown"></p>
                <p class="btn btn-primary" data-toggle="modal" data-target="#nomor-soal"><i class="fas fa-th-large"></i> Nomor
                    Soal</p>
            </div>
        </div>
        <div class="card-body">
            <form action="" id="myForm">
                <input type="hidden" id="siswa_id" value="{{ Auth::guard('siswa')->user()->id }}">
                <input type="hidden" id="ujian_id" value="{{ $get_ujian->id }}">
                @foreach ($soals as $soal)
                    <div class="soal-soal" style="display: none" id="soal-no-{{ $loop->iteration }}">
                        <div id="{{ $soal->id }}" class="form-group">
                            <label class="d-block">
                                <p>{{ $loop->iteration }} . {{ $soal->text }}</p>
                            </label>
                            @if ($soal->tipe == 'pg')
                                @foreach ($soal->opsis->shuffle() as $opsi)
                                    <div class="form-check bg-light mb-2" style="border-radius: 5px">
                                        <input class="form-check-input mt-3 ml-1"
                                            onclick="saveAnswerRadioButton('{{ $soal->id }}' ,'{{ $opsi->opsi }}')"
                                            type="radio" value="{{ $opsi->opsi }}" name="answer[{{ $soal->id }}][]"
                                            id="radio-{{ $opsi->id }}"
                                            {{ $soal->checked->jawaban == $opsi->opsi ? 'checked' : '' }}>
                                        <label class="form-check-label pt-3 pb-3 ml-4">
                                            {{ $opsi->opsi }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                            @if ($soal->tipe == 'isian_singkat')
                                <input type="text" class="form-control"
                                    onkeyup="jawaban_isian_singkat({{ $soal->id }})" id="isian_singkat"
                                    name="answer[{{ $soal->id }}][]">
                            @endif

                            @if ($soal->tipe == 'uraian')
                                <textarea cols="30" rows="20" id="uraian" onkeyup="uraians({{ $soal->id }})"
                                    name="answer[{{ $soal->id }}][]" class="form-control"></textarea>
                            @endif
                        </div>
                    </div>
                @endforeach
            </form>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <button class="btn btn-outline-danger" onclick="previousSoal()"> <i class="fa fa-angle-left"></i>
                    Sebelumnya</button>
                <button class="btn btn-outline-warning"><input type="checkbox" id="ragu-ragu"> Ragu Ragu</button>
                <button class="btn btn-outline-success" onclick="nextSoal()">Selanjutnya <i
                        class="fa fa-angle-right"></i></button>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="nomor-soal">
        <div class="modal-dialog  w-10" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nomor Soal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row row-cols-5">
                        @foreach ($soals as $nomor_soal)
                            <div class="col">
                                <button
                                    class="btn btn-outline-primary"onclick="lihatSoal({{ $loop->iteration }})">{{ $loop->iteration }}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Inisialisasi variabel untuk jawaban dan waktu countdown
        let ujian = document.getElementById('ujian_id').value;
        let siswa = document.getElementById('siswa_id').value;
        let isian_singkat = document.getElementById('isian_singkat');
        let uraian = document.getElementById('uraian');

        var answers = {};
        var alokasi_waktu = `{{ $get_ujian->alokasi_waktu }}` * 3600
        console.log(alokasi_waktu)
        var countdown = alokasi_waktu; // dalam detik

        var selected = 1;
        var jumlah_soal = "{{ $jumlah_soal }}";

        function jawaban_isian_singkat(questionId) {
            isian_singkat.onkeyup = function() {
                saveAnswer(questionId, isian_singkat.value)
            }
        }

        function uraians(questionId) {
            uraian.onkeyup = function() {
                console.log(saveAnswer(questionId, uraian.value))
            }
        }


        function lihatSoal(nomor) {
            $('.soal-soal').css('display', 'none');
            if (nomor == '') {
                nomor = selected;
            }
            $('#soal-no-' + nomor).css('display', '');
            selected = nomor

            ragu_ragu(nomor)
        }

        function nextSoal() {
            if (selected < jumlah_soal) {
                selected++;
                lihatSoal(selected);
            } else {
                // misal udah nomor terakhir
            }
        }

        function previousSoal() {
            if (selected > 1) {
                selected--;
                lihatSoal(selected);
            }
        }

        function ragu_ragu(nomor) {
            if ($('#ragu-ragu').is(':checked')) {
                $('#ragu-ragu').click(function(e) {
                    console.log('ragu-ragu-' + nomor)
                })
            } else {

            }
        }

        // Fungsi untuk memulai timer countdown
        function startCountdown() {
            var timer = setInterval(function() {
                countdown--;
                var secs = Math.floor(countdown % 60);
                var mins = Math.floor((countdown / 60) % 60);
                var hours = Math.floor((countdown / (60 * 60)));
                var end = hours + ":" + mins + ":" + secs
                document.getElementById("countdown").innerHTML =
                    'Sisa Waktu' + ' ' + ':' + ' ' + end; // update nilai countdown pada halaman web
                if (countdown == 0) {
                    clearInterval(timer);
                    submitAnswers(); // submit jawaban ketika waktu habis
                }
            }, 1000);
        }

        // Fungsi untuk menyimpan jawaban pengguna
        function saveAnswer(questionId, answer) {
            answers[questionId] = answer;
            console.log(questionId, answer)
            localStorage.setItem("answers", JSON.stringify(answers)); // simpan jawaban ke localStorage
        }

        function saveAnswerRadioButton(questionId, answer) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('siswa.submit-radio-button') }}",
                data: {
                    ujian_id: ujian,
                    siswa_id: siswa,
                    soal_id: questionId,
                    answer: answer
                },
                success: function(data) {
                    console.log(data)
                }
            });
        }

        // Fungsi untuk mengambil jawaban dari localStorage dan mengisi ulang form jawaban pada halaman web
        function fillAnswers() {
            var savedAnswers = JSON.parse(localStorage.getItem("answers"));
            if (savedAnswers) {
                for (var questionId in savedAnswers) {
                    document.getElementById(questionId).value = savedAnswers[questionId];
                }
            }
            $.each(savedAnswers, function(i, v) {
                $("input[name='answer[" + i + "][]'][value='" + v + "']").attr("checked", "checked");
                $("input[id='isian_singkat'][name='answer[" + i + "][]']").attr('value', v);
            });

        }
        console.log((localStorage.getItem("answers")))

        // Fungsi untuk menyimpan nilai countdown ke localStorage ketika halaman ditutup
        window.addEventListener("beforeunload", function() {
            localStorage.setItem("countdown", countdown - 10);
            localStorage.setItem("answers", JSON.stringify(answers));
        });

        // Fungsi untuk memulai ujian
        function startExam() {
            fillAnswers(); // isi ulang jawaban yang sudah disimpan pada localStorage
            var savedCountdown = localStorage.getItem("countdown");
            if (savedCountdown) {
                countdown = savedCountdown; // set nilai countdown dari localStorage
            }
            startCountdown(); // mulai countdown
        }

        // Fungsi untuk submit jawaban
        function submitAnswers() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('siswa.submit-ujian') }}",
                data: {
                    ujian_id: ujian,
                    siswa_id: siswa,
                    answer: JSON.parse(localStorage.getItem("answers")),
                },
                success: function(data) {
                    window.location.href = "{{ route('siswa.logout-ujian') }}";
                    window.localStorage.clear();
                }
            });
        }

        // Panggil fungsi startExam() saat halaman dimuat
        window.onload = function() {
            startExam();
            lihatSoal(1);
        };
    </script>
@endsection
