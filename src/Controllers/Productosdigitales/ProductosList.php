<?php

/**
 * @package mvc202401
 * @subpackage Controllers\Products
 */

namespace Controllers\Productosdigitales;

use Controllers\PrivateController;
use Dao\ProductosDigitales\ProductosDigitales as ProductosDao;
use Views\Renderer;

/**
 * Lista del Patron WW para mostrar las categorias de productos
 */
class ProductosList extends PrivateController
{
    public function run(): void
    {
        $viewData = [];
        $viewData["products"] = ProductosDao::getAllCategories();
        $viewData["products_new_enabled"] = $this->isFeatureAutorized("products_new_enabled");
        $viewData["products_edit_enabled"] = $this->isFeatureAutorized("products_edit_enabled");
        $viewData["products_delete_enabled"] = $this->isFeatureAutorized("products_delete_enabled");
        $viewData["products_view_enabled"] = $this->isFeatureAutorized("products_view_enabled");
        Renderer::render("productosdigitales/productoslist", $viewData);
    }
}
