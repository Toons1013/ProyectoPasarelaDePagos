<?php

namespace Controllers;

use Dao\Products\Products as ProductsDao;
use Utilities\Site;
use Views\Renderer;

class Productosdigitales extends PublicController
{
    public function run(): void
    {
        Site::addLink('public/css/products.css');
        $viewData = [];
        $viewData['productsNew'] = ProductsDao::getNewProducts();
        Renderer::render('home', $viewData);
    }
}
