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

