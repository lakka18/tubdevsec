<?php
/** @var mysqli $koneksi */
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika Data Mahasiswa diklik maka
if (isset($_POST['dataSiswa'])) {
    $output = '';

    // mengambil data Mahasiswa dari nim 
    $sql = "SELECT * FROM mahasiswa WHERE nim = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "s", $nim);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $output .= '
                        <tr>
                            <th width="40%">NIM</th>
                            <td width="60%">' . $row['nim'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Kelas</th>
                            <td width="60%">' . $row['kelas'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Jurusan</th>
                            <td width="60%">' . $row['jurusan'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Semester</th>
                            <td width="60%">' . $row['semester'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
