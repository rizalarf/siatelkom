<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <li><a href="main"><i class="fa fa-home"></i><span>Beranda</span></a></li>
      @if (Auth::check() && Auth::user()->level == 'Administrator')
      <li><a href="{{ url('prodi') }}"><i class="fa fa-university"></i><span>Program Studi</span></a></li>
      @endif
      @if (Auth::check() && Auth::user()->level == 'Administrator')
      <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Data User</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('dosen') }}"></i>Dosen</a></li>
          <li><a href="{{ url('kaprodi') }}"></i>Kaprodi</a></li>
          <li><a href="{{ url('mahasiswa') }}"></i>Mahasiswa</a></li>
          <li><a href="{{ url('pemblap') }}"></i>Pembimbing Lapangan</a></li>
        </ul>
      </li>
      @endif
      @if (Auth::check() && Auth::user()->level == 'Administrator')
      <li class="treeview"><a href="#"><i class="fa fa-files-o"></i><span>Data Kurikulum</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('kurikulum') }}"></i>Kurikulum</a></li>
          <li><a href="{{ url('matakuliah') }}"></i>Mata Kuliah</a></li>
          <li><a href="{{ url('jadwalkuliah') }}"></i>Jadwal Kuliah</a></li>
        </ul>
      </li>
      @endif
      @if (Auth::check() && Auth::user()->level == 'Administrator')
      <li class="treeview"><a href="#"><i class="fa fa-calendar"></i><span>Data Jadwal</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('ruang') }}"></i>Ruang</a></li>
          <li><a href="{{ url('hari') }}"></i>Hari</a></li>
          <li><a href="{{ url('jam') }}"></i>Jam</a></li>
          <li><a href="{{ url('kelas') }}"></i>Kelas</a></li>
          <li><a href="{{ url('pengampu') }}"></i>Pengampu</a></li>
        </ul>
      </li>
      @endif
      @if (Auth::check() && Auth::user()->level == 'Administrator')
      <li class="treeview"><a href="#"><i class="fa fa-industry"></i><span>Data Magang</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('perusahaan') }}"></i>Perusahaan</a></li>
          <li><a href="{{ url('daftarmagang') }}"></i>Daftar Magang</a></li>
        </ul>
      </li>
      @endif
      @if (Auth::check() && Auth::user()->level == 'Administrator')
      <li class="treeview"><a href="#"><i class="fa fa-book"></i><span>Tugas Akhir</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('data-tugas-akhir') }}">Daftar Judul Tugas Akhir</a></li>
          <li><a href="{{ url('daftar-sidang') }}">Pendaftaran Sidang</a></li>
        </ul>
      </li>
      @endif
      @if (Auth::check() && Auth::user()->level == 'Kaprodi')
      <li class="treeview"><a href="#"><i class="fa fa-calendar"></i><span>Jadwal Kuliah</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('jadwal-create') }}">Penjadwalan</a></li>
          <li><a href="{{ url('jadwal-view')}}">Jadwal Kuliah</a></li>
        </ul>
      </li>
      @endif
      @if (Auth::check() && Auth::user()->level == 'Kaprodi')
      <li class="treeview"><a href="#"><i class="fa fa-industry"></i><span>Magang</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('infomagang') }}">Info Magang</a></li>
          <li><a href="{{ url('laphar') }}">Laporan Harian</span></a></li>
          <li><a href="{{ url('main') }}">Laporan Akhir</span></a></li>
          <li><a href="{{ url('main') }}">Nilai Magang</span></a></li>
        </ul>
      </li>
      @endif
      @if (Auth::check() && Auth::user()->level == 'Kaprodi')
      <li class="treeview"><a href="#"><i class="fa fa-book"></i><span>Tugas Akhir</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <!-- <li><a href="{{ url('data-proposal') }}">Data Proposal Tugas Akhir</a></li> -->
          <li><a href="{{ url('daftar-tugas-akhir') }}">Data Tugas Akhir</a></li>
          <li><a href="{{ url('data-surat-tugas') }}">Surat Tugas</a></li>
          <li><a href="{{ url('rekap-kaprodi') }}">Rekapitulasi Sidang</a></li>
          <li><a href="{{ url('laporan-kaprodi') }}">Laporan Tugas Akhir</a></li>
        </ul>
      </li>
      @endif
      @if (Auth::check() && Auth::user()->level == 'Dosen')
      <li><a href="{{ url('jadwal-dosen') }}"><i class="fa fa-calendar"></i><span> Jadwal Kuliah</span></a></li>
      @endif
      @if (Auth::check() && Auth::user()->level == 'Dosen')
      <li class="treeview"><a href="#"><i class="fa fa-industry"></i><span>Magang</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('infodos') }}">Info Magang</a></li>
          <li><a href="{{ url('laphardos') }}">Laporan Harian</a></li>
          <li><a href="{{ url('lapakhirdos') }}">Laporan Akhir</a></li>
          <li><a href="{{ url('matakuliah') }}">Nilai Magang</a></li>
        </ul>
      </li>
      @endif
      @if (Auth::check() && Auth::user()->level == 'Dosen')
      <li class="treeview"><a href="#"><i class="fa fa-graduation-cap"></i><span>Tugas Akhir</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
      <li><a href="{{ url('reviewer') }}">Sidang Proposal</span></a></li>
      <li><a href="{{ url('dosen-bimbingan/index')}}">Bimbingan</span></a></li>
      <li><a href="{{ url('nilai-dosbing') }}">Nilai Bimbingan</span></a></li>
      <li><a href="{{ url('surat-tugas') }}">Surat Tugas</span></a></li>
      <!-- <li><a href="#">Kemajuan Tugas Akhir</span></a></li> -->
      <!-- <li><a href="#">Broadcast</span></a></li> -->
      <!-- <li><a href="#">Berkas Sidang</span></a></li> -->
      <li><a href="{{ url('nilai-dosen-penguji') }}">Nilai Pengujian</span></a></li>
      <li><a href="{{ url('rekap-dosen') }}">Rekapitulasi</span></a></li>
      <li><a href="{{ url('laporan-dosen') }}">Laporan Ujian</span></a></li>
      <li><a href="{{ url('revisi-dosen') }}">Revisi</span></a></li>
      @endif
      @if (Auth::check() && Auth::user()->level == 'Pembimbing Lapangan')
      <li><a href="{{ url('infopemb') }}"><i class="fa fa-file-text-o"></i><span>Info Magang</span></a></li>
      <li><a href="{{ url('lapharpemb') }}"><i class="fa fa-file-text-o"></i><span>Laporan Harian</span></a></li>
      <li><a href="{{ url('lapakhirpemb') }}"><i class="fa fa-file-text-o"></i><span>Laporan Akhir</span></a></li>
      <li><a href="{{ url('nilaipemblap') }}"><i class="fa fa-file-text-o"></i><span>Niai Magang</span></a></li>
      @endif

      <!-- Jadwal -->
      @if (Auth::check() && Auth::user()->level == 'Mahasiswa')
      <li><a href="{{ url('jadwal-mahasiswa') }}"><i class="fa fa-calendar"></i><span> Jadwal Kuliah</span></a></li>
      @endif

      <!-- Magang -->
      @if (Auth::check() && Auth::user()->level == 'Mahasiswa')
      <li class="treeview"><a href="#"><i class="fa fa-industry"></i><span> Magang</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('infomhs')}}">Info Magang</a></li>
          <li><a href="{{ url('lapharmhs')}}">Laporan Harian</a></li>
          <li><a href="{{ url('lapakhirmhs')}}">Laporan Akhir</a></li>
          <li class="treeview"><a href=""> Nilai Magang<i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('nilaipemblap')}}">Pembimbing Lapangan</a></li>
              <li><a href="{{ url('nilaidosen')}}">Dosen</a></li>
            </ul>
          </li>
        </ul>
      </li>
      @endif

      <!-- Tugas Akhir -->
      @if (Auth::check() && Auth::user()->level == 'Mahasiswa')
      <li class="treeview"><a href="#"><i class="fa fa-graduation-cap"></i><span> Tugas Akhir</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('proposal') }}">Judul Tugas Akhir</a></li>
          <li><a href="{{ url('jadwal-proposal') }}">Jadwal Sidang Proposal</a></li>
          <li><a href="{{ url('kontrol-bimbingan') }}">Kontrol Bimbingan</a></li>
          <!-- <li><a href="{{ url('selesai-bimbingan') }}">Selesai Bimbingan</a></li> -->
          <!-- <li><a href="{{ url('siap-sidang') }}">Siap Sidang</a></li> -->
          <!-- <li><a href="{{ url('progres-ta') }}">Progress TA</a></li> -->
          <li><a href="{{ url('nilai-bimbingan') }}">Nilai Bimbingan</a></li>
          <li><a href="{{ url('jadwal-sidang') }}">Jadwal Sidang</a></li>
          <li><a href="{{ url('nilai-penguji') }}">Nilai Penguji</a></li>
          <li><a href="{{ url('hasil-akhir') }}">Hasil Akhir</a></li>
          <li><a href="{{ url('revisi') }}">Revisi</a></li>
        </ul>
      </li>
      @endif
    </ul>
  </section>
</aside>
