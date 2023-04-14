<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman Warning</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $this->session->flashdata('message'); ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Data kontrak yang akan habis</h3>
                            <div class="col-auto">
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="tableWarning">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>NPK</th>
                                        <th>Nama</th>
                                        <th>Departemen</th>
                                        <th>Mulai</th>
                                        <th>Habis</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($karyawan_warning as $row) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><a href="karyawan/detail/<?= $row->uid ?>" class="detail"><?php echo $row->npk ?></a></td>
                                            <td><?= $row->nama ?></td>
                                            <td><?= $row->department ?></td>
                                            <td>
                                                <?php

                                                if ($row->start == "0000-00-00") {
                                                    echo "-";
                                                } else {
                                                    echo date('d-m-Y', strtotime($row->start));
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php

                                                if ($row->finish == "0000-00-00") {
                                                    echo "-";
                                                } else {
                                                    echo date('d-m-Y', strtotime($row->finish));
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
        </div>
    </section>
</div>


<script>
    $(document).ready(function() {
        $('#tableWarning').DataTable({
            "buttons": ["excel", "pdf", "print"]
        });
    });
</script>