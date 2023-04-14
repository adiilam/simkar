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
                    <tr class="highlight">
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
                    </tr>
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
                    <?php foreach ($peringatan as $ptg) : ?>
                        <tr class="highlight">
                            <td class="field-left">Peringatan</td>
                            <td><?php echo $ptg->status ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>