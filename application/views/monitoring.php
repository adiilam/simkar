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
            <h3 class="card-title"> Total Kontrak Aktif</h3>
            <div class="col-auto">
              <a class="btn btn-warning float-right" href="<?= base_url('monitoring/excel'); ?>">
                <i class="fa fa-file"></i> Excel
              </a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered" id="tableDepartment">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Departemen</th>
                  <th>Tetap</th>
                  <th>PKWT</th>
                  <th>Magang</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($active as $key => $row) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $key ?></td>
                    <td><?= $row['Permanen'] ?? 0 ?></td>
                    <td><?= $row['PKWT'] ?? 0 ?></td>
                    <td><?= $row['Magang'] ?? 0 ?></td>
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