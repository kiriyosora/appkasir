<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pelanggan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data Utama</a></li>
                        <li class="breadcrumb-item active">Pelanggan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5>Data Pelanggan</h5>
                </div>
                <div class="card-body">

                    <table id="example1" class="table table-hover">
                        <thead class="bg-dark">
                            <th>Pelanggan ID</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </thead>
                        <?php
                        $sql = "SELECT * FROM pelanggan";
                        $query = mysqli_query($koneksi, $sql);
                        while ($kolom = mysqli_fetch_array($query)) {
                        ?>

                            <tr>
                                <td><?= $kolom['PelangganID']; ?></td>
                                <td><?= $kolom['NamaPelanggan']; ?></td>
                                <td><?= $kolom['Alamat']; ?></td>
                                <td><?= $kolom['NomorTelepon']; ?></td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="#" data-toggle="modal" data-target="#modalUbah<?= $kolom['PelangganID']; ?>"><i class="fas fa-edit"></i></a>&nbsp; | &nbsp;
                                    <!-- Tombol Hapus -->
                                    <a onclick="return confirm('Yakin mau hapus data wir?')" href="aksi/pelanggan.php?aksi=hapus&pelangganID=<?= $kolom['PelangganID']; ?>"><i class="fas fa-trash"></a></i>
                                </td>
                            </tr>
                            <!-- Modal Ubah user -->
                            <div class="modal fade" id="modalUbah<?= $kolom['PelangganID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Produk</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="aksi/pelanggan.php" method="post">
                                                <input type="hidden" name="aksi" value="ubah">
                                                <input type="hidden" name="pelangganID" value="<?= $kolom['PelangganID']; ?>">

                                                <label for="NamaPelanggan">Nama Pelanggan</label>
                                                <input type="text" name="namapelanggan" value="<?= $kolom['NamaPelanggan']; ?>" class="form-control" required>
                                                <br>
                                                <label for="Alamat">Alamat</label>
                                                <textarea name="alamat" cols="60" rows="4" class="form-control"><?= $kolom['Alamat']; ?></textarea>
                                                <br>
                                                <label for="NomorTelepon">Nomor Telepon</label>
                                                <input type="text" name="nomortelepon" value="<?= $kolom['NomorTelepon']; ?>" class="form-control" required>
                                                <br>
                                                <button type="submit" class="btn btn-block bg-blue"> <i class="fas fa-save"></i> Simpan </button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } // akhir while
                        ?>
                    </table>

                    <button type="button" class="btn bg-dark btn-block mt-3" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah Pelanggan Baru</button>

                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Nodal Tambah user -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="aksi/pelanggan.php" method="post">
                    <input type="hidden" name="aksi" value="tambah">

                    <label for="NamaPelanggan">Nama Pelanggan</label>
                    <input type="text" name="namapelanggan" class="form-control" required>
                    <br>
                    <label for="Alamat">Alamat</label>
                    <textarea name="alamat" cols="60" rows="4"></textarea>
                    <br>
                    <label for="NomorTelepon">Nomor Telepon</label>
                    <input type="text" name="nomortelepon" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-block bg-blue"> <i class="fas fa-save"></i> Simpan </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>