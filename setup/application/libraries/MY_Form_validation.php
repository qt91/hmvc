<?php
class MY_Form_validation extends CI_Form_validation
{
    function __construct($config = array())
    {
        parent::__construct($config);
        $this->CI =& get_instance();
    }

    /**
     * Error Array
     *
     * Returns the error messages as an array
     *
     * @return  array
     */


	public function error_array()
	{
		if (count($this->_error_array) === 0)
			return FALSE;
		else
			return $this->_error_array;
	}

	public function error_array_index()
	{
		if (count($this->_error_array) === 0)
			return FALSE;
		else{
			$errors = $this->_error_array;
			$new_errors = array();
			foreach($errors as $error){
				$new_errors[] = $error;
			}
			return $new_errors;
		}
	}
	
	
	

}
?>