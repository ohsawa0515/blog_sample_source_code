<?php

namespace BlogSample\MonologSample1;

require_once __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logging_path = __DIR__ . '/../logs/foo_test.log';

$logger = new Logger('foo_test');

// 基本的なロギング
$logger->pushHandler(new StreamHandler($logging_path, Logger::INFO));

// デバッグレベルなのでロギングされない
// $logger->debug()と同じ
$logger->addDebug('debug_bar');

// 以下、すべてロギングされる
// 下にいくほどログレベルが高くなる

// $logger->info()と同じ
$logger->addInfo('info_bar');

// $logger->notice()と同じ
$logger->addNotice('notice_bar');

// $logger->warning(), $logger->warn()と同じ
$logger->addWarning('warning_bar');

// $logger->error(), $logger->err()と同じ
$logger->addError('error_bar');

// $logger->critical(), $logger->crit()と同じ
$logger->addCritical('critical_bar');

// $logger->alert()と同じ
$logger->addAlert('alert_bar');

// $logger->emergency(), $logger->emerg()と同じ
$logger->addEmergency('emergency_bar');

exit;
