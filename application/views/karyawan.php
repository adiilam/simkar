<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Karyawan</h1>
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
              <div class="row">
                <?php if ($this->utils->isPermAllowed($_SESSION['perm']->karyawanCreate ?? '')) : ?>
                  <div class="col-auto">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      <i class="fa fa-plus"></i> Tambah Karyawan
                    </button>
                  </div>
                <?php endif; ?>
                <!-- <div class="col-auto">
                  <a class="btn btn-danger" href=" <?php echo base_url('karyawan/print') ?>">
                    <i class="fa fa-print"></i>Print
                  </a>
                </div> -->
                <a class="btn btn-warning" href=" <?php echo base_url('karyawan/excel') ?>">
                  <i class="fa fa-file"></i>Export Excel
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tableKaryawan" class="table table-bordered table-striped">
                <thead class="text-center">
                  <tr>
                    <th>No</th>
                    <th>NPK</th>
                    <th>Nama</th>
                    <th>Departemen</th>
                    <th>Section</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $no = 1;
                  foreach ($karyawan as $kry) :
                  ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><a href="karyawan/detail/<?= $kry->uid ?>" class="detail"><?php echo $kry->npk ?></a></td>
                      <td><?php echo $kry->nama ?></td>
                      <td><?php echo $kry->department ?></td>
                      <td><?php echo $kry->section ?></td>
                      <td><?php echo $kry->jabatan ?></td>
                      <td><?php switch ($kry->status_kerja) {
                            case 1:
                              echo "Aktif";
                              break;
                            case 2:
                              echo "PHK";
                              break;
                            case 3:
                              echo "Resign";
                              break;
                            case 4:
                              echo "Habis Kontrak";
                              break;
                            case 5:
                              echo "Meninggal";
                              break;
                            case 6:
                              echo "Lainnya";
                              break;
                          }
                          ?>
                      </td>
                      <td class="text-center">
                        <a class="btn btn-success btn-sm" href="karyawan/detail/<?= $kry->uid ?>" title="Profil">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" href="karyawan/print_detail/<?= $kry->uid ?>" title="Print">
                          <i class="fa fa-print"></i>
                        </a>
                        <?php if ($this->utils->isPermAllowed($_SESSION['perm']->karyawanUpdate ?? '')) : ?>
                          <a class="btn btn-primary btn-sm" href="karyawan/edit/<?= $kry->uid ?>" title="Edit">
                            <i class="fa fa-edit"></i>
                          </a>
                        <?php endif; ?>
                        <?php if ($this->utils->isPermAllowed($_SESSION['perm']->karyawanDelete ?? '')) : ?>
                          <a class="btn btn-danger btn-sm" href="karyawan/delete/<?= $kry->uid ?>" onclick="return confirm('Anda Yakin Ingin hapus?')" title="Hapus">
                            <i class="fa fa-trash"></i>
                          </a>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </div>
  </section>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Form Input Data Karyawan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <?php echo form_open_multipart('karyawan/add'); ?>

          <table class="table table-bordered">
            <div class="form-group">
              <label>Nama Karyawan</label>
              <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
              <label>NPK</label>
              <input type="text" name="npk" class="form-control">
            </div>
            <div class="form-group">
              <label>Departemen</label>
              <select class="form-control" name="department" id="department">
                <option disabled selected>- Pilih Departemen -</option>
                <?php foreach ($department as $op) { ?>
                  <option value="<?= $op["value"]; ?>"><?= $op["label"]; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Section</label>
              <select class="form-control" name="section" id="section">
                <option disabled selected>- Pilih Section -</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jabatan</label>
              <select class="form-control" name="jabatan">
                <option disabled selected>- Pilih Jabatan -</option>
                <?php foreach ($jabatan as $op) { ?>
                  <option value="<?= $op["value"]; ?>"><?= $op["label"]; ?></option>
                <?php } ?>
              </select>
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
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control" name="jkel">
                <option>Laki-Laki</option>
                <option>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>No KTP/SIM/Passport</label>
              <input type="text" name="nik" class="form-control">
            </div>
            <div class="form-group">
              <label>Kebangsaan</label>
              <select class="form-control" name="kebangsaan">
                <option>WNI</option>
                <option>WNA</option>
              </select>
            </div>
            <div class="form-group">
              <label>Agama</label>
              <input type="text" name="agama" class="form-control">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control">
            </div>
            <div class="form-group">
              <label>Alamat Domisili</label>
              <input type="text" name="alamat_domisili" class="form-control">
            </div>
            <div class="form-group">
              <label>No Telepon</label>
              <input type="text" name="tlp" class="form-control">
            </div>
            <div class="form-group">
              <label>Golongan Darah</label>
              <input type="text" name="golongan_darah" class="form-control">
            </div>
            <div class="form-group">
              <label>Status Nikah</label>
              <select class="form-control" name="status_nikah">
                <option>Menikah</option>
                <option>Belum Menikah</option>
                <option>Cerai</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jumlah Anak</label>
              <select class="form-control" name="jumlah_anak">
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>Lebih dari 4</option>
              </select>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
              <label>NPWP</label>
              <input type="text" name="npwp" class="form-control">
            </div>
            <div class="form-group">
              <label>BPJS Kesehatan</label>
              <input type="text" name="bpjs_kes" class="form-control">
            </div>
            <div class="form-group">
              <label>BPJS Ketenagakerjaan</label>
              <input type="text" name="bpjs_tk" class="form-control">
            </div>
            <div class="form-group">
              <label>Upload Foto</label>
              <input type="file" name="foto" class="form-control">
            </div>
            <div class="form-group">
              <label>Status Kerja</label>
              <select class="form-control" name="status_kerja">
                <option value="1">Aktif</option>
                <option value="2">PHK</option>
                <option value="3">Resign</option>
                <option value="4">Habis Kontrak</option>
                <option value="5">Meninggal</option>
                <option value="6">Lainnya</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal Non-Aktif</label>
              <input type="date" name="tgl_nonaktif" class="form-control">
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
</div>

<script>
  $(document).ready(function() {
    $('#tableKaryawan').DataTable({
      "buttons": ["excel", "pdf", "print"]
    });

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

  // $(document).ready(function() {
  //   $("#department").change(function() {
  //     var selected = $(".department option:selected").val();

  //     //sample data - code starts here
  //     var data = '[{"id":1,"name":"product 1"},{"id":2,"name":"product 2"}, {"id":3,"name":"product 3"}]';
  //     data = jQuery.parseJSON(data);
  //     //sample data ends here
  //     $('#response').html('');
  //     $('#response').append(' <label>Product:</label><select class="product" id="product"> </select> ');

  //     $('#response select').append($("<option />").val('').text('Select'));

  //     $.each(data, function(index, value) {

  //       $('#response select').append($("<option  />").val(value.id).text(value.name));
  //     });
  //     //add above code to your ajax success - code ends here.. 
  //     //return false;
  //     $.ajax({
  //       type: "GET",
  //       url: "process-ajax.php",
  //       data: {
  //         cat: selectCat
  //       }
  //     }).done(function(data) {});
  //   });
  // });
</script>