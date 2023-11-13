<?php
namespace Config;

use Dompdf\Dompdf;

class DompdfFactory
{
    public static function create()
    {
        $dompdf = new Dompdf();
        $dompdf->set_option('defaultFont', 'Helvetica');
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->set_option('isRemoteEnabled', true);
        return $dompdf;
    }
}
