<div class="content-wrapper">
  <section class="content">
    <h4 style="text-align: center"><strong>DETAIL DATA KARYAWAN</strong></h4>
    <nav>
      <div class="nav nav-tabs nav-justified text-nowrap" id="nav-tab" role="tablist">
        <a class="profile-tab-item nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><i class="fas fa-user"></i> Profile</a>
        <a class="profile-tab-item nav-link" id="kontrak-tab" data-toggle="tab" href="#kontrak" role="tab" aria-controls="kontrak" aria-selected="false"><i class="far fa-file-alt"></i> Kontrak</a>
        <a class="profile-tab-item nav-link" id="promosi-tab" data-toggle="tab" href="#promosi" role="tab" aria-controls="promosi" aria-selected="false"><i class="fas fa-file-import"></i> Perpindahan</a>
        <a class="profile-tab-item nav-link" id="keluarga-tab" data-toggle="tab" href="#keluarga" role="tab" aria-controls="keluarga" aria-selected="false"><i class="fas fa-users"></i> Keluarga</a>
        <a class="profile-tab-item nav-link" id="pendidikan-tab" data-toggle="tab" href="#pendidikan" role="tab" aria-controls="pendidikan" aria-selected="false"><i class="fas fa-user-graduate"></i> Pendidikan</a>
        <a class="profile-tab-item nav-link" id="pengalaman-tab" data-toggle="tab" href="#pengalaman" role="tab" aria-controls="pengalaman" aria-selected="false"><i class="fas fa-briefcase"></i> Pengalaman</a>
        <a class="profile-tab-item nav-link" id="kontak-tab" data-toggle="tab" href="#kontak" role="tab" aria-controls="kontak" aria-selected="false"><i class="fas fa-book"></i> Kontak Darurat</a>
        <a class="profile-tab-item nav-link" id="training-tab" data-toggle="tab" href="#training" role="tab" aria-controls="training" aria-selected="false"><i class="far fa-clipboard"></i> Training</a>
        <a class="profile-tab-item nav-link" id="penilaian-tab" data-toggle="tab" href="#penilaian" role="tab" aria-controls="penilaian" aria-selected="false"><i class="fas fa-edit"></i> Penilaian Karya</a>
        <a class="profile-tab-item nav-link" id="peringatan-tab" data-toggle="tab" href="#peringatan" role="tab" aria-controls="peringatan" aria-selected="false"><i class="fas fa-bell"></i> Peringatan</a>
        <a class="profile-tab-item nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="false"><i class="fas fa-dollar-sign"></i> Akun Bank</a>
        <a class="profile-tab-item nav-link" id="resume-tab" data-toggle="tab" href="#resume" role="tab" aria-controls="resume" aria-selected="false"><i class="fas fa-address-card"></i> Resume</a>
      </div>
    </nav>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <?php include "./application/views/profil.php"; ?>
      </div>
      <div class="tab-pane fade" id="promosi" role="tabpanel" aria-labelledby="promosi-tab">
        <?php include "./application/views/promosi.php"; ?>
      </div>
      <div class="tab-pane fade" id="keluarga" role="tabpanel" aria-labelledby="keluarga-tab">
        <?php include "./application/views/keluarga.php"; ?>
      </div>
      <div class="tab-pane fade" id="pendidikan" role="tabpanel" aria-labelledby="pendidikan-tab">
        <?php include "./application/views/pendidikan.php"; ?>
      </div>
      <div class="tab-pane fade" id="pengalaman" role="tabpanel" aria-labelledby="pengalaman-tab">
        <?php include "./application/views/pengalaman.php"; ?>
      </div>
      <div class="tab-pane fade" id="kontak" role="tabpanel" aria-labelledby="kontak-tab">
        <?php include "./application/views/kontak.php"; ?>
      </div>
      <div class="tab-pane fade" id="training" role="tabpanel" aria-labelledby="training-tab">
        <?php include "./application/views/training.php"; ?>
      </div>
      <div class="tab-pane fade" id="peringatan" role="tabpanel" aria-labelledby="peringatan-tab">
        <?php include "./application/views/peringatan.php"; ?>
      </div>
      <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
        <?php include "./application/views/bank.php"; ?>
      </div>
      <div class="tab-pane fade" id="penilaian" role="tabpanel" aria-labelledby="penilaian-tab">
        <?php include "./application/views/penilaian.php"; ?>
      </div>
      <div class="tab-pane fade" id="kontrak" role="tabpanel" aria-labelledby="kontrak-tab">
        <?php include "./application/views/kontrak.php"; ?>
      </div>
      <div class="tab-pane fade" id="resume" role="tabpanel" aria-labelledby="resume-tab">
        <?php include "./application/views/resume.php"; ?>
      </div>
    </div>
    <a href="<?php echo base_url('karyawan'); ?>" class="btn btn-primary" style="margin-bottom: 20px">Kembali</a>
  </section>
</div>