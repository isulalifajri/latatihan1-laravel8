<?php

namespace App\Http\Controllers;

use App\Http\Requests\PegawaiRequest;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Halaman Data Pegawai";
        $keyword = $request->keyword;
        // $datas = Pegawai::all();
        $datas = Pegawai::where('nama', 'LIKE', '%'.$keyword.'%')
        ->orWhere('gelar', 'LIKE', '%'.$keyword.'%')
        ->orWhere('nip', 'LIKE', '%'.$keyword.'%')
        // ->get();
        // ->paginate(); menampilkan semua halaman
        ->paginate(5); //menampilkan data sebanyak lima baris
        $datas->withpath('pegawai');//kalau seandainya waktu next page halaman error/nggak memuat seperti biasanya
        $datas->appends($request->all()); //untuk jika next page dan tetap mencari sesuai yang pada halaman pertama di cari
        //dd($datas); //->perintah tersebut bisa di gunakan jika ingin melihat error
        return view('pegawai.index', compact(
            'title','datas','keyword'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Halaman Tambah Data Pegawai";
        $model = new Pegawai;
        return view('pegawai.create', compact(
            'title','model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $request)
    {
       $model = new Pegawai;
       $model->nama = $request->nama;
       $model->tgl_lahir = $request->tgl_lahir;
       $model->gelar = $request->gelar;
       $model->nip = $request->nip;
       //kode untuk membuat upload file
       if($request->file('foto_profile')){
           $file = $request->file('foto_profile');
           
           $nama_file = time().str_replace(" ", "", $file->getClientOriginalName());
           $file->move('foto',$nama_file);
           $model->foto_profile = $nama_file;
       }
       $model->save();

       return redirect('pegawai')->with('success', "Data Berhasil di Tambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Halaman Edit Data Pegawai";
        $model = Pegawai::find($id); //select * form pegawai where id
        return view('pegawai.edit', compact(
            'title','model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PegawaiRequest $request, $id)
    {
       $model = Pegawai::find($id);
       $model->nama = $request->nama;
       $model->tgl_lahir = $request->tgl_lahir;
       $model->gelar = $request->gelar;
       $model->nip = $request->nip;

       if($request->file('foto_profile')){
        $file = $request->file('foto_profile');
        
        $nama_file = time().str_replace(" ", "", $file->getClientOriginalName());
        $file->move('foto',$nama_file);

        File::delete('foto/'.$model->foto_profile);
        $model->foto_profile = $nama_file;
       }
       $model->save();

       return redirect('pegawai')->with('success', "Data Berhasil di Edit");
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Pegawai::find($id);
        File::delete('foto/'.$model->foto_profile);
        $model->delete();
        return redirect('pegawai')->with('hapus', "Data Berhasil di Hapus");
    }
}
