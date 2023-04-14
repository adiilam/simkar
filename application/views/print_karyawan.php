<html>

<head>
    <title></title>
    <link rel="stylesheet" media='all' href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>

    <h3 style="text-align: center">DAFTAR DATA KARYAWAN</h3>

    <table class="table table-bordered">
        <thead class="table-responsive text-nowrap">
            <tr>
                <th>NO</th>
                <th>NPK</th>
                <th>No KTP</th>
                <th>Nama Karyawan</th>
                <th>Departemen</th>
                <th>Section</th>
                <th>Jabatan</th>
                <th>Alamat</th>
                <th>Alamat Domisili</th>
                <th>Status Nikah</th>
                <th>Jenis Kelamin</th>
                <th>No Telepon</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Email</th>
                <th>No NPWP</th>
                <th>Kebangsaan</th>
                <th>Agama</th>
                <th>Jumlah Anak</th>
                <th>Golongan Darah</th>
                <th>BPJS Kesehatan</th>
                <th>BPJS Ketenagakerjaan</th>
            </tr>

            <?php
            $no = 1;
            foreach ($karyawan as $kry) : ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $kry->npk ?></td>
                    <td><?= $kry->nik ?></td>
                    <td><?= $kry->nama ?></td>
                    <td><?= $kry->department ?></td>
                    <td><?= $kry->section ?></td>
                    <td><?= $kry->jabatan ?></td>
                    <td><?= $kry->alamat ?></td>
                    <td><?= $kry->alamat_domisili ?></td>
                    <td><?= $kry->status_nikah ?></td>
                    <td><?= $kry->jkel ?></td>
                    <td><?= $kry->tlp ?></td>
                    <td><?= $kry->tempat_lahir ?>, <?= $kry->tanggal_lahir ?></td>
                    <td><?= $kry->email ?></td>
                    <td><?= $kry->npwp ?></td>
                    <td><?= $kry->kebangsaan ?></td>
                    <td><?= $kry->agama ?></td>
                    <td><?= $kry->jumlah_anak ?></td>
                    <td><?= $kry->golongan_darah ?></td>
                    <td><?= $kry->bpjs_kes ?></td>
                    <td><?= $kry->bpjs_tk ?></td>
                </tr>

            <?php endforeach; ?>
        </thead>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>