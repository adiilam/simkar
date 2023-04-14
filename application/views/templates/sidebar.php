<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <a href="<?= base_url('dashboard'); ?>" class="brand-link">
    <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">HTA <small>Indonesia Group</small></span>
  </a>

  <div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image mt-2">
        <img src="<?php echo base_url() ?>assets/<?= !empty($_SESSION['user']->foto) ? 'foto/' . $_SESSION['user']->foto : 'dist/img/avatar8.png'; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $_SESSION['user']->nama ?? 'Admin Website'; ?></a>
        <a href="#" class="d-block" style="font-size: 14px;color: darkgrey;"><?= $_SESSION['user']->jabatan ?? 'Superadmin'; ?></a>
      </div>
    </div>

    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="<?= base_url('dashboard') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <?php if ($this->utils->isPermAllowed($_SESSION['perm']->karyawanRead ?? '')) : ?>
          <li class="nav-item">
            <a href="<?= base_url('karyawan') ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Karyawan
              </p>
            </a>
          </li>
        <?php endif; ?>


        <?php if ($this->utils->isPermAllowed($_SESSION['perm']->masterDataRead ?? '')) : ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('department') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Departemen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('section') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('jabatan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>


        <?php if ($this->utils->isPermAllowed($_SESSION['perm']->monitoringRead ?? '')) : ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Ringkasan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('monitoring') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monitoring</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('phk') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PHK</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('resign') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resign</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('habis_kontrak') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Habis Kontrak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('meninggal') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Meninggal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('lainnya') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lainnya</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>

        <?php if ($this->utils->isPermAllowed($_SESSION['perm']->warningRead ?? '')) : ?>
          <li class="nav-item">
            <a href="<?= base_url('warning') ?>" class="nav-link">
              <i class="nav-icon fas fa-window-close"></i>
              <p>
                Warning
              </p>
            </a>
          </li>
        <?php endif; ?>

        <?php if ($_SESSION['user']->username == 'admin') : ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('role') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('users') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>

</aside>