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
                    <h1 class="h3 mb-0 text-gray-800">Edit jenis surat</h1>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary btn-sm shadow-sm">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('Name') }}" name="nama_surat" value="{{ old('nama_surat') }}" />
                    </div>
                    <div class="form-group">
                        <label for="template">{{ __('Template') }}</label>
                        <input type="file" class="form-control" id="template" name="template" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('simpan')}}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection