<?php
namespace n2nutil\jquery;

use n2n\impl\web\ui\view\html\HtmlView;
use n2n\impl\web\ui\view\html\LibraryAdapter; 
use n2n\impl\web\ui\view\html\HtmlBuilderMeta;

class JQueryLibrary extends LibraryAdapter {
	private $bodyEnd;
	
	public function __construct(bool $bodyEnd = false) {
		$this->bodyEnd = $bodyEnd;
	}
	
	public function apply(HtmlView $view, HtmlBuilderMeta $htmlMeta) {
		$htmlMeta->addJs('jquery-2.2.4.min.js', 'n2nutil\jquery', false, false, null,
				($this->bodyEnd ? HtmlBuilderMeta::TARGET_BODY_END : HtmlBuilderMeta::TARGET_BODY_START));
	}	
}