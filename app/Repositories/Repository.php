<?php
namespace App\Repositories;

use Validator;
use App\Helper\HtmlCleanup;
class Repository {

	protected $validator;
	protected $data = [];
	protected $inputFields 		=	[];
	protected $rulesValidate	=	[];
	protected $messagesValidate=	[];

	function validate()
	{
		$this->validator 	=	Validator::make($this->data, $this->rulesValidate, $this->messagesValidate);

		if ($this->validator->fails()) {
			return false;
		}

		return self::parseData($this->data, $this->inputFields);
	}

	function errors()
	{
		$errors = $this->validator->errors();

		$dataReturn = [];
		foreach ($this->inputFields as $key => $value) {
			if($errors->first($key)) $dataReturn[$key] = $errors->first($key);
		}

		return $dataReturn;
	}


	static function parseData(array $data, array $arrField)
	{
		$arrReturn 	=	[];

		foreach ($data as $key => $value_data) {
			if(isset($arrField[$key]) && is_array($arrField[$key]) && !empty($arrField[$key])){
				$value 	=	array_values($arrField[$key]);
				$temp 	=	$value_data;

				switch($value[0])
				{
					case 	'string'	:
						$temp	=	convert_utf82utf8(strval($temp));
						break;
					case 'text' :
						$clean 	= new HtmlCleanup($temp);
						$clean->clean();
						$temp 	= $clean->output_html;
						break;
					case 	'integer' :
						$temp	=	(int)$temp;
						break;
					case 	'tinyint' :
						$temp	=	min(1, max(0, $temp));
						break;
					case 	'float' :
						$temp	=	floatval($temp);
						break;
					case 	'double' :
						$temp	=	doubleval($temp);
						break;
					case 	'array'	:
						$temp	=	is_array($temp) ? $temp : [];
						break;
					case 	'array_int'	:
						if(is_numeric($temp) && $temp > 0)
							$temp 	=	[intval($temp)];
						else
						{
							$temp	=	is_array($temp) ? $temp : [];
							$temp =	array_map('intval', $temp);
						}
						break;
				}

				$arrReturn[$key]	=	$temp;
			}
		}

		return $arrReturn;
	}
}
?>
