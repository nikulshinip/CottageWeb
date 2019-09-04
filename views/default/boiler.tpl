<div class="cotel"></div>
                
<div class="all_switch">
    <div class="switch">
        <input type="checkbox" class="checkbox" id="on_off" {if $on_off_dout} checked="checked"{/if}/>  
        <label for="on_off">Вкл./Откл. системмы отопления</label>
    </div>
    <div class="switch" id="mode_switch">
        <label for="mode">Температура комнаты</label>
        <input type="checkbox" class="checkbox" id="mode" {if $mode} checked="checked"{/if}/>
        <label for="mode">Температура обратки котла</label>
    </div>
    <div class="switch">
        <input type="checkbox" class="checkbox" id="autoPower" {if $autoPower} checked="checked"{/if}/>
        <label for="autoPower">Автоматическая регулировка мощности котла</label>
    </div>
</div>

<div class="cotel_sw {if $on_off_din}cotel_sw_activ{/if}" id="cotel_sw1"></div>
<div class="cotel_sw {if $overheating}cotel_sw_activ{/if}" id="cotel_sw2"></div>

<div id="cotel_power"></div>
<select class="select" id="cotel_power_select">
    <option value="0" {if $power==0}selected="selected"{/if}>0кВт</option>
    <option value="2.5" {if $power==2.5}selected="selected"{/if}>2.5кВт</option>
    <option value="5" {if $power==5}selected="selected"{/if}>5кВт</option>
    <option value="7.5" {if $power==7.5}selected="selected"{/if}>7.5кВт</option>
    <option value="10" {if $power==10}selected="selected"{/if}>10кВт</option>
    <option value="12.5" {if $power==12.5}selected="selected"{/if}>12.5кВт</option>
    <option value="15" {if $power==15}selected="selected"{/if}>15кВт</option>
</select>

<div class="all_cotel_power_lamp">
    <div class="cotel_power_lamp {if $lamp6}cotel_power_lamp_activ{/if}" id="cotel_power_lamp6"></div>
    <div class="cotel_power_lamp {if $lamp5}cotel_power_lamp_activ{/if}" id="cotel_power_lamp5"></div>
    <div class="cotel_power_lamp {if $lamp4}cotel_power_lamp_activ{/if}" id="cotel_power_lamp4"></div>
    <div class="cotel_power_lamp {if $lamp3}cotel_power_lamp_activ{/if}" id="cotel_power_lamp3"></div>
    <div class="cotel_power_lamp {if $lamp2}cotel_power_lamp_activ{/if}" id="cotel_power_lamp2"></div>
    <div class="cotel_power_lamp {if $lamp1}cotel_power_lamp_activ{/if}" id="cotel_power_lamp1"></div>
</div>

<div id="floor1_setting"></div>
<div class="temperatur_input" id="temperatur_input_floor1">
    <input type="text" id="floor1_input" value="{$floor1_temperaturSetting}">
    <label for="floor1_input">°C</label>
</div>

<div id="back_setting"></div>
<div class="temperatur_input" id="temperatur_input_back">
    <input type="text" id="back_input" value="{$back_temperaturSetting}">
    <label for="back_input">°C</label>
</div>

<div class="pump {if $pump1_din}pump_activ{/if}" id="pump1"></div>

<input class="temperatur {if $t_boiler > 90}temperatur_active{/if}" id="t_cotel" type="text" readonly value="{$t_boiler}°C">
<input class="temperatur {if $t_obratka > $back_temperaturSetting}temperatur_active{/if}" id="t_obratka" type="text" readonly value="{$t_obratka}°C">
<input class="temperatur {if $t_floor1 > $floor1_temperaturSetting}temperatur_active{/if}" id="t_floor1" type="text" readonly value="{$t_floor1}°C">
<input class="temperatur {if $t_out > 80}temperatur_active{/if}" id="t_out" type="text" readonly value="{$t_out}°C">

<div class="inputError"></div>

<button class="buttom" id="time">Таблица таймаутов</button>
<button class="buttom" id="apply">Применить</button>