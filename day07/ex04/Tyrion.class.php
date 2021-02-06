<?php
class Tyrion extends Lannister 
{
    public function sleepWith($pers) 
    {
		if ($pers instanceof Jaime)
			print($this->NO);
		if ($pers instanceof Sansa)
			print($this->LET);
		if ($pers instanceof Cersei)
			print($this->NO);
	}
}
?>