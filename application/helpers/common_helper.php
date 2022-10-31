<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('setSession')) {

    function setSession($UserId = 0, $EmpId = 0, $UserName = "", $Gender = 'M', $Role = '', $BranchId = 0, $BranchName = '', $HeaderHeading = '', $DefaultImg = '', $Email = "", $school_id = 0, $school_name = '', $Departments = [], $academic_session = []) {
        $CI = & get_instance();
        $CI->session->set_userdata('UserId', $UserId);
        $CI->session->set_userdata('EmpId', $EmpId);
        $CI->session->set_userdata('UserName', $UserName);
        $CI->session->set_userdata('Gender', $Gender);
        $CI->session->set_userdata('Role', $Role);
        $CI->session->set_userdata('BranchId', $BranchId);
        $CI->session->set_userdata('BranchName', $BranchName);
        $CI->session->set_userdata('HeaderHeading', $HeaderHeading);
        $CI->session->set_userdata('DefaultImg', $DefaultImg);
        $CI->session->set_userdata('Email', $Email);
        $CI->session->set_userdata('SchoolId', $school_id);
        $CI->session->set_userdata('SchoolName', $school_name);
        $CI->session->set_userdata('Departments', $Departments);
        $CI->session->set_userdata('AcademicSession', $academic_session);
        $CI->session->set_userdata('ValidateLogin', 1);
    }

}

if (!function_exists('unsetSession')) {

    function unsetSession() {
        $CI = & get_instance();
        $CI->session->sess_destroy();
    }

}

if (!function_exists('checkLogin')) {

    function checkLogin() {
        $CI = & get_instance();
        if ($CI->session->userdata('ValidateLogin')) {
            return true;
        } else {
            return false;
        }
    }

}

if (!function_exists('generateUUId')) {

    function generateUUId() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                // 16 bits for "time_mid"
                mt_rand(0, 0xffff),
                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand(0, 0x0fff) | 0x4000,
                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand(0, 0x3fff) | 0x8000,
                // 48 bits for "node"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

}

if (!function_exists('callAPI')) {

    function callAPI($url, $method = 'GET', $data = null, $header = true) {
        $headers = array('Accept: application/json', 'Content-Type: application/json',);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($header) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        switch ($method) {
            case 'GET' :
                break;
            case 'POST' :
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
            case 'PUT' :
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case 'DELETE' :
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }
        $response = curl_exec($ch);
        //   echo 'd'. print_r($response); die;
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return json_decode($response, true);
    }

}

