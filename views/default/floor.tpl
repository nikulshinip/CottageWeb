<div class="floor_img"></div>

<div class="signal {if $t_room==9999}signal_unknown{elseif $t_room>30}signal_active{/if}" id="room">
    <div class="fire"></div>
    <div class="go"></div>
    <div class="temp {if $t_room==9999}temp_unknown{/if}{if $t_room<30}temp_active{/if}"></div><b>{$t_room}°C</b>
</div>
<div class="signal {if $t_stairs==9999}signal_unknown{elseif $t_stairs>30}signal_active{/if}" id="stairs">
    <div class="fire"></div>
    <div class="go"></div>
    <div class="temp {if $t_stairs==9999}temp_unknown{/if}{if $t_stairs<30}temp_active{/if}"></div><b>{$t_stairs}°C</b>
</div>
<div class="signal {if $t_terrace==9999}signal_unknown{elseif $t_terrace>30}signal_active{/if}" id="terrace">
    <div class="fire"></div>
    <div class="go"></div>
    <div class="temp {if $t_terrace==9999}temp_unknown{/if}{if $t_terrace<30}temp_active{/if}"></div><b>{$t_terrace}°C</b>
</div>
<div class="signal {if $t_out==9999}signal_unknown{elseif $t_out>30}signal_active{/if}" id="out">
    <div class="temp {if $t_out==9999}temp_unknown{/if}{if $t_out<30}temp_active{/if}"></div><b>{$t_out}°C</b>
</div>
<div class="signal {if $t_cook==9999}signal_unknown{elseif $t_cook>30}signal_active{/if}" id="cook">
    <div class="fire"></div>
    <div class="go"></div>
    <div class="temp {if $t_cook==9999}temp_unknown{/if}{if $t_cook<30}temp_active{/if}"></div><b>{$t_cook}°C</b>
</div>
<div class="signal {if $t_bathRoom==9999}signal_unknown{elseif $t_bathRoom>30}signal_active{/if}" id="bathRoom">
    <div class="go"></div>
    <div class="temp {if $t_bathRoom==9999}temp_unknown{/if}{if $t_bathRoom<30}temp_active{/if}"></div><b>{$t_bathRoom}°C</b>
</div>