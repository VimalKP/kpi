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
            console.log(data);
            if(data=='yes'){
                $("#"+id).text('');
                $("#"+id).text(newstatus)
                $("#"+id).removeClass(actualclass);
                $("#"+id).addClass(replaceclass);
            }else{
                alert("please assign");
            }
           
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
            
            var assign_kpi = new Array();
            var target_kpi_value = new Array();
            assign_kpi=  obj.get_assign_kpi
            target_kpi_value=  obj.assign_kpi_value
            var count=assign_kpi.length;
            var target_kpi_value_count=target_kpi_value.length;
            //            console.log(count)
            //            console.log(target_kpi_value_count)
            var assignkpi='';
            if(count>0){
                for(var i=0;i<count;i++){
                    //                    console.log(obj[i]['kpi_name']);
                    var kpi_name=assign_kpi[i]['kpi_name'];
                    var kpi_id=assign_kpi[i]['kpi_id'];
                    //                    var value_of_target=assign_kpi[i]['value_of_target'];
                    
                    var text_input='';
                    //                    var trueselected='';
                    //                    var falseselected='';
                    if(assign_kpi[i]['kpi_type']=='boolean'){
                        //                        if(value_of_target=='true'){
                        //                            var trueselected='selected'
                        //                        }else{
                        //                            var falseselected='selected'
                        //                        }
                        text_input='<select name="" id="kpi_'+kpi_id+'" class="form-control rounded" ><option value="true">Yes</option><option value="false">No</option></select>';
                    //                        $("#kpi_"+kpi_id).val(value_of_target);
                    }
                    else{
                        text_input='<input id="kpi_'+kpi_id+'" name="text" type="text" class="form-control rounded" value="">';
                    }
                    assignkpi+='<div class="form-group"><label class="col-md-3 control-label">'+kpi_name+'</label> <div class="col-xs-5">'+text_input+'</div><button type="submit" id="target_'+kpi_id+'" onclick="save_target(\''+kpi_id+'\', \''+userid+'\');" class="btn btn-primary add">SAVE</button></div>';
                }
                $("#assign_kpi").html('');
                $("#assign_kpi").html(assignkpi);

            //                $("#kpi_"+kpi_id).attr("disabled","disabled");
            }else{
                $("#assign_kpi").html('');
            }
            if(target_kpi_value_count>0){
                for(var i=0;i<target_kpi_value_count;i++){
                    //                    console.log(obj[i]['kpi_name']);
                    var kpi_id='';
                    var trueselected='';
                    var falseselected='';
                    var value_of_target=target_kpi_value[i]['value_of_target'];
                    kpi_id=target_kpi_value[i]['kpi_id_fk'];
                    $("#kpi_"+kpi_id).val(value_of_target);
                    $("#kpi_"+kpi_id).attr("disabled","disabled");
                    $("#target_"+kpi_id).removeClass("add");
                    $("#target_"+kpi_id).addClass("update");
                    $("#target_"+kpi_id).text("");
                    $("#target_"+kpi_id).text("UPDATE");
                    console.log("#target_"+kpi_id)
                    
                    if(value_of_target=='true'){
                        trueselected='selected'
                    }else{
                        falseselected='selected'
                    }
                   
                }
            }
        }
    });
}

