<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Sekolah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mb-4">Sistem Pendaftaran Sekolah</h1>
    
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Daftar Siswa</h3>
                <a href="tambah_ajax.php" class="btn btn-primary">Tambah Siswa</a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM siswa ORDER BY id DESC";
                        $result = mysqli_query($conn, $query);
                        
                        if (mysqli_num_rows($result) > 0) {
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                                echo "<td>" . date('d/m/Y', strtotime($row['tanggal_lahir'])) . "</td>";
                                echo "<td>";
                                echo "<button class='btn btn-sm btn-danger' onclick='hapusData(" . $row['id'] . ")'>Hapus</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>Belum ada data siswa</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function hapusData(id) {
    if (confirm('Yakin ingin menghapus data ini?')) {
        $.ajax({
            url: 'hapus_ajax.php',
            type: 'POST',
            data: {id: id},
            success: function(res) {
                if (res.trim() === 'success') {
                    alert('Data berhasil dihapus!');
                    location.reload();
                } else {
                    alert('Gagal menghapus data!');
                }
            }
        });
    }
}
</script>
</body>
</html> 