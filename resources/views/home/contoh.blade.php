@extends('layouts.index')

@section('content')
    <p>Klik Tombol di Bawah</p>
    <form method="POST" action="{{ url('home/contoh') }}">
        @csrf  {{-- untuk keamanan yang telah di sediakan oleh laravel --}}
        <input type="text" name="nama">
        <button type="submit">Submit</button>
    </form>
@endsection