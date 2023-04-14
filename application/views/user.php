<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Users</h1>
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
                    <i class="fa fa-plus"></i> Tambah User
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
                    <th>Karyawan</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $no = 1;
                  foreach ($user_data as $user) :
                      if ($user->username == 'admin') continue; // Admin uneditable, only change directly from database
                  ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?= $user->nama; ?></td>
                      <td><?= $user->username; ?></td>
                      <td><?= $user->role; ?></td>
                      <td>
                        <a class="btn btn-danger btn-sm" href="users/delete/<?= $user->uid ?>" onclick="return confirm('Anda Yakin Ingin hapus?')">
                          <i class="fa fa-trash"></i>
                        </a>
                        <button class="btn btn-primary btn-sm edit" data-id="<?= $user->uid ?>">
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
          <h4 class="modal-title" id="exampleModalLabel">Form Input Data Users</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open_multipart('users/add'); ?>
          <table class="table table-bordered">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
              <label>Karyawan</label>
              <select class="form-control" name="karyawan_uid" id="karyawan_uid">
                <option disabled selected>- Pilih Karyawan -</option>
                <?php foreach ($karyawan_data as $kar) { ?>
                  <option value="<?= $kar->uid; ?>"><?= $kar->nama; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Role</label>
              <select class="form-control" name="role_uid" id="role_uid">
                <option disabled selected>- Pilih Role -</option>
                <?php foreach ($role_data as $role) { ?>
                  <option value="<?= $role->uid; ?>"><?= $role->name; ?></option>
                <?php } ?>
              </select>
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
  
  <!-- Update Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Form Update Data Karyawan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open_multipart('users/update'); ?>
          <table class="table table-bordered">
            <input type="hidden" name="uid">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
              <label>Karyawan</label>
              <select class="form-control" name="karyawan_uid" id="karyawan_uid">
                <option disabled selected>- Pilih Karyawan -</option>
                <?php foreach ($karyawan_data as $kar) { ?>
                  <option value="<?= $kar->uid; ?>"><?= $kar->nama; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Role</label>
              <select class="form-control" name="role_uid" id="role_uid">
                <option disabled selected>- Pilih Role -</option>
                <?php foreach ($role_data as $role) { ?>
                  <option value="<?= $role->uid; ?>"><?= $role->name; ?></option>
                <?php } ?>
              </select>
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
  var karyawan_data = [];
  var role_data = [];

  $(document).ready(function() {
      getDataJS();
      
      $(".edit").click(function() {
         var uid = $(this).attr('data-id');
         
         $.ajax({
             method: 'GET',
             url: '<?= base_url("users/request/"); ?>' + uid
         }).done(function(obj) {
             var data = JSON.parse(obj);
             
             $("#updateModal input[name='uid']").val(data.uid);
             $("#updateModal input[name='username']").val(data.username);
             
             var karOp = '<option disabled selected>- Pilih Karyawan -</option>';
             var roleOp = '<option disabled selected>- Pilih Role -</option>';
             
             $.each(karyawan_data, function(i, kar) {
                karOp += '<option value="' + kar.uid + '"' + (kar.uid == data.karyawan_uid ? 'selected' : '' ) + '>' + kar.nama + '</option>';
             });
             
             $.each(role_data, function(i, role) {
                roleOp += '<option value="' + role.uid + '"' + (role.uid == data.role_uid ? 'selected' : '' ) + '>' + role.name + '</option>';
             });
             
             $("#updateModal select[name='karyawan_uid']").html(karOp);
             $("#updateModal select[name='role_uid']").html(roleOp);
             
             $("#updateModal").modal();
         })
      });
      
      function getDataJS() {
          $.ajax({
              method: 'GET',
              url: '<?= base_url("karyawan/requestAll"); ?>'
          }).done(function(obj) {
              karyawan_data = JSON.parse(obj);
          })
          
          $.ajax({
              method: 'GET',
              url: '<?= base_url("role/requestAll"); ?>'
          }).done(function(obj) {
              role_data = JSON.parse(obj);
          })
      }
    
  });
</script>