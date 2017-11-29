<?php
require_once("user.php");
require_once("product.php");
class dbhandler{
    
    private $dburl = "localhost";
    private $dbname = "SisInf";
    private $dbuser = "joseluis";
    private $dbpass = "joseluis";
    private $mysqli = null;
    
    
	/**
	 *	Construcor del manejador
	 * 	Crea un objeto mysqli para los datos de la db asignados a los atributos de clase
	 */
	public function __construct(){
		$this->mysqli = new mysqli($this->dburl, $this->dbuser, $this->dbpass, $this->dbname);

		if ($this->mysqli->connect_errno) {
			printf("Falló la conexión: %s\n", $mysqli->connect_error);
			exit();
		}
	}
    
    
    /**
     * Realiza la funcion de login y devuelve un objeto user si tiene exito 
     * 
     * @param	$email	email del usuario que buscamos
     * @param	$pass	password del usuario que buscamos	
     * @return 			si hay conincidencias, un objeto user o FALSE en caso contrario
	 */
	public function login($email, $pass){
		//esacapamos el email para evitar SQL inyection
		$email = $this->mysqli->real_escape_string($email);
		//generamos hash md5 para el password (tb evita SQL inyection)
		$pass = md5($pass);

		$sql = "SELECT *
		FROM registered_user
		WHERE email = '$email' and password = '$pass'";

		//realizamos la consulta
		$result = $this->mysqli->query($sql);

		//solo debería haber un único acierto, dado que los emails son únicos
		if ($result->num_rows != 1){
			return FALSE;
		}
		else {
			$fila = $result->fetch_assoc();
			$user = new user($fila['name'], $fila['login'], $fila['email'], $fila['surname'], $fila['dob']);
			return $user;
		}
	}
    
    
	/**
	 * Gestiona la inserción de un nuevo usuario en la base de datos
	 * 
	 * @param	$login		nick del usuario con el que quier ser conocido
	 * @param	$pass		contraseña para el acceso al sistem
	 * @param	$email		email para la identificación en el sistema y contacto
	 * @param	$nombre		nombre real o no
	 * @param	$apellidos	apellidos reales o no
	 * @param	$dob		fecha de nacimiento
	 * @return				TRUE si consigue ingresar al usuario en el sistema, FALSE en caso contrario
	 */
	public function newUser($login, $pass, $email, $nombre, $apellidos, $dob){
		//escapamos todo el formulario para evitar SQL inyection
		$login = $this->mysqli->real_escape_string($login);
		$email = $this->mysqli->real_escape_string($email);
		$nombre = $this->mysqli->real_escape_string($nombre);
		$apellidos = $this->mysqli->real_escape_string($apellidos);
		$dob = $this->mysqli->real_escape_string($dob);
		//generamos hash para el password (tb evita SQL inyection)
		$password = password_hash($pass, PASSWORD_DEFAULT);
		
		$sql = "SELECT email
				FROM registered_user 
				WHERE email = '$email'";
		
		//realizamos la consulta
		$result = $this->mysqli->query($sql);
		
		//no debe haber coincidencias
		if($result->num_rows ==1){
			return FALSE;
		}else{
			//incrementamos la tabla usuarios
			$sql = "INSERT INTO user () VALUES ()";
			$this->mysqli->query($sql);
		
			$sql = "INSERT INTO registered_user (u_id, login, email, password, dob, name, surname)
					VALUES ((SELECT MAX(u_id) FROM user), '$login', '$email', '$password', '$dob', '$nombre', '$apellidos')";
			$this->mysqli->query($sql);
			return TRUE;
		}
	}
	
	
	/**
	 * Calcula el número de páginas
	 * 
	 * @param	$tabla		tabla de la que se desea mostrar información
	 * @param	$muestraN	número de elementos que se desean mostrar por página
	 * @return				número de páginas con dichos parámetros
	 */
	public function numPaginas($tabla, $muestraN){
		$sql = "SELECT *
				FROM $tabla";
		
		$result = $this->mysqli->query($sql);
		$rows = $result->num_rows;
		$paginas = intval($rows / $muestraN);
		if ($rows%$muestraN>0) $paginas++;
		return $paginas;
	}
	
	
	/**
	 * Listado de artículos
	 * 
	 * @param	$pagina		Número de página a mostrar
	 * @param	$numXpag	Número de artículos por página a mostar
	 * @return				un SplObjectStorage con todos los objetos 'product' de la consulta
	 */
	public function listadoArticulos($pagina, $numXpag){
		$pagina = ($pagina-1)*$numXpag;
		$sql = "SELECT *
				FROM product
				ORDER BY p_id
				LIMIT $pagina, $numXpag";

		$result = $this->mysqli->query($sql);
		
		//creamos un almacen de objetos
		$spl = new SplObjectStorage();
		
		//para cada producto resultado de la consulta
		while($fila = $result->fetch_assoc()){
			//creamos un objeto tipo producto con sus datos
			$product = new product($fila['p_id'], $fila['name'], $fila['description'], $fila['price'], $fila['picture']);
			//y lo almacenamos en el SplObjectStorage
			$spl->attach($product);
		}
		//devolvemos el spl con todos los objetos de productos
		return $spl;
		
	 }
	 
	 /**
	  * Detalle de un artículo
	  * 
	  * @param	$p_id	identificador único del producto
	  * @return			objeto productDetails
	  * 
	  */
	  public function productDetail($id){
		  echo "No implementada, no hay tabla todavia";
	  }
}?>
