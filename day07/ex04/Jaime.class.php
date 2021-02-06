<?php
class Jaime extends Lannister 
{
    public function sleepWith($pers) 
    {
		if ($pers instanceof Tyrion)
			print($this->NO);
		if ($pers instanceof Sansa)
			print($this->LET);
		if ($pers instanceof Cersei)
			print($this->PLS);
	}
}
?>