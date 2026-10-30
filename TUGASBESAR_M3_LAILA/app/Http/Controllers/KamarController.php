<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KamarController extends Controller
{
    public function index(Request $request)
    {
        $query = Kamar::query();

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('kode_kamar', 'like', "%{$cari}%")
                  ->orWhere('tipe', 'like', "%{$cari}%");
            });
        }

        if ($request->filled('tipe') && $request->tipe !== 'Semua tipe') {
            $query->where('tipe', $request->tipe);
        }

        $kamars = $query->orderBy('id_kamar')->get();

        return view('kamar.index', compact('kamars'));
    }

    public function create()
    {
        return view('kamar.form', ['kamar' => new Kamar(), 'mode' => 'tambah']);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['fasilitas'] = implode(', ', $data['fasilitas'] ?? []);
        Kamar::create($data);

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil ditambahkan.');
    }

    public function show(Kamar $kamar)
    {
        return view('kamar.show', compact('kamar'));
    }

    public function edit(Kamar $kamar)
    {
        return view('kamar.form', ['kamar' => $kamar, 'mode' => 'ubah']);
    }

    public function update(Request $request, Kamar $kamar)
    {
        $data = $this->validatedData($request, $kamar);
        $data['fasilitas'] = implode(', ', $data['fasilitas'] ?? []);
        $kamar->update($data);

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil diperbarui.');
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil dihapus.');
    }

    private function validatedData(Request $request, ?Kamar $kamar = null): array
    {
        return $request->validate([
            'kode_kamar' => [
                'required', 'string', 'max:50',
                Rule::unique('kamar', 'kode_kamar')->ignore($kamar?->id_kamar, 'id_kamar'),
            ],
            'tipe' => ['required', Rule::in(['Standard', 'Deluxe', 'Premium'])],
            'panjang' => ['required', 'numeric', 'min:1'],
            'lebar' => ['required', 'numeric', 'min:1'],
            'harga_sewa' => ['required', 'integer', 'min:0'],
            'status' => ['required', Rule::in(['Tersedia', 'Terisi'])],
            'fasilitas' => ['nullable', 'array'],
            'fasilitas.*' => [Rule::in(['Kasur', 'Lemari', 'WiFi', 'AC', 'Kamar Mandi Dalam'])],
            'keterangan' => ['nullable', 'string', 'max:1000'],
        ]);
    }
}
