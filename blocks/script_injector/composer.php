<?php 
defined('C5_EXECUTE') or die("Access Denied.");
$form = Loader::helper('form');
print $form->textarea($this->field('content'), $content, array());
print $form->textarea($this->field('header_content'), $content, array());
print $form->textarea($this->field('footer_content'), $content, array());
