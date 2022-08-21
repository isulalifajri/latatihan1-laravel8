<div class="form-group">
    <label for="nama">Nama :</label>
    <input type="text" class="form-control" name="nama" id="nama" value="{{ $model->nama }}">

    @foreach($errors->get('nama') as $msg)
        <p class="text-danger">{{ $msg }}</p>
    @endforeach

</div>

<div class="form-group">
    <label for="tgl_lahir">Tgl Lahir</label>
    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="{{ $model->tgl_lahir }}">

    @foreach($errors->get('tgl_lahir') as $msg)
        <p class="text-danger">{{ $msg }}</p>
    @endforeach

</div>

<div class="form-group">
    <label for="gelar">Gelar</label>
    <input type="text" class="form-control" name="gelar" id="gelar" value="{{ $model->gelar }}">

    @foreach($errors->get('gelar') as $msg)
        <p class="text-danger">{{ $msg }}</p>
    @endforeach

</div>

<div class="form-group">
    <label for="nip">NIP</label>
    <input type="text" class="form-control" name="nip" id="nip" value="{{ $model->nip }}">

    @foreach($errors->get('nip') as $msg)
        <p class="text-danger">{{ $msg }}</p>
    @endforeach

</div>

<div class="form-group">
    <label for="foto_profile">Foto Profile</label>
    <input type="file" class="form-control" name="foto_profile" id="foto_profile" value="{{ $model->foto_profile }}">

    @foreach($errors->get('foto_profile') as $msg)
        <p class="text-danger">{{ $msg }}</p>
    @endforeach

    @if(strlen($model->foto_profile)>0)
        <img class="m-1" src="{{ asset('foto/'.$model->foto_profile) }}" alt="" width="30%">       
    @endif

</div>