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
        return $this->id;
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
        return $this->nombre;
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
        return $this->historia;
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
        $query = "SELECT * FROM series WHERE id = $id";
        $PDOStament = $db->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute();

        $resultado = $PDOStament->fetch();

        return $resultado ? $resultado : null;
    }
}