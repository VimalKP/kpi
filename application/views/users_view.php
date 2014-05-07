<?php
$this->load->library('form_validation');
?>

<div class="all-wrapper fixed-header left-menu">


    <div class="main-content">

<!--        <h4> <a href="<?php echo base_url() ?>register" style="color: red;"> ADD NEW USER</a></h4>-->
        <h4><a href="<?php echo base_url() ?>register" style="color: red;"><input type="button" value="ADD NEW USER" style="float: right; margin-right: 16px;" class="btn btn-primary"></a></h4>
        <br><br>
        <div class="col-md-12">
            <div class="widget widget-orange">
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
                    <h3><i class="fa fa-users"></i> Users List</h3>
                </div>
                <div class="widget-content">
                    <div class="table-responsive">
                        <table style="text-align: center;" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><center>First Name</center></th>
                                    <th><center>Last Name</center></th>
                                    <th><center>User Name</center></th>
                                    <th><center>Email ID</center></th>
                                    <th><center>Phone NO.</center></th>
                                    <th><center>Parent User Name</center></th>
                                    <th><center>User Status</center></th>
                                    <th><center>Action</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $parent_name = array();
                                foreach ($registerArr as $value) {
                                    $parent_name[$value->user_id] = $value->username;
                                }

                                foreach ($registerArr as $row) {
                                    echo"<tr>";
                                ?>

                                <td> <?php echo $row->firstname; ?> </td>
                                <td> <?php echo $row->lastname; ?> </td>
                                <td> <?php echo $row->username; ?> (<?php echo $row->user_type ?>)</td>
                                <td> <?php echo $row->email_id; ?> </td>
                                <td> <?php echo $row->phone_number; ?></td>
                                <td> <?php echo ($row->parent_id == 0) ? "Admin" : $parent_name[$row->parent_id]; ?></td>


                                <!--                                 echo "<option value='" . $value->user_id . "' $sel>" . $value->username . "</option>";-->

                                                                                                            <!--                                <td><a href="<?php echo base_url(); ?>register/edit_user"> Edit</a> <a href="<?php echo base_url(); ?>register/delete_user">Delete</a>   </td>-->
                            <?php
                                    if ($row->registration_status == 0) {
                                        if ($row->parent_id == 0) {
                            ?>
                                            <td></td>
                            <?php
                                        } else {
                            ?>
                                            <td><span id="users_<?= $row->user_id ?>" class="label label-success" style="cursor: pointer" onclick="changestatus(this.id);">Active</span></td> <?php } ?>
                            <?php } else {
 ?>
                                        <td><span id="users_<?= $row->user_id ?>" class="label label-danger" style="cursor: pointer" onclick="changestatus(this.id);">Deactive</span></td>
<?php } ?>

                                    <td class="text-right">
                                        <center> <a href="<?php echo base_url(); ?>register/edit_user?id=<?= $row->user_id ?>" class="btn btn-default btn-xs">edit</a></center>
            <!--                                    <a href="<?php // echo base_url();                   ?>register/delete_user?id=<? //= $row->user_id                   ?>" class="btn btn-danger btn-xs "><i class="fa fa-times"></i></a>-->
                                    </td>

                                                        <!--                                <td><a href="<?php echo base_url(); ?>register/edit_user?id=<?= $row->user_id ?>"> Edit</a> <a href="<?php echo base_url(); ?>register/delete_user?id=<?= $row->user_id ?>">Delete</a>   </td>-->



                            <?php
                                }
                                echo "</tr>";
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>