<?php
include "../konneksi.php";
include "../menu.php";

$query = mysqli_query($conn, "SELECT * FROM departments, hospitals WHERE departments.hospital_id = hospitals.hospital_id");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospitals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
<nav class="navbar bg-dark border-bottom border-body sticky-top" data-bs-theme="dark">
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo $home; ?>">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo $hospitals; ?>">Hospital</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="<?php echo $departments; ?>">Departemen</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="<?php echo $relasi; ?>">Relation</a>
        </li>
      </ul>
      </div>
      <a class="btn btn-danger" href="<?php echo $logout; ?>" role="button">Logout</a>
      </form>
    </div>
  </div>
</nav>
</nav>
    <div class="bg-cover">
    <div class="container">

    <div class="card text-bg-dark mt-4 text-center" style="max-width: 18rem ;">
        <h1>Relasi</h1>
    </div>
      
    <div class="card mt-4">
      <div class="card-header bg-dark text-white">
      Data Rumah Sakit
    </div>

    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modaltambah">
          Tambah Data
        </button>

     <table class="table table-dark table-bordered table-striped table-hover">
       <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>ID</th>
        <th>Alamat</th>
        <th>Aksi</th>
       </tr>
      
      <?php
      $no = 1;
      while ($data = mysqli_fetch_assoc($query)) : ?>
        <tr>
          <td><?= $no++?></td>
          <td><?= $data['name']?></td>
          <td><?= $data['hospital_id']?></td>
          <td><?= $data['address']?></td>
          <td>
            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalubah<?= $no ?>">Ubah</a>
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $no ?>">Hapus</a>
          </td>
        </tr>
                <!-- Awal Modal ubah -->
        <div class="modal fade" id="modalubah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Hospital</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="POST" action="aksi_rel.php">
                <input type="hidden" name="id" value="<?= $data['hospital_id'] ?>" >
                  <div class="modal-body">
                      
                          <div class="mb-3">
                            <label class="form-label">Nama Rumah Sakit</label>
                            <input type="text" class="form-control" name="tnama" value="<?= $data['name'] ?>" placeholder="Masukkan Nama RS" >
                          </div>
                          <div class="mb-3">
                            <label class="form-label">hospital_id</label>
                            <input type="text" class="form-control" name="thospital_id" value="<?= $data['hospital_id'] ?>" placeholder="Masukkan Nama RS" >
                          </div>
                          <div class="mb-3">
                            <label  class="form-label">Alamat</label>
                            <textarea class="form-control" name="talamat" placeholder="Masukkan Alamat RS" rows="3"><?= $data['address'] ?></textarea>
                          </div>
                      
                  </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="bubah">Ya Ubah Aja!!</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
              </form>
            </div>
          </div>
        </div>
        <!-- akhir Modal ubah -->

        <!-- Awal Modal hapus -->
        <div class="modal fade" id="modalhapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data!!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="POST" action="aksi_rel.php">
                <input type="hidden" name="id" value="<?= $data['hospital_id'] ?>" >
                  <div class="modal-body">
                    <h5 class="text-center">Apakah Anda yakin ingin menghapus data??<br>
                    <span class="text-danger"><?= $data['name'] ?> - <?= $data['hospital_id'] ?> - <?= $data['address'] ?></span>
                  </h5>
                  </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="bhapus">Ya Hapus Aja!!</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
              </form>
            </div>
          </div>
        </div>
        <!-- akhir Modal hapus -->
        <?php endwhile; ?>
    </table>

    <!-- Awal Modal Tambah Data -->
    <div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Hospital</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="aksi_rel.php">
              <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Nama Rumah Sakit</label>
                    <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama RS">
                  </div>
                  <div class="mb-3">
                            <label class="form-label">hospital_id</label>
                            <input type="text" class="form-control" name="thospital_id" value="<?= $data['hospital_id'] ?>" placeholder="Masukkan Nama RS" >
                          </div>
                  <div class="mb-3">
                    <label  class="form-label">Alamat</label>
                    <textarea class="form-control" name="talamat" placeholder="Masukkan Alamat RS" rows="3"></textarea>
                  </div>
              </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="bsimpan">Ya Tambah Aja!!</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
          </form>
        </div>
      </div>
    </div>
    <!-- akhir Modal Tambah Data -->
  </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
