<script type="text/javascript">
    function addmore()
    {
        var no=document.getElementById("tb_no").value;
        var next=parseInt(no)+1;
        $("#tb_no").val(next);
        $("#lists").append('<input type="text" name="usertype_list[]" class="form-control rounded" style="margin-bottom: 5px;" value="" id="l'+(next)+'">');
    }
    //            function deleteTb(){
    //                var no=$("tb_no").val();
    //
    //            }
</script>
<div class="all-wrapper fixed-header left-menu">
    <div class="main-content">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="main">

                    <div class="widget widget-red">
                        <div class="widget-title">
                            <div class="widget-controls">
                                <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
                                <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
                                <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
                                <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
                                    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
                                        <li class="dropdown-header">Set Widget Color</li>
                                        <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
                                        <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
                                        <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
                                        <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
                                        <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
                                    </ul>
                                </div>
                                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
                                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
                                <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
                            </div>
                            <h3><i class="fa fa-ok-circle"></i>Company Detail Form</h3>
                        </div>

                        <div class="widget-content">
                            <div class="modal-body">
                                <form action="#" role="form" class="form-horizontal">

                                    <input type="hidden" value="1" name="tb_no" id="tb_no">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Company Name</label>
                                        <div class="col-md-8">
                                            <input id="focusedInput" class="form-control rounded" placeholder="Enter Name Of Company">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Company Address</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="2" name="" placeholder="Enter Company Address"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Type Of Company</label>
                                        <div class="col-md-8">
                                            <select class="form-control rounded">
                                                <option>-----------------------SELECT--------------------------</option>
                                                <option>Organization</option>
                                                <option>Factory</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Company Email-id</label>
                                        <div class="col-md-8">
                                            <input id="focusedInput" class="form-control rounded" placeholder="Enter E-mail ID Of Company   ex., username@example.com">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Company Phone Number</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control rounded" placeholder="Enter Phone Number Of Company">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Company Website</label>
                                        <div class="col-md-8">
                                            <input class="form-control rounded" placeholder="Enter Officeal Website Of Company   ex., www.example.com">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Facebook Page Link</label>
                                        <div class="col-md-8">
                                            <input class="form-control rounded" placeholder="Enter Company's Facebook Page Link If Available">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Twitter Page Link</label>
                                        <div class="col-md-8">
                                            <input class="form-control rounded" placeholder="Enter Company's Twitter Page Link If Available">
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <label class="col-md-4 control-label">Company Website</label>
                                        <div class="col-md-6" id="lists">
                                            <input type="text" name="usertype_list[]" class="form-control rounded" style="margin-bottom: 5px;" value="" id="l1">
                                        </div>
                                        <a href="javascript:addmore();">
                                            <img alt="+" src="<?php echo base_url(); ?>images/add.png" width="29" height="29" style="padding: 0px; margin: 0px 0px -9px;">
                                        </a>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <div class="col-md-8">
                                                <label>
                                                    <input type="checkbox"> Remember me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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