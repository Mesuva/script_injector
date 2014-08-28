<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>  


<h3><?php echo t('Placeholder label (optional)'); ?></h3>
<input type="text" style="width: 200px" name="placeholderText" value="<?php echo htmlentities($controllerObj->placeholderText, ENT_COMPAT, APP_CHARSET) ?>" /><br/><br/>

<h3><?php echo t('In place HTML'); ?></h3>
<textarea name="content" style="width: 98%; height: 120px"><?php echo htmlentities($controllerObj->content, ENT_COMPAT, APP_CHARSET) ?></textarea><br/><br/>

<h3><?php echo t('Extra Header Content'); ?></h3>
<textarea name="header_content" style="width: 98%; height: 60px"><?php echo htmlentities($controllerObj->header_content, ENT_COMPAT, APP_CHARSET) ?></textarea><br/><br/>

<h3><?php echo t('Extra Footer Content'); ?></h3>
<textarea name="footer_content" style="width: 98%; height: 60px"><?php echo htmlentities($controllerObj->footer_content, ENT_COMPAT, APP_CHARSET) ?></textarea>

