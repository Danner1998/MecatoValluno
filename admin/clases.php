<?php
require("Conexion.php");  
class Producto  
{    

    private $_products;  

    public function __construct()    
    {
        $this->_products = array();    
    }
    
    public function CantidadProductosProveedores()
    {
        $sql = "SELECT id,nombre, mes1, mes2,total,( mes1*mes2)as mes3 from totales";
        $result = mysqli_query(Conexion::Conectar(), $sql);
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $this->_products[] = $row;
        }
        return $this->_products ;
    }
}
?> 
