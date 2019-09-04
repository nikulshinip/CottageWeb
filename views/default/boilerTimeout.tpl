<div class="timeout">
    <div class="switch">
        <input type="checkbox" class="checkbox" id="on_off_timeout" {if $on_off_timeout} checked="checked"{/if}>  
        <label for="on_off_timeout">Вкл./Откл. таймауты.</label>
    </div>
    <table class="table">
        <tr class="head">
            <td width="20%">Время начала таймаута</td>
            <td width="20%">Время конца таймаута</td>
            <td width="45%">Коментарий</td>
        </tr>
        {foreach name=outer key=key item=id from=$table}
            {$x=$key}
            <tr id="line{$x}">
                {foreach name=cikl key=key item=item from=$id}
                    <td>{$item}</td>
                {/foreach}
                <td>
                    <div class="ico edit" id="edit{$x}" title="редактировать"></div>
                    <div class="ico delete del" id="delete{$x}" title="удалить"></div>
                </td>
            </tr>
        {foreachelse}
            <tr class="head">
                <td colspan="4"><p>Таблица не содержит строк.</p></td>
            </tr>
        {/foreach}
        <tr class="coladd">
            <td>
                <input id="from" type="time" tabindex="1">
                <label for="from" id="fromLabel">Формат ввода времени должен соответсвовать виду: ЧЧ:ММ или ЧЧ:ММ:СС</label>
            </td>
            <td>
                <input id="before" type="time" tabindex="2">
                <label for="before" id="beforeLabel">Формат ввода времени должен соответсвовать виду: ЧЧ:ММ или ЧЧ:ММ:СС</label>
            </td>
            <td><input id="title" type="text" tabindex="3"></td>
            <td>
                <div class="ico ok" id="applyAdd" title="добавить" tabindex="4"></div>
                <div class="ico delete" id="cansel" title="отменить" tabindex="5"></div>
            </td>
        </tr>
    </table>
    <button class="buttom" id="add">Добавить новую строку</button>
    <button class="buttom" id="apply">Применить</button>
</div>