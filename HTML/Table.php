<?php

namespace HTML;

class Table extends Element {

	/** @var Row[] */
	private $rows = array();

	/** @var Row[] */
	private $headers = array();

	/**
	 * Create a new table, optionally with attributes.
	 *
	 * @param array[string]mixed $attributes A 'key' => 'value' array of attributes.
	 * @param array $headers An array containing the values to be displayed in the header.
	 * @param array[] $rows An array containing arrays with data to be displayed.
	 */
	public function __construct($attributes = null, $headers = null, $rows = null) {
		parent::__construct($attributes);
		$this->tag = 'table';
		// Create the header if a collection of headings was supplied.
		if (count($headers)) {
			$this->createHeader($headers);
		}
		// Create the rows if an array of row data was provided.
		if (count($rows)) {
			foreach ($rows as $row) {
				$this->createRow($row);
			}
		}
	}

	/**
	 * Create the HTML code for the table and its sub-components.
	 *
	 * @return string HTML table code
	 */
	public function getHTML() {
		// Build the table header
		$thead = "";
		foreach ($this->headers as $row) {
			$thead .= $row->getHTML();
		}
		// Build the table body
		$tbody = "";
		foreach ($this->rows as $row) {
			$tbody .= $row->getHTML();
		}
		// Build the final table
		$table = "<thead>$thead</thead><tbody>$tbody</tbody>";
		return $this->getConstructedTag($table);
	}

	/**
	 * @param $row Row Add a Row to the table
	 * @return $this
	 */
	public function addRow($row) {
		$this->rows[] = $row;
		return $this;
	}

	/**
	 * Construct a table row.
	 *
	 * @param array $contents The cell values.
	 * @param array[string]mixed $attributes Attributes to add to the row.
	 * @return $this
	 */
	public function createRow($contents, $attributes = null) {
		$row = new Row();
		$row->addAttributes($attributes);
		foreach ($contents as $content) {
			$row->addPlainCell($content);
		}
		$this->rows[] = $row;
		return $this;
	}

	/**
	 * Add a Row to be rendered in the table head.
	 *
	 * @param $row Row The row.
	 * @return $this
	 */
	public function addHeader($row) {
		$this->headers[] = $row;
		return $this;
	}

	/**
	 * Construct a table header row.
	 *
	 * @param array $contents The header names.
	 * @param array[string]mixed $attributes Attributes to add to the header row.
	 * @return $this
	 */
	public function createHeader($contents, $attributes = null) {
		$row = new Row();
		$row->addAttributes($attributes);
		foreach ($contents as $content) {
			$cell = new CellHeader();
			$cell->setContent($content);
			$row->addCell($cell);
		}
		$this->headers[] = $row;
		return $this;
	}

}