function kpidrag(userid)
{
    $.ajax({
        url:baseurl+"kpi_assign/fetch_kpi_of_user",
        type:'POST',
        data:  {
            "userid": userid
        },
        success:function(data){
            var obj =  $.parseJSON(data);
            var assigned_kpi=obj.assigned_kpi;
            //            assigned_kpi=$.parseJSON(assigned_kpi);
            //            var assigned_kpi_count=(assigned_kpi.length);
            //            console.log(assigned_kpi_count)
            var unassigned_kpi=obj['unassigned_kpi'];
            //            var unassigned_kpi_count=obj['unassigned_kpi'].length;
            var assignkpidrag='';
            
            $("#right_drag").html('');
            $("#left_drag").html('');
            if(assigned_kpi !== undefined){
                $.each( assigned_kpi, function( key, value ) {
                    var kpi_name=value;
                    var kpi_id=key;
                    assignkpidrag+=' <li class="sortable-item"  id="'+kpi_id+'">'+kpi_name+'</li>';
                });
                //                for(var i=0;i<assigned_kpi_count;i++){
                //                    var kpi_name=assigned_kpi[i]['kpi_name'];
                //                    var kpi_id=assigned_kpi[i]['kpi_id'];
                //                    assignkpidrag+=' <li class="sortable-item"  id="'+kpi_id+'">'+kpi_name+'</li>';
                //            }
                
                $("#right_drag").html(assignkpidrag);
            }
            var unassignkpidrag='';
            if(unassigned_kpi !== undefined){
                //                for(var i=0;i<unassigned_kpi_count;i++){
                //                    var name=unassigned_kpi[i]['kpi_name'];
                //                    var id=unassigned_kpi[i]['kpi_id'];
                //                    unassignkpidrag+=' <li class="sortable-item"  id="'+id+'">'+name+'</li>';
                //                }
                $.each( unassigned_kpi, function( key, value ) {
                    var kpi_name=value;
                    var kpi_id=key;
                    unassignkpidrag+=' <li class="sortable-item"  id="'+kpi_id+'">'+kpi_name+'</li>';
                });
                
                $("#left_drag").html(unassignkpidrag);
            }
        }
    });
}
function save_target(kpi_id,userid)
{
    //    alert(userid);
    //    var entrykpivalue=$.trim($("#kpi_"+kpiid).val());
    //    var comment=$.trim($("#comment_"+kpiid).val());
    var classarr=  $("#target_"+kpi_id).attr('class');
    var  statusclassarr=classarr.split(" ");
    var actualclass=statusclassarr[2];
    if(actualclass=='add'){
        var add=document.getElementById('kpi_'+kpi_id+'').value;//$("#kpi_"+kpi_id).val()
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
                $("#kpi_"+kpi_id).attr("disabled","disabled");
                $("#target_"+kpi_id).text('');
                $("#target_"+kpi_id).text('UPDATE')
                $("#target_"+kpi_id).removeClass('add');
                $("#target_"+kpi_id).addClass('update');
            


            }
        
        });
    }else{
        $("#kpi_"+kpi_id).removeAttr('disabled','disabled');
        //        $("#comment_"+kpi_id).removeAttr('disabled','disabled');
        $("#target_"+kpi_id).text('');
        $("#target_"+kpi_id).text('ADD');
        $("#target_"+kpi_id).removeClass('update');
        $("#target_"+kpi_id).addClass('add');
    }
// document.getElementById('kpi_'+kpi_id+'').value='';



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
function entrykpi(kpiid,userid){
    var entrykpivalue=$.trim($("#kpi_"+kpiid).val());
    var comment=$.trim($("#comment_"+kpiid).val());
    var classarr=  $("#button_"+kpiid).attr('class');
    var  statusclassarr=classarr.split(" ");
    var actualclass=statusclassarr[2];
    console.log(entrykpivalue);
    console.log(actualclass);
    console.log(comment);
    console.log(classarr);
    if(actualclass=='add'){
        $.ajax({
            url:baseurl+"kpi_entry/addkpi_entry",
            type:'POST',
            data:  {
                "kpiid": kpiid,
                "entrykpivalue": entrykpivalue,
                "comment": comment,
                "userid": userid,
                "action": actualclass
            },
                
            success:function(data){
                console.log(data)
                console.log('success');
                var obj=$.parseJSON(data);
                $("#kpi_"+kpiid).attr('disabled','disabled');
                $("#comment_"+kpiid).attr('disabled','disabled');
                $("#button_"+kpiid).text('');
                $("#button_"+kpiid).text('UPDATE');
                $("#button_"+kpiid).removeClass('add');
                $("#button_"+kpiid).addClass('update');
        
            }
        });
    }else{
        $("#kpi_"+kpiid).removeAttr('disabled','disabled');
        $("#comment_"+kpiid).removeAttr('disabled','disabled');
        $("#button_"+kpiid).text('');
        $("#button_"+kpiid).text('ADD');
        $("#button_"+kpiid).removeClass('update');
        $("#button_"+kpiid).addClass('add');
    }

}

function userkpiname(id)
{

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

            var assign_kpi = new Array();
            var target_kpi_value = new Array();
            assign_kpi=  obj.get_assign_kpi
            target_kpi_value=  obj.assign_kpi_value
            var count=assign_kpi.length;
            var target_kpi_value_count=target_kpi_value.length;
            console.log(count)
            console.log(target_kpi_value_count)
            var assignkpi='';
            if(count>0){
                for(var i=0;i<count;i++){
                    //                    console.log(obj[i]['kpi_name']);
                    var kpi_name=assign_kpi[i]['kpi_name'];
                    var kpi_id=assign_kpi[i]['kpi_id'];
                    //            var value_of_target=assign_kpi[i]['value_of_target'];
                    console.log(kpi_id);
                    
                    assignkpi+='<label >'+kpi_name+'</label><input type="button" class="btn btn-primary" value="check"></br>' ;
                }
                $("#accordion1").html('');
                $("#accordion1").html(assignkpi);
            }
           
        }
    });
   
}

