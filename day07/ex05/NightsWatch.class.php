<?php
class NightsWatch 
{
	private	$_tab = array();

	public function recruit($pers) 
	{
		if(class_implements($pers)['IFighter'] != "")
			$this->_tab[] = $pers;
	}
	public function fight() 
    {
		foreach($this->tab as $elem)
		{
			if (method_exists(get_class($elem), "fight"))
				$elem->fight();
		}
	}
}
?>
