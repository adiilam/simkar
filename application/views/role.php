<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Role</h1>
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
                <div class="col-auto">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    <i class="fa fa-plus"></i> Tambah Role
                  </button>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tableUser" class="table table-bordered table-striped">
                <thead class="text-center">
                  <tr>
                    <th>No</th>
                    <th>Nama Role</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $no = 1;
                  foreach ($role_data as $role) :
                  ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $role->name ?></td>
                      <td>
                        <a class="btn btn-danger btn-sm" href="role/delete/<?= $role->uid ?>" onclick="return confirm('Anda Yakin Ingin hapus?')">
                          <i class="fa fa-trash"></i>
                        </a>
                        <button class="btn btn-primary btn-sm edit" data-id="<?= $role->uid ?>">
                          <i class="fa fa-edit"></i>
                        </button>
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
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Form Input Data Role</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open_multipart('role/add'); ?>
          <table class="table table-bordered">
            <div class="form-group">
              <label>Nama Role</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="role-permision-container" id="accordion">
              <!--Dashboard-->
              <div class="form-group">
                <div class="card card-primary card-outline">
                  <a class="d-block w-100" data-toggle="collapse" href="#collapseDashboard" aria-expanded="true">
                    <div class="card-header">
                      <h4 class="card-title w-100">Dashboard</h4>
                    </div>
                  </a>
                  <div id="collapseDashboard" class="collapse show" data-parent="#accordion" style="">
                    <div class="card-body">
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="dashboardRead" checked="" name="dashboardRead">
                          <label for="dashboardRead">Read</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Master Data-->
              <div class="form-group">
                <div class="card card-primary card-outline">
                  <a class="d-block w-100" data-toggle="collapse" href="#collapseMasterData" aria-expanded="false">
                    <div class="card-header">
                      <h4 class="card-title w-100">Master Data</h4>
                    </div>
                  </a>
                  <div id="collapseMasterData" class="collapse" data-parent="#accordion" style="">
                    <div class="card-body">
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="masterDataRead" name="masterDataRead">
                          <label for="masterDataRead">Read</label>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="masterDataCreate" name="masterDataCreate">
                          <label for="masterDataCreate">Create</label>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="masterDataUpdate" name="masterDataUpdate">
                          <label for="masterDataUpdate">Update</label>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="masterDataDelete" name="masterDataDelete">
                          <label for="masterDataDelete">Delete</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Karyawan-->
              <div class="form-group">
                <div class="card card-primary card-outline">
                  <a class="d-block w-100" data-toggle="collapse" href="#collapseKaryawan" aria-expanded="false">
                    <div class="card-header">
                      <h4 class="card-title w-100">Karyawan</h4>
                    </div>
                  </a>
                  <div id="collapseKaryawan" class="collapse" data-parent="#accordion" style="">
                    <div class="card-body">
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="karyawanRead" name="karyawanRead">
                          <label for="karyawanRead">Read</label>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="karyawanCreate" name="karyawanCreate">
                          <label for="karyawanCreate">Create</label>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="karyawanUpdate" name="karyawanUpdate">
                          <label for="karyawanUpdate">Update</label>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="karyawanDelete" name="karyawanDelete">
                          <label for="karyawanDelete">Delete</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Monitoring-->
              <div class="form-group">
                <div class="card card-primary card-outline">
                  <a class="d-block w-100" data-toggle="collapse" href="#collapseMonitoring" aria-expanded="true">
                    <div class="card-header">
                      <h4 class="card-title w-100">Monitoring</h4>
                    </div>
                  </a>
                  <div id="collapseMonitoring" class="collapse" data-parent="#accordion" style="">
                    <div class="card-body">
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="monitoringRead" name="monitoringRead">
                          <label for="monitoringRead">Read</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Warning-->
              <div class="form-group">
                <div class="card card-primary card-outline">
                  <a class="d-block w-100" data-toggle="collapse" href="#collapseWarning" aria-expanded="true">
                    <div class="card-header">
                      <h4 class="card-title w-100">Warning</h4>
                    </div>
                  </a>
                  <div id="collapseWarning" class="collapse" data-parent="#accordion" style="">
                    <div class="card-body">
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="warningRead" name="warningRead">
                          <label for="warningRead">Read</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?php echo form_close(); ?>
          </table>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Form Update Data Role</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open_multipart('role/update'); ?>
          <table class="table table-bordered">
            <input type="hidden" name="uid">
            <div class="form-group">
              <label>Nama Role</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="role-permision-container" id="accordion">
              <!--Dashboard-->
              <div class="form-group">
                <div class="card card-primary card-outline">
                  <a class="d-block w-100" data-toggle="collapse" href="#collapseDashboard" aria-expanded="true">
                    <div class="card-header">
                      <h4 class="card-title w-100">Dashboard</h4>
                    </div>
                  </a>
                  <div id="collapseDashboard" class="collapse show" data-parent="#accordion" style="">
                    <div class="card-body">
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="updatedashboardRead" checked="" name="dashboardRead">
                          <label for="updatedashboardRead">Read</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Master Data-->
              <div class="form-group">
                <div class="card card-primary card-outline">
                  <a class="d-block w-100" data-toggle="collapse" href="#collapseMasterData" aria-expanded="false">
                    <div class="card-header">
                      <h4 class="card-title w-100">Master Data</h4>
                    </div>
                  </a>
                  <div id="collapseMasterData" class="collapse" data-parent="#accordion" style="">
                    <div class="card-body">
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="updatemasterDataRead" name="masterDataRead">
                          <label for="updatemasterDataRead">Read</label>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="updatemasterDataCreate" name="masterDataCreate">
                          <label for="updatemasterDataCreate">Create</label>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="updatemasterDataUpdate" name="masterDataUpdate">
                          <label for="updatemasterDataUpdate">Update</label>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="updatemasterDataDelete" name="masterDataDelete">
                          <label for="updatemasterDataDelete">Delete</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Karyawan-->
              <div class="form-group">
                <div class="card card-primary card-outline">
                  <a class="d-block w-100" data-toggle="collapse" href="#collapseKaryawan" aria-expanded="false">
                    <div class="card-header">
                      <h4 class="card-title w-100">Karyawan</h4>
                    </div>
                  </a>
                  <div id="collapseKaryawan" class="collapse" data-parent="#accordion" style="">
                    <div class="card-body">
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="updatekaryawanRead" name="karyawanRead">
                          <label for="updatekaryawanRead">Read</label>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="updatekaryawanCreate" name="karyawanCreate">
                          <label for="updatekaryawanCreate">Create</label>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="updatekaryawanUpdate" name="karyawanUpdate">
                          <label for="updatekaryawanUpdate">Update</label>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="updatekaryawanDelete" name="karyawanDelete">
                          <label for="updatekaryawanDelete">Delete</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Monitoring-->
              <div class="form-group">
                <div class="card card-primary card-outline">
                  <a class="d-block w-100" data-toggle="collapse" href="#collapseMonitoring" aria-expanded="true">
                    <div class="card-header">
                      <h4 class="card-title w-100">Monitoring</h4>
                    </div>
                  </a>
                  <div id="collapseMonitoring" class="collapse" data-parent="#accordion" style="">
                    <div class="card-body">
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="updatemonitoringRead" name="monitoringRead">
                          <label for="updatemonitoringRead">Read</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Warning-->
              <div class="form-group">
                <div class="card card-primary card-outline">
                  <a class="d-block w-100" data-toggle="collapse" href="#collapseWarning" aria-expanded="true">
                    <div class="card-header">
                      <h4 class="card-title w-100">Warning</h4>
                    </div>
                  </a>
                  <div id="collapseWarning" class="collapse" data-parent="#accordion" style="">
                    <div class="card-body">
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="updatewarningRead" name="warningRead">
                          <label for="updatewarningRead">Read</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
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

    $(".edit").click(function() {
      var uid = $(this).attr('data-id');

      $.ajax({
        method: 'GET',
        url: '<?= base_url("role/request/"); ?>' + uid
      }).done(function(obj) {
        var data = JSON.parse(obj);
        var perm = JSON.parse(data.permission);

        $("#updateModal input[name='uid']").val(data.uid);
        $("#updateModal input[name='name']").val(data.name);
        $("#updateModal #updatedashboardRead").prop('checked', checkIfOn(perm.dashboardRead));

        // Master Data
        $("#updateModal #updatemasterDataRead").prop('checked', checkIfOn(perm.masterDataRead));
        $("#updateModal #updatemasterDataCreate").prop('checked', checkIfOn(perm.masterDataCreate));
        $("#updateModal #updatemasterDataUpdate").prop('checked', checkIfOn(perm.masterDataUpdate));
        $("#updateModal #updatemasterDataDelete").prop('checked', checkIfOn(perm.masterDataDelete));

        // Karyawan
        $("#updateModal #updatekaryawanRead").prop('checked', checkIfOn(perm.karyawanRead));
        $("#updateModal #updatekaryawanCreate").prop('checked', checkIfOn(perm.karyawanCreate));
        $("#updateModal #updatekaryawanUpdate").prop('checked', checkIfOn(perm.karyawanUpdate));
        $("#updateModal #updatekaryawanDelete").prop('checked', checkIfOn(perm.karyawanDelete));

        // Monitoring
        $("#updateModal #updatemonitoringRead").prop('checked', checkIfOn(perm.monitoringRead));

        // Warning
        $("#updateModal #updatewarningRead").prop('checked', checkIfOn(perm.warningRead));

        $("#updateModal").modal();
      });
    })

  });


  function checkIfOn(perm) {
    return perm == 'on';
  }
</script>