if (!function_exists('mime2ext')) {

    function mime2ext($mime) {
        $all_mimes = '{"png":["image/png","image/x-png"],"bmp":["image/bmp","image/x-bmp","image/x-bitmap","image/x-xbitmap","image/x-win-bitmap","image/x-windows-bmp","image/ms-bmp","image/x-ms-bmp","application/bmp","application/x-bmp","application/x-win-bitmap"],"gif":["image/gif"],"jpeg":["image/jpeg","image/pjpeg"],"xspf":["application/xspf+xml"],"vlc":["application/videolan"],"wmv":["video/x-ms-wmv","video/x-ms-asf"],"au":["audio/x-au"],"ac3":["audio/ac3"],"flac":["audio/x-flac"],"ogg":["audio/ogg","video/ogg","application/ogg"],"kmz":["application/vnd.google-earth.kmz"],"kml":["application/vnd.google-earth.kml+xml"],"rtx":["text/richtext"],"rtf":["text/rtf"],"jar":["application/java-archive","application/x-java-application","application/x-jar"],"zip":["application/x-zip","application/zip","application/x-zip-compressed","application/s-compressed","multipart/x-zip"],"7zip":["application/x-compressed"],"xml":["application/xml","text/xml"],"svg":["image/svg+xml","application/octet-stream"],"3g2":["video/3gpp2"],"3gp":["video/3gp","video/3gpp"],"mp4":["video/mp4"],"m4a":["audio/x-m4a"],"f4v":["video/x-f4v"],"flv":["video/x-flv"],"webm":["video/webm"],"aac":["audio/x-acc"],"m4u":["application/vnd.mpegurl"],"pdf":["application/pdf"],"pptx":["application/vnd.openxmlformats-officedocument.presentationml.presentation"],"ppt":["application/powerpoint","application/vnd.ms-powerpoint","application/vnd.ms-office","application/msword"],"docx":["application/vnd.openxmlformats-officedocument.wordprocessingml.document"],"xlsx":["application/vnd.openxmlformats-officedocument.spreadsheetml.sheet","application/vnd.ms-excel"],"xl":["application/excel"],"xls":["application/msexcel","application/x-msexcel","application/x-ms-excel","application/x-excel","application/x-dos_ms_excel","application/xls","application/x-xls"],"xsl":["text/xsl"],"mpeg":["video/mpeg"],"mov":["video/quicktime"],"avi":["video/x-msvideo","video/msvideo","video/avi","application/x-troff-msvideo"],"movie":["video/x-sgi-movie"],"log":["text/x-log"],"txt":["text/plain"],"css":["text/css"],"html":["text/html"],"wav":["audio/x-wav","audio/wave","audio/wav"],"xhtml":["application/xhtml+xml"],"tar":["application/x-tar"],"tgz":["application/x-gzip-compressed"],"psd":["application/x-photoshop","image/vnd.adobe.photoshop"],"exe":["application/x-msdownload"],"js":["application/x-javascript"],"mp3":["audio/mpeg","audio/mpg","audio/mpeg3","audio/mp3"],"rar":["application/x-rar","application/rar","application/x-rar-compressed"],"gzip":["application/x-gzip"],"hqx":["application/mac-binhex40","application/mac-binhex","application/x-binhex40","application/x-mac-binhex40"],"cpt":["application/mac-compactpro"],"bin":["application/macbinary","application/mac-binary","application/x-binary","application/x-macbinary"],"oda":["application/oda"],"ai":["application/postscript"],"smil":["application/smil"],"mif":["application/vnd.mif"],"wbxml":["application/wbxml"],"wmlc":["application/wmlc"],"dcr":["application/x-director"],"dvi":["application/x-dvi"],"gtar":["application/x-gtar"],"php":["application/x-httpd-php","application/php","application/x-php","text/php","text/x-php","application/x-httpd-php-source"],"swf":["application/x-shockwave-flash"],"sit":["application/x-stuffit"],"z":["application/x-compress"],"mid":["audio/midi"],"aif":["audio/x-aiff","audio/aiff"],"ram":["audio/x-pn-realaudio"],"rpm":["audio/x-pn-realaudio-plugin"],"ra":["audio/x-realaudio"],"rv":["video/vnd.rn-realvideo"],"jp2":["image/jp2","video/mj2","image/jpx","image/jpm"],"tiff":["image/tiff"],"eml":["message/rfc822"],"pem":["application/x-x509-user-cert","application/x-pem-file"],"p10":["application/x-pkcs10","application/pkcs10"],"p12":["application/x-pkcs12"],"p7a":["application/x-pkcs7-signature"],"p7c":["application/pkcs7-mime","application/x-pkcs7-mime"],"p7r":["application/x-pkcs7-certreqresp"],"p7s":["application/pkcs7-signature"],"crt":["application/x-x509-ca-cert","application/pkix-cert"],"crl":["application/pkix-crl","application/pkcs-crl"],"pgp":["application/pgp"],"gpg":["application/gpg-keys"],"rsa":["application/x-pkcs7"],"ics":["text/calendar"],"zsh":["text/x-scriptzsh"],"cdr":["application/cdr","application/coreldraw","application/x-cdr","application/x-coreldraw","image/cdr","image/x-cdr","zz-application/zz-winassoc-cdr"],"wma":["audio/x-ms-wma"],"vcf":["text/x-vcard"],"srt":["text/srt"],"vtt":["text/vtt"],"ico":["image/x-icon","image/x-ico","image/vnd.microsoft.icon"],"csv":["text/x-comma-separated-values","text/comma-separated-values","application/vnd.msexcel"],"json":["application/json","text/json"]}';
        $all_mimes = json_decode($all_mimes, true);
        foreach ($all_mimes as $key => $value) {
            if (array_search($mime, $value) !== false)
                return $key;
        }
        return false;
    }

}

if (!function_exists('getGreetings')) {

    function getGreetings() {
        $numeric_date = date("G");
        //$welcome_string = 'Hello, ';
        $welcome_string = '';
        if ($numeric_date >= 0 && $numeric_date <= 11)
            $welcome_string .="Good Morning";
        else if ($numeric_date >= 12 && $numeric_date <= 17)
            $welcome_string .="Good Afternoon";
        else if ($numeric_date >= 18 && $numeric_date <= 23)
            $welcome_string .="Good Evening";
        if (userdata('UserName')) {
            $welcome_string .= " " . userdata('UserName');
        }
        $welcome_string .='!';
        return $welcome_string;
    }

}

