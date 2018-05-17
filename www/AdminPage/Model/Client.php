<?php

class Client
{
    public $id_cliente;
    public $nombre;
    public $apellido;
    public $correo;
    public $contrasena;
    public $cumpleanos;
    public $imagen_perfil;
    public $bio;
    public $tipo_cuenta;
    public $fecha_registro;
    public $errors = [];

    
    public static function getAll($conn)
    {
        $sql = "SELECT *
                FROM clientes
                ORDER BY id_producto;";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the product record based on the ID
     *
     * @param object $conn Connection to the database
     * @param integer $id the article ID
     * @param string $columns Optional list of columns for the select, defaults to *
     *
     * @return mixed An object of this class, or null if not found
     */
    public static function getByID($conn, $id_producto, $columns = '*')
    {
        $sql = "SELECT $columns
                FROM clientes
                WHERE id_cliente = :id_cliente;";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_cliente', $id, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Client');

        if ($stmt->execute()) {

            return $stmt->fetch();

        }
    }

    /**
     * Update the product with its current property values
     *
     * @param object $conn Connection to the database
     *
     * @return boolean True if the update was successful, false otherwise
     */
    public function update($conn)
    {
        if ($this->validate()) {

            $sql = "UPDATE cliente
                    SET nombre = :nombre,
                        imagen = :imagen,
                        marca = :marca,
                        descripcion = :descripcion,
                        edicion = :edicion,
                        cantidad = :cantidad,
                        precio = :precio,
                        longitud = :longitud,
                        altura = :altura,
                        ancho = :ancho
                    WHERE id_producto = :id_producto;";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id_cliente', $this->id_producto, PDO::PARAM_INT);
            $stmt->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $stmt->bindValue(':marca', $this->marca, PDO::PARAM_STR);
            $stmt->bindValue(':descripcion', $this->descripcion, PDO::PARAM_STR);
            $stmt->bindValue(':edicion', $this->edicion, PDO::PARAM_STR);
            $stmt->bindValue(':cantidad', $this->cantidad, PDO::PARAM_STR);
            $stmt->bindValue(':precio', $this->precio, PDO::PARAM_STR);
            $stmt->bindValue(':longitud', $this->longitud, PDO::PARAM_STR);
            $stmt->bindValue(':altura', $this->altura, PDO::PARAM_STR);
            $stmt->bindValue(':ancho', $this->ancho, PDO::PARAM_STR);

            if ($this->published_at == '') {
                $stmt->bindValue(':published_at', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(':published_at', $this->published_at, PDO::PARAM_STR);
            }

            return $stmt->execute();

        } else {
            return false;
        }
    }

    /**
     * Validate the properties, putting any validation error messages in the $errors property
     *
     * @return boolean True if the current properties are valid, false otherwise
     */
    protected function validate(){
        if ($this->nombre == '') {
            $this->errors[] = 'El nombre es requerido';
        }
        if ($this->imagen == '') {
            $this->errors[] = 'La imagen es requerida';
        }
        if ($this->marca == '') {
            $this->errors[] = 'La marca es requerida';
        }
        if ($this->descripcion == '') {
            $this->errors[] = 'La descripción es requerida';
        }
        if ($this->edicion == '') {
            $this->errors[] = 'La edición es requerida';
        }
        if ($this->cantidad == '') {
            $this->errors[] = 'La cantidad es requerida';
        }
        if ($this->precio == '') {
            $this->errors[] = 'El precio es requerido';
        }
        if ($this->longitud == '') {
            $this->errors[] = 'La longitud es requerida';
        }
        if ($this->altura == '') {
            $this->errors[] = 'La altura es requerida';
        }
        if ($this->acho == '') {
            $this->errors[] = 'El ancho es requerido';
        }

        /*if ($this->published_at != '') {
            $date_time = date_create_from_format('Y-m-d H:i:s', $this->published_at);
            
            if ($date_time === false) {

                $this->errors[] = 'Invalid date and time';

            } else {

                $date_errors = date_get_last_errors();

                if ($date_errors['warning_count'] > 0) {
                    $this->errors[] = 'Invalid date and time';
                }
            }
        }*/

        return empty($this->errors);
    }

    /**
     * Delete the current Product
     *
     * @param object $conn Connection to the database
     *
     * @return boolean True if the delete was successful, false otherwise
     */
    public function delete($conn)
    {
        $sql = "DELETE FROM clientes
                WHERE id_cliente = :id_cliente;";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id_cliente', $this->id_producto, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Insert a new Product with its current property values
     *
     * @param object $conn Connection to the database
     *
     * @return boolean True if the insert was successful, false otherwise
     */
    public function create($conn)
    {
        if ($this->validate()) {

            $sql = "INSERT INTO clientes (nombre, imagen, marca, descripcion, edicion, cantidad, precio, longitud, altura, ancho)
                    VALUES (:nombre, :imagen, :marca, :descripcion, :edicion, :cantidad, :precio, :longitud, :altura, :ancho)";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $stmt->bindValue(':marca', $this->marca, PDO::PARAM_STR);
            $stmt->bindValue(':descripcion', $this->descripcion, PDO::PARAM_STR);
            $stmt->bindValue(':edicion', $this->edicion, PDO::PARAM_STR);
            $stmt->bindValue(':cantidad', $this->cantidad, PDO::PARAM_STR);
            $stmt->bindValue(':precio', $this->precio, PDO::PARAM_STR);
            $stmt->bindValue(':longitud', $this->longitud, PDO::PARAM_STR);
            $stmt->bindValue(':altura', $this->altura, PDO::PARAM_STR);
            $stmt->bindValue(':ancho', $this->ancho, PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                $this->id = $conn->lastInsertId();
                return true;
            }

        } else {
            return false;
        }
    }
}
