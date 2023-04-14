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
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modaltambahPenilaian">
                                <i class="fa fa-plus"></i> Tambah Penilaian
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Nilai</th>
                                <th>Catatan</th>
                                <th>Talent Pool</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($penilaian as $pin) :
                            ?>
                                <thead class="text-center">
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $pin->tahun ?></td>
                                        <td><?php echo $pin->nilai ?></td>
                                        <td><?php echo $pin->catatan ?></td>
                                        <td><?php echo $pin->talent_full ?></td>
                                        <td>
                                            <?php if ($this->utils->isPermAllowed($_SESSION['perm']->karyawanUpdate ?? '')) : ?>
                                                <button class="btn btn-primary btn-sm" title="Edit" onclick="openEditPenilaian('<?= $pin->uid ?>')">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            <?php endif; ?>
                                            <?php if ($this->utils->isPermAllowed($_SESSION['perm']->karyawanDelete ?? '')) : ?>
                                                <a class="btn btn-danger btn-sm" title="Hapus" href="<?= base_url() . "penilaian/delete/" . $pin->uid . "/" . $pin->karyawan_uid ?>" onclick="return confirm('Anda Yakin Ingin hapus?')">
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

<div class="modal fade" id="modaltambahPenilaian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Form Input Data Penilaian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('penilaian/add'); ?>

                <input type="hidden" name="karyawan_uid" value="<?= $detail->uid; ?>">
                <table class="table table-bordered">
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" name="tahun" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="text" name="nilai" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <input type="text" name="catatan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Talent Pool</label>
                        <select class="form-control" name="talent_full">
                            <option>Ya</option>
                            <option>-</option>
                        </select>
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

<div class="modal fade" id="modalEditPenilaian" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalEditPenilaian">Edit Penilaian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url("penilaian/edit") ?>" method="POST">
                    <input type="hidden" name="karyawan_uid" value="<?= $detail->uid; ?>">
                    <input type="hidden" name="uid" class="form-control" id="editUidpenilaian" readonly>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" name="tahun" class="form-control" id="edittahunpenilaian">
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="text" name="nilai" class="form-control" id="editnilai">
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <input type="text" name="catatan" class="form-control" id="editcatatan">
                    </div>
                    <div class="form-group">
                        <label>Talent Pool</label>
                        <select class="form-control" name="talent_full" id="edittalent_full">
                            <option>Ya</option>
                            <option>-</option>
                        </select>
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

    function openEditPenilaian(uid) {
        var penilaian = <?php echo json_encode($penilaian); ?>;
        var find = penilaian.find((value) => value.uid == uid);
        document.getElementById("editUidpenilaian").value = find.uid;
        document.getElementById("edittahunpenilaian").value = find.tahun;
        document.getElementById("editnilai").value = find.nilai;
        document.getElementById("editcatatan").value = find.catatan;
        document.getElementById("edittalent_full").value = find.talent_full;
        $('#modalEditPenilaian').modal('show');
    }
</script>