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
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modaltambahPeringatan">
                                <i class="fa fa-plus"></i> Tambah Peringatan
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Status</th>
                                <th>Pelanggaran</th>
                                <th>Tanggal Pelanggaran</th>
                                <th>Berlaku s/d</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($peringatan as $ctn) :
                            ?>
                                <thead class="text-center">
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $ctn->status ?></td>
                                        <td><?php echo $ctn->komentar ?></td>
                                        <td><?php echo date('d M Y', strtotime($ctn->tanggal));
                                            $ctn->tanggal ?></td>
                                        <td><?php echo date('d M Y', strtotime($ctn->berlaku));
                                            $ctn->berlaku ?></td>
                                        <td>
                                            <?php if ($this->utils->isPermAllowed($_SESSION['perm']->karyawanUpdate ?? '')) : ?>
                                                <button class="btn btn-primary btn-sm" title="Edit" onclick="openEditPeringatan('<?= $ctn->uid ?>')">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            <?php endif; ?>
                                            <?php if ($this->utils->isPermAllowed($_SESSION['perm']->karyawanDelete ?? '')) : ?>
                                                <a class="btn btn-danger btn-sm" title="Hapus" href="<?= base_url() . "peringatan/delete/" . $ctn->uid . "/" . $ctn->karyawan_uid ?>" onclick="return confirm('Anda Yakin Ingin hapus?')">
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

<div class="modal fade" id="modaltambahPeringatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Form Input Data Peringatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('Peringatan/add'); ?>

                <input type="hidden" name="karyawan_uid" value="<?= $detail->uid; ?>">
                <table class="table table-bordered">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option>Teguran</option>
                            <option>SP 1</option>
                            <option>SP 2</option>
                            <option>SP 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pelanggaran</label>
                        <input type="text" name="komentar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pelanggaran</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Berlaku s/d</label>
                        <input type="date" name="berlaku" class="form-control">
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

<div class="modal fade" id="modalEditPeringatan" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalEditPeringatan">Edit peringatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url("peringatan/edit") ?>" method="POST">
                    <input type="hidden" name="karyawan_uid" value="<?= $detail->uid; ?>">
                    <input type="hidden" name="uid" class="form-control" id="editUidperingatan" readonly>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="editstatus">
                            <option>Teguran</option>
                            <option>SP 1</option>
                            <option>SP 2</option>
                            <option>SP 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pelanggaran</label>
                        <input type="text" name="komentar" class="form-control" id="editkomentar">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pelanggaran</label>
                        <input type="date" name="tanggal" class="form-control" id="edittanggal">
                    </div>
                    <div class="form-group">
                        <label>Berlaku s/d</label>
                        <input type="date" name="berlaku" class="form-control" id="editberlaku">
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

    function openEditPeringatan(uid) {
        var peringatan = <?php echo json_encode($peringatan); ?>;
        var find = peringatan.find((value) => value.uid == uid);
        document.getElementById("editUidperingatan").value = find.uid;
        document.getElementById("editstatus").value = find.status;
        document.getElementById("editkomentar").value = find.komentar;
        document.getElementById("edittanggal").value = find.tanggal;
        document.getElementById("editberlaku").value = find.berlaku;
        $('#modalEditPeringatan').modal('show');
    }
</script>