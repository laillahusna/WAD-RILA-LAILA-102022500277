<?php

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Kamar - Admin Kos SJB</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <div class="admin-layout">

    <aside class="sidebar">
        <a href="index.php" class="logo-link">
            <img src="Logo Footer.png" alt="Logo Kos SJB" class="logo-img">
        </a>
        <p class="logo-sub">Kelola Kos SJB</p>
      <nav aria-label="Menu admin">
        <ul>
          <li><a href="index.php" class="aktif">Master Kamar</a></li>
          <li><a href="#">Data Penghuni</a></li>
          <li><a href="#">Staff</a></li>
          <li><a href="#">Inventaris Aset</a></li>
        </ul>
      </nav>
    </aside>

    <div class="konten">
      <header class="topbar">
        <span>Sistem Manajemen Kos &amp; Properti</span>
        <span>Halo, <strong>Admin</strong></span>
      </header>

      <main>
        <div class="remah-roti">
          <a href="index.php">Beranda</a> / <a href="index.php">Master Kamar</a> / Form Kamar
        </div>
        <div class="judul-halaman">
          <h1>Form Kamar</h1>
          <p>Isi data tipe kamar. Halaman yang sama dipakai untuk menambah dan mengubah data.</p>
        </div>

        <section class="kotak form-kotak" style="margin-top: 24px;">
          <form action="simpan.php" method="post">
            <div class="baris-form">
              <div class="kolom-form">
                <label for="kode">Kode kamar</label>
                <input type="text" id="kode" name="kode" placeholder="Contoh: Kamar 004" required>
              </div>

              <div class="kolom-form">
                <label for="tipe">Tipe kamar</label>
                <select id="tipe" name="tipe" required>
                  <option value="">Pilih tipe</option>
                  <option>Standard</option>
                  <option>Deluxe</option>
                  <option>Premium</option>
                </select>
              </div>

              <div class="kolom-form">
                <label for="panjang">Panjang ruangan (m)</label>
                <input type="number" id="panjang" name="panjang" min="1" placeholder="4" required>
              </div>

              <div class="kolom-form">
                <label for="lebar">Lebar ruangan (m)</label>
                <input type="number" id="lebar" name="lebar" min="1" placeholder="5" required>
              </div>

              <div class="kolom-form">
                <label for="harga">Harga sewa dasar (Rp / bulan)</label>
                <input type="number" id="harga" name="harga" min="0" step="50000" placeholder="1250000" required>
                <p class="bantuan">Tulis angka saja, tanpa titik.</p>
              </div>

              <div class="kolom-form">
                <label for="status">Status kamar</label>
                <select id="status" name="status">
                  <option>Tersedia</option>
                  <option>Terisi</option>
                </select>
              </div>

              <fieldset class="kolom-form penuh">
                <legend class="judul-kelompok">Fasilitas dalam kamar</legend>
                <div class="pilihan-fasilitas">
                  <label><input type="checkbox" name="fasilitas[]" value="Kasur"> Kasur</label>
                  <label><input type="checkbox" name="fasilitas[]" value="Lemari"> Lemari</label>
                  <label><input type="checkbox" name="fasilitas[]" value="WiFi"> WiFi</label>
                  <label><input type="checkbox" name="fasilitas[]" value="AC"> AC</label>
                  <label><input type="checkbox" name="fasilitas[]" value="Kamar Mandi Dalam"> Kamar Mandi Dalam</label>
                </div>
              </fieldset>

              <div class="kolom-form penuh">
                <label for="catatan">Keterangan tambahan</label>
                <textarea id="catatan" name="catatan" rows="3" placeholder="Opsional"></textarea>
              </div>
            </div>

            <div class="aksi-form">
              <button type="submit" class="tombol tombol-utama">Simpan kamar</button>
              <a href="simpan.php" class="tombol tombol-garis">Batal</a>
            </div>
          </form>
        </section>
      </main>

      <footer>
        <p><strong>Nama:</strong> Laila Husna Mahmuda &nbsp;|&nbsp; <strong>NIM:</strong> 102022500277 &nbsp;|&nbsp; <strong>Kelas:</strong> SI-49-07</p>
        <p><strong>Kelompok:</strong> SJB &nbsp;|&nbsp; <strong>Modul:</strong> Master Kamar (Individu A) - Studi Kasus 07 Sistem Manajemen Kos &amp; Properti</p>
      </footer>
    </div>
  </div>
</body>
</html>
