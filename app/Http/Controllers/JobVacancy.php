<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\JobVacancies;
use Illuminate\Http\Request;

class JobVacancy extends Controller
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
            'title'             => 'Data Lowongan Pekerjaan',
            'subTitle'          => 'Daftar',
            'daftarPekerjaan'   => JobVacancies::with('createdBy')->where('deleted_at', null)->orderBy('created_at', 'DESC')->limit(300)->get(),
            'user'              => Users::find(Session()->get('id')),
        ];

        return view('jobVacancy.index', $data);
    }

    public function detail($jobVacancyId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $data = [
            'title'             => 'Data Lowongan Pekerjaan',
            'subTitle'          => 'Detail',
            'detail'            => JobVacancies::with('createdBy')->find($jobVacancyId),
            'user'              => Users::find(Session()->get('id')),
            'form'              => 'Detail'
        ];

        return view('jobVacancy.form', $data);
    }

    public function new(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!$request->title) {
            $data = [
                'title'     => 'Data Lowongan Pekerjaan',
                'subTitle'  => 'Tambah',
                'user'      => Users::find(Session()->get('id')),
                'form'      => 'Tambah',
            ];
            return view('jobVacancy.form', $data);
        } else {
            $request->validate([
                'title'                 => 'required',
                'position_name'         => 'required',
                'description'           => 'required',
                'qualification'         => 'required',
                'salary'                => 'required',
                'number_of_employees'   => 'required'
            ], [
                'title.required'                => 'Judul harus diisi!',
                'position_name.required'        => 'Posisi harus diisi!',
                'description.required'          => 'Deskripsi pekerjaan harus diisi!',
                'qualification.required'        => 'Kualifikasi pekerjaan harus diisi!',
                'salary.required'               => 'Gaji harus diisi!',
                'number_of_employees.required'  => 'Jumlah karyawan harus diisi!'
            ]);
            
            $jobVacancy = new JobVacancies();
            $jobVacancy->title                  = $request->title;
            $jobVacancy->position_name          = $request->position_name;
            $jobVacancy->description            = $request->description;
            $jobVacancy->qualification          = $request->qualification;
            $jobVacancy->salary                 = $request->salary;
            $jobVacancy->number_of_employees    = $request->number_of_employees;
            $jobVacancy->created_by             = Session()->get('id');
            $jobVacancy->save();
    
            return redirect()->route('lowongan-pekerjaan')->with('success', 'Data berhasil ditambahkan!');
        }
    }

    public function update(Request $request, $jobVacancyId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!$request->title) {
            $data = [
                'title'     => 'Data Lowongan Pekerjaan',
                'subTitle'  => 'Edit',
                'detail'    => JobVacancies::with('createdBy')->find($jobVacancyId),
                'user'      => Users::find(Session()->get('id')),
                'form'      => 'Edit',
            ];
            return view('jobVacancy.form', $data);
        } else {
            $request->validate([
                'title'                 => 'required',
                'position_name'         => 'required',
                'description'           => 'required',
                'qualification'         => 'required',
                'salary'                => 'required',
                'number_of_employees'   => 'required'
            ], [
                'title.required'                => 'Judul harus diisi!',
                'position_name.required'        => 'Posisi harus diisi!',
                'description.required'          => 'Deskripsi pekerjaan harus diisi!',
                'qualification.required'        => 'Kualifikasi pekerjaan harus diisi!',
                'salary.required'               => 'Gaji harus diisi!',
                'number_of_employees.required'  => 'Jumlah karyawan harus diisi!'
            ]);

            $jobVacancy = JobVacancies::find($jobVacancyId);
            $jobVacancy->title                  = $request->title;
            $jobVacancy->position_name          = $request->position_name;
            $jobVacancy->description            = $request->description;
            $jobVacancy->qualification          = $request->qualification;
            $jobVacancy->salary                 = $request->salary;
            $jobVacancy->number_of_employees    = $request->number_of_employees;
            $jobVacancy->created_by             = Session()->get('id');
            $jobVacancy->save();

            return redirect()->route('lowongan-pekerjaan')->with('success', 'Data berhasil diedit!');
        }
    }

    public function delete($jobVacancyId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $jobVacancy = JobVacancies::find($jobVacancyId);
        $jobVacancy->deleted_at = date('Y-m-d H:i:s');
        $jobVacancy->save();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
