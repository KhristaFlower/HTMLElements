<?php

namespace HTML;

class Cell extends Element {

	/**
	 * @var mixed The value to be displayed in this cell.
	 */
	protected $content;

	/**
	 * @param array[mixed] $content
	 * @param array[string]string $attributes
	 */
	public function __construct($content = null, $attributes = null) {
		parent::__construct($attributes);
		$this->content = $content;
		$this->tag = 'td';
	}

	/**
	 * Create the HTML code ready to be displayed to the browser.
	 *
	 * @return string HTML formatted code.
	 */
	public function getHTML() {
		return $this->getConstructedTag($this->content);
	}

	/**
	 * Set the content to show in this cell.
	 *
	 * @param $content mixed The value to bind to the object.
	 */
	public function setContent($content) {
		$this->content = $content;
	}

}
