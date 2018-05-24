<?php

namespace Kiwi\View\Helper;

use Kiwi\View\Helper;

/**
 * Class FormHelper
 * @package Kiwi\View\Helper
 */
class FormHelper extends Helper
{
	/**
	 *
	 */
    private $data; 
	
	public function __construct($data = array()){ 
		$this->data = $data; 
	} 

	/**
	 *
	 */
	public function create($model = null, $action = array()){
		
		$action += array(
			'controller' =>  null,
			'action' => null
		);
		
		return '<form action="\\'.$action['controller']. '\\'. $action['action'] .'" method="POST">';
	}

	/**
	 *
	 */
	public function input($name = null, $params = array()){
		
		$params += array(
			'type' => 'text',
			'placeholder' => null,
			'label' => $name,
			'required' => null,
			'value' => ''
		);
		
		$out = '<div>';
		
		if(!empty($params['label'])){
			$label = '<label for="'.$name.'">'.$params['legend'].'</label>';
			$out = $out . $label;
		}

		$out = $out . '<input type="'.$params['type'].'" name="'.$name.'" placeholder="'. $params['placeholder'] .'" value="'. $params['value'] .'" /></div>';
		return $out;
	}

	public function textarea($name = null, $params = array()){
		
		$params += array(
			'placeholder' => null,
			'label' => $name,
		);
		
		$out = '<div>';
		
		if(!empty($params['label'])){
			$label = '<label for="'.$name.'">'.$params['legend'].'</label>';
			$out = $out . $label;
		}
		
		$out = $out . '<textarea name="'.$name.'" placeholder="'.$params['placeholder'].'" rows="10" cols="50"></textarea></div>';
		return $out;
	}
	
	/**
	 *
	 */
	public function end($value = 'Envoyer'){
		return  '<input type="submit" value="'.$value.'" class="button button-primary" /></form>';
	}

}
