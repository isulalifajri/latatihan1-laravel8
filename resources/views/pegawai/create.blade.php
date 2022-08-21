@extends('layouts.index')

@section('content')
<div class="containter mt-3">
    <form method="POST" action="{{ url('pegawai') }}" enctype="multipart/form-data">
        @csrf


        <div class="card" style="width: 50rem;">

            <div class="card-header">
              TAMBAH DATA
            </div>

            <div class="card-body">
                @include('pegawai._form')
            <div class="text-center">

                <button class="btn btn-success" type="submit">Tambah</button>
                <a class="btn btn-info" href="{{ url('pegawai') }}">Kembali</a>
            </div>
            </div>
        </div>

    </form>

</div>
@endsection