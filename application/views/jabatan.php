<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Form jabatan</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="row mt-2">
      <div class="col-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> Tambah Jabatan </h3>
          </div>
          <?= $this->session->flashdata('message'); ?>
          <div class="card-body">
            <form action="<?= base_url('jabatan/add') ?>" method="post">
              <div class="form-group">
                <label> Jabatan </label>
                <input type="text" name="jabatan" class="form-control">
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
            <h3 class="card-title"> Data Jabatan</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered" id="tableJabatan">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($jabatan as $row) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->name ?></td>
                    <td>
                      <?php if ($this->utils->isPermAllowed($_SESSION['perm']->masterDataUpdate ?? '')) : ?>
                        <button class="btn btn-primary btn-sm" title="Edit" onclick="openEdit('<?= $row->uid ?>')">
                          <i class="fa fa-edit"></i>
                        </button>
                      <?php endif; ?>
                      <?php if ($this->utils->isPermAllowed($_SESSION['perm']->masterDataDelete ?? '')) : ?>
                        <a class="btn btn-danger btn-sm" title="Hapus" href="jabatan/delete/<?= $row->uid ?>" onclick="return confirm('Anda Yakin Ingin hapus?')">
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
  </section>

  <!-- Modal -->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modalEditLabel">Edit Jabatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="jabatan/edit" method="POST">
            <input type="hidden" name="uid" class="form-control" id="editUid" readonly>
            <div class="form-group">
              <label>Department</label>
              <input type="text" name="jabatan" class="form-control" id="editName">
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
    $('#tableJabatan').DataTable();
  })

  function openEdit(uid) {
    var jabatan = <?php echo json_encode($jabatan); ?>;
    var find = jabatan.find((value) => value.uid == uid);
    document.getElementById("editUid").value = find.uid;
    document.getElementById("editName").value = find.name;
    $('#modalEdit').modal('show');
  }
</script>