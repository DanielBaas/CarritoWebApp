<?php
    class DaoCategorias{

        public static function getAboutAll($conn)
        {
            $sql = "SELECT productos.nombre, productos.imagen, categorias.nombre
                    FROM productos
                    INNER JOIN categorias_productos ON categorias_productos.id_producto = productos.id_producto
                    INNER JOIN categorias ON categorias_productos.id_categoria = categorias.id_categoria
                    ORDER BY productos.id_producto;";

            $results = $conn->query($sql);

            return $results->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getSpecificTag($conn, $tag)
        {
            $sql = "SELECT productos.nombre, productos.imagen, categorias.nombre
                    FROM productos
                    INNER JOIN categorias_productos ON categorias_productos.id_producto = productos.id_producto
                    INNER JOIN categorias ON categorias_productos.id_categoria = categorias.id_categoria
                    WHERE categoria.nombre = $tag
                    ORDER BY productos.id_producto;";

            $results = $conn->query($sql);

            return $results->fetchAll(PDO::FETCH_ASSOC);
        }



    }
?>