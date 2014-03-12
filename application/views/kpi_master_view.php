<?php
$this->load->library('form_validation');
?>

<script type="text/javascript">
    function addmore()
    {
        var no=document.getElementById("tb_no").value;
        var next=parseInt(no)+1;
        $("#tb_no").val(next);
        $("#lists").append('<input type="text" name="usertype_list[]" class="form-control rounded" style="margin-bottom: 5px;" value="" id="l'+(next)+'">');
    }
</script>

<div class="all-wrapper fixed-header left-menu">
    <div class="main-content">
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
                    <h3><i class="fa fa-user"></i> KPI User Types</h3>
                </div>
                <div class="widget-content">
                    <div class="modal-body">
                        <form action="<?php echo base_url() ?>" role="form" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-4 control-label">User Type</label>

                                <div class="col-md-6" id="lists">
                                    <input type="text" name="usertype_list[]" class="form-control rounded" style="margin-bottom: 5px;" value="" id="l1">
                                </div>

                                <a href="javascript:addmore();">
                                    <img alt="+" src="http://kpi.net16.net/site/images/add.png" width="29" height="29" style="padding: 0px; margin: 0px 0px -9px;">
                                </a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>