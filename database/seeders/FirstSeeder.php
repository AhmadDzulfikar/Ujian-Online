<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Guru;
use App\Models\Identitas;
use App\Models\IsianSingkat;
use App\Models\JawabanSiswa;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Opsi;
use App\Models\Proktor;
use App\Models\Siswa;
use App\Models\Soal;
use App\Models\Token;
use App\Models\Ujian;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ADMIN
        User::create([
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'name' => 'user',
            'username' => 'user'
        ]);
        Admin::Create([
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('password'),
        ]);
        Admin::Create([
            'email' => 'admin2@gmail.com',
            'username' => 'admin2',
            'password' => bcrypt('password'),
        ]);
        Admin::Create([
            'email' => 'admin3@gmail.com',
            'username' => 'admin3',
            'password' => bcrypt('password'),
        ]);

        //GURU
        Guru::Create([
            'nip' => '192921812',
            'email' => 'guru@gmail.com',
            'fullname' => 'GURUGURU',
            'username' => 'guru',
            'password' => bcrypt('password'),
        ]);
        Guru::Create([
            'nip' => '2190201',
            'email' => 'guru2@gmail.com',
            'fullname' => 'GURUGURU2',
            'username' => 'guru2',
            'password' => bcrypt('password'),
        ]);
        Guru::Create([
            'nip' => '192921812',
            'email' => 'guru3@gmail.com',
            'fullname' => 'GURUGURU3',
            'username' => 'guru3',
            'password' => bcrypt('password'),
        ]);

        //PROKTOKTOR
        Proktor::Create([
            'email' => 'proktor@gmail.com',
            'fullname' => 'proktor1',
            'username' => 'proktor1',
            'password' => bcrypt('password'),
        ]);
        Proktor::Create([
            'email' => 'proktor2@gmail.com',
            'fullname' => 'proktor2',
            'username' => 'proktor2',
            'password' => bcrypt('password'),
        ]);
        Proktor::Create([
            'email' => 'proktor3@gmail.com',
            'fullname' => 'proktor3',
            'username' => 'proktor3',
            'password' => bcrypt('password'),
        ]);

        //KELAS
        Kelas::Create([
            'nama' => 'XII RPL',
        ]);
        Kelas::Create([
            'nama' => 'XII AKL 1',
        ]);
        Kelas::Create([
            'nama' => 'XII AKL 2',
        ]);

        //SISWA
        Siswa::Create([
            'nis' => '10634',
            'fullname' => 'sasong sanjoyo',
            'username' => '10634',
            'password' => bcrypt('password'),
            'kelas_id' => 1
        ]);
        Siswa::Create([
            'nis' => '10673',
            'fullname' => 'Dap dancugi',
            'username' => '10673',
            'password' => bcrypt('password'),
            'kelas_id' => 2
        ]);
        Siswa::Create([
            'nis' => '10687',
            'fullname' => 'Hadni Phastura',
            'username' => '10687',
            'password' => bcrypt('password'),
            'kelas_id' => 3
        ]);

        //MAPEL
        Mapel::Create([
            'nama' => 'Matematika',
            'guru_id' => 1
        ]);
        Mapel::Create([
            'nama' => 'Agama Islam',
            'guru_id' => 2
        ]);
        Mapel::Create([
            'nama' => 'Ipa',
            'guru_id' => 3
        ]);

        // Ujian
        Ujian::Create([
            'nama' => 'UH',
            'mapel_id' => '1',
            'waktu_mulai' => '12:06:30',
            'alokasi_waktu' => 120,
            'tanggal' => '2023-02-12'
        ]);
        Ujian::Create([
            'nama' => 'PTS',
            'mapel_id' => 2,
            'waktu_mulai' => '09:07:00',
            'alokasi_waktu' => 120,
            'tanggal' => '2023-02-09'
        ]);
        Ujian::Create([
            'nama' => 'PAS',
            'mapel_id' => 3,
            'waktu_mulai' => '07:07:30',
            'alokasi_waktu' => 120,
            'tanggal' => '2023-02-07'
        ]);

        //TOKEN
        Token::Create([
            'token' => 'FWGGSH',
            'expired_date' => Carbon::now()->addMinutes(10),
        ]);

        //SOAL
        Soal::Create([
            'ujian_id' => 1,
            'text' => 'FWGGSH',
            'tipe' => 'pg',
            'poin' => 2
        ]);
        Soal::Create([
            'ujian_id' => 1,
            'text' => 'FWGGSH',
            'tipe' => 'isian_singkat',
            'poin' => 10
        ]);
        Soal::Create([
            'ujian_id' => 1,
            'text' => 'FWGGSH',
            'tipe' => 'uraian',
            'poin' => 20
        ]);


        //OPSI
        Opsi::Create([
            'opsi' => 'Opsi 1',
            'soal_id' => 1,
            'is_correct' => 'correct',
            'urutan' => 1
        ]);
        Opsi::Create([
            'opsi' => 'Opsi 2',
            'soal_id' => 1,
            'is_correct' => 'wrong',
            'urutan' => 2
        ]);
        Opsi::Create([
            'opsi' => 'Opsi 3',
            'soal_id' => 1,
            'is_correct' => 'wrong',
            'urutan' => 3
        ]);
        Opsi::Create([
            'opsi' => 'Opsi 4',
            'soal_id' => 1,
            'is_correct' => 'wrong',
            'urutan' => 4
        ]);
        Opsi::Create([
            'opsi' => 'Opsi 5',
            'soal_id' => 1,
            'is_correct' => 'wrong',
            'urutan' => 5
        ]);


        //ISIAN SINGKAT
        IsianSingkat::Create([
            'soal_id' => 2,
            'kunci' => 'Mulawarman'
        ]);

        //IDENTITAS
        Identitas::Create([
            'nama' => 'Ujian Online SMKN 10 Jakarta',
            'tagline' => 'Online Exams',
            'alamat' => 'Cawang SMEAN 6',
            'email' => 'SMKN10@gmail.com',
            'nomor' => '082018212091',
            'foto' => '',
        ]);
    }
}
