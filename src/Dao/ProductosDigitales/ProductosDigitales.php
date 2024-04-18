<?php

namespace Dao\ProductosDigitales;

use Dao\Table;

class ProductosDigitales extends Table
{
    public static function getAllCategories()
    {
        $sqlstr = "SELECT * FROM products;";
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function getCategory($productId)
    {
        $sqlstr = "SELECT * FROM products WHERE productId = :productId;";
        return self::obtenerUnRegistro($sqlstr, ["productId" => $productId]);
    }

    public static function getCategoryWithFilet($productName)
    {
        $sqlstr = "SELECT * FROM categories WHERE productName like :productName;";
        return self::obtenerUnRegistro($sqlstr, ["productName" => "%" . $productName . "%"]);
    }

    public static function insertCategory(
        $productName,
        $productDescription,
        $productPrice,
        $productImgUrl,
        $productStatus

    ) {
        $sqlstr = "INSERT INTO products (productName, productDescription, productPrice,  productImgUrl, productStatus)
         VALUES (:productName, :productDescription, :productPrice, :productImgUrl, :productStatus);";
        return self::executeNonQuery(
            $sqlstr,
            [
                "productName" => $productName,
                "productDescription" => $productDescription,
                "productPrice" => $productPrice,
                "productImgUrl" => $productImgUrl,
                "productStatus" => $productStatus
            ]
        );
    }

    public static function updateCategory(
        $productName,
        $productDescription,
        $productPrice,
        $productImgUrl,
        $productStatus,
        $productId
    ) {
        $sqlstr = "UPDATE products SET productName = :productName,
            productDescription = :productDescription, productPrice = :productPrice,
            productImgUrl = :productImgUrl, productStatus = :productStatus
            WHERE category_id = :category_id;";
        return self::executeNonQuery(
            $sqlstr,
            [
                "productName" => $productName,
                "productDescription" => $productDescription,
                "productPrice" => $productPrice,
                "productImgUrl" => $productImgUrl,
                "productStatus" => $productStatus,
                "productId" => $productId
            ]
        );
    }

    public static function deleteCategory($productId)
    {
        $sqlstr = "DELETE FROM products WHERE productId = :productId;";
        return self::executeNonQuery($sqlstr, ["productId" => $productId]);
    }
}
