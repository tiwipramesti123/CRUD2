<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use App\Jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        return view('pertanyaan/index', [
            'title' => "Pertanyaan",
            'pertanyaan'    => $pertanyaan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan/create', [
            'title' => "Create Pertanyaan"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.'            
        ];

        //rules validasi inputan user
        Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required'
        ], $messages)->validate();

        // jika lolos verifikasi insert ke database
        $pertanyaan = Pertanyaan::create([
            'judul'             => $request->judul,
            'isi_pertanyaan'    => $request->isi,
        ]);
        if($pertanyaan){
            return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil ditambahkan');
        }
        return redirect('/pertanyaan')->with('error', 'Pertanyaan gagal ditambahkan');
    }

    public function edit(Request $request)
    {
        $pertanyaan = Pertanyaan::findOrFail($request->id);
        return view('pertanyaan.edit',[
            'title'     => "Edit Pertanyaan",
            'pertanyaan'    => $pertanyaan
        ]);
    }

    public function update(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.'            
        ];

        //rules validasi inputan user
        Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required'
        ], $messages)->validate();

        // jika lolos verifikasi insert ke database
        $pertanyaan = Pertanyaan::where('id', $request->id)->update([
            'judul'             => $request->judul,
            'isi_pertanyaan'    => $request->isi,
        ]);
        if($pertanyaan){
            return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil diupdate');
        }
        return redirect('/pertanyaan')->with('error', 'Pertanyaan gagal diupdate');
    }

    public function show(Request $request)
    {
        $pertanyaan = Pertanyaan::findOrFail($request->id);
        // dd($pertanyaan);
        $jawaban = Jawaban::where('pertanyaan_id', $request->id)->get();
        return view('pertanyaan.detail', [
            'pertanyaan'    =>$pertanyaan,
            'jawaban'       => $jawaban,
            'title' => "Lihat Pertanyaan"
        ]);
    }

    public function destroy(Request $request)
    {
        $pertanyaan = Pertanyaan::findOrFail($request->id);
        $hasil = $pertanyaan->delete();
        if($hasil){
            return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil dihapus');
        }
        return redirect('/pertanyaan')->with('error', 'Pertanyaan gagal dihapus');
    }
}
