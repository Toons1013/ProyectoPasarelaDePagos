<?php

namespace Controllers\Productosdigitales;

use Controllers\PrivateController;
use Utilities\Site;
use Views\Renderer;

class ProductosForm extends PrivateController
{
    private $viewData = [];
    private $mode = "DSP";

    private $crf_token = "";

    private $productId = 0;
    private $productName = "";
    private $productDescription = "";
    private $productPrice = "";
    private $productImgUrl = "";
    private $productStatus = "ACT";

    private $isReadOnly = "readonly";

    private $hasErrors = false;
    private $errors = [];

    private $modeOptions = [
        "INS" => "Nuevo Producto",
        "UPD" => "Actualizando Producto (%s %s)",
        "DEL" => "Eliminando Producto (%s %s)",
        "DSP" => "Detalle de Producto (%s %s)"
    ];

    private $productStatusOptions = [
        "ACT" => "Activo",
        "INA" => "Inactivo",
        "RTR" => "Retirar",
        "DSC" => "Descontinuado"
    ];

    private function throwError($message, $scope = "global")
    {
        $this->hasErrors = true;
        error_log($message);
        if (!isset($this->errors[$scope])) {
            $this->errors[$scope] = [];
        }
        $this->errors[$scope][] = $message;
    }

    private function cargar_datos()
    {
        $this->productId = isset($_GET["productId"]) ? intval($_GET["productId"]) : 0;
        $this->mode = isset($_GET["mode"]) ? $_GET["mode"] : "DSP";

        $modeFeatureName = "products_form_" . strtolower($this->mode) . "_enabled";
        if (!$this->isFeatureAutorized($modeFeatureName)) {
            Site::redirectToWithMsg(
                "index.php?page=Products_ProductsList",
                "No está autorizado para realizar esta acción"
            );
        }

        if ($this->productId > 0) {
            $producto = \Dao\ProductosDigitales\ProductosDigitales::getCategory($this->productId);
            if ($producto) {
                $this->productName = $producto["productName"];
                $this->productDescription = $producto["productDescription"];
                $this->productPrice = $producto["productPrice"];
                $this->productImgUrl = $producto["productImgUrl"];
                $this->productStatus = $producto["productStatus"];
            }
        }
    }

    private function getPostData()
    {
        if (!$this->validateCsfrToken()) {
            $this->throwError("Error de aplicación, Token CSRF Inválido");
        }
        $tmp_mode = isset($_POST["mode"]) ? $_POST["mode"] : "DSP";
        if ($tmp_mode !== $this->mode) {
            $this->throwError("Error de aplicación, Modo de formulario incorrecto");
        }
        $tmp_productId = isset($_POST["productId"]) ? intval($_POST["productId"]) : 0;
        if ($this->mode === "INS") {
            if ($tmp_productId !== 0) {
                $this->throwError("No se puede insertar con un valor de categoria", "productId_error");
            }
        } else {
            if ($tmp_productId != $this->productId) {
                $this->throwError("Error de Aplicación, no se puede modificar el valor del Identificador de la Categoria");
            }
        }
        $this->productId = $tmp_productId;
        //
        $tmp_productName = isset($_POST["productName"]) ? $_POST["productName"] : "";
        if (preg_match("/^\s*$/", $tmp_productName)) {
            $this->throwError("Debe ingresar el nombre de la categoria", "productName_error");
        }
        if (!preg_match("/^[a-zA-Z0-9áéíóúüÁÉÍÓÚÜñÑ ]*$/", $tmp_productName)) {
            $this->throwError("El nombre de la categoria solo puede contener letras y números", "productName_error");
        }
        $this->productName = $tmp_productName;
        //
        $tmp_productDescription = isset($_POST["productDescription"]) ? $_POST["productDescription"] : "";
        if (preg_match("/^\s*$/", $tmp_productDescription)) {
            $this->throwError("Debe ingresar la descripción de la categoria", "productDescription_error");
        }
        if (!preg_match("/^[a-zA-Z0-9áéíóúüÁÉÍÓÚÜñÑ ]*$/", $tmp_productName)) {
            $this->throwError("La descripción de la categoria solo puede contener letras y números", "productDescription_error");
        }
        $this->productDescription = $tmp_productDescription;
        //
        $tmp_productPrice = isset($_POST["productPrice"]) ? $_POST["productPrice"] : "";
        if (preg_match("/^\s*$/", $tmp_productPrice)) {
            $this->throwError("Debe ingresar la descripción de la categoria", "productPrice_error");
        }
        if (!preg_match("/^[a-zA-Z0-9áéíóúüÁÉÍÓÚÜñÑ ]*$/", $tmp_productName)) {
            $this->throwError("La descripción de la categoria solo puede contener letras y números", "productPrice_error");
        }
        $this->productPrice = $tmp_productPrice;
        //
        $tmp_productImgUrl = isset($_POST["productImgUrl"]) ? $_POST["productImgUrl"] : "";
        if (preg_match("/^\s*$/", $tmp_productImgUrl)) {
            $this->throwError("Debe ingresar la descripción de la categoria", "productImgUrl_error");
        }
        if (!preg_match("/^[a-zA-Z0-9áéíóúüÁÉÍÓÚÜñÑ ]*$/", $tmp_productName)) {
            $this->throwError("La descripción de la categoria solo puede contener letras y números", "productImgUrl_error");
        }
        $this->productImgUrl = $tmp_productImgUrl;
        //
        $tmp_productStatus = isset($_POST["productStatus"]) ? $_POST["productStatus"] : "";
        if (!isset($this->productStatusOptions[$tmp_productStatus])) {
            $this->throwError("Debe seleccionar un estado para la categoria");
        }
        $this->productStatus = $tmp_productStatus;
    }

