<?php


class VisorCalculadora {

	private $value;

	/**
	 * Constructor.
	 * @param $value
	 */
	public function __construct($value = 0) {
		$this->value = $value;
	}


	public function __toString() {
        $html = "<div class='row'> \n";
        $html .= "<div class='col-12 resultado'>" . $this->value . "</div> \n";
        $html .= "</div> \n";
		return $html;
	}

}