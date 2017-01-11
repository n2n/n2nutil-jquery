<?php
namespace n2nutil\jquery\mag\group;

use n2n\impl\web\dispatch\mag\model\BoolMag;
use n2n\reflection\ArgUtils;
use n2n\web\dispatch\mag\MarkableMag;
use n2n\web\dispatch\map\PropertyPath;
use n2n\impl\web\ui\view\html\HtmlView;
use n2n\impl\web\ui\view\html\HtmlUtils;
use n2n\web\ui\UiComponent;

class EnablerMag extends BoolMag {
	private $associatedMags;
	private $htmlId;
	
	public function __construct($propertyName, $labelLstr, bool $value = false, array $associatedMags = null) {
		parent::__construct($propertyName, $labelLstr, $value);
		
		$this->setAssociatedMags((array) $associatedMags);
		$this->htmlId = HtmlUtils::buildUniqueId('n2nutil-jquery-enabler-group-');
		$this->setInputAttrs(array());
	}
	
	public function setInputAttrs(array $inputAttrs) {
		parent::setInputAttrs(HtmlUtils::mergeAttrs(array('class' => 'n2nutil-jquery-enabler',
				'data-n2nutil-jquery-enabler-class' => $this->htmlId), $inputAttrs));
	}
	
	/**
	 * @param MarkableMag[] $associatedMags
	 */
	public function setAssociatedMags(array $associatedMags) {
		ArgUtils::valArray($associatedMags, MarkableMag::class, false, 'associatedMags');
		$this->associatedMags = $associatedMags;
	}
	
	/**
	 * @return MarkableMag[] 
	 */
	public function getAssociatedMags() {
		return $this->associatedMags;
	}
	
	public function createUiField(PropertyPath $propertyPath, HtmlView $view): UiComponent {
// 		$view->getHtmlBuilder()->meta()->addLibrary(new JQueryLibrary(3, true));
// 		$view->getHtmlBuilder()->meta()->bodyEnd()->addJs('js/ajah.js', 'n2n\impl\web\ui');
		$view->getHtmlBuilder()->meta()->addJs('mag/group.js', 'n2nutil\jquery');
		
		foreach ($this->associatedMags as $associatedMag) {
			$associatedMag->addMarkAttrs(array('class' => $this->htmlId));
		}
			
		return parent::createUiField($propertyPath, $view);
	}
}