<div>
    <div class="temperatureBox">
        
        {foreach name=outer item=arr from=$temperatureArray}
            <div class="temperatureItem {if $arr.temperatur==9999}temperatureItemFalse{/if}" id="temperatureItem{$arr.id}">
                <div class="id">{$arr.id}</div>
                <div class="title">{$arr.title}</div><input class="temperatur" id="tempInput{$arr.id}" type="text" readonly value="{$arr.temperatur}°C">
                <div class="address">{$arr.address}</div>
            </div>
        {/foreach}
        
    </div>
    
    <div class="ds2408Box">
        
        {foreach item=ds from=$ds2408Array}
            <div id="ds2408Item{$ds.id}" class="ds2408Item {if $ds.connect==0}ds2408ItemFall{/if}">
                <div class="id">{$ds.id}</div>
                <div class="title">{$ds.title}</div>
                <div class="fullDin">
                    <input class="{if $ds.din1==0}dinOff{elseif $ds.din1==1}dinOn{else}dinNo{/if}" id="din1{$ds.id}" type="text" readonly value="Din1">
                    <input class="{if $ds.din2==0}dinOff{elseif $ds.din2==1}dinOn{else}dinNo{/if}" id="din2{$ds.id}" type="text" readonly value="Din2">
                    <input class="{if $ds.din3==0}dinOff{elseif $ds.din3==1}dinOn{else}dinNo{/if}" id="din3{$ds.id}" type="text" readonly value="Din3">
                    <input class="{if $ds.din4==0}dinOff{elseif $ds.din4==1}dinOn{else}dinNo{/if}" id="din4{$ds.id}" type="text" readonly value="Din4">
                </div>
                <div class="fullDout">
                    <input class="{if $ds.dout1==0}dinOff{elseif $ds.dout1==1}dinOn{else}dinNo{/if}" id="dout1{$ds.id}" type="text" readonly value="Dout1">
                    <input class="{if $ds.dout2==0}dinOff{elseif $ds.dout2==1}dinOn{else}dinNo{/if}" id="dout2{$ds.id}" type="text" readonly value="Dout2">
                    <input class="{if $ds.dout3==0}dinOff{elseif $ds.dout3==1}dinOn{else}dinNo{/if}" id="dout3{$ds.id}" type="text" readonly value="Dout3">
                </div>
                <div class="address">{$ds.address}</div>
            </div>
        {/foreach}
        
    </div>
</div>