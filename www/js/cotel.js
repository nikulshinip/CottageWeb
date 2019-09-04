$(document).ready(function(){
    
    $('#cotel_power').slider({
        orientation: "vertical",
        range: "min",
        min: 0,
        max: 15,
        step: 2.5,
        value: $('#cotel_power_select').val(),
        slide: function(event, ui){
            $( '#cotel_power_select' ).val(ui.value);
            rang = ui.value/2.5;
            $('#cotel_power_select').css("top",((-39*rang)+340)+"px");
            $('#apply').show();
        }
    });
    $('#cotel_power_select').val($('#cotel_power').slider("value"));
    $('#cotel_power_select').css("top", ((-39*$('#cotel_power').slider("value")/2.5)+340)+"px");
    $('#cotel_power_select').change(function(){
        $('#cotel_power').slider("value", $('#cotel_power_select').val());
        rang = $('#cotel_power_select').val()/2.5;
        $('#cotel_power_select').css("top",((-39*rang)+340)+"px");
        $('#apply').show();
    });

    $('#floor1_setting').slider({
        orientation: "vertical",
        range: "min",
        min: 0,
        max: 35,
        step: 1,
        value: $('#floor1_input').val(),
        slide: function(event, ui){
            $('#floor1_input').val(ui.value);
            $('#temperatur_input_floor1').css("top", ((-4*ui.value)+336)+"px");
            $('#apply').show();
        }
    });
    $('#floor1_input').val($('#floor1_setting').slider("value"));
    $('#temperatur_input_floor1').css("top", ((-4*$('#floor1_setting').slider("value"))+336)+"px");
    $('#floor1_input').change(function(){
        $('#floor1_setting').slider("value", $('#floor1_input').val());
        $('#temperatur_input_floor1').css("top", (-4*$('#floor1_input').val()+336)+"px");
        $('#apply').show();
    });
    
    $('#back_setting').slider({
        orientation: "horizontal",
        range: "min",
        min: 40,
        max: 60,
        step: 1,
        value: $('#back_input').val(),
        slide: function(event, ui){
            $('#back_input').val(ui.value);
            $('#temperatur_input_back').css("left", (ui.value*18-411)+"px");
            $('#apply').show();
        }
    });
    $('#back_input').val($('#back_setting').slider("value"));
    $('#temperatur_input_back').css("left", ($('#back_setting').slider("value")*18-411)+"px");
    $('#back_input').change(function(){
        $('#back_setting').slider("value", $('#back_input').val());
        $('#temperatur_input_back').css("left", ($('#back_setting').slider("value")*18-411)+"px");
        $('#apply').show();
    });

//------------------------------------------------------------------------------
    function modeProp(){
        if($('#mode').prop('checked')){
            $('#floor1_setting').hide();
            $('#temperatur_input_floor1').hide();
            $('#back_setting').show();
            $('#temperatur_input_back').show();
        }else{
            $('#back_setting').hide();
            $('#temperatur_input_back').hide();
            $('#floor1_setting').show();
            $('#temperatur_input_floor1').show();
        }
    }
    function autoPowerProp(){
        if($('#autoPower').prop('checked')){
            $('#cotel_power').hide();
            $('#cotel_power_select').hide();
        }else{
            $('#cotel_power').show();
            $('#cotel_power_select').show();
        }
    }
    modeProp();
    autoPowerProp();
    $('#mode').change(modeProp);    
    $('#autoPower').change(autoPowerProp);

//------------------------------------------------------------------------------
    $('.checkbox').change(function(){
        $('#apply').show();
    });
    
    function inputError(st){
        if(st){
            $('.inputError').text('Вы ввели неверное значение!!!');
            $('.inputError').show();
        }else{
            $('.inputError').hide();
        }
    }
    
    function checkInput(){
        value1=$('#floor1_input').val();
        value2=$('#back_input').val();
        if(!(/^[0-9]{1,2}$/.test(value1)) || !(/^[0-9]{1,2}$/.test(value2))){
            inputError(1);
            return false;
        }else if(value1<0 || value1>35 || value2<40 || value2>60) {
            inputError(1);
            return false;
        }else{
            inputError();
            return true;;
        }
    }
    
    $('#floor1_input').change(checkInput);
    $('#back_input').change(checkInput);
    
    //--------------------------------------------------------------------------
    $('#time').click(function(){window.location.href = "/boiler/timeout/";});
    
    //--------------------------------------------------------------------------
    //обновление сигналов каждую минуту
    setInterval(updateDin, 60000);
    function updateDin(){
        $.post('/boiler/update/', {},
                function(data){
                    if(data.on_off){
                        $('#cotel_sw1').addClass('cotel_sw_activ');
                    } else {
                        $('#cotel_sw1').removeClass('cotel_sw_activ');
                    }
                    if(data.overheating){
                        $('#cotel_sw2').addClass('cotel_sw_activ');
                    } else {
                        $('#cotel_sw2').removeClass('cotel_sw_activ');
                    }
                    if(data.lamp1){
                        $('#cotel_power_lamp1').addClass("cotel_power_lamp_activ");
                    } else {
                        $('#cotel_power_lamp1').removeClass("cotel_power_lamp_activ");
                    }
                    if(data.lamp2){
                        $('#cotel_power_lamp2').addClass("cotel_power_lamp_activ");
                    } else {
                        $('#cotel_power_lamp2').removeClass("cotel_power_lamp_activ");
                    }
                    if(data.lamp3){
                        $('#cotel_power_lamp3').addClass("cotel_power_lamp_activ");
                    } else {
                        $('#cotel_power_lamp3').removeClass("cotel_power_lamp_activ");
                    }
                    if(data.lamp4){
                        $('#cotel_power_lamp4').addClass("cotel_power_lamp_activ");
                    } else {
                        $('#cotel_power_lamp4').removeClass("cotel_power_lamp_activ");
                    }
                    if(data.lamp5){
                        $('#cotel_power_lamp5').addClass("cotel_power_lamp_activ");
                    } else {
                        $('#cotel_power_lamp5').removeClass("cotel_power_lamp_activ");
                    }
                    if(data.lamp6){
                        $('#cotel_power_lamp6').addClass("cotel_power_lamp_activ");
                    } else {
                        $('#cotel_power_lamp6').removeClass("cotel_power_lamp_activ");
                    }
                    if(data.pump1){
                        $('#pump1').addClass("pump_activ");
                    } else {
                        $('#pump1').removeClass("pump_activ");
                    }
                    $('#t_cotel').val(data.t_boiler + "°C");
                    $('#t_obratka').val(data.t_obratka + "°C");
                    $('#t_out').val(data.t_out + "°C");
                    $('#t_floor1').val(data.t_floor1 + "°C");
                    if(data.t_boiler<90){
                        $('#t_cotel').removeClass("temperatur_active");
                    } else {
                        $('#t_cotel').addClass("temperatur_active");
                    }
                    if(data.t_obratka<$('#back_input').val()){
                        $('#t_obratka').removeClass("temperatur_active");
                    } else {
                        $('#t_obratka').addClass("temperatur_active");
                    }
                    if(data.t_floor1<$('#floor1_input').val()){
                        $('#t_floor1').removeClass("temperatur_active");
                    } else {
                        $('#t_floor1').addClass("temperatur_active");
                    }
                    if(data.t_out<80){
                        $('#t_out').removeClass("temperatur_active");
                    } else {
                        $('#t_out').addClass("temperatur_active");
                    }
                },
                "json");
    }
    
    //--------------------------------------------------------------------------
    //Применить новые настройки
    $('#apply').click(setSetting);
    function setSetting(){
        if(!checkInput()){
            return false;
        }
        if($('#on_off').prop('checked')){on_off=1;}else{on_off=0;}
        if($('#mode').prop('checked')){mode=1;}else{mode=0;}
        if($('#autoPower').prop('checked')){autoPower=1;}else{autoPower=0;}
        $.post('/boiler/setsetting/',
                {
                    on_off : on_off,
                    mode : mode,
                    autoPower : autoPower,
                    power : $('#cotel_power_select option').filter(':selected').val(),
                    temp1 : $('#floor1_input').val(),
                    back : $('#back_input').val()
                },
                function(data){
                    if(data=="true"){
                        $('#apply').hide();
                        setTimeout(updateDin, 2000);
                        return true;
                    }else{
                        window.location.href = "/error/201/";
                    }
                },
                "text"
        );
    }
});