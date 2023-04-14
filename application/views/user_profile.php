<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
      <div class="container-fluid">
        <?php echo $this->session->flashdata('message'); ?>
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <a style="cursor: pointer;" data-toggle="modal" data-target="#Gantifoto14" title="ganti foto">
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>assets/<?= !empty($_SESSION['user']->foto) ? 'foto/' . $_SESSION['user']->foto : 'dist/img/avatar5.png';?>" alt="User profile picture">
                  </a>
                </div>
                <h3 class="profile-username text-center"><?= $_SESSION['user']->nama; ?></h3>
                <p class="text-muted text-center"><?= $_SESSION['user']->jabatan; ?></p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Username</b>
                    <a class="float-right"><?= $_SESSION['user']->username; ?></a>
                  </li>
                </ul>
                <a style="cursor: pointer;" data-toggle="modal" data-target="#Gantifoto14" title="ganti foto" class="btn btn-primary btn-block">
                  <b>Ganti Foto</b>
                </a>
                <div id="Gantifoto14" class="modal fade" role="dialog" style="display: none;">
            		<div class="modal-dialog">
            			<div class="modal-content">
            				<div class="modal-header">
            				    <h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Ganti Foto Karyawan</h4>
            					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            				</div>
            				<div class="col-sm-12">
            					<div class="modal-body">
            						<form action="<?= base_url('profile/gantifoto/') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
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
              </div>
            </div>
          </div>
          
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item">
                    <a class="nav-link active" href="#changepw" data-toggle="tab">Ganti Password</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="changepw">
                      <?php echo form_open_multipart('profile/change_password'); ?>
                        <div class="form-group">
                          <label for="password_lama" class="col-sm-6 control-label">Password Lama</label>
                          <div class="mx-2 row">
                            <input type="password" class="form-control col-sm-7" placeholder="Password Lama" name="password_lama">
                            <span class="my-2 mx-2 fa fa-fw fa-eye-slash toggle-password"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="password" class="col-sm-6 control-label">Password Baru</label>
                          <div class="mx-2 row">
                            <input type="password" class="form-control col-sm-7" placeholder="Password Baru" name="password">
                            <span class="my-2 mx-2 fa fa-fw fa-eye-slash toggle-password"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="password_confirmation" class="col-sm-6 control-label">Konfirmasi Password</label>
                          <div class="mx-2 row">
                            <input type="password" class="form-control col-sm-7" placeholder="Konfirmasi Password" name="password_confirmation">
                            <span class="my-2 mx-2 fa fa-fw fa-eye-slash toggle-password"></span>
                          </div>
                        </div>
            
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-7">
                            <button type="submit" class="btn btn-danger">Submit</button>
                          </div>
                        </div>
                      <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
</div>