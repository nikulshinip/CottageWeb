$(document).ready(function(){
    setInterval(updateTemperature, 60000);
    setInterval(updateDS2408, 60000);
    
    function updateTemperature(){
        $.post('/varia/devicetemperatureupdate/', {},
                function(data){
                    key = Object.keys(data);
                    for(i=0;i<key.length;i++){
                        $('#tempInput'+key[i]).val(data[key[i]] + "°C");
                        if(data[key[i]]==9999){
                            $('#temperatureItem'+key[i]).addClass("temperatureItemFalse");
                        }else{
                            $('#temperatureItem'+key[i]).removeClass("temperatureItemFalse");
                        }
                    }
                },
                "json");
    }
    
    function updateDS2408(){
        $.post('/varia/devicedsupdate/', {},
                function(data){
                    key = Object.keys(data);
                    for(i=0;i<key.length;i++){
                        inerKey = Object.keys(data[key[i]]);
                        inerKey = inerKey.slice(2);
                        if(data[key[i]].connect){
                            $('#ds2408Item'+data[key[i]].id).removeClass("ds2408ItemFall");
                        }else{
                            $('#ds2408Item'+data[key[i]].id).addClass("ds2408ItemFall");
                        }
                        for(y=0;y<inerKey.length;y++){
                            if(data[key[i]][inerKey[y]]==0){
                                $('#'+inerKey[y]+key[i]).removeClass("dinOn");
                                $('#'+inerKey[y]+key[i]).removeClass("dinNo");
                                $('#'+inerKey[y]+key[i]).addClass("dinOff");
                            }else if(data[key[i]][inerKey[y]]==1){
                                $('#'+inerKey[y]+key[i]).removeClass("dinNo");
                                $('#'+inerKey[y]+key[i]).removeClass("dinOff");
                                $('#'+inerKey[y]+key[i]).addClass("dinOn");
                            }else{
                                $('#'+inerKey[y]+key[i]).removeClass("dinOff");
                                $('#'+inerKey[y]+key[i]).removeClass("dinOn");
                                $('#'+inerKey[y]+key[i]).addClass("dinNo");
                            }
                            
                        }
                    }
                },
                "json");
    }
});