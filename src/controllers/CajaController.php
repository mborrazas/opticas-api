<?php

require_once './src/models/CajaModel.php';

class CajaController
{

    function cajaAbierta($comercio)
    {

        $model = new CajaModel();
        $result = $model->cajaAbierta($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function abrirCaja($comercio)
    {
        $model = new CajaModel();
        $result = $model->abrirCaja($comercio);
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function getCierreParcial($comercio)
    {
        $model = new CajaModel();
        $modelCompras = new ComprasModel();
        $modelVentas = new VentasModel();

        $pagosBsEfectivo = $modelCompras->getPendienteFacturar($comercio, "bs", "efectivo");
        $pagosUsdEfectivo = $modelCompras->getPendienteFacturar($comercio, 'usd', 'efectivo');



        $efectivoBS = 0;
        if ($pagosBsEfectivo) {
            foreach ($pagosBsEfectivo as $pagos) {
                $efectivoBS += (float) $pagos->total;
            }
        }

        $efectivoUSD = 0;
        if ($pagosUsdEfectivo) {
            foreach ($pagosUsdEfectivo as $pagos) {
                $efectivoUSD += (float) $pagos->total;
            }
        }


        $pagosBsEfectivo = $modelVentas->getPendienteFacturar($comercio, "bs", "efectivo");
        $pagosUsdEfectivo = $modelVentas->getPendienteFacturar($comercio, 'usd', 'efectivo');

        $gastosEfectivoBS = 0;
        if ($pagosBsEfectivo) {
            foreach ($pagosBsEfectivo as $pagos) {
                $gastosEfectivoBS += (float) $pagos->total;
            }
        }

        $gastosEfectivoUSD = 0;
        if ($pagosUsdEfectivo) {
            foreach ($pagosUsdEfectivo as $pagos) {
                $gastosEfectivoUSD += (float) $pagos->total;
            }
        }

        $diferenciaBS = 0;
        if ($efectivoBS > $gastosEfectivoBS) {
            $diferenciaBS  = $efectivoBS - $gastosEfectivoBS;
        } else {
            $diferenciaBS  = $gastosEfectivoBS - $efectivoBS;
        }


        $efectivoUSD = 0;
        if ($efectivoUSD > $gastosEfectivoUSD) {
            $diferenciaUSD  = $efectivoUSD - $gastosEfectivoUSD;
        } else {
            $diferenciaUSD  = $gastosEfectivoUSD - $efectivoUSD;
        }

        $result = [
            "efectivosBS" => $gastosEfectivoBS,
            "efectivosUSD" => $gastosEfectivoUSD,
            "gastosBS" => $efectivoBS,
            "gastosUSD" => $efectivoUSD,
            "diferenciasBS" => $diferenciaBS,
            "diferenciasUSD" => $diferenciaUSD,
            "tcBS" => 0,
            "tcUSD" => 0,
            "reintegroBS" => 0,
            "reintegroUSD" => 0,
            "tdBS" => 0,
            "tdUSD" => 0,
            "notaCreditoBS" => 0,
            "notaCreditoUSD" => 0,
            "creditoBS" => 0,
            "creditoUSD" => 0
        ];
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }


    function getCierreDiario($comercio)
    {

        $model = new CajaModel();

        $cierresParciales = $model->getCierresParciales($comercio);


        $modelCompras = new ComprasModel();
        $modelVentas = new VentasModel();

        $pagosBsEfectivo = $modelCompras->getPendienteFacturar($comercio, "bs", "efectivo");
        $pagosUsdEfectivo = $modelCompras->getPendienteFacturar($comercio, 'usd', 'efectivo');



        $efectivoBS = 0;
        if ($pagosBsEfectivo) {
            foreach ($pagosBsEfectivo as $pagos) {
                $efectivoBS += (float) $pagos->total;
            }
        }

        $efectivoUSD = 0;
        if ($pagosUsdEfectivo) {
            foreach ($pagosUsdEfectivo as $pagos) {
                $efectivoUSD += (float) $pagos->total;
            }
        }


        $pagosBsEfectivo = $modelVentas->getPendienteFacturar($comercio, "bs", "efectivo");
        $pagosUsdEfectivo = $modelVentas->getPendienteFacturar($comercio, 'usd', 'efectivo');

        $gastosEfectivoBS = 0;
        if ($pagosBsEfectivo) {
            foreach ($pagosBsEfectivo as $pagos) {
                $gastosEfectivoBS += (float) $pagos->total;
            }
        }

        $gastosEfectivoUSD = 0;
        if ($pagosUsdEfectivo) {
            foreach ($pagosUsdEfectivo as $pagos) {
                $gastosEfectivoUSD += (float) $pagos->total;
            }
        }

        $diferenciaBS = 0;
        if ($efectivoBS > $gastosEfectivoBS) {
            $diferenciaBS  = $efectivoBS - $gastosEfectivoBS;
        } else {
            $diferenciaBS  = $gastosEfectivoBS - $efectivoBS;
        }


        $efectivoUSD = 0;
        if ($efectivoUSD > $gastosEfectivoUSD) {
            $diferenciaUSD  = $efectivoUSD - $gastosEfectivoUSD;
        } else {
            $diferenciaUSD  = $gastosEfectivoUSD - $efectivoUSD;
        }


        foreach ($cierresParciales as $cierreParcial) {
            $efectivoBS += $cierreParcial->efectivosBS;
            $efectivoUSD += $cierreParcial->efectivosUSD;
            $gastosEfectivoBS += $cierreParcial->gastosBS;
            $gastosEfectivoUSD += $cierreParcial->gastosUSD;
            $diferenciaBS += $cierreParcial->diferenciasBS;
            $diferenciaBS += $cierreParcial->diferenciasUSD;
        }

        $result = [
            "efectivosBS" => $gastosEfectivoBS,
            "efectivosUSD" => $gastosEfectivoUSD,
            "gastosBS" => $efectivoBS,
            "gastosUSD" => $efectivoUSD,
            "diferenciasBS" => $diferenciaBS,
            "diferenciasUSD" => $diferenciaUSD,
            "tcBS" => 0,
            "tcUSD" => 0,
            "tcBS" => 0,
            "reintegroBS" => 0,
            "reintegroUSD" => 0,
            "tdBS" => 0,
            "tdUSD" => 0,
            "notaCreditoBS" => 0,
            "notaCreditoUSD" => 0,
            "creditoBS" => 0,
            "creditoUSD" => 0,
            "totalADepositarBS" => 0,
            "totalADepositarUSD" => 0,
            "lote1" => 0,
            "lote2" => 0,
            "lote3" => 0
        ];
        if ($result) {
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function cierreDiario($body, $comercio)
    {
        $model = new CajaModel();
        $result = $model->cierreDiario(
            $body['efectivosBS'],
            $body['efectivosUSD'],
            $body['gastosBS'],
            $body['gastosUSD'],
            $body['diferenciasBS'],
            $body['diferenciasUSD'],
            $body['tcBS'],
            $body['tcUSD'],
            $body['reintegroBS'],
            $body['reintegroUSD'],
            $body['tdBS'],
            $body['tdUSD'],
            $body['notaCreditoBS'],
            $body['notaCreditoUSD'],
            $body['creditoBS'],
            $body['creditoUSD'],
            $body['totalADepositarBS'],
            $body['totalADepositarUSD'],
            $body['lote1'],
            $body['lote2'],
            $body['lote3'],
            $comercio
        );
        if ($result) {
            $compras = new ComprasModel();
            $compras->marcarFacturado($comercio);
            $ventas = new VentasModel();
            $ventas->marcarFacturado($comercio);
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }

    function cierreParcial($body, $comercio)
    {
        $model = new CajaModel();


        $result = $model->cierreParcial(
            $body['efectivosBS'],
            $body['efectivosUSD'],
            $body['gastosBS'],
            $body['gastosUSD'],
            $body['diferenciasBS'],
            $body['diferenciasUSD'],
            $body['tcBS'],
            $body['tcUSD'],
            $body['reintegroBS'],
            $body['reintegroUSD'],
            $body['tdBS'],
            $body['tdUSD'],
            $body['notaCreditoBS'],
            $body['notaCreditoUSD'],
            $body['creditoBS'],
            $body['creditoUSD'],
            $comercio
        );

        if ($result) {

            $compras = new ComprasModel();
            $compras->marcarFacturado($comercio);
            $ventas = new VentasModel();
            $ventas->marcarFacturado($comercio);
            return json_encode($result);
        } else {
            return json_encode([]);
        }
    }
}
