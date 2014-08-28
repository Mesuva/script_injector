<?php 
defined('C5_EXECUTE') or die("Access Denied.");

class ScriptInjectorBlockController extends BlockController {
	
	protected $btTable = 'btScriptInjector';
	protected $btInterfaceWidth = "600";
	protected $btWrapperClass = 'ccm-ui';
	protected $btInterfaceHeight = "465";
	protected $btCacheBlockRecord = false;
	protected $btCacheBlockOutput = false;
	protected $btCacheBlockOutputOnPost = false;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	
	public $content = "";	
	
	public function getBlockTypeDescription() {
		return t("For adding HTML content, with header and footer scripts.");
	}
	
	public function getBlockTypeName() {
		return t("Script Injector");
	}	
	
	public function on_page_view() {
		$html = Loader::helper('html'); 
		$page = Page::getCurrentPage();
		
		$u = new User(); 
		
		if(!$u->isSuperUser() && !$u->inGroup(Group::getByName('Administrators')) && !$page->isEditMode()){
			if ($this->header_content) {
				$this->addHeaderItem($this->header_content); 
			}
		
			if ($this->footer_content) {
				$this->addFooterItem($this->footer_content); 
			}
		}
	}
	  
	public function view(){ 
		$this->set('content', $this->content); 
		$this->set('placeholderText', $this->placeholderText); 
		$this->set('header_content', $this->header_content != ''); 
		$this->set('footer_content', $this->footer_content != ''); 
	
	} 
  	
	public function save($data) { 
		$args['placeholderText'] = isset($data['placeholderText']) ? trim($data['placeholderText']) : '';
		$args['content'] = isset($data['content']) ? trim($data['content']) : '';
		$args['header_content'] = isset($data['header_content']) ? trim($data['header_content']) : '';
		$args['footer_content'] = isset($data['footer_content']) ? trim($data['footer_content']) : '';
		parent::save($args);
	}
	
	public function xml_highlight($s){       
		$s = htmlspecialchars($s);
		$s = preg_replace("#&lt;([/]*?)(.*)([\s]*?)&gt;#sU",
			"<font color=\"#0000FF\">&lt;\\1\\2\\3&gt;</font>",$s);
		$s = preg_replace("#&lt;([\?])(.*)([\?])&gt;#sU",
			"<font color=\"#800000\">&lt;\\1\\2\\3&gt;</font>",$s);
		$s = preg_replace("#&lt;([^\s\?/=])(.*)([\[\s/]|&gt;)#iU",
			"&lt;<font color=\"#808000\">\\1\\2</font>\\3",$s);
		$s = preg_replace("#&lt;([/])([^\s]*?)([\s\]]*?)&gt;#iU",
			"&lt;\\1<font color=\"#808000\">\\2</font>\\3&gt;",$s);
		$s = preg_replace("#([^\s]*?)\=(&quot;|')(.*)(&quot;|')#isU",
			"<font color=\"#800080\">\\1</font>=<font color=\"#FF00FF\">\\2\\3\\4</font>",$s);
		$s = preg_replace("#&lt;(.*)(\[)(.*)(\])&gt;#isU",
			"&lt;\\1<font color=\"#800080\">\\2\\3\\4</font>&gt;",$s);
		return nl2br($s);
	}
}

?>