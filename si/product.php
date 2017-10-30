
<?php
class product
{
    // Declaración de una propiedad
    private $p_id;
    private $name;
    private $description;
    private $price;
    private $picture;

	public function __construct($id, $n, $d, $pri, $pic){
		$this->p_id = $id;
		$this->name = $n;
		$this->description = $d;
		$this->price = $pri;
		$this->picture = $pic;
	}
    
    public function getID() {
		return $this->p_id;
	}
	
    public function getName() {
        return $this->name;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function getPicture() {
        return $this->picture;
    }
}
?>
