<?php

namespace HTML;

class CellHeader extends Cell {

	/**
	 * @param array[mixed] $content
	 * @param array[string]string $attributes
	 */
	public function __construct($content = null, $attributes = null) {
		parent::__construct($content, $attributes);
		$this->tag = 'th';
	}

	/**
	 * Create the HTML code ready to be displayed to the browser.
	 *
	 * @return string HTML formatted code.
	 */
	public function getHTML() {
		return $this->getConstructedTag($this->content);
	}

}
