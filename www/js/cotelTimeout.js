$(document).ready(function(){
    //--------------------------------------------------------------------------
    $('.checkbox').change(function(){$('#apply').show();});
    $('#apply').click(applyClick);
    $('#add').click(function(){$('.coladd').show();});
    $('#cansel').click(canselClick);
    $('#applyAdd').click(insertTable);
    $('#from').change(fromCheck);
    $('#before').change(beforeCheck);
    $('#from').focusin(function(){$('#fromLabel').hide();});
    $('#before').focusin(function(){$('#beforeLabel').hide();});
    $('.del').click(delClick);
    $('.edit').click(editClick);
    
    //--------------------------------------------------------------------------
    function applyClick(){
        if($('#on_off_timeout').prop('checked')){on_off=1;}else{on_off=0;}
        $.post('/boiler/setontimeoft/',
                {on_off_timeout : on_off},
                function(data){
                    if(data=="true"){
                        $('#apply').hide();
                        return true;
                    }else{
                        window.location.href = "/error/201/";
                    }
                },
                'text'
        );
    }
    function canselClick(){
        $('.coladd').hide();
        $('#from').val('');
        $('#before').val('');
        $('#title').val('');
    }
    function fromCheck(){
        if(!testTime($('#from').val())){
            $('#fromLabel').show();
            return false;
        }
        return true;
    }
    function beforeCheck(){
        if(!testTime($('#before').val())){
            $('#beforeLabel').show();
            return false;
        }
        return true;
    }
    function testTime(time){
        if(/^[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}$/.test(time) || /^[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}:[0-5]{1}[0-9]{1}$/.test(time)){
            return true;
        }else{
            return false;
        }
    }
    function insertTable(){
        if(fromCheck() && beforeCheck()){
            $.post('/boiler/addtable/',
                    { 
                    from : $('#from').val(),
                    before : $('#before').val(),
                    title : $('#title').val()
                    },
                    function(data){
                        if(data=="true"){
                            window.location.href = "/boiler/timeout/";
                        }else{
                            window.location.href = "/error/201/";
                        }
                    },
                    'text'
            );
        }
        else {
            return false;
        }
    }
    function delClick(event){
        id = $(event.target).attr('id');
        id = id.substring(6);
        id = id*1;
        $.post('/boiler/delete/',
                {id : id},
                function(data){
                    if(data=="true"){
                        window.location.href = "/boiler/timeout/";
                    }else{
                        window.location.href = "/error/202/";
                    }
                },
                'text'
        );
    }
    function editClick(event){
        id = $(event.target).attr('id');
        id = id.substring(4);
        lineid = '#line'+id;
        line = $(lineid).html();
        arr = line.split('<td>', 4);
        for(i=0; i<arr.length; i++){
            z = arr[i].indexOf('</td>');
            arr[i] = arr[i].substring(0, z);
        }
        arr.splice(0, 1);
        newHtml = '<td>\
                <input id="editFrom'+id+'" type="time" tabindex="1" value="'+arr[0]+'">\
                <label for="editFrom'+id+'" id="editFromLabel'+id+'">Формат ввода времени должен соответсвовать виду: ЧЧ:ММ или ЧЧ:ММ:СС</label>\
            </td>\
            <td>\
                <input id="editBefore'+id+'" type="time" tabindex="2" value="'+arr[1]+'">\
                <label for="editBefore'+id+'" id="editBeforeLabel'+id+'">Формат ввода времени должен соответсвовать виду: ЧЧ:ММ или ЧЧ:ММ:СС</label>\
            </td>\
            <td><input id="editTitle'+id+'" type="text" tabindex="3" value="'+arr[2]+'"></td>\
            <td>\
                <div class="ico ok" id="applyEdit'+id+'" title="сохранить" tabindex="4"></div>\
                <div class="ico delete" id="canselEdit'+id+'" title="отменить" tabindex="5"></div>\
            </td>';
        $(lineid).html(newHtml);
        $(lineid).css('text-align', 'center');
        $(lineid).addClass('coledit');
        
        function editFromCheck(){
            if(!testTime($('#editFrom'+id).val())){
                $('#editFromLabel'+id).show();
                return false;
            }
            return true;
        }
        function editBeforeCheck(){
            if(!testTime($('#editBefore'+id).val())){
                $('#editBeforeLabel'+id).show();
                return false;
            }
            return true;
        }
        
        $('#canselEdit'+id).click(function(){window.location.reload();});
        $('#editFrom'+id).change(editFromCheck);
        $('#editBefore'+id).change(editBeforeCheck);
        $('#editFrom'+id).focusin(function(){$('#editFromLabel'+id).hide();});
        $('#editBefore'+id).focusin(function(){$('#editBeforeLabel'+id).hide();});
        $('#applyEdit'+id).click(function(){
            if(editFromCheck() && editBeforeCheck()){
                $.post('/boiler/edittimeout/',
                        {
                            id : id,
                            from : $('#editFrom'+id).val(),
                            before : $('#editBefore'+id).val(),
                            title : $('#editTitle'+id).val()
                        },
                        function(data){
                            if(data=="true"){
                                window.location.href = "/boiler/timeout/";
                            }else{
                                window.location.href = "/error/201/";
                            }
                        },
                        'text'
                );
            }
            else {
                return false;
            }
        });
    }
    
});