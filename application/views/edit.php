<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Karyawan</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <form action="<?= base_url() . 'karyawan/update'; ?>" method="post" enctype='multipart/form-data'>
                <input type="hidden" name="uid" value="<?= $karyawan->uid; ?>">
                <table class="table table-bordered">
                  <div class="form-group">
                    <label>Nama Karyawan</label>
                    <input type="text" name="nama" class="form-control" value="<?= $karyawan->nama ?>">
                  </div>
                  <div class="form-group">
                    <label>NPK</label>
                    <input type="text" name="npk" class="form-control" value="<?= $karyawan->npk ?>">
                  </div>
                  <div class="form-group">
                    <label>Departemen</label>
                    <select class="form-control" name="department" id="department">
                      <option disabled>- Select Departemen -</option>
                      <?php
                      foreach ($department as $op) {
                        $selected = '';

                        if ($op['value'] == $karyawan->department_uid) {
                          $selected = 'selected';
                        } else {
                          $selected = '';
                        }
                      ?>
                        <option <?= $selected; ?> value="<?= $op["value"]; ?>"><?= $op["label"]; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Section</label>
                    <select class="form-control" name="section" id="section" disabled>
                      <option disabled selected>- Select Section -</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control" name="jabatan">
                      <option disabled>- Select Jabatan -</option>
                      <?php
                      foreach ($jabatan as $op) {
                        $selected = '';

                        if ($op['value'] == $karyawan->jabatan_uid) {
                          $selected = 'selected';
                        }
                      ?>

                        <option <?= $selected; ?> value="<?= $op["value"]; ?>"><?= $op["label"]; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Tempat, Tanggal Lahir</label>
                    <div class="col">
                      <input type="text" name="tempat_lahir" class="form-control" value="<?= $karyawan->tempat_lahir ?>">
                    </div>
                    <div class="col">
                      <input type="date" name="tanggal_lahir" class="form-control" value="<?= $karyawan->tanggal_lahir ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jkel">
                      <option <?php if ($karyawan->jkel == "Laki-Laki") echo "selected" ?>>Laki-Laki</option>
                      <option <?php if ($karyawan->jkel == "Perempuan") echo "selected" ?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>No KTP/SIM/Passport</label>
                    <input type="text" name="nik" class="form-control" value="<?= $karyawan->nik ?>">
                  </div>
                  <div class="form-group">
                    <label>Kebangsaan</label>
                    <select class="form-control" name="kebangsaan">
                      <option <?php if ($karyawan->kebangsaan == "WNI") echo "selected" ?>>WNI</option>
                      <option <?php if ($karyawan->kebangsaan == "WNA") echo "selected" ?>>WNA</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Agama</label>
                    <input type="text" name="agama" class="form-control" value="<?= $karyawan->agama ?>">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= $karyawan->alamat ?>">
                  </div>
                  <div class="form-group">
                    <label>Alamat Domisili</label>
                    <input type="text" name="alamat_domisili" class="form-control" value="<?= $karyawan->alamat_domisili ?>">
                  </div>
                  <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="tlp" class="form-control" value="<?= $karyawan->tlp ?>">
                  </div>
                  <div class="form-group">
                    <label>Golongan Darah</label>
                    <input type="text" name="golongan_darah" class="form-control" value="<?= $karyawan->golongan_darah ?>">
                  </div>
                  <div class="form-group">
                    <label>Status Nikah</label>
                    <select class="form-control" name="status_nikah">
                      <option <?php if ($karyawan->status_nikah == "Menikah") echo "selected" ?>>Menikah</option>
                      <option <?php if ($karyawan->status_nikah == "Belum Menikah") echo "selected" ?>>Belum Menikah</option>
                      <option <?php if ($karyawan->status_nikah == "Cerai") echo "selected" ?>>Cerai</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Anak</label>
                    <select class="form-control" name="jumlah_anak">
                      <option <?php if ($karyawan->jumlah_anak == "0") echo "selected" ?>>0</option>
                      <option <?php if ($karyawan->jumlah_anak == "1") echo "selected" ?>>1</option>
                      <option <?php if ($karyawan->jumlah_anak == "2") echo "selected" ?>>2</option>
                      <option <?php if ($karyawan->jumlah_anak == "3") echo "selected" ?>>3</option>
                      <option <?php if ($karyawan->jumlah_anak == "4") echo "selected" ?>>4</option>
                      <option <?php if ($karyawan->jumlah_anak == "Lebih dari 4") echo "selected" ?>>Lebih dari 4</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $karyawan->email ?>">
                  </div>
                  <div class="form-group">
                    <label>NPWP</label>
                    <input type="text" name="npwp" class="form-control" value="<?= $karyawan->npwp ?>">
                  </div>
                  <div class="form-group">
                    <label>BPJS Kesehatan</label>
                    <input type="text" name="bpjs_kes" class="form-control" value="<?= $karyawan->bpjs_kes ?>">
                  </div>
                  <div class="form-group">
                    <label>BPJS Ketenagakerjaan</label>
                    <input type="text" name="bpjs_tk" class="form-control" value="<?= $karyawan->bpjs_tk ?>">
                  </div>
                  <div class="form-group">
                    <label>Status Kerja</label>
                    <select class="form-control" name="status_kerja">
                      <option value="1" <?= $karyawan->status_kerja == 1 ? 'selected' : ''; ?>>Aktif</option>
                      <option value="2" <?= $karyawan->status_kerja == 2 ? 'selected' : ''; ?>>PHK</option>
                      <option value="3" <?= $karyawan->status_kerja == 3 ? 'selected' : ''; ?>>Resign</option>
                      <option value="4" <?= $karyawan->status_kerja == 4 ? 'selected' : ''; ?>>Habis Kontrak</option>
                      <option value="5" <?= $karyawan->status_kerja == 5 ? 'selected' : ''; ?>>Meninggal</option>
                      <option value="6" <?= $karyawan->status_kerja == 6 ? 'selected' : ''; ?>>Lainnya</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Non-Aktif</label>
                    <input type="date" name="tgl_nonaktif" class="form-control" value="<?= $karyawan->tgl_nonaktif ?>">
                  </div>
                  <!-- <div class="form-group">
                    <label>Upload Foto</label>
                    <input type="file" name="foto" class="form-control">
                  </div> -->

                  <a href="<?= base_url('karyawan'); ?>" button type="reset" class="btn btn-danger mr-2" data-dismiss="modal">Reset</a></button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    $(document).ready(function() {
      $("#department").change(function() {
        var val = $(this).val();
        var section = <?php echo json_encode($section); ?>;
        var newSection = section.filter((value) => value.department_uid == val);
        $("#section").html("<option selected disabled>- Select Section -</option>");
        newSection.forEach(value => {
          var newAppend =
            $('#section').append("<option value='" + value.value +
              "'>" + value.label +
              "</option>");
        });
        $('#section').prop('disabled', false);
      });
    });
  </script>
</div>