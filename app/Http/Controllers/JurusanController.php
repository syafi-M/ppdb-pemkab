<?php

namespace App\Http\Controllers;

use App\Http\Requests\JurusanRequest;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return Inertia::render('jurusan/Index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JurusanRequest $request)
    {
        $jurusan = new Jurusan();

        $jurusan = [
            'name' => $request->name,
            'image1' => $request->image1,
            'image2' => $request->image2,
            'image3' => $request->image3,
            'keterangan' => $request->keterangan,
        ]; 
        if ($request->hasFile('image1')) {
            $jurusan['image1'] = UploadImage($request, 'image1');
        }
        if ($request->hasFile('image2')) {
            $jurusan['image2'] = UploadImage($request, 'image2');
        }
        if ($request->hasFile('image3')) {
            $jurusan['image3'] = UploadImage($request, 'image3');
        }
        
        // dd($jurusan);
        Jurusan::create($jurusan);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return Inertia::render('siswa/Edit', [
            'jurusan' => Jurusan::with('jurusan')->find($jurusan) ,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Define the fields you want to update
        $data = [
            'name' => $request->name,
            'image1' => $request->image1,
            'image2' => $request->image2,
            'image3' => $request->image3,
            'keterangan' => $request->keterangan,
        ];

        
        // Iterate through the image fields and handle them
        
            if ($request->hasFile('image1')) {
                if ($request->oldImage1) {
                    Storage::disk('public')->delete('images/' . $request->oldImage1);
                }
                $data['image1'] = UploadImage($request, 'image1');
            } else {
                $data['image1'] = $request->image1;
            }

            if ($request->hasFile('image2')) {
                if ($request->oldImage2) {
                    Storage::disk('public')->delete('images/' . $request->oldImage2);
                }
                // Upload the new image and update the field
                $data['image2'] = UploadImage($request, 'image2');
            } else {
                // No new image file, use the old value
                $data['image2'] = $request->image2;
            }

            if ($request->hasFile('image3')) {
                if ($request->oldImage3) {
                    Storage::disk('public')->delete('images/' . $request->oldImage3);
                }
                // Upload the new image and update the field
                $data['image3'] = UploadImage($request, 'image3');
            } else {
                // No new image file, use the old value
                $data['image3'] = $request->image3;
            }
        
        dd($data);
        // Find and update the record
        Jurusan::findOrFail($id)->update($data);
        // $jurusanId->update($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        //
    }
}
