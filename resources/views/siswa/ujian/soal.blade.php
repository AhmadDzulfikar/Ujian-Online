@extends('layouts.user')

@section('content')
    <p class="btn btn-outline-success" id="countdown"></p>
    <form action="" id="myForm">
        <input type="hidden" id="siswa_id" value="{{ Auth::guard('siswa')->user()->id }}">
        <input type="hidden" id="ujian_id" value="{{ $get_ujian->id }}">
        @foreach ($soals as $soal)
            <div id="{{ $soal->id }}" class="form-group">
                <label class="d-block">
                    <p>{{ $loop->iteration }} . {{ $soal->text }}</p>
                </label>
                @if ($soal->tipe == 'pg')
                    @foreach ($soal->opsis as $opsi)
                        <div class="form-check">
                            <input class="form-check-input"
                                onclick="saveAnswer('{{ $soal->id }}' ,'{{ $opsi->opsi }}')" type="radio"
                                value="{{ $opsi->opsi }}" name="answer[{{ $soal->id }}][]"
                                id="radio-{{ $opsi->id }}">
                            <label class="form-check-label">
                                {{ $opsi->opsi }}
                            </label>
                        </div>
                    @endforeach
                @endif
                @if ($soal->tipe == 'isian_singkat')
                    <input type="text" class="form-control" onkeyup="jawaban_isian_singkat({{ $soal->id }})"
                        id="isian_singkat" name="answer[{{ $soal->id }}][]">
                @endif

                @if ($soal->tipe == 'uraian')
                    <textarea cols="30" rows="20" id="uraian" onkeyup="uraians({{ $soal->id }})"
                        name="answer[{{ $soal->id }}][]" class="form-control"></textarea>
                @endif
            </div>
        @endforeach
    </form>

    <script>
        // Inisialisasi variabel untuk jawaban dan waktu countdown
        let ujian = document.getElementById('ujian_id').value;
        let siswa = document.getElementById('siswa_id').value;
        let isian_singkat = document.getElementById('isian_singkat');
        let uraian = document.getElementById('uraian');

        var answers = {};
        var alokasi_waktu = `{{ $get_ujian->alokasi_waktu }}` * 60
        console.log(alokasi_waktu)
        var countdown = alokasi_waktu; // dalam detik

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

        // Fungsi untuk memulai timer countdown
        function startCountdown() {
            var timer = setInterval(function() {
                countdown--;
                var secs = Math.floor(countdown % 60);
                var mins = Math.floor((countdown / 60) % 60);
                var hours = Math.floor((countdown / (60 * 60)));
                var end = hours + ":" + mins + ":" + secs
                document.getElementById("countdown").innerHTML =
                    end; // update nilai countdown pada halaman web
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
        };
    </script>
@endsection
