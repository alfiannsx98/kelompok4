<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">perm_identity</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Your Profile -
                                        <small class="category">Here is your bio</small>
                                    </h4>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"><?= $user['nama']; ?></label>
                                                    <input type="text" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"><?= $user['email']; ?></label>
                                                    <input type="email" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"><?= $user['about']; ?></label>
                                                    <input type="text" class="form-control" disabled>
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
                                        <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="<?= base_url() . 'assets/img/profile/' . $user['image']; ?>" />
                                    </a>
                                </div>
                                <div class="card-content">
                                    <!-- <h6 class="category text-gray">CEO / Co-Founder</h6> -->
                                    <h4 class="card-title"><?= $user['nama']; ?></h4>
                                    <p class="description">
                                        <?= $user['about']; ?>
                                    </p>
                                    <i class="label label-<?php if($user['role_id'] == 1){echo "rose";}else{echo "info";}  ?>"><?php if($user['role_id'] == 1){echo "Administrator";}else{echo "Member";}  ?></i>  <i class="label label-success"><?= date('d F Y', $user['date_created']);?></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>