<?php
class feature
{
    // Declaración de una propiedad
    private $nombre;
    private $login;
    private $email;

	public function __construct($fid, $pid, $n, $d, $p){
		$this->f_id = $fid;
		$this->p_id = $pid;
		$this->name = $n;
		$this->description = $d;
		$this->picture = $p;
	}
    
    public function getFid(){
		return $this->f_id;
	}
	
    public function getPid(){
		return $this->p_id;
	}
	
    public function getName() {
        return $this->name;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function getPicture() {
        return $this->picture;
    }
}
?>