function approvekpivalue(userid,kpiid){
    
    var comment=$("#comment_"+kpiid).val();
    
    $.ajax({
        url:baseurl+"kpi_approve/approvekpivalue",
        type:'POST',
        data:  {
            "userid": userid,
            "comment": comment,
            "kpiid": kpiid
        },
        success:function(data){
            //        alert(data);
            //            window.location.relaod();
            //            windows.location.reload();
            window.location.href=window.location.href;

            
        //            var obj =  $.parseJSON(data);
        //
        //            var assign_kpi = new Array();
        //            var target_kpi_value = new Array();
        //            assign_kpi=  obj.get_assign_kpi
        //            target_kpi_value=  obj.assign_kpi_value
        //            var count=assign_kpi.length;
        //            var target_kpi_value_count=target_kpi_value.length;
        //            console.log(count)
        //            console.log(target_kpi_value_count)
        //            var assignkpi='';
        //            if(count>0){
        //                for(var i=0;i<count;i++){
        //                    //                    console.log(obj[i]['kpi_name']);
        //                    var kpi_name=assign_kpi[i]['kpi_name'];
        //                    var kpi_id=assign_kpi[i]['kpi_id'];
        //                    //            var value_of_target=assign_kpi[i]['value_of_target'];
        //                    console.log(kpi_id);
        //                    
        //                    assignkpi+='<label >'+kpi_name+'</label><input type="button" class="btn btn-primary" value="check"></br>' ;
        //                }
        //                $("#accordion1").html('');
        //                $("#accordion1").html(assignkpi);
        //            }
           
        }
    });
}

function changestatuscompany(id){
    //    alert(id)
    var companysarr=id.split("_");
    //    console.log(usersarr);
    var statusclass=$("#"+id).attr('class');
    var  statusclassarr=statusclass.split(" ");
    var actualclass=statusclassarr[1];
    //    console.log($("#"+id).text())
    var status=$("#"+id).text();

    if(status=='Active'){
        var  companystatus=1;
        var newstatus='Deactive';
        var replaceclass='label-danger';
    }else{
        var companystatus=0;
        var newstatus='Active';
        var replaceclass='label-success';
    }

    var companyid=companysarr[1];


    $.ajax({
        url:baseurl+"company/delete_company",
        type:'POST',
        data:  {
            "companystatus": companystatus,
            "companyid": companyid
        },

        success:function(data){
            
            $("#"+id).text('');
            $("#"+id).text(newstatus)
            $("#"+id).removeClass(actualclass);
            $("#"+id).addClass(replaceclass);
            
        //alert(data)
        //        $("#"+id).text();
        //            console.log('success');
        }
    });
}

function chart()
{
    var kpiid=$("#kpi_name_combo").val();
    var userid=$("#user_name_combo").val();
    var fromdate=$("#fromdate").val();
    var todate=$("#todate").val();
    var chartType=$("#chartType").val();
    //    var kpiname=$("#kpi_name_combo").options[$("#kpi_name_combo").selectedIndex].text;
    
    if(userid == 0 )
    {
        alert('Select Username');
        return false;
    }
    else if(kpiid == 0)
    {
        alert('Select KPI Name');
        return false;
    }
    else if(fromdate == '')
    {
        alert('Select From Date');
        return false;
    }
    else if(todate=="")
    {
        alert('Select To Date');
        return false;
    }
    
    $.ajax({
        url:baseurl+"graph/getkpivalue",
        type:'POST',
        async:false,
        data:  {
            "userid": userid,
            "kpiid": kpiid,
            "fromdate": fromdate,
            "todate": todate
        },
        success:function(data){
           
            console.log(data);
            var obj =  $.parseJSON(data);
            var kpi_value = new Array();
            var date_value = new Array();
            kpi_value =  obj.valuearr;
            date_value=  obj.datearr;
            if(kpi_value==''){
                alert("Sorry, Data not available!");
                return false;
            }else{
                $('#container').highcharts({
                    chart: {
                        type: chartType
                    },
                    title: {
                        text: 'KPI Growth'
                    },
                    subtitle: {
                        text: 'Analysis of Business Environment'
                    },
                    xAxis: {
                        categories: date_value
                    },
                    yAxis: {
                        title: {
                            text: 'KPI VALUE'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name:"Selected KPI " ,
                        data: kpi_value
                    }
                    ]
                });
            }
        }
    });
}

function absent(id){
    //                alert(id)
    var absentarr=id.split("_");
    console.log(id);

    var userid=absentarr[1];
    //      console.log($("#"+id).prop('checked'));
    if($("#"+id).prop('checked')==true){
        console.log('true');
        var action='true';
    }else{
        console.log('false');
        var action='false';
    }
    //     console.log(userid);

    $.ajax({
        url:baseurl+"attendance/user_attendance",
        type:'POST',
        data:  {
            "userid": userid,
            "action": action
        },

        success:function(data){
            
        }
    });
}