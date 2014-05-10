<?php

namespace BlogSample\MonologSample3;

require_once __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;

$logging_path = __DIR__ . '/../logs/foo_test_3.log';

$logger = new Logger('foo_test');

// FingersCrossedHandlerを使う
$logger->pushHandler(
    new FingersCrossedHandler(
        new RotatingFileHandler($logging_path, 2, Logger::INFO),
        new ErrorLevelActivationStrategy(Logger::ALERT)
    )
);

// デバッグレベルなのでロギングされない
$logger->addDebug('debug_bar');

// この時点ではログファイルに出力されない
$logger->addInfo('info_bar');

// この時点ではログファイルに出力されない
$logger->addNotice('notice_bar');

// この時点ではログファイルに出力されない
$logger->addWarning('warning_bar');

// この時点ではログファイルに出力されない
$logger->addError('error_bar');

// この時点ではログファイルに出力されない
$logger->addCritical('critical_bar');

// この時点で上記のログが出力される
$logger->addAlert('alert_bar');

exit;
