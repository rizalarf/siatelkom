<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::get('/', 'LoginController@login');
	Route::get('about', 'PagesController@about');

	Auth::routes();
	Route::get('home', 'HomeController@index');

	Route::get('register', function() {
		return redirect('login');
	});

	/*admin*/
	Route::group(['middleware' => ['web']], function() {
		//mahasiswa
		Route::get('mahasiswa', 'Mahasiswa\MahasiswaController@index');
		Route::get('mahasiswa/{data}/hapus', 'Mahasiswa\MahasiswaController@hapus');
		Route::get('mahasiswa/tambah', 'Mahasiswa\MahasiswaController@tambah');
		Route::post('mahasiswa/tambahmahasiswa', 'Mahasiswa\MahasiswaController@tambahmahasiswa');
		Route::get('mahasiswa/{id}/edit', 'Mahasiswa\MahasiswaController@editmahasiswa');
		Route::put('mahasiswa/{id}/simpanedit', 'Mahasiswa\MahasiswaController@simpanedit');

		//dosen
		Route::get('dosen', 'Dosen\DosenController@index');
		Route::get('dosen/{data}/hapus', 'Dosen\DosenController@hapus');
		Route::get('dosen/tambah', 'Dosen\DosenController@tambah');
		Route::post('dosen/tambahdosen', 'Dosen\DosenController@tambahdosen');
		Route::get('dosen/{id}/edit', 'Dosen\DosenController@editdosen');
		Route::put('dosen/{id}/simpanedit', 'Dosen\DosenController@simpanedit');

		//pemblap
		Route::get('pemblap', 'PembLap\PembLapController@index');
		Route::get('pemblap/{datahapus}/hapus', 'PembLap\PembLapController@hapus');
		Route::get('pemblap/tambah', 'PembLap\PembLapController@tambah');
		Route::post('pemblap/tambahpemblap', 'PembLap\PembLapController@tambahpemblap');
		Route::get('pemblap/{id}/edit', 'PembLap\PembLapController@editpemblap');
		Route::put('pemblap/{id}/simpanedit', 'PembLap\PembLapController@simpanedit');
		Route::get('pemblap/ajax',function(){
			$id = Input::get('idPerus');
			$pemblap = DB::table('pembimbing_lapangans')
			// ->select('id','pembNama')
			->where('idPerus','=',$id)
			->get();
	    return $pemblap;
		});

		//kaprodi
		Route::get('kaprodi', 'Kaprodi\KaprodiController@index');
		Route::get('kaprodi/tanggal', 'Kaprodi\KaprodiController@tanggal');
		Route::get('kaprodi/{datahapus}/hapus', 'Kaprodi\KaprodiController@hapus');
		Route::get('kaprodi/tambah', 'Kaprodi\KaprodiController@tambah');
		Route::post('kaprodi/tambahkaprodi', 'Kaprodi\KaprodiController@tambahkaprodi');
		Route::get('kaprodi/{id}/edit', 'Kaprodi\KaprodiController@editkaprodi');
		Route::put('kaprodi/{id}/simpanedit', 'Kaprodi\KaprodiController@simpanedit');

		//akun dosen
		Route::get('akundosen', 'Akun\AkunController@showAkunDosen');

		//akun mahasiswa
		Route::get('akunmahasiswa', 'Akun\AkunController@showAkunMahasiswa');

		//akun pemblap
		Route::get('akunpemblap', 'Akun\AkunController@showAkunPembLap');

		//prodi
		Route::get('prodi', 'Prodi\ProdiController@index');
		Route::get('prodi/{data}/hapus', 'Prodi\ProdiController@hapus');
		Route::get('prodi/tambah', 'Prodi\ProdiController@tambah');
		Route::post('prodi/tambahprodi', 'Prodi\ProdiController@tambahprodi');
		Route::get('prodi/{id}/edit', 'Prodi\ProdiController@editprodi');
		Route::put('prodi/{id}/simpanedit', 'Prodi\ProdiController@simpanedit');

		//kurikulum
		//Route::get('kurikulum', array('as'=>'kurikulum', 'uses'=>'Kurikulum\KurikulumController@index'));
		Route::get('kurikulum', 'Kurikulum\KurikulumController@index');
		Route::get('kurikulum/{data}/hapus', 'Kurikulum\KurikulumController@hapus');
		Route::get('kurikulum/tambah', 'Kurikulum\KurikulumController@tambah');
		Route::post('kurikulum/tambahkurikulum', 'Kurikulum\KurikulumController@tambahkurikulum');
		Route::get('kurikulum/{id}/edit', 'Kurikulum\KurikulumController@editkurikulum');
		Route::put('kurikulum/{id}/simpanedit', 'Kurikulum\KurikulumController@simpanedit');

		//matakuliah
		Route::get('matakuliah', 'Matakuliah\MatakuliahController@index');
		Route::get('matakuliah/{data}/hapus', 'Matakuliah\MatakuliahController@hapus');
		Route::get('matakuliah/tambah', 'Matakuliah\MatakuliahController@tambah');
		Route::post('matakuliah/tambahmatakuliah', 'Matakuliah\MatakuliahController@tambahmatakuliah');
		Route::get('matakuliah/{id}/edit', 'Matakuliah\MatakuliahController@editmatakuliah');
		Route::put('matakuliah/{id}/simpanedit', 'Matakuliah\MatakuliahController@simpanedit');

		///jadwal kuliah
		Route::get('jadwalkuliah', 'Jadwal\JadwalKuliahController@index');
		Route::get('jadwalkuliah/{data}/hapus', 'Jadwal\JadwalKuliahController@hapus');
		Route::get('jadwalkuliah/tambah', 'Jadwal\JadwalKuliahController@tambah');
		Route::post('jadwalkuliah/tambahjadwal', 'Jadwal\JadwalKuliahController@tambahjadwal');
		Route::get('jadwalkuliah/{id}/edit', 'Jadwal\JadwalKuliahController@editjadwal');
		Route::put('jadwalkuliah/{id}/simpanedit', 'Jadwal\JadwalKuliahController@simpanedit');

		//pengampu
		Route::get('pengampu', 'Pengampu\PengampuController@index');
		Route::get('pengampu/{data}/hapus', 'Pengampu\PengampuController@hapus');
		Route::get('pengampu/tambah', 'Pengampu\PengampuController@tambah');
		Route::post('pengampu/tambahpengampu', 'Pengampu\PengampuController@tambahpengampu');
		Route::get('pengampu/{id}/edit', 'Pengampu\PengampuController@editpengampu');
		Route::put('pengampu/{id}/simpanedit', 'Pengampu\PengampuController@simpanedit');

		//semester
		Route::get('semester', array('as'=>'semester', 'uses'=>'Semester\SemesterController@index'));
		Route::get('semesterprodi', array('as'=>'semester.prodi', 'uses'=>'Semester\SemesterController@semesterprodi'));

		//ruang
		Route::get('ruang', 'Ruang\RuangController@index');
		Route::get('ruang/{data}/hapus', 'Ruang\RuangController@hapus');
		Route::get('ruang/tambah', 'Ruang\RuangController@tambah');
		Route::post('ruang/tambahruang', 'Ruang\RuangController@tambahruang');
		Route::get('ruang/{id}/edit', 'Ruang\RuangController@editruang');
		Route::put('ruang/{id}/simpanedit', 'Ruang\RuangController@simpanedit');

		//hari
		Route::get('hari', 'Hari\HariController@index');
		Route::get('hari/{data}/hapus', 'Hari\HariController@hapus');
		Route::get('hari/tambah', 'Hari\HariController@tambah');
		Route::post('hari/tambahhari', 'Hari\HariController@tambahhari');
		Route::get('hari/{id}/edit', 'Hari\HariController@edithari');
		Route::put('hari/{id}/simpanedit', 'Hari\HariController@simpanedit');

		//jam
		Route::get('jam', 'Jam\JamController@index');
		Route::get('jam/{data}/hapus', 'Jam\JamController@hapus');
		Route::get('jam/tambah', 'Jam\JamController@tambah');
		Route::post('jam/tambahjam', 'Jam\JamController@tambahjam');
		Route::get('jam/{id}/edit', 'Jam\JamController@editjam');
		Route::put('jam/{id}/simpanedit', 'Jam\JamController@simpanedit');

		//kelas
		Route::get('kelas', 'Kelas\KelasController@index');
		Route::get('kelas/{data}/hapus', 'Kelas\KelasController@hapus');
		Route::get('kelas/tambah', 'Kelas\KelasController@tambah');
		Route::post('kelas/tambahkelas', 'Kelas\KelasController@tambahkelas');
		Route::get('kelas/{id}/edit', 'Kelas\KelasController@editkelas');
		Route::put('kelas/{id}/simpanedit', 'Kelas\KelasController@simpanedit');

		//magang
		Route::get('perusahaan', 'Perusahaan\PerusahaanController@index');
		Route::get('perusahaan/{data}/hapus', 'Perusahaan\PerusahaanController@hapus');
		Route::get('perusahaan/tambah', 'Perusahaan\PerusahaanController@tambah');
		Route::post('perusahaan/tambahperusahaan', 'Perusahaan\PerusahaanController@tambahperusahaan');
		Route::get('perusahaan/{id}/edit', 'Perusahaan\PerusahaanController@editperusahaan');
		Route::put('perusahaan/{id}/simpanedit', 'Perusahaan\PerusahaanController@simpanedit');
		Route::get('daftarmagang', 'Perusahaan\PerusahaanController@daftarmagang');

		//tugasakhir
		Route::get('data-tugas-akhir', 'TA\TugasAkhirController@indexJudul');
		Route::get('data-tugas-akhir/create', 'TA\TugasAkhirController@createJudul');
		Route::post('data-tugas-akhir/store', 'TA\TugasAkhirController@storeJudul');
		Route::get('data-tugas-akhir/{id}/edit', 'TA\TugasAkhirController@editJudul');
		Route::put('data-tugas-akhir/{id}/update', 'TA\TugasAkhirController@updateJudul');
		Route::get('data-tugas-akhir/{id}/hapus', 'TA\TugasAkhirController@destroyJudul');
		Route::get('daftar-sidang', 'TA\TugasAkhirController@indexDaftar');
		Route::get('daftar-sidang/create', 'TA\TugasAkhirController@createDaftar');
		Route::post('daftar-sidang/store', 'TA\TugasAkhirController@storeDaftar');

		//Role kaprodi
		//magang
		Route::get('infomagang', 'RoleKaprodi\RoleKaprodiController@infomagang');
		Route::get('infomagang/{id}/hapus', 'RoleKaprodi\RoleKaprodiController@hapus');
		Route::get('infomagang/tambah', 'RoleKaprodi\RoleKaprodiController@tambah');
		Route::post('infomagang/tambahinfomagang', 'RoleKaprodi\RoleKaprodiController@tambahinfomagang');
		Route::get('infomagang/{id}/edit', 'RoleKaprodi\RoleKaprodiController@editinfomagang');
		Route::put('infomagang/{id}/simpanedit', 'RoleKaprodi\RoleKaprodiController@simpanedit');
		Route::get('laphar', 'RoleKaprodi\RoleKaprodiController@laporanharian');
		Route::get('lapharisi', 'RoleKaprodi\RoleKaprodiController@harianisi');

		//tugas akhir
		Route::get('data-proposal', 'RoleKaprodi\RoleKaprodiController@indexProposal');
		Route::get('daftar-tugas-akhir', 'RoleKaprodi\RoleKaprodiController@indexTA');
		Route::get('daftar-tugas-akhir/{id}/edit', 'RoleKaprodi\RoleKaprodiController@editTA');
		Route::put('daftar-tugas-akhir/{id}/update', 'RoleKaprodi\RoleKaprodiController@updateTA');
		Route::get('daftar-tugas-akhir/{id}/view', 'RoleKaprodi\RoleKaprodiController@viewTA');
		Route::get('data-surat-tugas', 'RoleKaprodi\RoleKaprodiController@indexTugas');
		Route::get('data-surat-tugas/{id}/view', 'RoleKaprodi\RoleKaprodiController@viewTugas');
		Route::get('laporan-kaprodi','RoleKaprodi\RoleKaprodiController@indexLaporan');
		Route::get('rekap-kaprodi','RoleKaprodi\RoleKaprodiController@indexRekap');

		//jadwal
		Route::get('jadwal-create', 'RoleKaprodi\RoleKaprodiController@indexJadwal');
		Route::get('jadwal-create/{id}/destroy', 'RoleKaprodi\RoleKaprodiController@destroyJadwal');
		Route::get('jadwal-create/create', 'RoleKaprodi\RoleKaprodiController@createJadwal');
		Route::post('jadwal-create/store', 'RoleKaprodi\RoleKaprodiController@storeJadwal');
		Route::get('jadwal-create/{id}/edit', 'RoleKaprodi\RoleKaprodiController@editJadwal');
		Route::put('jadwal-create/{id}/update', 'RoleKaprodi\RoleKaprodiController@updateJadwal');
		Route::get('jadwal-view', 'RoleKaprodi\RoleKaprodiController@indexJadwalView');

		//Role Dosen
		//jadwal
		Route::get('jadwal-dosen', 'RoleDsn\RoleDsnController@indexJadwal');

		//magang
		Route::get('infodos', 'RoleDosen\RoleDosenController@infodos');
		Route::get('laphardos', 'RoleDosen\RoleDosenController@laporanharian');
		Route::get('laphardos/{id}/edit', 'RoleDosen\RoleDosenController@editlaphar');
		Route::put('laphardos/{id}/simpanedit', 'RoleDosen\RoleDosenController@simpanedit');
		Route::get('lapakhirdos', 'RoleDosen\RoleDosenController@laporanakhir');
		Route::get('lapakhirdos/{id}/edit', 'RoleDosen\RoleDosenController@editlapakhir');
		Route::put('lapakhirdos/{id}/simpanedit', 'RoleDosen\RoleDosenController@simpanedit');
		Route::get('nilaipemblap', 'RoleDosen\RoleDosenController@nilaipemblap');
		Route::get('nilaidosen', 'RoleDosen\RoleDosenController@nilaidosen');

		//tugas akhhir
		Route::get('reviewer', 'RoleDsn\RoleDsnController@indexReviewer');
		Route::get('reviewer/{id}/create', 'RoleDsn\RoleDsnController@createReviewer');
		Route::put('reviewer/{id}/update', 'RoleDsn\RoleDsnController@updateReviewer');
		Route::get('dosen-bimbingan/index', 'RoleDsn\RoleDsnController@mainBimbingan');
		Route::get('dosen-bimbingan/{id}/index', 'RoleDsn\RoleDsnController@indexBimbingan');
		Route::get('dosen-bimbingan/{id}/edit', 'RoleDsn\RoleDsnController@editBimbingan');
		Route::put('dosen-bimbingan/{id}/update', 'RoleDsn\RoleDsnController@updateBimbingan');
		Route::get('surat-tugas', 'RoleDsn\RoleDsnController@indexTugas');
		Route::get('surat-tugas/{id}/view', 'RoleDsn\RoleDsnController@viewTugas');
		Route::get('nilai-dosbing', 'RoleDsn\RoleDsnController@indexNilBimb');
		Route::get('nilai-dosbing/create', 'RoleDsn\RoleDsnController@createNilBimb');
		Route::post('nilai-dosbing/store', 'RoleDsn\RoleDsnController@storeNilBimb');
		Route::get('nilai-dosbing/{id}/delete', 'RoleDsn\RoleDsnController@destroyNilBimb');
		Route::get('nilai-dosen-penguji', 'RoleDsn\RoleDsnController@indexNilUji');
		Route::get('nilai-dosen-penguji/create', 'RoleDsn\RoleDsnController@createNilUji');
		Route::post('nilai-dosen-penguji/store', 'RoleDsn\RoleDsnController@storeNilUji');
		Route::get('nilai-dosen-penguji/{id}/delete', 'RoleDsn\RoleDsnController@destroyNilUji');
		Route::get('rekap-dosen', 'RoleDsn\RoleDsnController@indexRekap');
		Route::get('rekap-dosen/create', 'RoleDsn\RoleDsnController@createRekap');
		Route::post('rekap-dosen/store', 'RoleDsn\RoleDsnController@storeRekap');
		Route::get('rekap-dosen/{id}/delete', 'RoleDsn\RoleDsnController@destroyRekap');
		Route::get('laporan-dosen', 'RoleDsn\RoleDsnController@indexLaporan');
		Route::get('laporan-dosen/create', 'RoleDsn\RoleDsnController@createLaporan');
		Route::post('laporan-dosen/store', 'RoleDsn\RoleDsnController@storeLaporan');
		Route::get('laporan-dosen/{id}/delete', 'RoleDsn\RoleDsnController@destroyLaporan');
		Route::get('revisi-dosen', 'RoleDsn\RoleDsnController@indexRevisi');
		Route::get('revisi-dosen/create', 'RoleDsn\RoleDsnController@createRevisi');
		Route::post('revisi-dosen/store', 'RoleDsn\RoleDsnController@storeRevisi');
		Route::get('revisi-dosen/{id}/delete', 'RoleDsn\RoleDsnController@destroyRevisi');

		//Role mahasiswa
		//jadwal
		Route::get('jadwal-mahasiswa', 'RoleMhs\RoleMhsController@indexJadwal');

		//magang
		Route::get('infomhs', 'RoleMhs\RoleMhsController@infomhs');
		Route::get('lapharmhs', 'RoleMhs\RoleMhsController@laporanharian');
		Route::get('lapharmhs/{data}/hapus', 'RoleMhs\RoleMhsController@hapusharian');
		Route::get('lapharmhs/tambah', 'RoleMhs\RoleMhsController@tambahharian');
		Route::post('lapharmhs/tambahlaphar', 'RoleMhs\RoleMhsController@tambahlapharian');
		Route::get('lapharmhs/{id}/edit', 'RoleMhs\RoleMhsController@editlaphar');
		Route::put('lapharmhs/{id}/simpanedit', 'RoleMhs\RoleMhsController@simpanedit');
		Route::get('lapakhirmhs', 'RoleMhs\RoleMhsController@laporanakhir');
		Route::get('lapakhirmhs/{data}/hapus', 'RoleMhs\RoleMhsController@hapusakhir');
		Route::get('lapakhirmhs/tambah', 'RoleMhs\RoleMhsController@tambahakhir');
		Route::post('lapakhirmhs/tambahlapakhir', 'RoleMhs\RoleMhsController@tambahlapakhir');
		Route::get('lapakhirmhs/{id}/edit', 'RoleMhs\RoleMhsController@editlapakhir');
		Route::put('lapakhirmhs/{id}/simpanedit', 'RoleMhs\RoleMhsController@simpaneditakhir');
		Route::get('nilaipemblap', 'RoleMhs\RoleMhsController@nilaipemblap');
		Route::get('nilaidosen', 'RoleMhs\RoleMhsController@nilaidosen');

		//tugas akhir
		Route::get('jadwal-proposal', 'RoleMhs\RoleMhsController@indexJadProposal');
		Route::get('jadwal-sidang', 'RoleMhs\RoleMhsController@indexJadSidang');
		Route::get('dokumen-proposal', 'RoleMhs\RoleMhsController@indexDokProposal');
		Route::get('dokumen-sidang', 'RoleMhs\RoleMhsController@indexDokSidang');
		Route::get('proposal', 'RoleMhs\RoleMhsController@indexProposal');
		Route::get('proposal/create', 'RoleMhs\RoleMhsController@createProposal');
		Route::post('proposal/store', 'RoleMhs\RoleMhsController@storeProposal');
		Route::get('proposal/{id}/edit', 'RoleMhs\RoleMhsController@editProposal');
		Route::put('proposal/{id}/update', 'RoleMhs\RoleMhsController@updateProposal');
		Route::get('proposal/{id}/destroy', 'RoleMhs\RoleMhsController@destroyProposal');
		Route::get('kontrol-bimbingan', 'RoleMhs\RoleMhsController@indexKontrolBimbingan');
		Route::get('kontrol-bimbingan/create', 'RoleMhs\RoleMhsController@createKontrolBimbingan');
		Route::post('kontrol-bimbingan/store', 'RoleMhs\RoleMhsController@storeKontrolBimbingan');
		Route::get('selesai-bimbingan', 'RoleMhs\RoleMhsController@indexSelesaiBimbingan');
		Route::get('selesai-bimbingan/create', 'RoleMhs\RoleMhsController@createSelesaiBimbingan');
		Route::post('selesai-bimbingan/store', 'RoleMhs\RoleMhsController@storeSelesaiBimbingan');
		Route::get('siap-sidang', 'RoleMhs\RoleMhsController@indexSiapSidang');
		Route::get('siap-sidang/create', 'RoleMhs\RoleMhsController@createSiapSidang');
		Route::post('siap-sidang/store', 'RoleMhs\RoleMhsController@storeSiapSidang');
		Route::get('progres-ta', 'RoleMhs\RoleMhsController@indexProgresTA');
		Route::get('nilai-bimbingan', 'RoleMhs\RoleMhsController@indexNilBimb');
		Route::get('nilai-penguji', 'RoleMhs\RoleMhsController@indexNilUji');
		Route::get('revisi', 'RoleMhs\RoleMhsController@indexRevisi');
		Route::get('hasil-akhir', 'RoleMhs\RoleMhsController@indexAkhir');

		Route::get('detail-kaprodi', 'RoleKaprodi\KaprodiController@indexUser');
		Route::get('detail-dosen', 'RoleDsn\RoleDsnController@indexUser');
		Route::get('detail-mahasiswa', 'RoleMhs\RoleMhsController@indexUser');
	});

	Route::get('main', 'DashboardController@index');
	Route::get('dashboard', 'DashboardController@dashboard');
	Route::resource('user', 'UserController');

});
