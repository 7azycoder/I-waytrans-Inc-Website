<?php
class Validate{
	private $_passed = false;
	private $_errors = array();
	private $_db = null;

	public function __construct(){
		$this->_db = DB::getInstance();
	}

	public function check($source, $items = array()){
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				
				$value = trim($source[$item]);
				$item = escape($item);

				if($rule === 'required'  && empty($value)){
					$this->addError("{$item} is required");

				}else if(!empty($value)){
					switch($rule){
						case 'min' : 
							if(strlen($value) < $rule_value){
								$this->addError("{$item} must be a minimum of {$rule_value} characters.");
							}
						break;
						case 'max' :
							if(strlen($value) > $rule_value){
								$this->addError("{$item} must be a maximum of {$rule_value} characters.");
							}
						break;
						case 'matches' :
							if($value != $source[$rule_value]){
								$this->addError("{$rule_value} must match {$item}");
							}
						break;
						case 'unique' :
							$check = $this->_db->get($rule_value, array($item, '=', $value));
							if($check->count()){
								$this->addError("{$item} already exists.");
							}
						break;
						case 'matchcode' :
							$db_code = $this->_db->get('reg_code',array('id', '=', 1));
							 if($db_code->count()) {
                				$code = $db_code->first()->code;
            				 }
							if($rule_value != $code){
								$this->addError("{$item} is not recognised.");
							}
						break;
						case 'email_format':
							if (!filter_var($value, FILTER_VALIDATE_EMAIL)) 
       							$this->addError("Invalid email format."); 
						break;
					}

				}
			}
		}
		if(empty($this->_errors)){
			$this->_passed = true;

		}

		return $this;

	}

	private function addError($error){
		$this->_errors[] = $error;
	}

	public function errors(){
		return $this->_errors;
	}

	public function passed(){
		return $this->_passed;
	}
}