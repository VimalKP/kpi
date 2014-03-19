<?php
$this->load->library('form_validation');
?>

<div class="all-wrapper fixed-header left-menu">
    <div class="main-content">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="main">
                    <?php
//                    echo '<pre>';
//                    print_r($data);
//                    echo '<pre>';
                    ?>
                    <?php $this->load->view('company_temp_view'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/token-input.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/token-input-facebook.css" type="text/css" />
<script type="text/javascript">
    $(document).ready(function() {
        $("#usertypearr").tokenInput("", {
            hintText: "Add User Type",
            theme: "facebook",
            preventDuplicates: true,
            allowCustomEntry: true,
            prePopulate:<?= $preusers ?>
        });
    });
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