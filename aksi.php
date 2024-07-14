<?php
include "../konneksi.php";

// Tombol simpan di klik
if (isset($_POST['bsimpan'])) {
    // Mengambil data dari form
    $name = $_POST['tnama'];
    $address = $_POST['talamat'];

    // Validasi data
    if (empty($name) || empty($address)) {
        echo "<script>
                alert('di isi dulu kocak!!');
                document.location = 'hospital.php';
              </script>";
    } else {
        // Menyimpan data 
        $simpan = mysqli_query($conn, "INSERT INTO hospitals (name, address) VALUES ('$name', '$address')");

        // Menyimpan sukses 
        if ($simpan) {
            echo "<script>
                    alert('Udh gw simpen wibu!!');
                    document.location = 'hospital.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Simpan data gagal wibu!!');
                    document.location = 'hospital.php';
                  </script>";
        }
    }
}

// Tombol ubah di klik
if (isset($_POST['bubah'])) {
    // Mengambil data dari form
    $hospital_id = $_POST['hospital_id'];
    $name = $_POST['tnama'];
    $address = $_POST['talamat'];

    // Validasi data
    if (empty($name) || empty($address)) {
        echo "<script>
                alert('Nama dan alamat harus diisi!');
                document.location = 'hospital.php';
              </script>";
    } else {
        // Mengupdate data 
        $ubah = mysqli_query($conn, "UPDATE hospitals SET name='$name', address='$address' WHERE hospital_id='$hospital_id'");

        // Mengupdate sukses 
        if ($ubah) {
            echo "<script>
                    alert('Ubah data dah beres!!');
                    document.location = 'hospital.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Ubah data gagal!!');
                    document.location = 'hospital.php';
                  </script>";
        }
    }
}

// Tombol hapus di klik
if (isset($_POST['bhapus'])) {
    // Mengambil data dari form
    $hospital_id = $_POST['hospital_id'];

    // Menghapus data 
    $hapus = mysqli_query($conn, "DELETE FROM hospitals WHERE hospital_id='$hospital_id'");

    // Menghapus sukses 
    if ($hapus) {
        echo "<script>
                alert('Hapus data sukses!!');
                document.location = 'hospital.php';
              </script>";
    } else {
        echo "<script>
                alert('Hapus data gagal!!');
                document.location = 'hospital.php';
              </script>";
    }
}
?>