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
                            <button class="btn btn-primary" data-toggle="modal" data-target="#ModalTambahKontrak">
                                <i class="fa fa-plus"></i> Tambah Kontrak
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Status</th>
                                    <th>Mulai</th>
                                    <th>Habis</th>
                                    <th>No Surat Kontrak</th>
                                    <th>Kontrak Ke</th>
                                    <th>No Surat Permanen</th>
                                    <th>Tanggal Permanen</th>
                                    <th>Lokasi Kerja</th>
                                    <th>Team</th>
                                    <th>Grade</th>
                                    <th>Reminder</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kontrak as $ktr) :
                                ?>
                                    <thead class="text-center">
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td>
                                                <?php

                                                if ($ktr->tgl_masuk == "0000-00-00") {
                                                    echo "-";
                                                } else {
                                                    echo date('d-m-Y', strtotime($ktr->tgl_masuk));
                                                }
                                                ?>

                                            </td>
                                            <td>
                                                <?php

                                                if ($ktr->tgl_keluar == "0000-00-00") {
                                                    echo "-";
                                                } else {
                                                    echo date('d-m-Y', strtotime($ktr->tgl_keluar));
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $ktr->status_kontrak ?></td>
                                            <td>
                                                <?php

                                                if ($ktr->start == "0000-00-00") {
                                                    echo "-";
                                                } else {
                                                    echo date('d-m-Y', strtotime($ktr->start));
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php

                                                if ($ktr->finish == "0000-00-00") {
                                                    echo "-";
                                                } else {
                                                    echo date('d-m-Y', strtotime($ktr->finish));
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $ktr->surat_kontrak ?></td>
                                            <td><?php echo $ktr->kontrak_ke ?></td>
                                            <td><?php echo $ktr->surat_permanen ?></td>
                                            <td>
                                                <?php

                                                if ($ktr->tgl_permanen == "0000-00-00") {
                                                    echo "-";
                                                } else {
                                                    echo date('d-m-Y', strtotime($ktr->tgl_permanen));
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $ktr->lok_kerja ?></td>
                                            <td><?php echo $ktr->team ?></td>
                                            <td><?php echo $ktr->grade ?></td>
                                            <td><?php switch ($ktr->reminder) {
                                                    case 1:
                                                        echo "Selesai";
                                                        break;
                                                    case 2:
                                                        echo "Berjalan";
                                                        break;
                                                }
                                                ?>
                                            <td>
                                                <?php if ($this->utils->isPermAllowed($_SESSION['perm']->karyawanUpdate ?? '')) : ?>
                                                    <button class="btn btn-primary btn-sm" title="Edit" onclick="openEditKontrak('<?= $ktr->uid ?>')">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                <?php endif; ?>
                                                <?php if ($this->utils->isPermAllowed($_SESSION['perm']->karyawanDelete ?? '')) : ?>
                                                    <a class="btn btn-danger btn-sm" title="Hapus" href="<?= base_url() . "kontrak/delete/" . $ktr->uid . "/" . $ktr->karyawan_uid ?>" onclick="return confirm('Anda Yakin Ingin hapus?')">
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
</div>

<div class="modal fade" id="ModalTambahKontrak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Form Input Data Kontrak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('kontrak/add'); ?>

                <input type="hidden" name="karyawan_uid" value="<?= $detail->uid; ?>">
                <table class="table table-bordered">
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tgl_masuk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input type="date" name="tgl_keluar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status_kontrak">
                            <option>Permanen</option>
                            <option>PKWT</option>
                            <option>Magang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mulai</label>
                        <input type="date" name="start" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Habis</label>
                        <input type="date" name="finish" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No Surat Kontrak</label>
                        <input type="text" name="surat_kontrak" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kontrak Ke</label>
                        <input type="text" name="kontrak_ke" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No Surat Permanen</label>
                        <input type="text" name="surat_permanen" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Permanen</label>
                        <input type="date" name="tgl_permanen" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Lokasi Kerja</label>
                        <select class="form-control" name="lok_kerja">
                            <option>Office</option>
                            <option>Plant</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Team</label>
                        <input type="text" name="team" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Grade</label>
                        <input type="text" name="grade" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Reminder</label>
                        <select class="form-control" name="reminder">
                            <option value="1">Selesai</option>
                            <option value="2">Berjalan</option>
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

<div class="modal fade" id="modalEditKontrak" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalEditKontrak">Edit Kontrak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url("kontrak/edit") ?>" method="POST">
                    <input type="hidden" name="karyawan_uid" value="<?= $detail->uid; ?>">
                    <input type="hidden" name="uid" class="form-control" id="editUidkontrak" readonly>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tgl_masuk" class="form-control" id="edittgl_masuk">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input type="date" name="tgl_keluar" class="form-control" id="edittgl_keluar">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status_kontrak" id="editstatus_kontrak">
                            <option>Permanen</option>
                            <option>PKWT</option>
                            <option>Magang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mulai</label>
                        <input type="date" name="start" class="form-control" id="editstart">
                    </div>
                    <div class="form-group">
                        <label>Habis</label>
                        <input type="date" name="finish" class="form-control" id="editfinish">
                    </div>
                    <div class="form-group">
                        <label>No Surat Kontrak</label>
                        <input type="text" name="surat_kontrak" class="form-control" id="editsurat_kontrak">
                    </div>
                    <div class="form-group">
                        <label>Kontrak Ke</label>
                        <input type="text" name="kontrak_ke" class="form-control" id="editkontrak_ke">
                    </div>
                    <div class="form-group">
                        <label>No Surat Permanen</label>
                        <input type="text" name="surat_permanen" class="form-control" id="editsurat_permanen">
                    </div>
                    <div class="form-group">
                        <label>Tgl Permanen</label>
                        <input type="date" name="tgl_permanen" class="form-control" id="edittgl_permanen">
                    </div>
                    <div class="form-group">
                        <label>Lokasi Kerja</label>
                        <select class="form-control" name="lok_kerja" id="editlok_kerja">
                            <option>Office</option>
                            <option>Plant</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Team</label>
                        <input type="text" name="team" class="form-control" id="editteam">
                    </div>
                    <div class="form-group">
                        <label>Grade</label>
                        <input type="text" name="grade" class="form-control" id="editgrade">
                    </div>
                    <div class="form-group">
                        <label>Reminder</label>
                        <select class="form-control" name="reminder" id="editreminder">
                            <option value="1">Selesai</option>
                            <option value="2">Berjalan</option>
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

    function openEditKontrak(uid) {
        var kontrak = <?php echo json_encode($kontrak); ?>;
        var find = kontrak.find((value) => value.uid == uid);
        document.getElementById("editUidkontrak").value = find.uid;
        document.getElementById("edittgl_masuk").value = find.tgl_masuk;
        document.getElementById("edittgl_keluar").value = find.tgl_keluar;
        document.getElementById("editstatus_kontrak").value = find.status_kontrak;
        document.getElementById("editstart").value = find.start;
        document.getElementById("editfinish").value = find.finish;
        document.getElementById("editsurat_kontrak").value = find.surat_kontrak;
        document.getElementById("editkontrak_ke").value = find.kontrak_ke;
        document.getElementById("editsurat_permanen").value = find.surat_permanen;
        document.getElementById("edittgl_permanen").value = find.tgl_permanen;
        document.getElementById("editlok_kerja").value = find.lok_kerja;
        document.getElementById("editteam").value = find.team;
        document.getElementById("editgrade").value = find.grade;
        document.getElementById("editreminder").value = find.reminder;
        $('#modalEditKontrak').modal('show');
    }
</script>