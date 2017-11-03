
<?php
class user
{
    // Declaración de una propiedad
    private $nombre;
    private $login;
    private $email;
    private $surname;
    private $dob;

	public function __construct($n, $l, $e, $s, $d){
		$this->nombre = $n;
		$this->login = $l;
		$this->email = $e;
		$this->surname = $s;
		$this->dob = $d;
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
}
?>
