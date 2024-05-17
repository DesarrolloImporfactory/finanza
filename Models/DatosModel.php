<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
class DatosModel extends Query
{
    public function financial($data = null)
    {
        $response = new stdClass();
        $response->status = false;
        $response->message = "Error en el servidor";
        $response->data = null;
        $response->code = 500;
        $response->error = null;
        try {
            if ($data != null) {
                $id = $data->id;
                $sql = "SELECT * FROM cabecera_cuenta_pagar WHERE tienda like '%ecuaoferta%'";
                $result = $this->select($sql);
                if ($result != null) {
                    $response->status = true;
                    $response->message = "Datos encontrados";
                    $response->data = $result;
                    $response->code = 200;
                } else {
                    $response->status = false;
                    $response->message = "Datos no encontrados";
                    $response->data = null;
                    $response->code = 400;
                }
            } else {
                $sql = "SELECT * FROM cabecera_cuenta_pagar";
                $result = $this->select($sql);
                if ($result != null) {
                    $response->status = true;
                    $response->message = "Datos encontrados";
                    $response->data = $result;
                    $response->code = 200;
                } else {
                    $response->status = false;
                    $response->message = "Datos no encontrados";
                    $response->data = null;
                    $response->code = 400;
                }
            }
        } catch (Exception $e) {
            $response->status = false;
            $response->message = "Error en el servidor";
            $response->data = null;
            $response->code = 500;
            $response->error = $e->getMessage();
        }
        return $response;
    }
}
