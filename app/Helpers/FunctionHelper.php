<?php

namespace App\Helpers;

use App\Models\Notifikasi;

class FunctionHelper
{

    public static function lecturerText($str)
    {
        return ucwords(str_replace(',',', ',$str));
    }

    public static function education_background()
    {
        $data = [
            'major-in-it' => [
                'name' => 'Major in IT/CS related area',
                'degree' => ['Phd','Master','Bachelor','Other']
            ],
            'major-non-it' => [
                'name' => 'Major in non IT/CS related area',
                'degree' => ['Phd','Master','Bachelor','Other']
            ],
        ];
        return $data;
    }
    public static function interested_area()
    {
        $data = [
            'governance-ciso' => 'Governance: CASP+(CompTIA), Cybersecurity regulation, Supply chain risk',
            'forensic' => 'Forensic:  ECIH, CHFI (EC-Council), Malware analysis',
            'vap' => 'Vulnerability assesment & Pentest'
        ];
        return $data;
    }

    public static function arrayToText($array)
    {
        $out = "";
        foreach($array as $k => $v) {
            $out .= "$k-$v||";
        }
        $out = substr($out, 0, -2);
        return $out;
    }

}
