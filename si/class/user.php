
<?php
class user
{
    // Declaración de una propiedad
    private $nombre;
    private $login;
    private $email;
    private $surname;
    private $dob;
    private $uid;

	public function __construct($n, $l, $e, $s, $d, $u){
		$this->nombre = $n;
		$this->login = $l;
		$this->email = $e;
		$this->surname = $s;
		$this->dob = $d;
		$this->uid = $u;
	}
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function getLogin() {
        return $this->login;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getSurname() {
        return $this->surname;
    }
    
    public function getDob() {
        return $this->dob;
    }
    
    public function getUid() {
		return $this->uid;
	}
}
?>
