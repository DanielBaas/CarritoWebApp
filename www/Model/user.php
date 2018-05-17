<?php
class User{

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
                ORDER BY id_cliente;";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($conn)
    {
        $sql = "DELETE FROM clientes
                WHERE id_cliente = :id_cliente;";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id_cliente', $this->id_producto, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public static function getByID($conn, $id_cliente, $columns = '*')
    {
        $sql = "SELECT $columns
                FROM clientes
                WHERE id_cliente = :id_cliente;";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_cliente', $id_cliente, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

        if ($stmt->execute()) {

            return $stmt->fetch();

        }
    }

    public function create($conn)
    {
        if ($this->validate()) {

            $sql = "INSERT INTO clientes (nombre, apellido, correo, contrasena, cumpleanos, imagen_perfil, bio, tipo_cuenta, fecha_registro)
                    VALUES (:nombre, :apellido, :correo, :contrasena, :cumpleanos, :imagen_perfil, :bio, :tipo_cuenta, :fecha_registro);";

            $stmt = $conn->prepare($sql);

            
            $stmt->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $stmt->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
            $stmt->bindValue(':correo', $this->correo, PDO::PARAM_STR);
            $stmt->bindValue(':contrasena', $this->contrasena, PDO::PARAM_STR);
            $stmt->bindValue(':tipo_cuenta', $this->tipo_cuenta, PDO::PARAM_STR);
            if ($this->bio == '') {
                $stmt->bindValue(':bio', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(':bio', $this->bio, PDO::PARAM_STR);
            }
            if ($this->imagen_perfil == '') {
                $stmt->bindValue(':imagen_perfil', 'img/perfil.jpg', PDO::PARAM_STR);
            } else {
                $stmt->bindValue(':imagen_perfil', $this->imagen_perfil, PDO::PARAM_STR);
            }
            if ($this->cumpleanos == '') {
                $stmt->bindValue(':cumpleanos', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(':cumpleanos', $this->cumpleanos, PDO::PARAM_STR);
            }
            if ($this->fecha_registro == '') {
                $fecha_actual = '19900101';//date("Y-m-d");
                $stmt->bindValue(':fecha_registro', $fecha_actual, PDO::PARAM_STR);
            } else {
                $stmt->bindValue(':fecha_registro', $this->fecha_registro, PDO::PARAM_STR);
            }

            if ($stmt->execute()) {
                echo "ejecutado exitosamente <br>";
                $this->id_cliente = $conn->lastInsertId();
                $stmt->close();
                $conn->close();
                return true;
            } else {
                echo "error al registrar <br>";
                return false;
            }

        } else {
            return false;
        }
    }

    public function update($conn)
    {
        if ($this->validate()) {

            $sql = "UPDATE clientes
                    SET nombre = :nombre,
                        apellido = :apellido,
                        correo = :correo,
                        contrasena = :contrasena,
                        cumpleanos = :cumpleanos,
                        imagen_perfil = :imagen_perfil,
                        bio = :bio,
                        tipo_cuenta = :tipo_cuenta
                    WHERE id_cliente = :id_cliente;";

            $stmt = $conn->prepare($sql);

           
            $stmt->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $stmt->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
            $stmt->bindValue(':correo', $this->correo, PDO::PARAM_STR);
            $stmt->bindValue(':contrasena', $this->contrasena, PDO::PARAM_STR);
            $stmt->bindValue(':cumpleanos', $this->cumpleanos, PDO::PARAM_STR);
            $stmt->bindValue(':imagen_perfil', $this->imagen_perfil, PDO::PARAM_STR);
            $stmt->bindValue(':bio', $this->bio, PDO::PARAM_STR);
            $stmt->bindValue(':tipo_cuenta', $this->tipo_cuenta, PDO::PARAM_STR);
            $stmt->bindValue(':id_cliente', $this->id_cliente, PDO::PARAM_STR);
            
            if ($this->bio == '') {
                $stmt->bindValue(':bio', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(':bio', $this->bio, PDO::PARAM_STR);
            }
            if ($this->imagen_perfil == '') {
                $stmt->bindValue(':imagen_perfil', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(':imagen_perfil', $this->imagen_perfil, PDO::PARAM_STR);
            }

            return $stmt->execute();

        } else {
            return false;
        }
    }

    protected function validate(){
        if ($this->nombre == '') {
            $this->errors[] = 'El nombre es requerido';
        }
        if ($this->apellido == '') {
            $this->errors[] = 'La imagen es requerida';
        }
        if ($this->correo == '') {
            $this->errors[] = 'La marca es requerida';
        }
        if ($this->contrasena == '') {
            $this->errors[] = 'La descripción es requerida';
        }
        if ($this->cumpleanos == '') {
            $this->errors[] = 'La edición es requerida';
        }
        if ($this->tipo_cuenta == '') {
            $this->errors[] = 'La longitud es requerida';
        }

        return empty($this->errors);
    }


    public static function authenticate($conn, $correo, $password){

        $sql = "SELECT *
                FROM clientes
                WHERE correo = :correo";
                
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':correo', $correo, PDO::PARAM_STR);

        $stmt->execute();

        $user = $stmt->fetch();
        if ($user) {

            return ($password === $user['contrasena']);
        }
        
    }
    public static function getData($conn, $correo){

        $sql = "SELECT *
                FROM clientes
                WHERE correo = :correo";
                
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':correo', $correo, PDO::PARAM_STR);

        $stmt->execute();

        $user = $stmt->fetch();
        if ($user) {
            return ($user);
        }
        
    }

}