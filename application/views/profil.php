<div class="profile-container">
  <div class="profile-section">
    <div class="profile-left">
      <div class="profile-image">
        <a style="cursor: pointer;" data-toggle="modal" data-target="#Gantifoto14" title="Ganti Foto">
          <img src="<?= base_url(); ?>assets/<?= !empty($detail->foto) ? 'foto/' . $detail->foto : 'dist/img/default.jpg'; ?>" width="160" height="220"><i class="fa fa-user hide"></i> </a>
      </div>
      <div id="Gantifoto14" class="modal fade" role="dialog" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Ganti Foto Karyawan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="col-sm-12">
              <div class="modal-body">
                <form action="<?= base_url('karyawan/gantifoto/' . $detail->uid) ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="form-group col-sm-12">
                    <label class="col-md-3 control-label">Pilih Foto</label>
                    <div class="col-md-8">
                      <input type="file" name="foto" maxlength="255" class="form-control" required="">
                    </div>
                  </div>
                  <div class="form-group col-sm-12">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                      <p>* PNG/JPG. Max size 500 KB</p>
                    </div>
                  </div>
                  <div class="form-group col-sm-12">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                      <button type="submit" name="edit" value="edit" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp;Ganti</button>&nbsp;
                      <a type="button" class="btn btn-default active" data-dismiss="modal" aria-hidden="true"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer no-margin-top">
            </div>
          </div>
        </div>
      </div>
      <!-- end profile-image -->
      <div class="m-b-10">
        <a href="javascript:;" class="btn btn-success btn-block btn-sm"><?= $detail->npk ?></a>
      </div>
    </div>
    <div class="profile-right">
      <div class="profile-info">
        <div class="table-responsive">
          <table class="table table-profile">
            <thead>
              <tr>
                <th colspan="2">
                  <h4><strong><?php echo $detail->nama ?></strong>
                    <h6><?php echo $detail->jabatan ?></h6>
                  </h4>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr class="highlight">
                <td class="field-left">NPK</td>
                <td><?php echo $detail->npk ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">Jenis Kelamin</td>
                <td><i class="fas fa-transgender"></i><?php echo $detail->jkel ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">Departemen</td>
                <td><?php echo $detail->department ?> </td>
              </tr>
              <tr class="highlight">
                <td class="field-left">Section</td>
                <td><?php echo $detail->section ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">Alamat</td>
                <td><?php echo $detail->alamat ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">Alamat Domisili</td>
                <td><i class="fas fa-map-marker-alt"></i> <?php echo $detail->alamat_domisili ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">Tempat, Tanggal Lahir</td>
                <td><?php echo $detail->tempat_lahir ?>, <?php echo date('d M Y', strtotime($detail->tanggal_lahir));
                                                          $detail->tanggal_lahir ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">Status Kerja</td>
                <td><?php switch ($detail->status_kerja) {
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
              </tr>
              <!-- <tr class="highlight">
                <td class="field-left">Tanggal Non-Aktif</td>
                <td>
                  <?php

                  if ($detail->tgl_nonaktif == "0000-00-00") {
                    echo "-";
                  } else {
                    echo date('d-m-Y', strtotime($detail->tgl_nonaktif));
                  }
                  ?>
                </td>
              </tr> -->
              <tr class="highlight">
                <td class="field-left">Status Nikah</td>
                <td><?php echo $detail->status_nikah ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">No Telepon</td>
                <td><i class="fas fa-mobile-alt"></i> <?php echo $detail->tlp ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">Email</td>
                <td><?php echo $detail->email ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">Golongan Darah</td>
                <td><?php echo $detail->golongan_darah ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">Agama</td>
                <td><?php echo $detail->agama ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">Kebangsaan</td>
                <td><?php echo $detail->kebangsaan ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">Jumlah Anak</td>
                <td><?php echo $detail->jumlah_anak ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">No NPWP</td>
                <td><?php echo $detail->npwp ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">No KTP/SIM/Passport</td>
                <td><?php echo $detail->nik ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">BPJS Kesehatan</td>
                <td><?php echo $detail->bpjs_kes ?></td>
              </tr>
              <tr class="highlight">
                <td class="field-left">BPJS Ketenagakerjaan</td>
                <td><?php echo $detail->bpjs_tk ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>