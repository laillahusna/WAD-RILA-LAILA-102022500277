<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Master Kamar - Kos SJB</title>
    <style>
        *{box-sizing:border-box}
        body{
            margin:0;
            font-family:Arial,sans-serif;
            color:#263238;
            background:#f7f5f2;
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
            font-size:35px;
            font-weight:bold;
            letter-spacing:5px;
            text-align:center;
            margin:8px 0 26px;
        }
        .sub{
            margin-bottom:22px;
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
            font-weight:bold;
        }
        .content{
            flex:1;
            min-width:0;
            display: flex;
            flex-direction: column;
        }
        .topbar{
            background:white;
            padding:18px 30px;
            display:flex;
            justify-content:space-between;
            border-bottom:1px solid #e5e0da;
        }
        main{
            padding:26px 30px;
            flex: 1;
            min-height:0;
        }
        .crumb{
            font-size:13px;
            color:#9e1d4c;
            margin-bottom:12px;
        }
        h1{
            font-size:28px;
            margin:0 0 8px;
        }
        .muted{
            color:#6d7378;
        }
        .toolbar{
            display:flex;
            gap:12px;
            margin:24px 0 16px;
        }
        .toolbar input{
            flex:1;
        }
        .input,select,textarea{
            font:inherit;
            padding:11px 12px;
            border:1px solid #ddd5cc;
            border-radius:6px;
            background:#fff;
            min-width:0;
        }
        .btn{
            display:inline-block;
            padding:10px 13px;
            border-radius:6px;
            text-decoration:none;
            border:1px solid #9e174d;
            color:#9e174d;
            background:#fff;
            cursor:pointer;
            font:inherit;
            font-size:14px;
        }
        .primary{
            background:#ad1755;
            color:white;
            border-color:#ad1755;
        }
        .danger{
            color:#c0392b;
            border-color:#c0392b;
        }
        .green{
            color:#465d19;
            border-color:#465d19;
        }
        .panel{
            background:white;
            border:1px solid #e3ddd6;
            border-radius:8px;
            overflow:hidden;
        }
        .table-wrap{
            overflow-x:auto;
        }
        table{
            width:100%;
            border-collapse:collapse;
            white-space:nowrap;
        }
        th,td{
            text-align:left;
            padding:13px 12px;
            border-bottom:1px solid #e6e0d9;
            font-size:14px;
        }
        th{
            background:#f0ede8;
            font-weight:bold;
        }
        .badge{
            display:inline-block;
            background:#eef1df;
            color:#465d19;
            padding:4px 7px;
            border-radius:4px;
            margin:1px;
            font-size:12px;
        }
        .status{
            padding:5px 9px;
            border-radius:14px;
            font-size:12px;
            background:#e5edce;
        }
        .status.terisi{
            background:#f8dce7;
            color:#9e174d;
        }
        .alert{
            background:#e8f2dc;
            padding:12px 15px;
            margin:16px 0;
            border-radius:6px;
            color:#334719;
        }
        .empty{
            padding:24px;
            text-align:center;
            color:#6d7378;
        }
        footer{
            background:#465d19;
            color:white;
            padding:18px 30px;
            font-size:13px;
            line-height:1.7;
            margin-top: auto;
        }
        @media(max-width:850px){
            .sidebar{
                width:170px
            }
            .toolbar{
                flex-wrap:wrap
            }
            .toolbar input{
                flex-basis:100%
            }
            main{
                padding:20px 14px
            }
            .topbar{
                padding:15px
            }
        }
    </style>
</head>

<body>
<div class="layout">
    <aside class="sidebar">
        <div class="logo">@include('partials.logo', ['width' => 72])</div>
        <div class="sub">Kelola Kos SJB</div>
        <a class="active" href="{{ route('kamar.index') }}">Master Kamar</a>
        <a href="#">Data Penghuni</a><a href="#">Staff</a><a href="#">Inventaris Aset</a>
    </aside>
    <div class="content">
        <header class="topbar"><span>Sistem Manajemen Kos &amp; Properti</span>@include('partials.user-info')</header>
        <main>
            <div class="crumb">Beranda / Master Kamar</div>
            <h1>Master Kamar</h1>
            <p class="muted">Kelola tipe kamar, ukuran, harga sewa dasar, dan fasilitas kamar.</p>
            @if(session('success'))<div class="alert">{{ session('success') }}</div>@endif
            @if($errors->any())<div class="alert" style="background:#f8dce7;color:#8b173f">Periksa kembali data yang dimasukkan. {{ $errors->first() }}</div>@endif
            <form class="toolbar" method="GET" action="{{ route('kamar.index') }}">
                <input class="input" type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari kode atau tipe kamar...">
                <select name="tipe">
                    <option>Semua tipe</option>
                    @foreach(['Standard','Deluxe','Premium'] as $tipe)
                        <option value="{{ $tipe }}" @selected(request('tipe') === $tipe)>{{ $tipe }}</option>
                    @endforeach
                </select>
                <button class="btn" type="submit">Cari</button>
                <a class="btn primary" href="{{ route('kamar.create') }}">+ Tambah Kamar</a>
            </form>
            <section class="panel"><div class="table-wrap">
                <table>
                    <thead><tr><th>No</th><th>Kode</th><th>Tipe</th><th>Ukuran</th><th>Harga Sewa / Bulan</th><th>Fasilitas</th><th>Status</th><th>Aksi</th></tr></thead>
                    <tbody>
                    @forelse($kamars as $kamar)
                        <tr>
                            <td>{{ $loop->iteration }}</td><td>{{ $kamar->kode_kamar }}</td><td>{{ $kamar->tipe }}</td>
                            <td>{{ $kamar->panjang }} x {{ $kamar->lebar }} m</td>
                            <td>Rp {{ number_format($kamar->harga_sewa, 0, ',', '.') }}</td>
                            <td>@foreach(array_filter(array_map('trim', explode(',', $kamar->fasilitas ?? ''))) as $f)<span class="badge">{{ $f }}</span>@endforeach</td>
                            <td><span class="status {{ strtolower($kamar->status) }}">{{ $kamar->status }}</span></td>
                            <td>
                                <a class="btn green" href="{{ route('kamar.show', $kamar) }}">Lihat</a>
                                <a class="btn" href="{{ route('kamar.edit', $kamar) }}">Ubah</a>
                                @if(auth()->user()->role === 'admin')
                                <form method="POST" action="{{ route('kamar.destroy', $kamar) }}" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn danger" type="submit">Hapus</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="empty">Belum ada data kamar yang cocok.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div><div style="padding:15px;color:#777;font-size:13px">Menampilkan {{ $kamars->count() }} data kamar.</div></section>
        </main>
        <footer>
            <strong>Modul:</strong> Master Kamar (Individu A) — Sistem Manajemen Kos &amp; Properti
        </footer>
    </div>
</div>
</body>
</html>
