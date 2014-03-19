/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var baseurl="http://localhost/kpi/";


function changestatus(id){
    //    alert(id)
    var usersarr=id.split("_");
    //    console.log(usersarr);
    var statusclass=$("#"+id).attr('class');
    var  statusclassarr=statusclass.split(" ");
    var actualclass=statusclassarr[1];
    //    console.log($("#"+id).text())
    var status=$("#"+id).text();
   
    if(status=='Active'){
        var  regstatus=1;
        var newstatus='Deactive';
        var replaceclass='label-danger';
    }else{
        var regstatus=0;
        var newstatus='Active';
        var replaceclass='label-success';
    }

    var userid=usersarr[1];
    
    
    $.ajax({
        url:baseurl+"register/delete_user",
        type:'POST',
        data:  {
            "regstatus": regstatus,
            "userid": userid
        },
                
        success:function(data){
            $("#"+id).text('');
            $("#"+id).text(newstatus)
            $("#"+id).removeClass(actualclass);
            $("#"+id).addClass(replaceclass);
            //alert(data)
            //        $("#"+id).text();
            console.log('success');
            
        
        }
    });
}

function kpigetname(id){
    //    alert(id);
    var usersarr=id.split("_");
    //console.log(usersarr);
    var userid=usersarr[1];
    console.log(userid);
    //    var kpi_id = 0;
    $.ajax({
        url:baseurl+"target_assign/user_kpi",
        type:'POST',
        data:  {
            "userid": userid
        },
        success:function(data){
            var obj =  $.parseJSON(data);
            console.log(obj.length)
            var count=obj.length;
            var assignkpi='';
            if(count>0){
                for(var i=0;i<count;i++){
                    //                    console.log(obj[i]['kpi_name']);
                    var kpi_name=obj[i]['kpi_name'];
                    var kpi_id=obj[i]['kpi_id'];
                    var text_input='';
                    if(obj[i]['kpi_type']=='boolean'){
                        text_input='<select name="" id="kpi_'+kpi_id+'" class="form-control rounded" ><option value="true">Yes</option><option value="false">No</option></select>';
                    }
                    else{
                        text_input='<input id="kpi_'+kpi_id+'" name="text" type="text" class="form-control rounded" value="">';
                    }
                    assignkpi+='<label class="col-md-3 control-label">'+kpi_name+'</label> <div class="col-xs-5">'+text_input+'</div><button type="submit" id="target_'+kpi_id+'" onclick="save_target(\''+kpi_id+'\', \''+userid+'\');" class="btn btn-primary">SAVE</button> &nbsp;<button type="submit" class="btn btn-default" id="cancel_'+kpi_id+'" onclick="cancel(this.id);">Cancel</button>';
                }
                $("#assign_kpi").html('');
                $("#assign_kpi").html(assignkpi);
            }
        }
    });
}

function kpidrag(userid)
{
    //    alert(id);
    //     var usersarr=id.split("_");
    console.log(userid);
    //    var userid=usersarr[1];
    //    console.log(userid);
    //    //    var kpi_id = 0;
    $.ajax({
        url:baseurl+"target_assign/user_kpi",
        type:'POST',
        data:  {
            "userid": userid
        },
        success:function(data){
            var obj =  $.parseJSON(data);
            var assigned_kpi=obj.assigned_kpi;

//            assigned_kpi=$.parseJSON(assigned_kpi);
//            var assigned_kpi_count=(assigned_kpi.length);
//            var unassigned_kpi=obj['unassigned_kpi'];
//            var unassigned_kpi_count=obj['unassigned_kpi'].length;

            console.log(assigned_kpi)
            alert(assigned_kpi.length)

            var assignkpidrag='';
            if(assigned_kpi_count>0){
                $.each(assigned_kpi,function(k,v){
                    alert(k)
                    alert(v)
                    var kpi_name=v;
                    var kpi_id=k;
                    assignkpidrag+=' <li class="sortable-item"  id="'+kpi_id+'">'+kpi_name+'</li>';
                });
                //                for(var i=0;i<assigned_kpi_count;i++){
                //                    var kpi_name=assigned_kpi[i]['kpi_name'];
                //                    var kpi_id=assigned_kpi[i]['kpi_id'];
                //                    assignkpidrag+=' <li class="sortable-item"  id="'+kpi_id+'">'+kpi_name+'</li>';
                //                }
                $("#right_drag").html('');
                $("#right_drag").html(assignkpidrag);
            }
            var unassignkpidrag='';
            if(unassigned_kpi_count>0){
                //                for(var i=0;i<unassigned_kpi_count;i++){
                //                    var name=unassigned_kpi[i]['kpi_name'];
                //                    var id=unassigned_kpi[i]['kpi_id'];
                //                    unassignkpidrag+=' <li class="sortable-item"  id="'+id+'">'+name+'</li>';
                //                }
                $.each(unassigned_kpi,function(k,v){
                    var kpi_name=v;
                    var kpi_id=k;
                    unassignkpidrag+=' <li class="sortable-item"  id="'+kpi_id+'">'+kpi_name+'</li>';
                });
                $("#left_drag").html('');
                $("#left_drag").html(unassignkpidrag);
            }
        }
    });
}
function save_target(kpi_id,userid)
{
    //    alert(userid);

    var add=document.getElementById('kpi_'+kpi_id+'').value;
    console.log(add);
    //    console.log(userid);
    console.log(kpi_id);

    $.ajax({
        url:baseurl+"target_assign/addtarget",
        type:'POST',
        data:  {
            "user_id_fk":userid,
            "kpi_id_fk": kpi_id,
            "value_of_target": add
        },

        success:function(data){
            //            $("#"+id).text('');
            //            $("#"+id).text(newstatus)
            //            $("#"+id).removeClass(actualclass);
            //            $("#"+id).addClass(replaceclass);
            //alert(data)
            //        $("#"+id).text();
            console.log('success');


        }
        
    });
    document.getElementById('kpi_'+kpi_id+'').value='';



}
function cancel(id)
{
    console.log(id);
    var kpiarr=id.split("_");
    console.log(kpiarr);
    var kpi_id=kpiarr[1];
    console.log(kpi_id);
    var add=document.getElementById('kpi_'+kpi_id+'').value;
    console.log(add);
    document.getElementById('kpi_'+kpi_id+'').value='';

}
