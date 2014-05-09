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
$logger->debug('debug_bar');

// 以下、すべてロギングされる
// 下にいくほどログレベルが高くなる
$logger->info('info_bar');
$logger->notice('notice_bar');
// $logger->warn()と同じ
$logger->warning('warning_bar');
// $logger->err()と同じ
$logger->error('error_bar');
// $logger->crit()と同じ
$logger->critical('critical_bar');
$logger->alert('alert_bar');
// $logger->emerg()と同じ
$logger->emergency('emergency_bar');

exit;
