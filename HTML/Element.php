<?php

namespace HTML;

abstract class Element {

	/**
	 * @var array An associated array of attributes and their values.
	 */
	protected $attributes = array();

	/**
	 * @var string The name of the HTML tag for this object.
	 */
	protected $tag = null;

	/**
	 * Generate the HTML for the element ready for display in the browser.
	 *
	 * @return string The HTML content.
	 */
	public abstract function getHTML();

	/**
	 * @param $attributes array[mixed]mixed A 'key' => 'value' array of attribute names and their values.
	 */
	public function __construct($attributes) {
		$this->addAttributes($attributes);
	}

	/**
	 * Add a collection of attributes and their values to the object.
	 *
	 * @param $attributes array[mixed]mixed A 'key' => 'value' array of attribute names and their values.
	 */
	public function addAttributes($attributes) {
		if ($attributes) {
			foreach ($attributes as $name => $value) {
				$this->attributes[$name] = $value;
			}
		}
	}

	/**
	 * Add a new attribute and value pair to the object.
	 *
	 * @param $name mixed Name of the attribute.
	 * @param $value mixed Value of the attribute.
	 * @return $this
	 */
	public function addAttribute($name, $value) {
		$this->attributes[$name] = $value;
		return $this;
	}

	/**
	 * Remove a named attribute from the collection
	 *
	 * @param $name mixed The name of the attribute to remove.
	 * @return $this
	 */
	public function removeAttribute($name) {
		unset($this->attributes[$name]);
		return $this;
	}

	/**
	 * Get a string compiled of every attribute and value ready to be inserted into a HTML tag.
	 *
	 * @return null No attributes to compile.
	 * @return string The attribute string.
	 */
	public function getAttrString() {
		if (!count($this->attributes)) {
			return null;
		}
		$attrs = array();
		foreach ($this->attributes as $name => $value) {
			$attrs[] = "$name='$value'";
		}
		return implode($attrs, ' ');
	}

	/**
	 * Return the completed HTML tag and its contents.
	 *
	 * @param $innerHTML mixed The content to place between the tags.
	 * @return string The completed HTML for this element.
	 * @throws Exception
	 */
	protected function getConstructedTag($innerHTML) {
		if (!is_string($this->tag) || strlen($this->tag) == 0) {
			throw new Exception("Element requires a tag");
		}
		if (count($this->attributes)) {
			return "<{$this->tag} {$this->getAttrString()}>$innerHTML</{$this->tag}>";
		} else {
			return "<{$this->tag}>$innerHTML</{$this->tag}>";
		}
	}

}
