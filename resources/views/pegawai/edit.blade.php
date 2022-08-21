@extends('layouts.index')

@section('content')
<div class="containter mt-3 mb-3">
    <form method="POST" action="{{ url('pegawai/'.$model->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="card" style="width: 50rem;">

            <div class="card-header">
              EDIT DATA
            </div>
            <div class="card-body">
                

               @include('pegawai._form')

                <div class="text-center">                    
                    <button class="btn btn-success" type="submit">simpan</button>
                    <a class="btn btn-info" href="{{ url('pegawai') }}">Kembali</a>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection