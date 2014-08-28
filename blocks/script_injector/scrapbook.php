<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<div id="script_injector_block<?php echo intval($bID)?>" class="script_injector_block" style="max-height:300px; overflow:auto">
<?php echo HtmlBlockController::xml_highlight(($content)) ?>
<?php echo HtmlBlockController::xml_highlight(($header_content)) ?>
<?php echo HtmlBlockController::xml_highlight(($footer_content)) ?>
</div>