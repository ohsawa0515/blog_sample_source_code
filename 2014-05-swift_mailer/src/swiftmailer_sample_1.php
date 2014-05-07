<?php

namespace BlogSample\SwiftMailerSample1;

require_once __DIR__ . '/../vendor/autoload.php';

// 宛先メールアドレスの取得
if (empty($argv[1])) {
    echo 'Please input mailaddress.' . PHP_EOL;
    exit;
}

$toMailAddress= $argv[1];

// SMTPトランスポートを使用
$transport = \Swift_SmtpTransport::newInstance('localhost', 25);

// メーラークラスのインスタンスを作成
$mailer = \Swift_Mailer::newInstance($transport);

// メッセージ作成
$message = \Swift_Message::newInstance()
    ->setSubject('テストメール')
    ->setTo($toMailAddress)
    ->setFrom(['foo@foo.com' => 'Mr.FooBar'])
    ->setBody('これはテストメールです。')
;
$result = $mailer->send($message);

echo $result;

exit;