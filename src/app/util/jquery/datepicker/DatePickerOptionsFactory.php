<?php
namespace util\jquery\datepicker;

interface DatePickerOptionsFactory {
	public function createDatePickerOptions($pattern);
}
