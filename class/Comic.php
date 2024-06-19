<?php

class Comic
{
    //atributos
    protected $id;
    //protected $personaje_principal_id;
    protected $personaje_principal;
    //protected $serie_id;
    protected $serie; //-> un objeto con todos sus metodos
    protected $volumen;
    protected $numero;
    protected $titulo;
    protected $publicacion;
    //protected $guionista_id;
    protected $guionista;
    // protected $artista_id;
    protected $artista;
    protected $bajada;
    protected $portada;
    protected $origen;
    protected $editorial;
    protected $precio;
    protected $personajes_secundarios;
    protected $personajes_secundarios_ids;
    protected static $valoresDB = ["id", "volumen", "numero", "titulo", "publicacion", "bajada", "portada", "origen", "editorial", "precio"];

    public function mapear($comicArrayAsociativo) : Comic
    {
        $comic = new self();

        foreach (self::$valoresDB as $valor) {
            $comic->{$valor} = $comicArrayAsociativo[$valor];
        }

        $comic->artista = (new Artista())->get_x_id($comicArrayAsociativo["artista_id"]);
        $comic->guionista = (new Guionista())->get_x_id($comicArrayAsociativo["guionista_id"]);
        $comic->personaje_principal = (new Personaje())->get_x_id($comicArrayAsociativo["personaje_principal_id"]);
        $comic->serie = (new Serie())->get_x_id($comicArrayAsociativo["serie_id"]);

        $PSids = explode(",", $comicArrayAsociativo["personajes_secundarios"]);
        $personajes_secundarios = [];
        if( !empty($PSids[0]) ){
            foreach ($PSids as $PSid) {
                $personajes_secundarios []= (new Personaje())->get_x_id(intval($PSid));
            }
        }
        $comic->personajes_secundarios_ids = $comicArrayAsociativo["personajes_secundarios"];
        $comic->personajes_secundarios = $personajes_secundarios;
        return $comic;
    }

    //metodos
    public function catalogo_completo()
    {
        $catalogo = [];
        $conexion = new Conexion();
        $db = Conexion::getConexion();
        $query = 'SELECT comics.*,GROUP_CONCAT(comic_x_personaje.id_personaje) AS personajes_secundarios FROM comics LEFT JOIN comic_x_personaje ON comics.id = comic_x_personaje.id_comic GROUP BY comics.id';
        $PDOStament = $db->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStament->execute();
        while ($comic = $PDOStament->fetch()) {
            $catalogo[] = $this->mapear($comic);
        }
        return $catalogo;
    }

    function catalogo_x_personaje(int $personaje_id)
    {
        $personajes = [];
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT comics.*,GROUP_CONCAT(comic_x_personaje.id_personaje) AS personajes_secundarios FROM comics LEFT JOIN comic_x_personaje ON comics.id = comic_x_personaje.id_comic WHERE personaje_principal_id = $personaje_id GROUP BY comics.id";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStament->execute();
        while ($comic = $PDOStament->fetch()) {
            $personajes[] = $this->mapear($comic);
        }
        return $personajes;
    }

    public function catalogo_x_id(int $id)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT comics.*,GROUP_CONCAT(comic_x_personaje.id_personaje) AS personajes_secundarios FROM `comics`LEFT JOIN comic_x_personaje ON comics.id = comic_x_personaje.id_comic WHERE comics.id = $id GROUP BY comics.id";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStament->execute();
        $comicArray = $PDOStament->fetch();
        $comic = $this->mapear($comicArray);
        return isset($comic) ? $comic : false;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of personaje
     */
    public function getPersonaje()
    {
        return $this->personaje_principal->getNombre();
    }

    /**
     * Get the value of serie
     */
    public function getSerie()
    {
        return $this->serie->getNombre();
    }

    /**
     * Get the value of volumen
     */
    public function getVolumen()
    {
        return $this->volumen;
    }

    /**
     * Get the value of numero
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Get the value of publicacion
     */
    public function getPublicacion()
    {
        return $this->publicacion;
    }

    /**
     * Get the value of publicacion
     */
    public function getEditorial()
    {
        return $this->editorial;
    }

    /**
     * Get the value of guion
     */
    public function getGuion()
    {
        return $this->guionista->getNombreCompleto();
    }

    /**
     * Get the value of arte
     */
    public function getArte()
    {
        return $this->artista->getNombreCompleto();
    }

    /**
     * Get the value of bajada
     */
    public function getBajada()
    {
        return $this->bajada;
    }