    private function processAction()
    {
        switch ($this->mode) {
            case "INS":
                $inserted = \Dao\ProductosDigitales\ProductosDigitales::insertCategory(
                    $this->productName,
                    $this->productDescription,
                    $this->productPrice,
                    $this->productImgUrl,
                    $this->productStatus
                );
                if ($inserted) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=Products_ProductsList",
                        "Producto Guardado"
                    );
                } else {
                    $this->throwError("Error al insertar el producto");
                }
                break;
            case "UPD":
                $updated = \Dao\ProductosDigitales\ProductosDigitales::updateCategory(
                    $this->productName,
                    $this->productDescription,
                    $this->productPrice,
                    $this->productImgUrl,
                    $this->productStatus,
                    $this->productId
                );
                if ($updated) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=Products_ProductsList",
                        "Producto Actualizado"
                    );
                } else {
                    $this->throwError("Error al actualizar el producto");
                }
                break;
            case "DEL":
                $deleted = \Dao\ProductosDigitales\ProductosDigitales::deleteCategory($this->productId);
                if ($deleted) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=Products_ProductsList",
                        "Producto Eliminado"
                    );
                } else {
                    $this->throwError("Error al eliminar el producto");
                }
                break;
        }
    }
    private function prepareViewData()
    {
        $viewData["mode"] = $this->mode;
        $viewData["modeDesc"] = sprintf($this->modeOptions[$this->mode], $this->productId, $this->productName);
        $viewData["productId"] = $this->productId;
        $viewData["productName"] = $this->productName;
        $viewData["productDescription"] = $this->productDescription;
        $viewData["productPrice"] = $this->productPrice;
        $viewData["productImgUrl"] = $this->productImgUrl;
        $viewData["productStatus"] = $this->productStatus;

        if ($this->mode === "INS" || $this->mode === "UPD") {
            $this->isReadOnly = "";
        }
        $viewData["isReadOnly"] = $this->isReadOnly;

        $viewData["showAction"] = $this->mode !== "DSP";

        foreach ($this->productStatusOptions as $value => $text) {
            $viewData["productStatus_list"][] = [
                "value" => $value,
                "text" => $text,
                "selected" => ($value === $this->productStatus) ? "selected" : ""
            ];
        }

        $this->crf_token = $this->csfrToken();
        $viewData["crf_token"] = $this->crf_token;
        $viewData["hasErrors"] = $this->hasErrors;
        $viewData["errors"] = $this->errors;

        $this->viewData = $viewData;
    }

    private function csfrToken()
    {
        $token = md5(uniqid(microtime(), true));
        $_SESSION["product_form_token"] = $token;
        return $token;
    }

    private function validateCsfrToken()
    {
        if (!isset($_POST["crf_token"])) {
            return false;
        }
        if ($_POST["crf_token"] !== $_SESSION["product_form_token"]) {
            return false;
        }
        return true;
    }

    public function run(): void
    {
        /*
            CargaInicial (GET)
                If Codigo > 0 then 
                    Buscar Categoria
                    Mostrar Datos
                Sino 
                    Mostrar Datos
            Postback (click a guardar)
                Obtener Datos del Formulario
                Validar Datos
                Si Datos Ok
                    Guardar Datos (INS, UPD, DEL)
                    Mostrar Mensaje
                    Redirigimos a la Lista
                Sino
                    Mostrar Mensaje de Error
                    Mostrar Datos
        */
        $this->cargar_datos();

        if ($this->isPostBack()) {
            $this->getPostData();
            if (!$this->hasErrors) {
                $this->processAction();
            }
        }

        $this->prepareViewData();
        Renderer::render("productosdigitales/productosform", $this->viewData);
    }
}
