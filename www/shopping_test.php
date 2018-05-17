<?php
    require 'Model/shoppingElement.php';
    require 'Model/Database.php';
    require 'Model/product.php';

    $db = new Database();
    $conn = $db->getConn();

    $elementID = 2;
    $element = new ShoppingElement();
    $data = Product::getByID($conn, $elementID);
    $element->createElement($data);
    echo('Producto: ' . $element->elementData->nombre . ' (x' . $element->elementAmount . ') = $' . $element->elementTotalPrice . '<br>');
    $element->increaseElementAmount();
    echo('Producto: ' . $element->elementData->nombre . ' (x' . $element->elementAmount . ') = $' . $element->elementTotalPrice . '<br>');
    $element->increaseElementAmount();
    echo('Producto: ' . $element->elementData->nombre . ' (x' . $element->elementAmount . ') = $' . $element->elementTotalPrice . '<br>');
    $element->increaseElementAmount(3);
    echo('Producto: ' . $element->elementData->nombre . ' (x' . $element->elementAmount . ') = $' . $element->elementTotalPrice . '<br>');

?>