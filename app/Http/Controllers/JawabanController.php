<?php

namespace App\Http\Controllers;

use App\Jawaban;
use App\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pertanyaan_id)
    {
        // dd($pertanyaan_id);
        $jawaban = Jawaban::where('pertanyaan_id', $pertanyaan_id)->get();
        $pertanyaan = Pertanyaan::findOrFail($pertanyaan_id);

        return view('jawaban/show',[
            'title' => "Lihat Jawaban",
            'jawaban'   => $jawaban,
            'pertanyaan'    => $pertanyaan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pertanyaan_id)
    {
        $pertanyaan = Pertanyaan::where("id", $pertanyaan_id)->first();
        return view('jawaban/create',[
            'title' => "Jawab Pertanyaan",
            'pertanyaan' => $pertanyaan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pertanyaan_id)
    {
        $messages = [
            'required' => ':attribute harus diisi.'            
        ];

        //rules validasi inputan user
        Validator::make($request->all(), [
            'jawaban' => 'required'
        ], $messages)->validate();

        // jika lolos verifikasi insert ke database
        $jawaban = Jawaban::create([
            'isi_jawaban'             => $request->jawaban,
            'pertanyaan_id'    => $pertanyaan_id
        ]);
        if($jawaban){
            return redirect('/pertanyaan')->with('success', 'Jawaban berhasil ditambahkan');
        }
        return redirect('/pertanyaan')->with('error', 'Jawaban gagal ditambahkan');
    }
}
