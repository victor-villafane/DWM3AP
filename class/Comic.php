<?php

    class Comic{
        //atributos
        protected $id;
        protected $personaje;
        protected $serie;
        protected $volumen;
        protected $numero;
        protected $titulo;
        protected $publicacion;
        protected $guion;
        protected $arte;
        protected $bajada;
        protected $portada;
        protected $precio;
        //metodos
        public function catalogo_completo(){
            $catalogo = [];
            $miArchivoJson = file_get_contents("includes/productos.json");
            $json_data = json_decode($miArchivoJson, true);

            foreach ($json_data as $comicArray) {
                //instancio
                $comic = new Comic(); //new self
                //rellenar los atributos
                $comic->id = $comicArray["id"];
                $comic->personaje = $comicArray["personaje"];
                $comic->serie = $comicArray["serie"];
                $comic->volumen = $comicArray["volumen"];
                $comic->numero = $comicArray["numero"];
                $comic->titulo = $comicArray["titulo"];
                $comic->publicacion = $comicArray["publicacion"];
                $comic->guion = $comicArray["guion"];
                $comic->arte = $comicArray["arte"];
                $comic->bajada = $comicArray["bajada"];
                $comic->portada = $comicArray["portada"];
                $comic->precio = $comicArray["precio"];
                
                $catalogo []= $comic; //hago un array_push
            }

            return $catalogo;
        }

        function catalogo_x_personaje($personaje){
            $comics = $this->catalogo_completo();
            $personajes = [];

            foreach ($comics as $comic) {

                if( $comic->personaje == $personaje ){
                    //array_push($personajes, $comic);
                    $personajes []= $comic;

                }

            }

            return $personajes;
        }

        public function catalogo_x_id( int $id ) : Comic | array
        {
            $comics = $this->catalogo_completo();

            foreach ($comics as $comic) {
                if( $comic->id == $id ){
                    return $comic;
                }
            }

            return [];
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
                return $this->personaje;
        }

        /**
         * Get the value of serie
         */
        public function getSerie()
        {
                return $this->serie;
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
         * Get the value of guion
         */
        public function getGuion()
        {
                return $this->guion;
        }

        /**
         * Get the value of arte
         */
        public function getArte()
        {
                return $this->arte;
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
    }