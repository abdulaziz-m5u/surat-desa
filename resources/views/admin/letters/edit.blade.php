@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('edit letter')}}</h1>
                    <a href="{{ route('admin.letters.index') }}" class="btn btn-primary btn-sm shadow-sm">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.letters.update', $letter->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" class="form-control" readonly name="category_id" value="{{ $letter->category->id }}" />
                    <div class="row mb-4">
                        <div class="col-lg-6">
                        <label for="nik">Nik</label>
                        <input type="number" name="nik" value="{{ old('nik', $letter->nik) }}" readonly class="form-control @error('nik') is-invalid @enderror" placeholder="Silahkan masukkan NIK anda">
                        </div>
                        <div class="col-lg-6">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama', $letter->nama) }}" readonly class="form-control @error('nama') is-invalid @enderror" placeholder="Silahkan masukkan Nama anda">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                        <label for="nomer_hp">No Hp</label>
                        <input type="number" name="nomer_hp" value="{{ old('nomer_hp', $letter->nomer_hp) }}" readonly class="form-control @error('nomer_Hp') is-invalid @enderror" placeholder="Silahkan masukkan No Hp anda">
                        </div>
                        <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                            <label for="tempat_lahir">Tempat lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $letter->tempat_lahir) }}" readonly id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Masukkan tempat lahir">
                            </div>
                            <div class="col-lg-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $letter->tanggal_lahir) }}" readonly id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                        <label for="kewarganegaraan">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan" value="{{ old('kewarganegaraan', $letter->kewarganegaraan) }}" readonly class="form-control @error('kewarganegaraan') is-invalid @enderror" placeholder="Silahkan masukkan Kewarganeraan anda">
                        </div>
                        <div class="col-lg-6">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $letter->pekerjaan) }}" readonly class="form-control @error('pekerjaan') is-invalid @enderror" placeholder="Silahkan masukkan Pekerjaan anda">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-12">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="5" placeholder="Silahkan masukkan Alamat anda" readonly required>{{ old('alamat', $letter->alamat) }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                        <label for="agama">Agama</label>
                        <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama" readonly>
                            @if($letter->agama === 0)
                                <option value="0">Islam</option>
                            @elseif($letter->agama === 1)
                                <option value="1">Hindu</option>
                            @elseif($letter->agama === 2)
                                <option value="2">Buddha</option>
                            @elseif($letter->agama === 3)
                                <option value="3">Kristen</option>
                            @elseif($letter->agama === 4)
                                <option value="4">Katolik</option>
                            @endif
                        </select>
                        </div>
                        <div class="col-lg-6">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin" readonly>
                            @if($letter->jenis_kelamin === 0)
                            <option value="0">Laki-Laki</option>
                            @elseif($letter->jenis_kelamin === 1)
                            <option value="1">Perempuan</option>
                            @endif
                        </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 border">
                            <img src="{{ Storage::url($letter->file_lampiran) }}" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="status">{{ __('Acc') }}</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Iya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save')}}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection