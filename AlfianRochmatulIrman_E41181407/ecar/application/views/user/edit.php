<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="blue">
                                    <i class="material-icons">create</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Edit Your Profile -
                                        <small class="category">Here is your bio</small>
                                    </h4>
                                    <?= form_open_multipart('user/edit'); ?>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" class="form-control" value="<?= $user['nama']; ?>" name="nama" id="nama">
                                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <input type="email" class="" value="<?= $user['email']; ?>" name="email" id="email" hidden>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email</label>
                                                    <label type="email" class="form-control" value=""><?= $user['email']; ?></label>
                                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">About</label>
                                                    <input type="text" class="form-control" value="<?= $user['about']; ?>" name="about" id="about">
                                                    <?= form_error('about', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Joined Date </label>  <i class="label label-success"><?= date('d F Y', $user['date_created']);?></i>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success pull-right">Update Profile</button>
                                        <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <legend>Avatar</legend>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="height: 300px;">
                                        <img src="<?= base_url(); ?>assets/img/profile/<?= $user['image']; ?>" alt="image">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="height: 300px;"></div>
                                    <div>
                                        <span class="btn btn-round btn-rose btn-file">
                                        <span class="fileinput-new">Add Photo</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image" id="image" /></span>
                                            <br />
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>