<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('keyExist')) {
    function keyExist($Keys=[], $Array = []) {
        if(is_object($Array)) {
            foreach($Keys as $Key) {
                if(!array_key_exists($Key, $Array)) {
                    throw new Exception($Key." key missing",400);
                }
            }
        } else if(is_array($Array)) {
            foreach($Keys as $Key) {
                if(!array_key_exists($Key, $Array)) {
                    throw new Exception($Key." key missing",400);
                }
            }
        } else {
            throw new Exception("Invalid Object", 400);
        }
    }
}

if(!function_exists('checkBlank')) {
    function checkBlank($Variables=[]) {
        foreach ($Variables as $key => $value) {
            if(($value)=="") {
                throw new Exception($key." can not be blank",400);
            }
        }
    }
}

if(!function_exists('check0')) {
    function check0($Variables=[]) {
        foreach ($Variables as $key => $value) {
            if(($value)==0) {
                throw new Exception($key." can not be blank",400);
            }
        }
    }
}


if(!function_exists('checkMyDate')) {
    function checkMyDate($Variables=[]) {
        $date_regex = '%\A(20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])\z%'; 
        foreach ($Variables as $key => $value)
            if($value !='')
                if(preg_match($date_regex, $value) ==false) 
                    throw new Exception("Invalid date on ".$key.", Please use YYYY-MM-DD format",400);
    }
}


if(!function_exists('checkDateTime')) {
    function checkDateTime($Variables=[]) {
        $datetime_regex = '%\A(20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])[ ]([01]\d|2[0-3])[:]([0-5]\d)[:]([0-5]\d)\z%';
        foreach ($Variables as $key => $value)
            if($value !='')
                if(preg_match($datetime_regex, $value) ==false) 
                    throw new Exception("Invalid datetime on ".$key.", Please use YYYY-MM-DD HH:MM:SS(24 Hours) format",400);
    }
}

if(!function_exists('checkTime')) {
    function checkTime($Variables=[]) {
        $time_regex = '%\A([01]\d|2[0-3])[:]([0-5]\d)[:]([0-5]\d)\z%';
        foreach ($Variables as $key => $value)
            if($value !='')
                if(preg_match($datetime_regex, $value) ==false) 
                    throw new Exception("Invalid time on ".$key.", Please use HH:MM:SS(24 Hours) format",400);
    }
}

if(!function_exists('checkDecimal')) {
    function checkDecimal($Variables=[]) {
        $decimal_regex = "/^\d+\.\d+$/";
        foreach ($Variables as $key => $value)
            if($value !='')
                if(preg_match($decimal_regex, $value) ==false)
                    throw new Exception("Invalid Decimal Value on ".$key."",400);           
    }
}

if(!function_exists('checkArray')) {
    function checkArray($Variables=[]) {
        foreach ($Variables as $key => $value) {
            if(!is_array($value)) {
                throw new Exception($key." must be an array",400);
            } else {
                if(empty($value)) {
                    throw new Exception($key." array can not be empty",400);
                }
            }
        }
    }
}