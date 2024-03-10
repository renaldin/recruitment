<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Questions;
use Illuminate\Http\Request;

class Question extends Controller
{

    public function __construct()
    {
        
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Bank Soal',
            'subTitle'          => 'Daftar',
            'daftarBankSoal'    => Questions::with('createdBy')->where('deleted_at', null)->orderBy('created_at', 'DESC')->limit(300)->get(),
            'user'              => Users::find(Session()->get('id')),
        ];

        return view('question.index', $data);
    }

    public function detail($questionId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $data = [
            'title'             => 'Data Bank Soal',
            'subTitle'          => 'Detail',
            'detail'            => Questions::with('createdBy')->find($questionId),
            'user'              => Users::find(Session()->get('id')),
            'form'              => 'Detail'
        ];

        return view('question.form', $data);
    }

    public function new(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!$request->question) {
            $data = [
                'title'     => 'Data Bank Soal',
                'subTitle'  => 'Tambah',
                'user'      => Users::find(Session()->get('id')),
                'form'      => 'Tambah',
            ];
            return view('question.form', $data);
        } else {
            $request->validate([
                'type'          => 'required',
                'question'      => 'required',
                'bobot'         => 'required'
            ], [
                'type.required'         => 'Jenis pertanyaan harus diisi!',
                'question.required'     => 'Pertanyaan harus diisi!',
                'bobot.required'        => 'Bobot harus diisi!'
            ]);
            
            $question = new Questions();
            $question->type         = $request->type;
            $question->question     = $request->question;
            $question->bobot        = $request->bobot;
            $question->created_by   = Session()->get('id');
            $question->save();
    
            return redirect()->route('bank-soal')->with('success', 'Data berhasil ditambahkan!');
        }
    }

    public function update(Request $request, $questionId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!$request->question) {
            $data = [
                'title'     => 'Data Bank Soal',
                'subTitle'  => 'Edit',
                'detail'    => Questions::with('createdBy')->find($questionId),
                'user'      => Users::find(Session()->get('id')),
                'form'      => 'Edit',
            ];
            return view('question.form', $data);
        } else {
            $request->validate([
                'type'          => 'required',
                'question'      => 'required',
                'bobot'         => 'required'
            ], [
                'type.required'         => 'Jenis pertanyaan harus diisi!',
                'question.required'     => 'Pertanyaan harus diisi!',
                'bobot.required'        => 'Bobot harus diisi!'
            ]);

            $question = Questions::find($questionId);
            $question->type         = $request->type;
            $question->question     = $request->question;
            $question->bobot        = $request->bobot;
            $question->created_by   = Session()->get('id');
            $question->save();

            return redirect()->route('bank-soal')->with('success', 'Data berhasil diedit!');
        }
    }

    public function delete($questionId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $question = Questions::find($questionId);
        $question->deleted_at = date('Y-m-d H:i:s');
        $question->save();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
