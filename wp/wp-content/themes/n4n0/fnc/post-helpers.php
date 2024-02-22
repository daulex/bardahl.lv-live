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
  function truncate_field($field, $length = 80) {
    // Remove HTML tags from the field content
    $text = strip_tags($field);
    
    // Check if the length of the text is greater than the desired length
    if (mb_strlen($text, 'utf-8') > $length) {
        // Truncate the text to the desired length and append ellipsis
        $text = mb_substr($text, 0, $length, 'utf-8') . '...';
    }
    
    // Return the truncated text
    return $text;
}
