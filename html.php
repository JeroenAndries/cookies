<?php 

class HtmlElement{
	protected $tag = "p";
	protected $attributes = "";

	public function __construct($content, $attributes = array()){
		$this->attributes = $attributes;
		$this->content = $content;
		$this->attributes = $this->calculateAttributes($attributes);
	}

	public function __toString(){
		return "<{$this->tag}{$this->attributes}>$this->content</{$this->tag}>";
	}

	protected function calculateAttributes($attributes){
		$result = "";
		foreach ($attributes as $attribute => $value) {
			$result .= isset($attributes[$attribute]) ? " {$attribute}=\"{$value}\"" : "";	
		}
		return $result;
	}
}

class HtmlVoidElement extends HtmlElement{
	public function __construct($attributes = array()){
		parent::__construct("", $attributes);
	}
	public function __toString(){
		return "<{$this->tag}{$this->attributes} />";
	}
}

class Paragraph extends HtmlElement{
}

class Heading extends HtmlElement{
	public function __construct($content, $level = 1, $attributes = array()){
		$this->tag = "h$level";
		parent::__construct($content, $attributes);
	}
}

class Div extends HtmlElement{
	public function __construct($content, $attributes = array()){
		$this->tag = "div";
		parent::__construct($content,$attributes);
	}
}

class Button extends HtmlElement{
	public function __construct($content, $attributes = array()){
		$this->tag = "button";
		parent::__construct($content,$attributes);
	}
}

class Input extends HtmlVoidElement{
	public function __construct($name, $type = "text", $attributes = array()){
		$this->tag = "input";
		$attributes["name"] = $name;
		$attributes["type"] = $type;
		parent::__construct($attributes);
	}
}

class Form extends HtmlElement{
	public function __construct($content, $attributes = array()){
		$this->tag = "form";
		parent::__construct($content,$attributes);
	}
}

class Image extends HtmlVoidElement{
	public function __construct($src="", $alt="", $attributes = array(),$width = 420,$height = 420){
		$this->tag = "img";
		$attributes["src"] = $src;
		$attributes["alt"] = $alt;
		$attributes["width"] = $width;
		$attributes["height"] = $height;
		parent::__construct($attributes);
		}
}


