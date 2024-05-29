<?php

class Serie{

    protected $id;
    protected $nombre;
    protected $historia;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return htmlspecialchars($this->id);
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return htmlspecialchars($this->nombre);
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of historia
     */
    public function getHistoria()
    {
        return htmlspecialchars($this->historia);
    }

    /**
     * Set the value of historia
     */
    public function setHistoria($historia): self
    {
        $this->historia = $historia;

        return $this;
    }

    public function get_x_id(int $id) :? self
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM series WHERE id = :id";
        $PDOStament = $db->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute([
            "id" => htmlspecialchars($id) //injeccion SQL y XSS
        ]);

        $resultado = $PDOStament->fetch();

        return $resultado ? $resultado : null;
    }

    public function catalogo_completo(){
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM series";
        $PDOStament = $db->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute();

        $resultado = $PDOStament->fetchAll();

        return $resultado ? $resultado : [];                
}
public function insert($nombre, $historia){
    $conexion = (new Conexion())->getConexion();
    $query = "INSERT INTO series VALUES (NULL, :nombre, :historia);";
    $PDOStament = $conexion->prepare($query);
    $PDOStament->execute([
        "nombre" => htmlspecialchars($nombre),
        "historia" => htmlspecialchars($historia)
    ]);                
}
public function delete(){
    $conexion = (new Conexion())->getConexion();
    $query = "DELETE FROM series WHERE id = $this->id";
    $PDOStament = $conexion->prepare($query);
    $PDOStament->execute();  
}
public function edit($nombre, $historia, $id){
    $conexion = (new Conexion())->getConexion();
    $query = "UPDATE series SET nombre = :nombre, historia=:historia WHERE id = :id;";
    $PDOStament = $conexion->prepare($query);
    $PDOStament->execute([
        "nombre" => htmlspecialchars($nombre),
        "historia" => htmlspecialchars($historia),
        "id" => htmlspecialchars($id),
    ]);
}  
}