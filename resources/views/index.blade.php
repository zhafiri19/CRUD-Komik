@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-12">

            {{-- Notifikasi menggunakan flash data --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{ route('komik.create') }}" class="btn btn-md btn-success mb-3 float-right">Tambah Data</a>
                    <table class="table table-bordered mt-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($komik as $k)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $k->judul }}</td>
                                    <td>{{ $k->penulis }}</td>
                                    <td class="text-center">
                                        <form
                                            onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Komik {{ $k->judul }} ?');"
                                            action="{{ route('komik.destroy', $k->id) }}" method="POST">
                                            <a href="{{ route('komik.show', $k->id) }}"
                                                class="btn btn-sm btn-info shadow">Detail</a>
                                            <a href="{{ route('komik.edit', $k->id) }}"
                                                class="btn btn-sm btn-warning shadow">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger shadow">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data Komik Tidak Tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
