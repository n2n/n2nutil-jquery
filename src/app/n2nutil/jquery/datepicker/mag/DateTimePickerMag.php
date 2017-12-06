<?php
namespace n2nutil\jquery\datepicker\mag;

use n2n\impl\web\dispatch\mag\model\DateTimeMag;
use n2n\web\dispatch\map\PropertyPath;
use n2n\impl\web\ui\view\html\HtmlView;
use n2n\web\dispatch\mag\UiOutfitter;
use n2n\web\ui\UiComponent;
use n2n\impl\web\ui\view\html\HtmlUtils;
use n2nutil\jquery\datepicker\DatePickerHtmlBuilder;
use n2n\impl\web\ui\view\html\HtmlElement;

class DateTimePickerMag extends DateTimeMag {
	
	/**
	 * @param PropertyPath $propertyPath
	 * @param HtmlView $view
	 * @return UiComponent
	 */
	public function createUiField(PropertyPath $propertyPath, HtmlView $view, UiOutfitter $uiOutfitter): UiComponent {
		$attrs = HtmlUtils::mergeAttrs($uiOutfitter->buildAttrs(UiOutfitter::NATURE_TEXT|UiOutfitter::NATURE_MAIN_CONTROL),
				$this->inputAttrs);
		
		$attrs = HtmlUtils::mergeAttrs($attrs, array('data-selector-opener' => 'n2nutil-jquery-datepicker-opener'));
		
		$dpHtml = new DatePickerHtmlBuilder($view);
		
		return new HtmlElement('span', null, array(
				$dpHtml->getFormDatePicker($propertyPath, $attrs),
				new HtmlElement('span', array('class' => 'n2nutil-jquery-datepicker-opener'), new HtmlElement('i', array('class' => 'fa fa-calendar'), ''))));
		
	}
}