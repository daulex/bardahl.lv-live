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

function kg_render_tabs($data = false, $to_render = "buttons") {
  if(!$data) return false;


  $tabs = array(
    "specifications",
    "reviews",
    "data_sheets"
  );
  if($to_render === "buttons"): 
    foreach($tabs as $tab):
      if(isset($data[$tab]) && $data[$tab]):
        echo '<button class="tab" role="tab" aria-selected="false" aria-controls="tab-'.$tab.'" id="button-'.$tab.'">'.get_ui_text($tab).'</button>';
      endif;
    endforeach;

  elseif($to_render === "sections"):
    foreach($tabs as $tab):
      
      if(isset($data[$tab]) && $data[$tab]):

        ?>

      <section id="tab-<?=$tab;?>" class="ootb-tabcordion--entry" data-title="<?=$tab;?>" tabindex="-1" role="tabpanel" aria-labelledby="<?=$tab;?>">
          <div class="ootb-tabcordion--entry-container">
            <div class="ootb-tabcordion--entry-content">
              <?php
                get_template_part(
                    "parts/product/tab", 
                    $tab, 
                    array("fields" => $data)
                  );
              ?>
            </div>
          </div>
        </section>

        <?php

      endif;

    endforeach;
  endif;

}