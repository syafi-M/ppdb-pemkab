<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Siswa::with('jurusan')->latest('updated_at');

        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $query->where(function ($subQuery) use ($searchQuery) {
                $subQuery->where('fullname', 'like', '%' . $searchQuery . '%')
                ->orWhere('nisn', 'like', '%' . $searchQuery . '%')
                ->orWhere('nik', 'like', '%' . $searchQuery . '%')
                ->orWhereHas('jurusan', function ($jurusanQuery) use ($searchQuery) {
                    $jurusanQuery->where('name', 'like', '%' . $searchQuery . '%');
                });
            });
        }
        $siswas = $query->paginate(1);
        $jurusan = Jurusan::all();
        return Inertia::render('siswa/Index', compact('siswas', 'jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('siswa/Create', [
            'jurusan' => Jurusan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SiswaRequest $request)
    {
        $siswa = new Siswa();
        $siswa = [
        'fullname' => $request->fullname ,
        'nisn' => $request->nisn,
        'nik' => $request->nik,
        'no_telp' => $request->no_telp ,
        'asal_sekolah' => $request->asal_sekolah,
        'tinggal_bersama'=> $request->tinggal_bersama ,
        'alamat_siswa' => $request->alamat_siswa,
        'nama_wali' => $request->nama_wali,
        'alamat_wali' => $request->alamat_wali,    
        'domisili' => $request->domisili,    
        'no_aktif' => $request->no_aktif,    
        'id_jurusan' => $request->id_jurusan,  
        ];
        // dd($siswa);
        Siswa::create($siswa);  
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Siswa::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return Inertia::render('siswa/Edit', [
            'siswas' => Siswa::with('jurusan')->find($siswa) ,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $data = [
            'fullname' => $request->fullname ,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'no_telp' => $request->no_telp ,
            'asal_sekolah' => $request->asal_sekolah,
            'tinggal_bersama'=> $request->tinggal_bersama ,
            'alamat_siswa' => $request->alamat_siswa,
            'nama_wali' => $request->nama_wali,
            'alamat_wali' => $request->alamat_wali,    
            'domisili' => $request->domisili,    
            'no_aktif' => $request->no_aktif,    
            'id_jurusan' => $request->id_jurusan,
            'status' => $request->status,
            ];
            $siswa->update($data);
            return to_route('siswa.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        
        return to_route('siswa.index');
    }

    public function daftarUlang($id)
    {
        
        Siswa::findOrFail($id)->update([
            'status' => 'lunas'
        ]);
        toastr()->success('Berhasil Daftar Ulang', 'sukses');
    }
}
