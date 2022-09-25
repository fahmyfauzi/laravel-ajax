<?php
include 'koneksi.php';
?>
<table class="data">
    <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Pekerjaan</th>
    </tr>
    <?php
    $data = mysqli_query($conn, "SELECT * from user");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <tr>
            <td><?= $d['nama'] ?></td>
            <td><?= $d['alamat'] ?></td>
            <td><?= $d['pekerjaan'] ?></td>

        </tr>
    <?php
    }
    ?>
</table>