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
        Admin::Create([
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => 'password',
        ]);
        Admin::Create([
            'email' => 'admin2@gmail.com',
            'username' => 'admin2',
            'password' => 'password',
        ]);
        Admin::Create([
            'email' => 'admin3@gmail.com',
            'username' => 'admin3',
            'password' => 'password',
        ]);

        //GURU
        Guru::Create([
            'nip' => '192921812',
            'fullname' => 'GURUGURU',
            'username' => 'guru',
            'password' => 'password',
        ]);
        Guru::Create([
            'nip' => '2190201',
            'fullname' => 'GURUGURU2',
            'username' => 'guru2',
            'password' => 'password',
        ]);
        Guru::Create([
            'nip' => '192921812',
            'fullname' => 'GURUGURU3',
            'username' => 'guru3',
            'password' => 'password',
        ]);

        //PROKTOKTOR
        Proktor::Create([
            'email' => 'proktor@gmail.com',
            'fullname' => 'proktor1',
            'username' => 'proktor1',
            'password' => 'password',
        ]);
        Proktor::Create([
            'email' => 'proktor2@gmail.com',
            'fullname' => 'proktor2',
            'username' => 'proktor2',
            'password' => 'password',
        ]);
        Proktor::Create([
            'email' => 'proktor3@gmail.com',
            'fullname' => 'proktor3',
            'username' => 'proktor3',
            'password' => 'password',
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
            'username' => 'sasong',
            'password' => 'password',
            'kelas_id' => 1
        ]);
        Siswa::Create([
            'nis' => '10673',
            'fullname' => 'Dap dancugi',
            'username' => 'dap',
            'password' => 'password',
            'kelas_id' => 2
        ]);
        Siswa::Create([
            'nis' => '10687',
            'fullname' => 'Hadni Phastura',
            'username' => 'hadni',
            'password' => 'password',
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
            'ujian_id' => 1,
            'token' => 'FWGGSH',
            'expired_date' => '07:07:30',
        ]);
        Token::Create([
            'ujian_id' => 1,
            'token' => 'GSHASA',
            'expired_date' => '09:07:30',
        ]);
        Token::Create([
            'ujian_id' => 1,
            'token' => 'KSJAHW',
            'expired_date' => '08:07:30',
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

        //JAWABAN SISWA
        JawabanSiswa::Create([
            'soal_id' => 1,
            'siswa_id' => 1,
            'jawaban' => 'A',
        ]);
        JawabanSiswa::Create([
            'soal_id' => 2,
            'siswa_id' => 1,
            'jawaban' => 'Mulawarman',
        ]);
        JawabanSiswa::Create([
            'soal_id' => 3,
            'siswa_id' => 1,
            'jawaban' => 'Karena nasi yang digoreng',
        ]);

        //OPSI
        Opsi::Create([
            'opsi' => 'A',
            'ujian_id' => 1,
            'is_correct' => 'correct',
            'urutan' => 1
        ]);
        Opsi::Create([
            'opsi' => 'B',
            'ujian_id' => 2,
            'is_correct' => 'correct',
            'urutan' => 2
        ]);
        Opsi::Create([
            'opsi' => 'C',
            'ujian_id' => 3,
            'is_correct' => 'wrong',
            'urutan' => 3
        ]);

        //ISIAN SINGKAT
        IsianSingkat::Create([
            'soal_id' => 2,
            'kunci' => 'Mulawarman'
        ]);

        //IDENTITAS
        Identitas::Create([
            'nama' => 'SMKN 10 JAKARTA',
            'alamat' => 'Cawang SMEAN 6',
            'email' => 'SMKN10@gmail.com',
            'nomor' => '082018212091',
            'foto' => '',
        ]);
    }
}
