<?php 
$fields = $args['fields'] ?? false;

$technical_data_sheet = $fields['tds'] ?? false;
$safety_data_sheet = $fields['msds'] ?? false;

if($technical_data_sheet || $safety_data_sheet): 
?> 
<div id="data-sheets">
    <h4><?php echo get_ui_text("data_sheets"); ?></h4>
    <ul>
        <?php echo get_data_sheet_link($technical_data_sheet, 'technical_data_sheet'); ?>
        <?php echo get_data_sheet_link($safety_data_sheet, 'safety_data_sheet'); ?>
    </ul>
</div>
<?php endif; ?>