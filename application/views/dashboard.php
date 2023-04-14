<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <ol class="breadcrumb pull-right">
        <li class="ml-auto">
        </li>
        <li><a href="#" class="btn btn-primary btn-sm">
            <i class="far fa-calendar-alt"></i> <?= date('d F Y'); ?>
          </a>
        </li>
      </ol>
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard <small>Preview</small></h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">

          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $karyawan_count ?></h3>
              <p>Total Karyawan</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="<?= base_url('karyawan'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">

          <div class="small-box bg-success">
            <div class="inner">
              <h3>Monitoring</h3>
              <p>Ringkasan</p>
            </div>
            <div class="icon">
              <i class="fas fa-id-card"></i>
            </div>
            <a href="<?= base_url('monitoring'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">

          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $kontrak_warn_count; ?></h3>
              <p>Kontrak Yang Akan Habis</p>
            </div>
            <div class="icon">
              <i class="fas fa-times-circle"></i>
            </div>
            <a href="<?= base_url('warning'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>

  </section>
</div>