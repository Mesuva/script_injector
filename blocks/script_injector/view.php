<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>


<?php 
$page = Page::getCurrentPage();
$u = new User();

if(!$u->isSuperUser() && !$u->inGroup(Group::getByName('Administrators')) && !$page->isEditMode()){
	echo $content; 
} else {
	
	if ($placeholderText) {
		echo '<p><strong>' . $placeholderText. '</strong>';	
	} else {
		echo '<p><strong>' . t('Additional HTML/Scripts') . '</strong>';
	}
	
	$outputs = array();
	
	if ($content) {
		$outputs[] = t('block location');
	}
	
	if ($header_content) {
		$outputs[] = t('document head');
	}
	
	if ($footer_content) {
		$outputs[] = t('before close of body');
	}
	
	if (count($outputs) > 0) {
		echo ' - '.  t('outputting to') . ' ';
	
		$last = array_pop($outputs);
		if(count($outputs) > 0) {
		    echo implode(", ", $outputs) . " and " . $last;
		} else {
		    echo $last;
		}
		
		echo '</p>';
	
	} else {
		echo ' - <em>' . t('no outputs'). '</em></p>';
	}
 	
 
	
}
?>
