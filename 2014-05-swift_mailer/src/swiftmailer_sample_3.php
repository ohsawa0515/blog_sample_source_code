<?php

namespace BlogSample\SwiftMailerSample2;

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
    // 宛先を表示 array('foo@foo.com' => 'Mr.FooBar')と同じ
    ->setFrom(['foo@foo.com' => 'Mr.FooBar']);

$embedImage = $message->embed(\Swift_Image::fromPath(__DIR__ . '/img/twitter_icon_sample.jpg'));

// ボディ部分を作成
// HTMLメールを作成
$message->setBody(
    '<html>' .
    ' <head></head>' .
    ' <body>' .
    '  画像はここにあります-> <img src="' . $embedImage . '" alt="Image" /><br />' .
    '  テストメールです。' .
    ' </body>' .
    '</html>',
    'text/html'
);

// メール送信
$result = $mailer->send($message);

echo $result;

exit;