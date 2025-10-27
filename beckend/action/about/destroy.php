<?php
include '../../app.php';
include './show.php';

$storages = "../../storages/about/";

// Hapus gambar lama jika ada
if(!empty($school->school_logo) && file_exists($storages . $school->school_logo)) {
    unlink($storages . $school->school_logo);
}

// Hapus banner jika ada
if(!empty($school->school_banner) && file_exists($storages . $school->school_banner)) {
    unlink($storages . $school->school_banner);
}

// Hapus data
$qDelete = "DELETE FROM abouts WHERE id = '$school->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// Cek apakah data berhasil dihapus atau tidak
if ($result){
    echo"
    <script>
        alert('Data berhasil dihapus');
        window.location.href='../../pages/about/index.php';
    </script>
    ";
} else {
    echo"
    <script>
        alert('Data gagal dihapus');
        window.location.href='../../pages/about/index.php';
    </script>
    ";
}
?>