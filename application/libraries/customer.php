<?php
class Customer{
    protected $id;
    protected $login;
    protected $pass;
    protected $roleid;
    protected $imagepath;
    protected $discount;
    protected $total;

    public function __construct($login="", $pass="", $imagepath="")
    {
        $this->id=0;
        $this->login=$login;
		$this->pass=$pass;
		$this->imagepath=$imagepath;
		$this->discount=0;
		$this->total=0;
		$this->roleid=2; 
    }

    public  function __toString()
    {
        return $this->id . ". " . $this->login;
    }
}