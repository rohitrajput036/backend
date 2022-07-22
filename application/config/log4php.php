<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

$config['SetApiLoggerConfig'] = [
    'rootLogger' => ['appenders' => ['enablelLogging'], 'level' => 'debug'],
    'appenders' => [
        'enablelLogging' => [
            'class' => 'LoggerAppenderDailyFile',
            'layout' => ['class' => 'LoggerLayoutSimple'],
            'params' => [
                'file' => APPPATH . 'logs/API-%s.log',
                'datePattern' => 'd-m-Y'
            ]
        ],
        'disableLogging' => [
            'class' => 'LoggerAppenderNull'
        ]
    ]
];
$config['SetErrorLoggerConfig'] = [
    'rootLogger' => ['appenders' => ['enablelLogging'], 'level' => 'debug'],
    'appenders' => [
        'enablelLogging' => [
            'class' => 'LoggerAppenderDailyFile',
            'layout' => ['class' => 'LoggerLayoutSimple'],
            'params' => [
                'file' => APPPATH . 'logs/API-ERROR-%s.log',
                'datePattern' => 'd-m-Y'
            ]
        ],
        'disableLogging' => [
            'class' => 'LoggerAppenderNull'
        ]
    ]
];
$config['loggerName'] = ['SetApiLogger','SetErrorLogger']; // 0 => SetApiLogger, 1=>SetErrorLogger