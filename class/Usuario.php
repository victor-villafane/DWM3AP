<?php

class Usuario{
    protected $id;
	protected $email;	
	protected $nombre_usuario;
	protected $nombre_completo;	
	protected $password;
	protected $roles;

	/**
	 * Get the value of email
	 */ 
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the value of nombre_usuario
	 */ 
	public function getNombre_usuario()
	{
		return $this->nombre_usuario;
	}

	/**
	 * Get the value of nombre_completo
	 */ 
	public function getNombre_completo()
	{
		return $this->nombre_completo;
	}

	/**
	 * Get the value of password
	 */ 
	public function getPassword()
	{
		return $this->password;
	}

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

	public function usuario_x_email(string $email) :? self
	{
		$conexion = (new Conexion())->getConexion();
		$query = " SELECT * FROM usuarios WHERE email = :email ";
		$PDOStament = $conexion->prepare($query);
		$PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
		$PDOStament->execute([
			"email" => $email
		]);

		$result = $PDOStament->fetch();

		return $result ? $result : null; 
	}

	/**
	 * Get the value of roles
	 */ 
	public function getRoles()
	{
		return $this->roles;
	}
}