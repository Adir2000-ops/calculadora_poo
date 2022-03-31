<?php

class Html {
	private $head;
	private $body;

	function Html($head, $body) {
		$this->head = $head;
		$this->body = $body;
	}

	public function __toString() {
		$html = '<!doctype html>';
		$html .= $this->head;
		$html .= $this->body;
		$html .= '</html>';
		return $html;
	}

}