@extends('layouts.index')

@section('content')
<br/>
@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>    
@endif

@if(Session::has('hapus'))
    <p class="alert alert-danger">{{ Session::get('hapus') }}</p>
@endif

<div class="row m-2">
    <a class="btn btn-primary mt-2 mr-2 " href="{{ url('pegawai/create') }}">Tambah</a>
    <form method="GET" action="{{ url('pegawai') }}">
        <div class="input-group mt-2">
            <input type="text" name="keyword" class="form-control col-md-8" placeholder="Seacrh.." value="{{ $keyword }}">
            <div class="input-group-append">
               <button class="btn btn-secondary" type="submit">Cari</button>
            </div>
        </div>
    </form>
    <a class="btn btn-info mt-2 float-right" href="{{ url('/') }}">refresh</a>
</div>

{{-- <a class="btn btn-primary" href="#" role="button">Link</a>
<button class="btn btn-primary" type="submit">Button</button> --}}


    <table class="table-bordered table mt-3">
        <tr class="text-center">
            <th>Foto Profile</th>
            <th>Nama</th>
            <th>Tgl Lahir</th>
            <th>gelar</th>
            <th>NIP</th>
            <th colspan="2">OPSI</th>
        </tr>
        @foreach($datas as $key=>$value)
            <tr>
                <td class="text-center">{{ $value->foto_profile }} <br/>
                    <img src="{{ asset('foto/'.$value->foto_profile) }}" alt="" width=30% />
                </td>
                <td class="text-center">{{ $value->nama }}</td>
                <td class="text-center">{{ $value->tgl_lahir }}</td>
                <td class="text-center">{{ $value->gelar }}</td>
                <td class="text-center">{{ $value->nip }}</td>
                <td class="text-center"><a class="btn btn-success "href="{{ url('pegawai/'.$value->id.'/edit') }}">Edit</a></td>
                <td class="text-center">
                    <form method="POST" action="{{ url('pegawai/'.$value->id) }}">
                        @csrf
                        <input type="hidden" name="_method" Value="DELETE" id="">
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $datas->links('pagination::bootstrap-4') }}
@endsection