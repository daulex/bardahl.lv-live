<?php
  function kg_get_tax($pid, $tax, $what = "name"){
    $terms = get_the_terms($pid, $tax);
    
    if($what === "name"):
      $res = get_ui_text(strtolower($terms[0]->name));
    elseif($what === "slug"):
      $res = $terms[0]->slug;
    endif;
    return $res;
  }