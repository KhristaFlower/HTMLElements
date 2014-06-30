<?php

namespace HTML;

class Row extends Element {

	/** @var Cell[] */
	private $cells = array();

	/**
	 * Create a new Row, optionally with an array of data to become
	 * cells and attributes to be added to the row.
	 *
	 * @param array[mixed] $contents Values to become new cells in this row.
	 * @param array[string]mixed $attributes A 'key' => 'value' array of attributes.
	 */
	public function __construct($contents = null, $attributes = null) {
		parent::__construct($attributes);
		$this->tag = 'tr';
		if (count($contents)) {
			foreach ($contents as $content) {
				$this->addPlainCell($content);
			}
		}
	}

	/**
	 * Generate the HTML code for the row and its sub-components.
	 *
	 * @return string HTML formatted code ready for display to the browser.
	 */
	public function getHTML() {
		$row = "";
		foreach ($this->cells as $cell) {
			$row .= $cell->getHTML();
		}
		return $this->getConstructedTag($row);
	}

	/**
	 * Add a Cell object to the row.
	 *
	 * @param $cell Cell The Cell object to add to the row.
	 * @return $this
	 */
	public function addCell($cell) {
		$this->cells[] = $cell;
		return $this;
	}

	/**
	 * @param $content mixed The value to display in the Cell.
	 * @return $this
	 */
	public function addPlainCell($content) {
		$this->cells[] = new Cell($content);
		return $this;
	}

}
