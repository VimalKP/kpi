<?php
$this->load->library('form_validation');
?>
<div class="all-wrapper fixed-header left-menu">
    <div class="main-content">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="main">
                    <div class="widget widget-purple">
                        <div class="widget-title">
                            <div class="widget-controls">
                                <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
                                <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>

                                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>

<!--                                <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
                                <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
                                    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
                                        <li class="dropdown-header">Set Widget Color</li>
                                        <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
                                        <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
                                        <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
                                        <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
                                        <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
                                    </ul>
                                </div>-->



<!--                                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>

                                <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>-->
                            </div>

                            <h3><i class="fa fa-smile-o"></i> User Profile</h3>
                        </div>

                        <div class="widget-content">
                            <div class="modal-body">
                                <form action="<?php echo base_url() ?>profile/profile_edit" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <?php
                                    if ((isset($data)) && $data[0]->user_id != '') {
                                        $userid = $data[0]->user_id;
                                    } else {
                                        $userid = '';
                                    }
                                    ?>
                                    <input type="hidden" name="userid" id="userid" value="<?= $userid ?>">


                                    <div class="form-group">
                                        <label class="col-md-4 control-label">You Are(User Type)</label>
                                        <div class="col-md-8">

                                            <?php
                                            if ((isset($data)) && $data[0]->user_type_id_fk != '') {
                                                $user_type = $data[0]->user_type_id_fk;
                                            } else {
                                                $user_type = set_value('user_type_id_fk');
                                            }
                                            ?>

                                            <?php
                                            $selected = set_value('user_type_id_fk');
                                            ?>
                                            <select  name="user_type_id_fk" class="form-control rounded" disabled="disabled">
                                                <option value="0">-----------------------SELECT--------------------------</option>
                                                <?php
                                                if (isset($usertypeArr) && $usertypeArr != array()) {
                                                    foreach ($usertypeArr as $key => $value) {
                                                        $sel = "";
//                                                        echo $key.'--'.$value->user_type_id.'--'.$data[0]->user_type_id_fk.'<br/>';
                                                        if ($value->user_type_id == $data[0]->user_type_id_fk)
                                                            $sel = "selected";

                                                        echo "<option value='" . $value->user_type_id . "' $sel>" . $value->user_type . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">First Name</label>
                                        <div class="col-md-8">
                                            <?php
                                                if ((isset($data)) && $data[0]->firstname != '') {
                                                    $firstname = $data[0]->firstname;
                                                } else {
                                                    $firstname = set_value('firstname');
                                                }
                                            ?>

                                                <input class="form-control rounded" type="text" id="firstname" name="firstname" placeholder="Enter Your First Name" value="<?php echo $firstname; ?>">
                                                <span class="error"><?php echo form_error('firstname'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Last Name</label>
                                            <div class="col-md-8">
                                            <?php
                                                if ((isset($data)) && $data[0]->lastname != '') {
                                                    $lastname = $data[0]->lastname;
                                                } else {
                                                    $lastname = set_value('lastname');
                                                }
                                            ?>
                                                <input class="form-control rounded" type="text" id="lastname" name="lastname" placeholder="Enter Your Last Name" value="<?php echo $lastname; ?>">
                                                <span class="error"><?php echo form_error('lastname'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Your Username Is</label>
                                            <div class="col-md-8">
                                            <?php
                                                if ((isset($data)) && $data[0]->username != '') {
                                                    $username = $data[0]->username;
                                                } else {
                                                    $username = set_value('username');
                                                }
                                            ?>

                                                <input id="username" name="username" class="form-control rounded" type="text" placeholder="Choose Your Username" value="<?php echo $username; ?>" disabled="disabled">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Email-id</label>
                                            <div class="col-md-8">
                                            <?php
                                                if ((isset($data)) && $data[0]->email_id != '') {
                                                    $emailid = $data[0]->email_id;
                                                } else {
                                                    $emailid = set_value('email_id');
                                                }
                                            ?>
                                                <input class="form-control rounded" id="email_id" type="text" name="email_id" placeholder="Enter Your E-mail ID    ex., username@example.com" value="<?php echo $emailid; ?>">
                                                <span class="error"><?php echo form_error('email_id'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Your Parent User Is</label>
                                            <div class="col-md-8">

                                            <?php
                                                if ((isset($data)) && $data[0]->parent_id != '') {
                                                    $parentuser = $data[0]->parent_id;
                                                } else {
                                                    $parentuser = set_value('parent_id');
                                                }
                                            ?>

                                            <?php
                                                $selected = set_value('parent_id');
                                            ?>
                                                <select  name="parent_id" class="form-control rounded" disabled="disabled">
                                                    <option value="$$">-----------------------SELECT--------------------------</option>
                                                <?php
                                                if (isset($userArr) && $userArr != array()) {
                                                    foreach ($userArr as $key => $value) {
                                                        $sel = "";

                                                        if ($value->user_id == $data[0]->parent_id)
                                                            $sel = "selected";

                                                        echo "<option value='" . $value->user_id . "' $sel>" . $value->username . "</option>";
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Phone Number</label>
                                        <div class="col-md-8">
                                            <?php
                                                if ((isset($data)) && $data[0]->phone_number != '') {
                                                    $phone = $data[0]->phone_number;
                                                } else {
                                                    $phone = set_value('phone_number');
                                                }
                                            ?>
                                                <input type="number" id="phone_number" name="phone_number" class="form-control rounded" placeholder="Enter Your Phone Number" value="<?php echo $phone; ?>">
                                                <span class="error"><?php echo form_error('phone_number'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Address</label>
                                            <div class="col-md-8">
                                            <?php
                                                if ((isset($data)) && $data[0]->address != '') {
                                                    $address = $data[0]->address;
                                                } else {
                                                    $address = set_value('address');
                                                }
                                            ?>
                                                <textarea class="form-control" type="text" id="address" rows="2" name="address" placeholder="Enter Your Address" value="<?php echo $address; ?>"><?= $address ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Birth Date</label>
                                            <div class="col-md-8">
                                            <?php
                                                if ((isset($data)) && $data[0]->birthdate != '') {
                                                    $birth = $data[0]->birthdate;
                                                } else {
                                                    $birth = set_value('birthdate');
                                                }
                                            ?>
                                                <input class="form-control input-datepicker" id="birthdate" name="birthdate" type="datetime" placeholder="Select Your Birthdate" value="<?php echo $birth; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Gender</label>
                                            <div class="col-md-8">
                                            <?php
                                                if ((isset($data)) && $data[0]->gender != '') {
                                                    $gender = $data[0]->gender;
                                                } else {
                                                    $gender = set_value('gender');
                                                }
                                            ?>

                                            <?php
                                                if ($gender == 'm') {
                                            ?>
                                                    <input id="optionsRadios1" type="radio" value="m" name="gender" checked="checked">Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input id="optionsRadios2" type="radio" value="f" name="gender">Female
                                            <?php
                                                } else {
                                            ?>
                                                    <input id="optionsRadios1" type="radio" value="m" name="gender">Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input id="optionsRadios2" type="radio" value="f" name="gender" checked="checked">Female
                                            <?php
                                                }
                                            ?>
    <!--                                                <input id="optionsRadios1" type="radio" value="m" name="gender"  value="<?php $gender; ?>">Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input id="optionsRadios2" type="radio" value="f" name="gender"  value="<?php $gender; ?>">Female-->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Profile Image</label>

                                            <div class="col-md-4">
                                            <?php
                                                if ((isset($data)) && $data[0]->profile_image != '') {
                                                    $profileimage = $data[0]->profile_image;
                                                } else {
                                                    $profileimage = set_value('profile_image');
                                                }
                                            ?>
                                            <?php // echo form_open_multipart()?>
                                                <input type="file" name="profile_image" id="profile_image" value="<?php echo $profileimage; ?>">
                                            </div>

                                            <div class="col-md-4">

                                                <div class="avatar">
                                                <?php
                                                if ($profileimage != NULL) {
                                                ?>
                                                    <img src="<?php echo base_url() ?>images/profile_pic/<?= $profileimage ?>">
                                                <?php
                                                } else {
                                                ?>
                                                    <img src="<?php echo base_url() ?>images/profile_pic/no-avatar.png">
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-8">
                                            <button type="submit" class="btn btn-primary">SAVE</button> &nbsp;
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>