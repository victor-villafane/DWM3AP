<?php

class Carrito{
    /**Agregar un item */
    public function add_item(int $productoID, int $cantidad)
    {
        $item = (new Comic())->catalogo_x_id($productoID);
        if($item){
            $_SESSION['carrito'][$productoID] = [
                "titulo" => $item->getTitulo(),
                "portada" => $item->getPortada(),
                "precio" => $item->getPrecio(),
                "cantidad" => $cantidad
            ];
        }    
    }
    /**Eliminar un item */
    public function delete_item_carrito($id){
        if( isset($_SESSION["carrito"][$id]) ){
            unset($_SESSION["carrito"][$id]);      
        }
    }
    /**Devolver el carrito completo */
    public function get_carrito() : array
    {
        if( isset($_SESSION["carrito"]) ){
            return $_SESSION["carrito"];
        }
        return [];
    }
    /**Actualizar cantidades*/
    public function update_carrito(array $cantidades){
        foreach ($cantidades as $id => $cantidad) {
            if( isset($_SESSION["carrito"][$id]) ){
            $_SESSION["carrito"][$id]["cantidad"] = $cantidad;
            }
        }
    }
    /**Vaciar el carrito */
    public function vaciar_carrito(){
        $_SESSION["carrito"] = [];
    }
    /**Precio total*/
}