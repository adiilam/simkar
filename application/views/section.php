<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Form section</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-2">
        <div class="col-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Tambah Section </h3>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <div class="card-body">
              <form action="<?= base_url('section/add') ?>" method="post">
                <div class="form-group">
                  <label>Departemen</label>
                  <select class="form-control" name="department" required>
                    <option disabled selected>- Pilih Departemen -</option>
                    <?php foreach ($department as $op) { ?>
                      <option value="<?= $op["value"]; ?>"><?= $op["label"]; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label> Nama Section </label>
                  <input type="text" name="name" class="form-control" required>
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
              <h3 class="card-title"> Data Section</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered" id="tablesection">
                <thead class="text-center">
                  <tr>
                    <th>No</th>
                    <th>Departemen</th>
                    <th>Section</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($section as $row) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $row->department ?></td>
                      <td><?= $row->name ?></td>
                      <td>
                        <?php if ($this->utils->isPermAllowed($_SESSION['perm']->masterDataUpdate ?? '')) : ?>
                          <button class="btn btn-primary btn-sm" title="Edit" onclick="openEdit('<?= $row->uid ?>')">
                            <i class="fa fa-edit"></i>
                          </button>
                        <?php endif; ?>
                        <?php if ($this->utils->isPermAllowed($_SESSION['perm']->masterDataDelete ?? '')) : ?>
                          <a class="btn btn-danger btn-sm" title="Hapus" href="section/delete/<?= $row->uid ?>" onclick="return confirm('Anda Yakin Ingin hapus?')">
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
      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modalEditLabel">Edit Section</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="section/edit" method="POST">
            <input type="hidden" name="uid" class="form-control" id="editUid" readonly>
            <div class="form-group">
              <label>Departemen</label>
              <select class="form-control" name="department" id="editDepartment" required>
                <option disabled selected>- Pilih Departemen -</option>
                <?php foreach ($department as $op) { ?>
                  <option value="<?= $op["value"]; ?>"><?= $op["label"]; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label> Nama Section </label>
              <input type="text" name="name" class="form-control" id="editName" required>
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
    $('#tablesection').DataTable();
  })

  function openEdit(uid) {
    var section = <?php echo json_encode($section); ?>;
    var find = section.find((value) => value.uid == uid);
    document.getElementById("editUid").value = find.uid;
    document.getElementById("editName").value = find.name;
    document.querySelector('#editDepartment').value = find.department_uid;
    $('#modalEdit').modal('show');
  }
</script>