<?php

namespace HTML;

class Generator {

	public function getTableInstance() {
		return new Table();
	}

	public function getRowInstance() {
		return new Row();
	}

	public function getCellInstance() {
		return new Cell();
	}

	public function getCellHeaderInstance() {
		return new CellHeader();
	}

}
