<?php
namespace util\jquery;

use n2n\impl\web\ui\view\html\HtmlView;
use n2n\impl\web\ui\view\html\LibraryAdapter; 
use n2n\impl\web\ui\view\html\HtmlBuilderMeta;

class JQueryLibrary extends LibraryAdapter {
	private $defer;
	
	public function __construct(bool $defer = false) {
		$this->defer = $defer;
	}
	
	public function apply(HtmlView $view, HtmlBuilderMeta $htmlMeta) {
		$htmlMeta->addJs('jquery-2.2.4.min.js', 'util\jquery', $this->defer);
	}	
}