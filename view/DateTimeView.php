<?php

class DateTimeView {


	public function dateTime(): string {
		$day = date('l');
		$dayOfMonth = date('jS');
		$month = date('F');
		$year = date('Y');
		$currentTime = date('G:i:s');

		return "<p> {$day}, the {$dayOfMonth} of {$month} {$year}. The time is {$currentTime} </p>";
	}
}