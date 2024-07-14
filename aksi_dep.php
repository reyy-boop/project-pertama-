<?php
include "../konneksi.php";

// Tombol simpan di klik
if (isset($_POST['bsimpan'])) {
    // Mengambil data dari form
    $name = $_POST['tnama'];
    $hospital_id = $_POST['thospital_id'];


    // Validasi data
    if (empty($name) || empty($hospital_id)) {
        echo "<script>
                alert('di isi dulu kocak!!');
                document.location = 'departemen.php';
              </script>";
    } else {
        // Menyimpan data 
        $simpan = mysqli_query($conn, "INSERT INTO departments (name, hospital_id) VALUES ('$name', '$hospital_id')");

        // Menyimpan sukses 
        if ($simpan) {
            echo "<script>
                    alert('Udh gw simpen wibu!!');
                    document.location = 'departemen.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Simpan data gagal wibu!!');
                    document.location = 'departemen.php';
                  </script>";
        }
    }
}



// Tombol ubah di klik
if (isset($_POST['bubah'])) {
    // Mengambil data dari form
    $id = $_POST['id'];
    $name = $_POST['tnama'];
    $hospital_id = $_POST['thospital_id'];

    // Validasi data
    if (empty($name) || empty($hospital_id)) {
        echo "<script>
                alert('Nama dan alamat harus diisi!');
                document.location = 'departemen.php';
              </script>";
    } else {
        // Debugging untuk memeriksa nilai variabel
        echo "<script>console.log('ID: $id, Name: $name, hospital_id: $hospital_id');</script>";

        // Mengupdate data 
        $ubah = mysqli_query($conn, "UPDATE departments SET name='$name', hospital_id='$hospital_id' WHERE id='$id'");

        // Mengupdate sukses 
        if ($ubah) {
            echo "<script>
                    alert('Ubah data dah beres!!');
                    document.location = 'departemen.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Ubah data gagal!!');
                    document.location = 'departemen.php';
                  </script>";
        }
    }
}



// Tombol hapus di klik
if (isset($_POST['bhapus'])) {
    // Mengambil data dari form
    $id = $_POST['id'];

    // Menghapus data 
    $hapus = mysqli_query($conn, "DELETE FROM departments  WHERE id='$id'");

    // Menghapus sukses 
    if ($hapus) {
        echo "<script>
                alert('Hapus data sukses!!');
                document.location = 'departemen.php';
              </script>";
    } else {
        echo "<script>
                alert('Hapus data gagal!!');
                document.location = 'departemen.php';
              </script>";
    }
}
?>













