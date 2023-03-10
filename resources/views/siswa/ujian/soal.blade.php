@extends('layouts.user')

@section('content')
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <p id="countdown"></p>
    <form action="" id="myForm">
        @foreach ($soals as $soal)
            <div id="{{ $soal->id }}" class="form-group">
                <label class="d-block">
                    <p>{{ $loop->iteration }} . {{ $soal->text }}</p>
                </label>
                @foreach ($soal->opsis as $opsi)
                    <div class="form-check">
                        <input class="form-check-input" onclick="saveAnswer('{{ $soal->id }}' ,'{{ $opsi->opsi }}')"
                            type="radio" value="{{ $opsi->opsi }}" name="answer[{{ $soal->id }}][]"
                            id="radio-{{ $opsi->id }}">
                        <label class="form-check-label">
                            {{ $opsi->opsi }}
                        </label>
                    </div>
                @endforeach
            </div>
        @endforeach
    </form>

    <script>
        // Inisialisasi variabel untuk jawaban dan waktu countdown
        var answers = {};
        var countdown = 60; // dalam detik

        // Fungsi untuk memulai timer countdown
        function startCountdown() {
            var timer = setInterval(function() {
                countdown--;
                document.getElementById("countdown").innerHTML =
                    countdown; // update nilai countdown pada halaman web
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
            // 
        }

        // Panggil fungsi startExam() saat halaman dimuat
        window.onload = function() {
            startExam();
        };
    </script>
@endsection
