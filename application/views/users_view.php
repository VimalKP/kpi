<?php
$this->load->library('form_validation');
?>

<div class="all-wrapper fixed-header left-menu">


    <div class="main-content">

<!--        <h4> <a href="<?php echo base_url() ?>register" style="color: red;"> ADD NEW USER</a></h4>-->
        <h4><a href="<?php echo base_url() ?>register" style="color: red;"><input type="button" value="ADD NEW USER" style="float: right;" class="btn btn-primary"></a></h4>
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
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>Email ID</th>
                                    <th>Phone NO.</th>
                                    <th>Parent ID</th>
                                    <th>User Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                foreach ($registerArr as $row) {
                                    echo"<tr>"; ?>

                                <td> <?php echo $row->firstname; ?> </td>
                                <td> <?php echo $row->lastname; ?> </td>
                                <td> <?php echo $row->username; ?> </td>
                                <td> <?php echo $row->email_id; ?> </td>
                                <td> <?php echo $row->phone_number; ?></td>
                                <td> <?php echo $row->parent_id; ?></td>


<!--                                 echo "<option value='" . $value->user_id . "' $sel>" . $value->username . "</option>";-->

    <!--                                <td><a href="<?php echo base_url(); ?>register/edit_user"> Edit</a> <a href="<?php echo base_url(); ?>register/delete_user">Delete</a>   </td>-->

                                <td><span class="label label-success">Active</span></td>
                                <td class="text-right">
                                    <a href="<?php echo base_url(); ?>register/edit_user?id=<?=$row->user_id?>" class="btn btn-default btn-xs">edit</a>
                                    <a href="<?php echo base_url(); ?>register/delete_user?id=<?=$row->user_id?>" class="btn btn-danger btn-xs "><i class="fa fa-times"></i></a>
                                </td>    
<!--                                <td><a href="<?php echo base_url(); ?>register/edit_user?id=<?= $row->user_id ?>"> Edit</a> <a href="<?php echo base_url(); ?>register/delete_user?id=<?= $row->user_id ?>">Delete</a>   </td>-->



                            <?php } echo "</tr>"; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>