<?php

namespace App\Suporte;

class Upload {


    private static function extencaoPermitida($extensao)
    {

        $permitidos = array("xls", "xlsx", "pdf", "jpg", "jpeg", "png");

        if(in_array(strtolower($extensao), $permitidos)) {
            return true;
        }

        return false;

    }

    private static function tamanhoArquivoPermitido( $tamanho )
    {

        if($tamanho > 2097152)
        {
            return false;
        }

        return true;
    }

    private static function validaArquivo($arquivo)
    {

        $erro = [];

        if( !self::extencaoPermitida( $arquivo->extension() ) ) {
            $erro = ["Tipo de Arquivo não permitido!"];
        }

        if( !self::tamanhoArquivoPermitido( $arquivo->getSize() )) {
            $erro = ["Tamanho excede o limite permitido!"];
        }

        return $erro;

    }

    public static function fazUpload($diretorio, $arquivo)
    {

        $nameFile = "";
        $arr = self::validaArquivo( $arquivo );

        if( count( $arr)  < 1 ) {

            $name = uniqid(date('HisYmd'));
            $nameFile = "{$name}.{$arquivo->extension()}";
            $arquivo->storeAs($diretorio, $nameFile);
            return $nameFile;

        }

        return $arr;

    }


}
