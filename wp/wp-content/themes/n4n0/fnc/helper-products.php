<?php
function get_data_sheet_link($link = false, $label = false){
    if(!$link || !$label) return false;
    $res = '<li><a href="';
    $res .= $link;
    $res .= '">';
    $res .= get_ui_text($label);
    $res .= '</a></li>';
    return $res;
}