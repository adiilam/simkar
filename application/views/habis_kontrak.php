<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman Monitoring</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row mt-2">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Total Kontrak Non-aktif</h3>
                    </div>
                    <div class="card-body">
                        <form action="javascript:void()" method="post">
                            <div class="callout callout-warning">
                                <h5>PHK: <?= $inactive[0] ?? 0 ?></h5>
                                <p>Terdapat total <?= $inactive[0] ?? 0 ?> karyawan yang terkena PHK.</p>
                                <a href="<?= base_url('phk'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            <div class="callout callout-info">
                                <h5>Resign: <?= $inactive[1] ?? 0 ?></h5>
                                <p>Terdapat total <?= $inactive[1] ?? 0 ?> karyawan yang Resign.</p>
                                <a href="<?= base_url('resign'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            <div class="callout callout-warning">
                                <h5>Habis Kontrak: <?= $inactive[2] ?? 0 ?></h5>
                                <p>Terdapat total <?= $inactive[2] ?? 0 ?> karyawan sudah habis kontrak.</p>
                                <a href="<?= base_url('habis_kontrak'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            <div class="callout callout-danger">
                                <h5>Meninggal: <?= $inactive[3] ?? 0 ?></h5>
                                <p>Terdapat total <?= $inactive[3] ?? 0 ?> karyawan meninggal.</p>
                                <a href="<?= base_url('meninggal'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            <div class="callout callout-info">
                                <h5>Lainnya: <?= $inactive[4] ?? 0 ?></h5>
                                <p>Terdapat total <?= $inactive[4] ?? 0 ?> karyawan dengan alasan lainnya.</p>
                                <a href="<?= base_url('lainnya'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Data Karyawan Habis Kontrak</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="tableHabiskontrak">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>NPK</th>
                                    <th>Nama</th>
                                    <th>Departemen</th>
                                    <th>Tanggal Non-Aktif</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($karyawan_habis_kontrak as $row) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><a href="karyawan/detail/<?= $row->uid ?>" class="detail"><?php echo $row->npk ?></a></td>
                                        </td>
                                        <td><?= $row->nama ?></td>
                                        <td><?= $row->department ?></td>
                                        <td>
                                            <?php

                                            if ($row->tanggal == "0000-00-00") {
                                                echo "-";
                                            } else {
                                                echo date('d-m-Y', strtotime($row->tanggal));
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $('#tableHabiskontrak').DataTable({
            "buttons": ["excel", "pdf", "print"]
        });
    });
</script>