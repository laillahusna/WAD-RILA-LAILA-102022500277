<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $mode === 'tambah' ? 'Tambah' : 'Ubah' }} Kamar - Kos SJB</title>
    <style>
        *{box-sizing:border-box}
        body{
            margin:0;
            background:#f7f5f2;
            font-family:Arial,sans-serif;
            color:#263238;
        }
        .layout{
            display:flex;
            min-height:100vh;
        }
        .sidebar{
            width:232px;
            background:#465d19;
            color:white;
            padding:28px 16px;
            flex-shrink:0;
        }
        .logo{
            line-height:0;
            text-align:center;
            font-size:35px;
            font-weight:bold;
            letter-spacing:5px;
            margin:8px 0 26px;
        }
        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:13px 12px;
            border-radius:7px;
            margin:5px 0;
        }
        .sidebar a.active{
            background:#ad1755;
        }
        .content{
            flex:1;
        }
        .topbar{
            background:white;
            padding:18px 30px;
            display:flex;
            justify-content:space-between;
        }
        .main{
            padding:26px 30px;
            min-height:78vh;
        }
        .crumb{
            font-size:13px;
            color:#9e1d4c;
            margin-bottom:12px;
        }
        h1{
            margin:0 0 8px;
        }
        .muted{
            color:#6d7378;
        }
        .panel{
            background:white;
            border:1px solid #e3ddd6;
            border-radius:8px;
            padding:25px;
            max-width:800px;
            margin-top:22px;
        }
        .grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:20px;
        }
        .field label{
            display:block;
            font-weight:bold;
            font-size:14px;
            margin-bottom:8px;
        }
        .field input:not([type=checkbox]),.field select,.field textarea{
            width:100%;
            padding:11px;
            border:1px solid #ddd5cc;
            border-radius:6px;
            font:inherit;
        }
        .full{
            grid-column:1/-1;
        }
        .checks{
            display:flex;
            flex-wrap:wrap;
            gap:18px;
            padding:12px;
            border:1px solid #ddd5cc;
            border-radius:6px;
        }
        .checks label{
            font-weight:normal;
        }
        .btn{
            display:inline-block;
            padding:11px 14px;
            border:1px solid #9e174d;
            border-radius:6px;
            color:#9e174d;
            background:white;
            text-decoration:none;
            cursor:pointer;
            font:inherit;
        }
        .primary{
            background:#ad1755;
            color:white;
        }
        .errors{
            color:#9e174d;
            background:#f8dce7;
            padding:12px;
            border-radius:6px;
            margin-bottom:18px;
        }
        footer{
            background:#465d19;
            color:white;
            padding:18px 30px;
            font-size:13px;
        }
        @media(max-width:760px){
            .sidebar{
                width:150px;
            }
            .grid{
                grid-template-columns:1fr;
            }
            .full{
                grid-column:auto;
            }
            .main{
                padding:20px 14px;
            }
        }
    </style>
</head>

<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="logo">@include('partials.logo', ['width' => 72])</div>
            <p>Kelola Kos SJB</p>
            <a class="active" href="{{ route('kamar.index') }}">Master Kamar</a>
            <a href="#">Data Penghuni</a>
            <a href="#">Staff</a>
            <a href="#">Inventaris Aset</a>
        </aside>
        <div class="content">
            <header class="topbar">
                <span>Sistem Manajemen Kos &amp; Properti</span>
                @include('partials.user-info')
            </header>
            <div class="main">
                <div class="crumb">
                    <a href="{{ route('kamar.index') }}">Beranda / Master Kamar</a> / Form Kamar
                </div>
                <h1>{{ $mode === 'tambah' ? 'Tambah Kamar' : 'Ubah Kamar' }}</h1>
                <p class="muted">Isi data tipe kamar. Semua perubahan akan disimpan ke database.</p>
                <div class="panel">
                    @if($errors->any())
                    <div class="errors">
                        <strong>Periksa isian berikut:</strong>
                        <ul>@foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>@endif
                    <form method="POST" action="{{ $mode === 'tambah' ? route('kamar.store') : route('kamar.update', $kamar) }}">
                        @csrf @if($mode === 'ubah') @method('PUT') @endif
                        <div class="grid">
                            <div class="field">
                                <label for="kode_kamar">Kode kamar</label>
                                <input id="kode_kamar" name="kode_kamar" value="{{ old('kode_kamar', $kamar->kode_kamar) }}" placeholder="Contoh: Kamar 004" required>
                            </div>
                            <div class="field">
                                <label for="tipe">Tipe kamar</label>
                                <select id="tipe" name="tipe" required>
                                    <option value="">Pilih tipe</option>
                                    @foreach(['Standard','Deluxe','Premium'] as $tipe)
                                    <option value="{{ $tipe }}" @selected(old('tipe', $kamar->tipe) === $tipe)>{{ $tipe }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label for="panjang">Panjang ruangan (m)</label>
                                <input type="number" step="0.1" min="1" id="panjang" name="panjang" value="{{ old('panjang', $kamar->panjang) }}" required>
                            </div>
                            <div class="field">
                                <label for="lebar">Lebar ruangan (m)</label>
                                <input type="number" step="0.1" min="1" id="lebar" name="lebar" value="{{ old('lebar', $kamar->lebar) }}" required>
                            </div>
                            <div class="field">
                                <label for="harga_sewa">Harga sewa dasar (Rp / bulan)</label>
                                <input type="number" min="0" id="harga_sewa" name="harga_sewa" value="{{ old('harga_sewa', $kamar->harga_sewa) }}" required>
                            </div>
                            <div class="field">
                                <label for="status">Status kamar</label>
                                <select id="status" name="status" required>@foreach(['Tersedia','Terisi'] as $status)
                                    <option value="{{ $status }}" @selected(old('status', $kamar->status ?? 'Tersedia') === $status)>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field full">
                                <label>Fasilitas dalam kamar</label>
                                <div class="checks">
                                    @php $terpilih = old('fasilitas', array_filter(array_map('trim', explode(',', $kamar->fasilitas ?? '')))); @endphp
                                    @foreach(['Kasur','Lemari','WiFi','AC','Kamar Mandi Dalam'] as $fasilitas)
                                    <label>
                                        <input type="checkbox" name="fasilitas[]" value="{{ $fasilitas }}" @checked(in_array($fasilitas, $terpilih))> {{ $fasilitas }}
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="field full">
                                <label for="keterangan">Keterangan tambahan</label>
                                <textarea id="keterangan" name="keterangan" rows="3" placeholder="Opsional">{{ old('keterangan', $kamar->keterangan) }}</textarea>
                            </div>
                        </div>
                        <div style="display:flex;gap:10px;margin-top:24px">
                            <button class="btn primary" type="submit">{{ $mode === 'tambah' ? 'Simpan kamar' : 'Simpan perubahan' }}</button>
                            <a class="btn" href="{{ route('kamar.index') }}">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
            <footer>
                <strong>Modul:</strong> Master Kamar (Individu A) — Sistem Manajemen Kos &amp; Properti
            </footer>
        </div>
    </div>
</body>
</html>
