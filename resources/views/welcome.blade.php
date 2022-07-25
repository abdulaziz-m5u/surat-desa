@extends('layouts.app')

@section('content')

  <main id="main" class="mt-5">

    <section id="event-list" class="event-list">
        <div class="container">
            <div class="row justify-content-center">
            <div class="section-title">
                <h2>Pilih surat yang kamu mau buat</h2>
            </div>
               @foreach($categories as $category)
               <div class="col-md-6 d-flex align-items-stretch">
                   <a href="{{ route('detail', $category->id) }}" class="card">
                   <div class="card">
                        <div class="card-img">
                            <img
                                src="{{ asset('frontend/assets/img/placeholder.png') }}"
                                alt="..."
                            />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->nama_surat }}</h5>
                        </div>
                    </div>
                   </a>
                </div>
               @endforeach
            </div>
        </div>
    </section>

  </main><!-- End #main -->
@endsection