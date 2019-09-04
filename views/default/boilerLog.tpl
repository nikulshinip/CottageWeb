<div class="log">
    <div class="logTable">
        <table class="table">
            <tr class="head">
                <td>Дата</td>
                <td>Сообщение</td>
                <td>Примечание</td>
            </tr>
            {foreach $log as $item}
                <tr {if $item['type']=='ERROR'}class="errorMessage"{/if}>
                    <td>{$item['date']}</td>
                    <td>{$item['message']}</td>
                    <td>{$item['title']}</td>
                </tr>
            {/foreach}
        </table>
    </div>
    <div class="list">
        {foreach from=$listen key=k item=v}
            <a href="{$v}">{$k}</a>
        {/foreach}
    </div>
</div>