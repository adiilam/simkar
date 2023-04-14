<!-- <div class="content-wrapper">
  <section class="content">
    <section class="content">
      <div class="container-fluid">
        <h4 style="text-align: center"><strong>DETAIL DATA KELUARGA</strong></h4>
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="<?= base_url('detail') ?>" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
            <a class="nav-link" id="nav-kontrak-tab" data-toggle="tab" href="#nav-kontrak" role="tab" aria-controls="nav-kontrak" aria-selected="false">Kontrak</a>
            <a class="nav-link active" id="nav-keluarga-tab" data-toggle="tab" href="<?= base_url('keluarga') ?>" role="tab" aria-controls="nav-keluarga" aria-selected="true">Keluarga</a>
            <a class="nav-link" id="nav-pendidikan-tab" data-toggle="tab" href="#nav-pendidikan" role="tab" aria-controls="nav-pendidikan" aria-selected="false">Pendidikan</a>
            <a class="nav-link" id="nav-pengalaman-tab" data-toggle="tab" href="#nav-pengalaman" role="tab" aria-controls="nav-pengalaman" aria-selected="false">Pengalaman</a>
            <a class="nav-link" id="nav-kontak-tab" data-toggle="tab" href="#nav-kontak" role="tab" aria-controls="nav-kontak" aria-selected="false">Kontak Darurat</a>
            <a class="nav-link" id="nav-training-tab" data-toggle="tab" href="#nav-training" role="tab" aria-controls="nav-training" aria-selected="false">Training</a>
            <a class="nav-link" id="nav-catatan-tab" data-toggle="tab" href="#nav-catatan" role="tab" aria-controls="nav-catatan" aria-selected="false">Catatan</a>
            <a class="nav-link" id="nav-bank-tab" data-toggle="tab" href="#nav-bank" role="tab" aria-controls="nav-bank" aria-selected="false">Akun Bank</a>
          </div>
        </nav>

      </div>
    </section>
</div>
</div> -->

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <?php if ($this->utils->isPermAllowed($_SESSION['perm']->karyawanCreate ?? '')) : ?>
            <div class="col-auto">
              <button class="btn btn-primary" data-toggle="modal" data-target="#ModalTambahKeluarga">
                <i class="fa fa-plus"></i> Tambah Keluarga
              </button>
            </div>
          <?php endif; ?>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead class="text-center">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Hubungan</th>
                <th>No KK</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($keluarga as $klg) :
              ?>
                <thead class="text-center">
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $klg->nama ?></td>
                    <td><?php echo $klg->hubungan ?></td>
                    <td><?php echo $klg->no_kk ?></td>
                    <td><?php echo $klg->tempat_lahir ?>, <?php if ($klg->tanggal_lahir == "0000-00-00") {
                                                            echo "-";
                                                          } else {
                                                            echo date('d M Y', strtotime($klg->tanggal_lahir));
                                                          }
                                                          ?></td>
                    <td>
                      <?php if ($this->utils->isPermAllowed($_SESSION['perm']->karyawanUpdate ?? '')) : ?>
                        <button class="btn btn-primary btn-sm" title="Edit" onclick="openEdit('<?= $klg->uid ?>')">
                          <i class="fa fa-edit"></i>
                        </button>
                      <?php endif; ?>
                      <?php if ($this->utils->isPermAllowed($_SESSION['perm']->karyawanDelete ?? '')) : ?>
                        <a class="btn btn-danger btn-sm" title="Hapus" href="<?= base_url() . "keluarga/delete/" . $klg->uid . "/" . $klg->karyawan_uid ?>" onclick="return confirm('Anda Yakin Ingin hapus?')">
                          <i class="fa fa-trash"></i>
                        </a>
                      <?php endif; ?>
                    </td>
                  </tr>
                </thead>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalTambahKeluarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data Keluarga</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php echo form_open_multipart('keluarga/add'); ?>

        <input type="hidden" name="karyawan_uid" value="<?= $detail->uid; ?>">
        <table class="table table-bordered">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
          </div>
          <div class="form-group">
            <label>Hubungan</label>
            <select class="form-control" name="hubungan">
              <option>Suami</option>
              <option>Istri</option>
              <option>Ayah</option>
              <option>Ibu</option>
              <option>Anak</option>
              <option>Kakak</option>
              <option>Adik</option>
            </select>
          </div>
          <div class="form-group">
            <label>No Kartu Keluarga</label>
            <input type="text" name="no_kk" class="form-control">
          </div>
          <div class="form-group row">
            <label>Tempat, Tanggal Lahir</label>
            <div class="col">
              <input type="text" class="form-control" name="tempat_lahir">
            </div>
            <div class="col">
              <input type="date" class="form-control" name="tanggal_lahir">
            </div>
          </div>
          <button type="reset" class="btn btn-danger mr-2" data-dismiss="modal">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <?php echo form_close(); ?>
        </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEditKeluarga" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modalEditKeluarga">Edit Keluarga</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url("keluarga/edit") ?>" method="POST">
          <input type="hidden" name="karyawan_uid" value="<?= $detail->uid; ?>">
          <input type="hidden" name="uid" class="form-control" id="editUid" readonly>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" id="editnama" required>
          </div>
          <div class="form-group">
            <label>Hubungan</label>
            <select class="form-control" name="hubungan" id="edithubungan">
              <option>Suami</option>
              <option>Istri</option>
              <option>Ayah</option>
              <option>Ibu</option>
              <option>Anak</option>
              <option>Kakak</option>
              <option>Adik</option>
            </select>
          </div>
          <div class="form-group">
            <label>No KK</label>
            <input type="text" name="no_kk" class="form-control" id="editno_kk">
          </div>
          <div class="form-group row">
            <label>Tempat, Tanggal Lahir</label>
            <div class="col">
              <input type="text" name="tempat_lahir" class="form-control" id="edittempat_lahir">
            </div>
            <div class="col">
              <input type="date" name="tanggal_lahir" class="form-control" id="edittanggal_lahir">
            </div>
          </div>
          <input class="btn btn-sm btn-primary" type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $('#tableDepartment').DataTable();
  })

  function openEdit(uid) {
    var keluarga = <?php echo json_encode($keluarga); ?>;
    var find = keluarga.find((value) => value.uid == uid);
    document.getElementById("editUid").value = find.uid;
    document.getElementById("editnama").value = find.nama;
    document.getElementById("edithubungan").value = find.hubungan;
    document.getElementById("editno_kk").value = find.no_kk;
    document.getElementById("edittempat_lahir").value = find.tempat_lahir;
    document.getElementById("edittanggal_lahir").value = find.tanggal_lahir;
    $('#modalEditKeluarga').modal('show');
  }
</script>