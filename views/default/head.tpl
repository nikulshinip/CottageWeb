<!DOCTYPE html>
<html>
    <head>
        <title>{$title}</title>
        <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
            {$css|default:''}
        <script type="text/javascript" src="/js/jquery-2.1.3.min.js" ></script>
            {$script|default:''}
    </head>
    <body>
        <div class="cover">
            <div class="menu">
                <a class="menu_buttom {if $str==1}menu_buttom_now{/if}" href="/">1 Этаж</a>
                <div class="menu_gap"></div>
                <a class="menu_buttom {if $str==2}menu_buttom_now{/if}" href="/floor/">2 Этаж</a>
                <div class="menu_gap"></div>
                <a class="menu_buttom {if $str==3}menu_buttom_now{/if}" href="/boiler/">Отопление</a>
                <div class="menu_gap"></div>
                <a class="menu_buttom {if $str==4}menu_buttom_now{/if}" href="/garage/">Гараж</a>
                <div class="menu_gap"></div>
                <a class="menu_buttom {if $str==5}menu_buttom_now{/if}" href="/varia/">Разное</a>
                <div class="{$classLine|default:'menu_big_line'}" style="left: {$leftLine};"></div>
            </div>
            <div class="content">