    /**
     * Get the value of portada
     */
    public function getPortada()
    {
        return $this->portada;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    public function getBajadaReducida($cantidad = 20)
    {
        $miArray = explode(' ', $this->bajada); //string to array
        $arrayRecortado = [];

        if (count($miArray) < 20) {
            return implode(' ', $miArray) . '...';
        }

        for ($i = 0; $i < $cantidad; $i++) {
            if ($i < $cantidad) {
                array_push($arrayRecortado, $miArray[$i]); //array_push($arrayOriginal, $dato)
            }
        }

        return implode(' ', $arrayRecortado) . '...'; //array to string
    }

    public function insert($titulo, $personaje, $serie, $publicacion, $guionista, $artista, $origen, $editorial, $precio, $portada, $bajada, $volumen, $numero)
    {
        $conexion = (new Conexion())->getConexion();
        $query = 'INSERT INTO `comics` (`id`, `titulo`, `personaje_principal_id`, `guionista_id`, `artista_id`, `serie_id`, `volumen`, `numero`, `publicacion`, `origen`, `editorial`, `bajada`, `portada`, `precio`) VALUES (NULL, :titulo, :personaje, :guionista, :artista, :serie, :volumen, :numero, :publicacion, :origen, :editorial, :bajada, :portada, :precio)';
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            'titulo' => htmlspecialchars($titulo),
            'personaje' => htmlspecialchars($personaje),
            'guionista' => htmlspecialchars($guionista),
            'artista' => htmlspecialchars($artista),
            'serie' => htmlspecialchars($serie),
            'volumen' => htmlspecialchars($volumen),
            'numero' => htmlspecialchars($numero),
            'publicacion' => htmlspecialchars($publicacion),
            'origen' => htmlspecialchars($origen),
            'editorial' => htmlspecialchars($editorial),
            'bajada' => htmlspecialchars($bajada),
            'portada' => htmlspecialchars($portada),
            'precio' => htmlspecialchars($precio),
        ]);
        return $conexion->lastInsertId();
    }
    public function reemplazarImagen($imagen, $id)
    {
        $conexion = (new Conexion())->getConexion();
        $query = 'UPDATE comics SET portada = :imagen WHERE id = :id;';
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            'id' => htmlspecialchars($id),
            'imagen' => htmlspecialchars($imagen),
        ]);
    }

    public function edit( string $titulo, $personaje, $serie, $publicacion, $guionista, $artista, $origen, $editorial, $precio, $bajada, $volumen, $numero, $id)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "UPDATE `comics` SET `titulo` = '$titulo', `personaje_principal_id` = '$personaje', `guionista_id` ='$guionista', `artista_id` = '$artista', `serie_id` = '$serie', `volumen` = '$volumen', `publicacion` = '$publicacion', `origen` = '$origen', `editorial` = '$editorial', `bajada` = '$bajada',`precio` = '$precio' WHERE `comics`.`id` = $id";

        // echo $query;

        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            // 'titulo' => htmlspecialchars($titulo),
            // 'personaje' => htmlspecialchars($personaje),
            // 'guionista' => htmlspecialchars($guionista),
            // 'artista' => htmlspecialchars($artista),
            // 'serie' => htmlspecialchars($serie),
            // 'volumen' => htmlspecialchars($volumen),
            // 'numero' => htmlspecialchars($numero),
            // 'publicacion' => htmlspecialchars($publicacion),
            // 'origen' => htmlspecialchars($origen),
            // 'editorial' => htmlspecialchars($editorial),
            // 'bajada' => htmlspecialchars($bajada),
            // 'precio' => htmlspecialchars($precio),
            // 'id' => htmlspecialchars($id)
        ]);
    }

    public function add_personaje_sec($id_comic, $id_personaje){
        $conexion = (new Conexion())->getConexion();
        $query = 'INSERT INTO `comic_x_personaje` (`id`, `id_comic`, `id_personaje`) VALUES (NULL, :id_comic, :id_personaje)';
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            "id_comic" => $id_comic,
            "id_personaje" => $id_personaje
        ]);        
    }

    public function clear_personajes_secundarios($id_comic){
        $conexion = (new Conexion())->getConexion();
        $query = 'DELETE FROM comic_x_personaje WHERE id_comic = :id_comic';
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            "id_comic" => $id_comic,
        ]);  
    }
    public function getPersonaje_id()
    {
        return $this->personaje_principal_id;
    }
    public function getSerie_id()
    {
        return $this->serie_id;
    }
    public function getGuionista_id()
    {
        return $this->guionista_id;
    }

    public function getArtista_id()
    {
        return $this->artista_id;
    }

    public function getOrigen()
    {
        return $this->origen;
    }

    public function getPersonajesSecundarios()
    {
        return $this->personajes_secundarios_ids;
    }
}