if (!function_exists('dayCount')) {

    function dayCount($FirstDate, $SecondDate) {
        $date1 = date_create($FirstDate);
        $date2 = date_create($SecondDate);
        $diff = date_diff($date1, $date2);
        return $diff->format("%a") + 1;
    }

}


if (!function_exists('roundUpToAny')) {

    function roundUpToAny($n, $x = 5) {
        if ($n % $x != 0) {
            return round(($n + $x / 2) / $x) * $x;
        } else {
            return $n;
        }
    }

}



if (!function_exists('changeDateForDB')) {

    function changeDateForDB($date) {
        $MonthArray = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', 'JANUARY', 'FEBRUARY', 'MARCH', 'APRIL', 'MAY', 'JUNE', 'JULY', 'AUGUST', 'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER'];
        $upperDate = strtoupper($date);
        if (is_numeric($date)) {
            $unix_date = ($date - 25569) * 86400;
            $date = 25569 + ($unix_date / 86400);
            $unix_date = ($date - 25569) * 86400;
            return gmdate('Y-m-d', $unix_date);
        } else if (strposa($upperDate, $MonthArray, 1)) {
            if (strpos($upperDate, '/') !== false) {
                $date = str_replace("/", "-", $date);
            }
            return date('Y-m-d', strtotime($date));
        } else {
            $m = preg_replace('/[^0-9]/', '', $date);
            if (preg_match_all('/\d{2}+/', $m, $r)) {
                $r = reset($r);
                if (count($r) == 2) {
                    $r[2] = $r[1];
                    $r[1] = date('m', strtotime($date));
                } else if (count($r) == 4) {
                    if ($r[2] <= 12 && $r[3] <= 31)
                        return "$r[0]$r[1]-$r[2]-$r[3]"; // Y-m-d
                    if ($r[0] <= 31 && $r[1] != 0 && $r[1] <= 12)
                        return "$r[2]$r[3]-$r[1]-$r[0]"; // d-m-Y
                    if ($r[0] <= 12 && $r[1] <= 31)
                        return "$r[2]$r[3]-$r[0]-$r[1]"; // m-d-Y
                    if ($r[2] <= 31 && $r[3] <= 12)
                        return "$r[0]$r[1]-$r[3]-$r[2]"; //Y-m-d
                }
                $y = $r[2] >= 0 && $r[2] <= date('y') ? date('y') . $r[2] : (date('y') - 1) . $r[2];
                if ($r[0] <= 31 && $r[1] != 0 && $r[1] <= 12)
                    return "$y-$r[1]-$r[0]"; // d-m-y
            }
        }
    }

}

if (!function_exists('strposa')) {

    function strposa($haystack, $needles = array(), $offset = 0) {
        $chr = array();
        foreach ($needles as $needle) {
            $res = strpos($haystack, $needle, $offset);
            if ($res !== false)
                $chr[$needle] = $res;
        }
        if (empty($chr))
            return false;
        return min($chr);
    }

}



if (!function_exists('roundTimeUpToAny')) {

    function roundTimeUpToAny($time, $min = 30, $format = 'H:i') {
        if (!empty($time)) {
            return date($format, ceil(strtotime($time) / ($min * 60)) * $min * 60);
        } else {
            return '';
        }
    }

}


if (!function_exists('getWeekDays')) {

    function getWeekDays() {
        return ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    }

}


if (!function_exists('searchInArray')) {

    function searchInArray($KeyName, $Search, $Array, $ReturnValue) {
        foreach ($Array as $key => $val) {
            if ($val[$KeyName] === $Search) {
                return $val[$ReturnValue];
            }
        }
        return null;
    }

}
if (!function_exists('numberMasking')) {

    function numberMasking($number, $maskingCharacter = 'X') {
        if (!empty($number) && strlen($number) == 10) {
            return substr($number, 0, 2) . str_repeat($maskingCharacter, strlen($number) - 6) . substr($number, -4);
        } else {
            return $number;
        }
    }

}

if (!function_exists('MobileNo10Digits')) {

    function MobileNo10Digits($MobileNo) {
        $MobileNo = preg_replace('/[^0-9]/', '', $MobileNo);
        $MobileNo = substr($MobileNo, -10);
        return $MobileNo;
    }

}

if(!function_exists('sum_in_string')){
    function sum_in_string($string = '',$value=1){
        list($Code, $No) = sscanf($string, "%[A-Z]%d");
        $No = str_pad(($No + $value), 4, '0', STR_PAD_LEFT);
        return $Code . $No;
    }
}