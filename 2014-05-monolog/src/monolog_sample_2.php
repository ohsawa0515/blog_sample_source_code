<?php

namespace BlogSample\MonologSample2;

require_once __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SwiftMailerHandler;

$logging_path = __DIR__ . '/../logs/foo_test_2.log';

$mailer = \Swift_Mailer::newInstance(
    \Swift_SmtpTransport::newInstance('localhost', 25)
);

$message = \Swift_Message::newInstance()
    ->setSubject('Monolog Sample')
    ->setTo('bar@bar.com')
    ->setFrom(['foo@foo.com' => 'Mr.FooBar']);
    
$logger = new Logger('foo_test');

// 基本的なロギング
$logger->pushHandler(new StreamHandler($logging_path, Logger::INFO));

// ログをメール送信する
$logger->pushHandler(new SwiftMailerHandler($mailer, $message, Logger::ALERT));

// ログファイルに出力される
$logger->addInfo('info_bar');

// ログファイルに出力される
$logger->addNotice('notice_bar');

// ログファイルに出力される
$logger->addWarning('warning_bar');

// ログファイルに出力される
$logger->addError('error_bar');

// ログファイルに出力される
$logger->addCritical('critical_bar');

// ログファイルに出力され、メール送信される
$logger->addAlert('alert_bar');

// ログファイルに出力され、メール送信される
$logger->addEmergency('emergency_bar');

exit;
