<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $query = Peserta::with('skema')->orderBy('nama', 'asc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
            });
        }

        $pesertas = $query->get();

        return view('peserta.index', compact('pesertas', 'search'));
    }

    public function create()
    {
        $skemas = Skema::orderBy('kode_skema')->get();
        return view('peserta.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'nik'      => ['required', 'string', 'max:16', 'regex:/^[0-9]+$/', 'unique:pesertas,nik'],
            'email'    => 'nullable|email|max:100',
            'no_hp'    => ['nullable', 'string', 'max:12', 'regex:/^[0-9]+$/'],
            'alamat'   => 'nullable|string',
            'skema_id' => 'required|exists:skemas,id',
        ], [
            'nama.required'     => 'Nama lengkap wajib diisi',
            'nama.regex'        => 'Nama hanya boleh berisi huruf dan spasi',
            'nik.required'      => 'NIK wajib diisi',
            'nik.regex'         => 'NIK hanya boleh berisi angka',
            'nik.unique'        => 'NIK sudah terdaftar',
            'no_hp.regex'       => 'Nomor HP hanya boleh berisi angka',
            'skema_id.required' => 'Skema sertifikasi wajib dipilih',
            'skema_id.exists'   => 'Skema tidak ditemukan',
        ]);

        Peserta::create($request->only([
            'nama', 'nik', 'email', 'no_hp', 'alamat', 'skema_id'
        ]));

        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function show($id)
    {
        $peserta = Peserta::with('skema')->findOrFail($id);
        return view('peserta.show', compact('peserta'));
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $skemas  = Skema::orderBy('kode_skema')->get();

        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);

        $request->validate([
            'nama'     => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'nik'      => ['required', 'string', 'max:16', 'regex:/^[0-9]+$/', 'unique:pesertas,nik,' . $id],
            'email'    => 'nullable|email|max:100',
            'no_hp'    => ['nullable', 'string', 'max:12', 'regex:/^[0-9]+$/'],
            'alamat'   => 'nullable|string',
            'skema_id' => 'required|exists:skemas,id',
        ], [
            'nama.required'     => 'Nama lengkap wajib diisi',
            'nama.regex'        => 'Nama hanya boleh berisi huruf dan spasi',
            'nik.required'      => 'NIK wajib diisi',
            'nik.regex'         => 'NIK hanya boleh berisi angka',
            'nik.unique'        => 'NIK sudah terdaftar',
            'no_hp.regex'       => 'Nomor HP hanya boleh berisi angka',
            'skema_id.required' => 'Skema sertifikasi wajib dipilih',
        ]);

        $peserta->update($request->only([
            'nama', 'nik', 'email', 'no_hp', 'alamat', 'skema_id'
        ]));

        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil diubah.');
    }

    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil dihapus.');
    }
}