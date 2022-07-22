<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('sendDoveSoft')) {

    function sendDoveSoft($MobileNo, $SMSContent) {
        if (ENVIRONMENT == 'production') {
            $xml_data = '<?xml version="1.0"?>';
            $xml_data .= '<parent>';
            $xml_data .= '<child>';
            $xml_data .= '<user>BSACITI</user>';
            $xml_data .= '<key>0b0a19de3dXX</key>';
            $xml_data .= '<mobile>' . $MobileNo . '</mobile>';
            $xml_data .= '<message>' . $SMSContent . '</message>';
            $xml_data .= '<accusage>1</accusage>';
            //$xml_data .= '<unicode>1</unicode>';
            $xml_data .= '<senderid>BSACIT</senderid>';
            $xml_data .= '</child>';
            $xml_data .= '</parent>';
            $URL = "http://mobicomm.dove-sms.com//submitsms.jsp?";
            $ch = curl_init($URL);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            return trim($output);
        } else {
            return '';
        }
    }

}
if (!function_exists('sendDoveSoftPikndel')) {

    function sendDoveSoftPikndel($MobileNo, $SMSContent) {
        if (ENVIRONMENT == 'production') {
            $xml_data = '<?xml version="1.0"?>';
            $xml_data .= '<parent>';
            $xml_data .= '<child>';
            $xml_data .= '<user>BSACITI</user>';
            $xml_data .= '<key>0b0a19de3dXX</key>';
            $xml_data .= '<mobile>' . $MobileNo . '</mobile>';
            $xml_data .= '<message>' . $SMSContent . '</message>';
            $xml_data .= '<accusage>1</accusage>';
            //$xml_data .= '<unicode>1</unicode>';
            $xml_data .= '<senderid>PIKDEL</senderid>';
            $xml_data .= '</child>';
            $xml_data .= '</parent>';
            $URL = "http://mobicomm.dove-sms.com//submitsms.jsp?";
            $ch = curl_init($URL);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            return trim($output);
        } else {
            return '';
        }
    }

}