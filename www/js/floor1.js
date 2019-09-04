$(document).ready(function(){
    
//------------------------------------------------------------------------------
    function updateTemperature(name, data){
        $(name+" b").text(data+"°C");
        if(data==9999){
            $(name+" > .temp").removeClass("temp_active");
            $(name+" > .temp").addClass("temp_unknown");
            $(name).removeClass("signal_active");
            $(name).addClass("signal_unknown");
        }else if(data<30){
            $(name+" > .temp").addClass("temp_active");
            $(name+" > .temp").removeClass("temp_unknow");
            $(name).removeClass("signal_active");
            $(name).removeClass("signal_unknown");
        }else{
            $(name+" > .temp").removeClass("temp_active");
            $(name+" > .temp").removeClass("temp_unknow");
            $(name).removeClass("signal_unknown");
            $(name).addClass("signal_active");
        }
    }
//------------------------------------------------------------------------------

    //обновление сигналов каждую минуту
    setInterval(update, 60000);
    function update(){
        $.post('/index/update/', {},
                function(data){
                    
                    updateTemperature('#room', data.t_room);
                    updateTemperature('#stairs', data.t_stairs);
                    updateTemperature('#terrace', data.t_terrace);
                    updateTemperature('#out', data.t_out);
                    updateTemperature('#cook', data.t_cook);
                    updateTemperature('#bathRoom', data.t_bathRoom);
                    
                },
                "json");
    }
});