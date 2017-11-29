<?php
class rating
{
    // Declaración de una propiedad
    private $user;
    private $rating;
    private $comment;
    private $date;

	public function __construct($u, $r, $c, $d){
		$this->user = $u;
		$this->rating = $r;
		$this->comment = $c;
		$this->date = $d;
	}
    
    public function getUser(){
		return $this->user;
	}
	
    public function getRating(){
		return $this->rating;
	}
	
    public function getComment() {
        return $this->comment;
    }
    
    public function getDate(){
		return $this->date;
	}
}
?>
