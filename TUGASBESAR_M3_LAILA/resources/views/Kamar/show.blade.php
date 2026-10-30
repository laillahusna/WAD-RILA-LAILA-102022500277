<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Kamar</title>
    <style>
        body{
            font-family:Arial,sans-serif;
            background:#f7f5f2;
            color:#263238;
            margin:0;
            padding:35px;
        }
        .panel{
            max-width:700px;
            margin:auto;
            background:white;
            padding:28px;
            border:1px solid #ddd;
            border-radius:8px;
        }
        dt{
            font-weight:bold;
            margin-top:16px;
        }
        dd{
            margin:6px 0;
            color:#555;
        }
        .btn{
            display:inline-block;
            padding:10px 14px;
            border:1px solid #9e174d;
            border-radius:6px;
            color:#9e174d;
            text-decoration:none;
            margin-top:22px;
        }
        .primary{
            background:#ad1755;
            color:white;
        }
    </style>
</head>

<body>
    <section class="panel">
        <h1>Detail Kamar</h1>
        <dl>
            <dt>Kode kamar</dt>
            <dd>{{ $kamar->kode_kamar }}</dd>
            <dt>Tipe</dt>
            <dd>{{ $kamar->tipe }}</dd>
            <dt>Ukuran</dt>
            <dd>{{ $kamar->panjang }} x {{ $kamar->lebar }} m</dd>
            <dt>Harga sewa per bulan</dt>
            <dd>Rp {{ number_format($kamar->harga_sewa, 0, ',', '.') }}</dd>
            <dt>Fasilitas</dt>
            <dd>{{ $kamar->fasilitas ?: '-' }}</dd>
            <dt>Status</dt>
            <dd>{{ $kamar->status }}</dd>
            <dt>Keterangan</dt>
            <dd>{{ $kamar->keterangan ?: '-' }}</dd>
        </dl>
        <a class="btn" href="{{ route('kamar.index') }}">Kembali</a>
        <a class="btn primary" href="{{ route('kamar.edit', $kamar) }}">Ubah data</a>
    </section>
</body>
</html>
