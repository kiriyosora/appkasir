<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data Utama</a></li>
            <li class="breadcrumb-item active">User</li>
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
          <h5>Data User</h5>
        </div>
        <div class="card-body">
          <button class="btn bg-dark mb-2" data-toggle="modal" data-target="#modalRecycleBin"><i class="fas fa-recycle"></i> Recycle Bin</button>
          <table id="example1" class="table table-hover">
            <thead class="bg-dark">
              <th>ID</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Password</th>
              <th>Hak Akses</th>
              <th>Aksi</th>
            </thead>
            <?php
            $sql = "SELECT * FROM user WHERE dihapus_pada IS NULL";
            $query = mysqli_query($koneksi, $sql);
            while ($kolom = mysqli_fetch_array($query)) {
            ?>

              <tr>
                <td><?= $kolom['id_user']; ?></td>
                <td><?= $kolom['nama_user']; ?></td>
                <td><?= $kolom['username']; ?></td>
                <td><?= $kolom['password']; ?></td>
                <td><?= $kolom['hak_akses']; ?></td>
                <td>
                  <!-- Tombol Edit -->
                  <a href="#" data-toggle="modal" data-target="#modalUbah<?=$kolom['id_user']; ?>"><i class="fas fa-edit"></i></a>&nbsp; | &nbsp;
                  <!-- Tombol Hapus -->
                  <a onclick="return confirm('Yakin mau hapus data wir?')" href="aksi/user.php?aksi=hapus&id_user=<?= $kolom['id_user']; ?>"><i class="fas fa-trash"></a></i>
                </td>
              </tr>
              <!-- Modal Ubah user -->
              <div class="modal fade" id="modalUbah<?= $kolom['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah user</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="aksi/user.php" method="post">
                        <input type="hidden" name="aksi" value="ubah">
                        <input type="hidden" name="id_user" value="<?=$kolom['id_user'];?>">

                        <label for="nama_user">Nama User</label>
                        <input type="text" name="nama_user" value="<?=$kolom['nama_user'];?>" class="form-control" required>
                        <br>
                        <label for="username">Username</label>
                        <input type="text" name="username" value="<?=$kolom['username'];?>" class="form-control" required>
                        <br>
                        <label for="password">Password</label>
                        <input type="password" name="password" value="<?=$kolom['password'];?>" class="form-control" required>
                        <br>
                        <label for="hak_akses">Hak Akses</label>
                        <select class="form-control" name="hak_akses">
                          <option value="<?=$kolom['hak_akses'];?>"><?=$kolom['hak_akses'];?></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
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

          <button type="button" class="btn bg-dark btn-block mt-3" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah User Baru</button>

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
        <h5 class="modal-title" id="exampleModalLabel">Tambah user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="aksi/user.php" method="post">
          <input type="hidden" name="aksi" value="tambah">

          <label for="nama_user">Nama User</label>
          <input type="text" name="nama_user" class="form-control" required>
          <br>
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" required>
          <br>
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" required>
          <br>
          <label for="hak_akses">Hak Akses</label>
          <select class="form-control" name="hak_akses">
            <option value="1">1</option>
            <option value="2">2</option>
            </select>
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

<!-- Modal Recycle Bin-->
<div class="modal fade" id="modalRecycleBin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Penghapusan Sementara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover">
          <thead class="bg-dark">
              <th>ID</th>
              <th>Username</th>
              <th>Password</th>
              <th>Dihapus Pada</th>
              <th>Aksi</th>
          </thead>
          <?php
          $sql = "SELECT * FROM user WHERE dihapus_pada IS NOT NULL";
          $query = mysqli_query($koneksi, $sql);
          while ($kolom = mysqli_fetch_array($query)) {
          ?>

            <tr>
              <td><?= $kolom['id_user']; ?></td>
              <td><?= $kolom['username']; ?></td>
              <td><?= $kolom['password']; ?></td>
              <td><?= $kolom['dihapus_pada']; ?></td>
              <td> <a onclick="return confirm('Restore ga wir?')" href="aksi/user.php?aksi=restore&id_user=<?= $kolom['id_user']; ?>"><i class="fas fa-trash-restore"></i></a>|<a onclick="return confirm('Yakin mau hapus permanen wir?')" href="aksi/user.php?aksi=hapus-permanen&id_user=<?= $kolom['id_user']; ?>"><i class="fas fa-eraser"></i></a></td>
            </tr>
          <?php
          } // akhir while
          ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>