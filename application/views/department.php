<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Form Departemen</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="row mt-2">
      <div class="col-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> Tambah Departemen </h3>
          </div>
          <?= $this->session->flashdata('message'); ?>
          <div class="card-body">
            <form action="<?= base_url('department/add') ?>" method="post">
              <div class="form-group">
                <label> Departemen </label>
                <input type="text" name="department" class="form-control">
              </div>
              <?php if ($this->utils->isPermAllowed($_SESSION['perm']->masterDataCreate ?? '')) : ?>
                <button type="submit" class="btn btn-primary btn-sm"> Save </button>
              <?php endif; ?>
              <button type="reset" class="btn btn-danger btn-sm"> Reset </button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> Data Departemen</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered" id="tableDepartment">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Departemen</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($department as $row) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->name ?></td>
                    <td>
                      <?php if ($this->utils->isPermAllowed($_SESSION['perm']->masterDataUpdate ?? '')) : ?>
                        <button class="btn btn-primary btn-sm" title="Edit" onclick="openEdit('<?= $row->uid ?>')">
                          <i class="fa fa-edit"></i>
                        </button>
                      <?php endif; ?>
                      <!-- <a class="btn btn-primary btn-sm" href="">
                        <i class="fa fa-edit"></i>
                      </a> -->
                      <?php if ($this->utils->isPermAllowed($_SESSION['perm']->masterDataDelete ?? '')) : ?>
                        <a class="btn btn-danger btn-sm" title="Hapus" href="department/delete/<?= $row->uid ?>" onclick="return confirm('Anda Yakin Ingin hapus?')">
                          <i class="fa fa-trash"></i>
                        </a>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="modalEditDepartment" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modalEditDepartment">Edit Departemen</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="department/edit" method="POST">
            <input type="hidden" name="uid" class="form-control" id="editUid" readonly>
            <div class="form-group">
              <label>Departemen</label>
              <input type="text" name="department" class="form-control" id="editName">
            </div>
            <input class="btn btn-sm btn-primary" type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#tableDepartment').DataTable();
  })

  function openEdit(uid) {
    var department = <?php echo json_encode($department); ?>;
    var find = department.find((value) => value.uid == uid);
    document.getElementById("editUid").value = find.uid;
    document.getElementById("editName").value = find.name;
    $('#modalEditDepartment').modal('show');
  }
</script>