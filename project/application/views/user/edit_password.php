<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">lock</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Edit Your Password -
                                        <small class="category">Here is the form</small>
                                    </h4>
                                    <?= $this->session->flashdata('message'); ?>
                                    <?= form_open_multipart('user/edit_password'); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Your Password</label>
                                                    <input type="password" class="form-control" name="passwordSkrg" id="passwordSkrg">
                                                    <?= form_error('passwordSkrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <input type="email" class="" value="<?= $user['email']; ?>" name="email" id="email" hidden>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Your New Password</label>
                                                    <input type="password" class="form-control" name="passwordBaru1" id="passwordBaru1">
                                                    <?= form_error('passwordBaru1', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Repeat Your New Password</label>
                                                    <input type="password" class="form-control" name="passwordBaru2" id="passwordBaru2">
                                                    <?= form_error('passwordBaru2', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Last Update Password </label>  
                                                </div>
                                                <i class="label label-success col-md-1"><?= date('d F Y', $user['change_pass']);?></i>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success pull-right">Update Profile</button>
                                        <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>