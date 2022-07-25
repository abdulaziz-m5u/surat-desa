@extends('layouts.app')

@section('content')

<main id="main">

<!-- ======= Contact Us Section ======= -->
  <div class="container">
    @if(session()->has('message'))
      <div class="mt-4 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert" id="alert-message">
          {{ session()->get('message') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row mt-5 justify-content-center">

      <div class="col-lg-9  mt-5 mt-lg-0">
      <div class="mb-5 text-center">
                <h2 style="text-transform: uppercase;">Pengajuan surat online - {{ $category->nama_surat }}</h2>
                <p>Isi form pengajuan surat Dibawah:</p>
            </div>

        <form action="{{ route('daftar') }}" method="post" enctype="multipart/form-data">
          @csrf 
          <input type="hidden" value="{{ $category->id }}" name="category_id">
          <div class="row mb-4">
            <div class="col-lg-6">
              <label for="nik">Nik</label>
              <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="Silahkan masukkan NIK anda">
            </div>
            <div class="col-lg-6">
              <label for="nama">Nama</label>
              <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Silahkan masukkan Nama anda">
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-lg-6">
              <label for="nomer_hp">No Hp</label>
              <input type="number" name="nomer_hp" class="form-control @error('nomer_Hp') is-invalid @enderror" placeholder="Silahkan masukkan No Hp anda">
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-6">
                  <label for="tempat_lahir">Tempat lahir</label>
                  <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Masukkan tempat lahir">
                </div>
                <div class="col-lg-6">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror">
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-lg-6">
              <label for="kewarganegaraan">Kewarganegaraan</label>
              <input type="text" name="kewarganegaraan" class="form-control @error('kewarganegaraan') is-invalid @enderror" placeholder="Silahkan masukkan Kewarganeraan anda">
            </div>
            <div class="col-lg-6">
              <label for="pekerjaan">Pekerjaan</label>
              <input type="text" id="pekerjaan" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" placeholder="Silahkan masukkan Pekerjaan anda">
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-lg-12">
              <label for="alamat">Alamat</label>
              <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="5" placeholder="Silahkan masukkan Alamat anda" required></textarea>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-lg-6">
              <label for="agama">Agama</label>
              <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama">
                  <option value="">Pilih</option>
                  <option value="0">Islam</option>
                  <option value="1">Hindu</option>
                  <option value="2">Buddha</option>
                  <option value="3">Kristen</option>
                  <option value="4">Katolik</option>
              </select>
            </div>
            <div class="col-lg-6">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                  <option value="">Pilih</option>
                  <option value="0">Laki-Laki</option>
                  <option value="1">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-lg-12">
              <label for="file_lampiran">File Berkas/Lampiran</label>
              <input type="file" name="file_lampiran" class="form-control @error('file_lampiran') is-invalid @enderror" id="file_lampiran">
            </div>
          </div>
          <div class="row text-danger">
            PENTING ! Syarat harus terpenuhi dan dibawa ke kantor desa saat mengambil surat.Jika tidak surat tidak diberikan.
            <ul>
              <li>KTP (Asli & FC)</li>
              <li>FC Surat tanah lokasi bangunan</li>
              <li>Surat pengantar/keterangan RT & RW</li>
            </ul>
          </div>

          <div class="text-center mt-3">
          <button style="background: #006fbe;
    border: 0;
    padding: 10px 30px;
    color: #fff;
    transition: 0.4s;
    border-radius: 4px;" type="submit">Buat surat</button>
          </div>
        </form>

      </div>

    </div>

  </div>

</main><!-- End #main -->
@endsection