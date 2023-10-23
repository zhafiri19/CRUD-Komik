@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card border-0 shadow rounded">
                <div class="card-body">

                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title">Judul : {{ $komik->judul }}</h3>
                                    <h5 class="card-title">Penulis : {{ $komik->penulis }}</h5>
                                    <h5 class="card-title">Penerbit : {{ $komik->penerbit }}</h5>
                                    <p class="card-text">Content : {{ $komik->content }}</p>
                                    <p class="card-text"><small class="text-body-secondary">Created At :
                                            {{ $komik->created_at->format('d-m-Y') }}</small>
                                        <br>
                                        <a href="{{ route('komik.index') }}" class="btn btn-primary mt-3">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
