<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        $skemas = Skema::orderBy('kode_skema')->get();
        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('skema.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_skema' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z0-9\-]+$/', 'unique:skemas,kode_skema'],
            'nama_skema' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'deskripsi'  => 'nullable|string',
        ], [
            'kode_skema.required' => 'Kode skema wajib diisi',
            'kode_skema.regex'    => 'Kode skema hanya boleh huruf, angka, dan tanda hubung',
            'kode_skema.unique'   => 'Kode skema sudah digunakan',
            'nama_skema.required' => 'Nama skema wajib diisi',
            'nama_skema.regex'    => 'Nama skema hanya boleh berisi huruf dan spasi',
        ]);

        Skema::create($request->only(['kode_skema', 'nama_skema', 'deskripsi']));

        return redirect()->route('skema.index')
            ->with('success', 'Data skema berhasil ditambahkan.');
    }

    public function show($id)
    {
        $skema = Skema::with('pesertas')->findOrFail($id);
        return view('skema.show', compact('skema'));
    }

    public function edit($id)
    {
        $skema = Skema::findOrFail($id);
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, $id)
    {
        $skema = Skema::findOrFail($id);

        $request->validate([
            'kode_skema' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z0-9\-]+$/', 'unique:skemas,kode_skema,' . $id],
            'nama_skema' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'deskripsi'  => 'nullable|string',
        ], [
            'kode_skema.required' => 'Kode skema wajib diisi',
            'kode_skema.regex'    => 'Kode skema hanya boleh huruf, angka, dan tanda hubung',
            'kode_skema.unique'   => 'Kode skema sudah digunakan',
            'nama_skema.required' => 'Nama skema wajib diisi',
            'nama_skema.regex'    => 'Nama skema hanya boleh berisi huruf dan spasi',
        ]);

        $skema->update($request->only(['kode_skema', 'nama_skema', 'deskripsi']));

        return redirect()->route('skema.index')
            ->with('success', 'Data skema berhasil diubah.');
    }

    public function destroy($id)
    {
        $skema = Skema::findOrFail($id);

        if ($skema->pesertas()->count() > 0) {
            return redirect()->route('skema.index')
                ->with('error', 'Skema tidak bisa dihapus karena masih digunakan oleh peserta.');
        }

        $skema->delete();

        return redirect()->route('skema.index')
            ->with('success', 'Data skema berhasil dihapus.');
    }
}