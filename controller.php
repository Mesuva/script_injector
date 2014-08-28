<?php       

defined('C5_EXECUTE') or die(_("Access Denied."));

class ScriptInjectorPackage extends Package {

	protected $pkgHandle = 'script_injector';
	protected $appVersionRequired = '5.5.0';
	protected $pkgVersion = '0.9.9';
	
	public function getPackageDescription() {
		return t("A block to control the output of ad-hoc scripts");
	}
	
	public function getPackageName() {
		return t("Script Injector");
	}
	
	 
	public function upgrade() {
	        parent::upgrade();
	}
	 
	public function install($options = false) {
	       $pkg = parent::install();
	        
	       $blk = BlockType::getByHandle('script_injector');
	       if(!is_object($blk) ) {
	       		BlockType::installBlockTypeFromPackage('script_injector', $pkg);
	       }	
	} 
	
	 
}