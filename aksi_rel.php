<?php
include "../konneksi.php";

// Tombol simpan di klik
if (isset($_POST['bsimpan'])) {
    // Mengambil data dari form
    $name = $_POST['tnama'];
    $address = $_POST['talamat'];
    $hospital_id = $_POST['thospital_id'];

    // Validasi data
    if (empty($name) || empty($address) || empty($hospital_id)) {
        echo "<script>
                alert('Nama, alamat, dan ID rumah sakit harus diisi!');
                document.location = 'relasi.php';
              </script>";
    } else {
        // Menyimpan data ke tabel hospitals
        $simpan = mysqli_query($conn, "INSERT INTO hospitals (name, address) VALUES ('$name', '$address')");
        if ($simpan) {
            $hospital_id = mysqli_insert_id($conn); // Mendapatkan ID rumah sakit yang baru disimpan

            // Menyimpan data ke tabel departments
            $simpan = mysqli_query($conn, "INSERT INTO departments (name, hospital_id) VALUES ('$name', '$hospital_id')");

            // Menyimpan sukses 
            if ($simpan) {
                echo "<script>
                        alert('Data berhasil disimpan!');
                        document.location = 'relasi.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Simpan data ke tabel departments gagal!');
                        document.location = 'relasi.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Simpan data ke tabel hospitals gagal!');
                    document.location = 'relasi.php';
                  </script>";
        }
    }
}

// Tombol ubah di klik
if (isset($_POST['bubah'])) {
    // Mengambil data dari form
    $id = $_POST['id'];
    $name = $_POST['tnama'];
    $address = $_POST['talamat'];
    $hospital_id = $_POST['thospital_id'];

    // Validasi data
    if (empty($name) || empty($address) || empty($hospital_id)) {
        echo "<script>
                alert('Nama, alamat, dan ID rumah sakit harus diisi!');
                document.location = 'relasi.php';
              </script>";
    } else {
        // Mengupdate data di tabel hospitals
        $ubah = mysqli_query($conn, "UPDATE hospitals SET name='$name', address='$address' WHERE hospital_id='$hospital_id'");

        // Mengupdate data di tabel departments
        $ubah = mysqli_query($conn, "UPDATE departments SET name='$name' WHERE hospital_id='$hospital_id'");

        // Mengupdate sukses 
        if ($ubah) {
            echo "<script>
                    alert('Data berhasil diubah!');
                    document.location = 'relasi.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Ubah data gagal!');
                    document.location = 'relasi.php';
                  </script>";
        }
    }
}

// Tombol hapus di klik
if (isset($_POST['bhapus'])) {
    // Mengambil data dari form
    $id = $_POST['id'];

    // Menghapus data dari tabel departments
    $hapus = mysqli_query($conn, "DELETE FROM departments WHERE hospital_id='$id'");

    // Menghapus data dari tabel hospitals
    $hapus = mysqli_query($conn, "DELETE FROM hospitals WHERE hospital_id='$id'");

    // Menghapus sukses 
    if ($hapus) {
        echo "<script>
                alert('Data berhasil dihapus!');
                document.location = 'relasi.php';
              </script>";
    } else {
        echo "<script>
                alert('Hapus data gagal!');
                document.location = 'relasi.php';
              </script>";
    }
}
?>
