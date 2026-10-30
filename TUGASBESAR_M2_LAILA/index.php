<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Master Kamar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
                <div class="remah-roti"><a href="index.php">Beranda</a> / Master Kamar</div>
                <div class="judul-halaman">
                <h1>Master Kamar</h1>
                <p>Kelola tipe kamar, ukuran, harga sewa dasar, dan fasilitas kamar.</p>
                </div>

                <div class="toolbar">
                <input class="cari" type="text" placeholder="Cari kode atau tipe kamar..." aria-label="Cari kamar">
                <select aria-label="Filter tipe">
                    <option>Semua tipe</option>
                    <option>Standard</option>
                    <option>Deluxe</option>
                    <option>Premium</option>
                </select>
                <a href="form-kamar.php" class="tombol tombol-utama">+ Tambah Kamar</a>
                </div>

                <section class="kotak">
                <div class="tabel-bungkus">
                    <table>
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Tipe</th>
                        <th>Ukuran</th>
                        <th>Harga Sewa / Bulan</th>
                        <th>Fasilitas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include 'koneksi.php';
                            $hasil = mysqli_query($koneksi, "SELECT * FROM kamar ORDER BY id_kamar");
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($hasil)) {
                            ?>
                            <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['kode_kamar']) ?></td>
                            <td><?= htmlspecialchars($row['tipe']) ?></td>
                            <td><?= $row['panjang'] ?> x <?= $row['lebar'] ?> m</td>
                            <td>Rp <?= number_format($row['harga_sewa'], 0, ',', '.') ?></td>
                            <td>
                                <?php foreach (explode(", ", $row['fasilitas']) as $f) { ?>
                                <span class="badge-fasilitas"><?= htmlspecialchars($f) ?></span>
                                <?php } ?>
                            </td>
                            <td>
                                <span class="status status-<?= strtolower($row['status']) ?>">
                                <?= $row['status'] ?>
                                </span>
                            </td>
                            <td class="kolom-aksi">
                                <a href="#lihat-<?= $row['id_kamar'] ?>" class="tombol tombol-kecil tombol-lihat">Lihat</a>
                                <a href="form-kamar.php" class="tombol tombol-kecil tombol-ubah">Ubah</a>
                                <a href="#hapus-<?= $row['id_kamar'] ?>" class="tombol tombol-kecil tombol-hapus">Hapus</a>
                            </td>
                            </tr>
                        <?php } ?>
                        <tr>
                        <td>1</td>
                        <td>Kamar 001</td>
                        <td>Standard</td>
                        <td>4 x 5 m</td>
                        <td>Rp 1.250.000</td>
                        <td>
                            <span class="badge-fasilitas">Kasur</span>
                            <span class="badge-fasilitas">Lemari</span>
                            <span class="badge-fasilitas">WiFi</span>
                        </td>
                        <td><span class="status status-tersedia">Tersedia</span></td>
                        <td class="kolom-aksi">
                            <a href="#lihat-001" class="tombol tombol-kecil tombol-lihat">Lihat</a>
                            <a href="form-kamar.php" class="tombol tombol-kecil tombol-ubah">Ubah</a>
                            <a href="#hapus-001" class="tombol tombol-kecil tombol-hapus">Hapus</a>
                        </td>
                        </tr>
                        <tr>
                        <td>2</td>
                        <td>Kamar 002</td>
                        <td>Deluxe</td>
                        <td>5 x 5 m</td>
                        <td>Rp 2.000.000</td>
                        <td>
                            <span class="badge-fasilitas">Kasur</span>
                            <span class="badge-fasilitas">Lemari</span>
                            <span class="badge-fasilitas">WiFi</span>
                            <span class="badge-fasilitas">AC</span>
                        </td>
                        <td><span class="status status-terisi">Terisi</span></td>
                        <td class="kolom-aksi">
                            <a href="#lihat-002" class="tombol tombol-kecil tombol-lihat">Lihat</a>
                            <a href="form-kamar.php" class="tombol tombol-kecil tombol-ubah">Ubah</a>
                            <a href="#hapus-002" class="tombol tombol-kecil tombol-hapus">Hapus</a>
                        </td>
                        </tr>
                        <tr>
                        <td>3</td>
                        <td>Kamar 003</td>
                        <td>Premium</td>
                        <td>6 x 7 m</td>
                        <td>Rp 3.250.000</td>
                        <td>
                            <span class="badge-fasilitas">Kasur</span>
                            <span class="badge-fasilitas">Lemari</span>
                            <span class="badge-fasilitas">WiFi</span>
                            <span class="badge-fasilitas">AC</span>
                            <span class="badge-fasilitas">Kamar Mandi Dalam</span>
                        </td>
                        <td><span class="status status-tersedia">Tersedia</span></td>
                        <td class="kolom-aksi">
                            <a href="#lihat-003" class="tombol tombol-kecil tombol-lihat">Lihat</a>
                            <a href="form-kamar.php" class="tombol tombol-kecil tombol-ubah">Ubah</a>
                            <a href="#hapus-003" class="tombol tombol-kecil tombol-hapus">Hapus</a>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <p class="info-tabel">Menampilkan 3 dari 3 kamar.</p>
                </section>
            </main>

            <footer>
                <p><strong>Nama:</strong> Laila Husna Mahmuda &nbsp;|&nbsp; <strong>NIM:</strong> 102022500277 &nbsp;|&nbsp; <strong>Kelas:</strong> SI-49-07</p>
                <p><strong>Kelompok:</strong> SJB &nbsp;|&nbsp; <strong>Modul:</strong> Master Kamar (Individu A) - Studi Kasus 07 Sistem Manajemen Kos &amp; Properti</p>
            </footer>
            </div>
        </div>

        <div class="modal" id="lihat-001">
            <div class="modal-isi">
            <h2>Detail Kamar 001</h2>
            <dl>
                <dt>Tipe</dt><dd>Standard</dd>
                <dt>Ukuran</dt><dd>4 x 5 m</dd>
                <dt>Harga sewa</dt><dd>Rp 1.250.000 / bulan</dd>
                <dt>Fasilitas</dt><dd>Kasur, Lemari, WiFi</dd>
                <dt>Status</dt><dd>Tersedia</dd>
            </dl>
            <div class="modal-aksi"><a href="#" class="tombol tombol-garis">Tutup</a></div>
            </div>
        </div>

        <div class="modal" id="lihat-002">
            <div class="modal-isi">
            <h2>Detail Kamar 002</h2>
            <dl>
                <dt>Tipe</dt><dd>Deluxe</dd>
                <dt>Ukuran</dt><dd>5 x 5 m</dd>
                <dt>Harga sewa</dt><dd>Rp 2.000.000 / bulan</dd>
                <dt>Fasilitas</dt><dd>Kasur, Lemari, WiFi, AC</dd>
                <dt>Status</dt><dd>Terisi</dd>
            </dl>
            <div class="modal-aksi"><a href="#" class="tombol tombol-garis">Tutup</a></div>
            </div>
        </div>

        <div class="modal" id="lihat-003">
            <div class="modal-isi">
            <h2>Detail Kamar 003</h2>
            <dl>
                <dt>Tipe</dt><dd>Premium</dd>
                <dt>Ukuran</dt><dd>6 x 7 m</dd>
                <dt>Harga sewa</dt><dd>Rp 3.250.000 / bulan</dd>
                <dt>Fasilitas</dt><dd>Kasur, Lemari, WiFi, AC, Kamar Mandi Dalam</dd>
                <dt>Status</dt><dd>Tersedia</dd>
            </dl>
            <div class="modal-aksi"><a href="#" class="tombol tombol-garis">Tutup</a></div>
            </div>
        </div>

        <div class="modal" id="hapus-001">
            <div class="modal-isi">
            <h2>Hapus Kamar 001?</h2>
            <p>Data tipe kamar ini akan dihapus dan tidak bisa dikembalikan.</p>
            <div class="modal-aksi">
                <a href="#" class="tombol tombol-garis">Batal</a>
                <a href="#" class="tombol tombol-bahaya">Ya, hapus</a>
            </div>
            </div>
        </div>

        <div class="modal" id="hapus-002">
            <div class="modal-isi">
            <h2>Hapus Kamar 002?</h2>
            <p>Data tipe kamar ini akan dihapus dan tidak bisa dikembalikan.</p>
            <div class="modal-aksi">
                <a href="#" class="tombol tombol-garis">Batal</a>
                <a href="#" class="tombol tombol-bahaya">Ya, hapus</a>
            </div>
            </div>
        </div>

        <div class="modal" id="hapus-003">
            <div class="modal-isi">
            <h2>Hapus Kamar 003?</h2>
            <p>Data tipe kamar ini akan dihapus dan tidak bisa dikembalikan.</p>
            <div class="modal-aksi">
                <a href="#" class="tombol tombol-garis">Batal</a>
                <a href="#" class="tombol tombol-bahaya">Ya, hapus</a>
            </div>
            </div>
        </div>
    </body>
</html>