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

// 添付ファイル
// hogehoge.jpegにリネームした画像ファイルを添付する
$attachment = \Swift_Attachment::fromPath(__DIR__ . '/img/twitter_icon_sample.jpg', 'image/jpeg')
    ->setFilename('hogehoge.jpeg');

// メッセージ作成
$message = \Swift_Message::newInstance()
    // 画像ファイル添付
    ->attach($attachment)
    ->setSubject('テストメール')
    ->setTo($toMailAddress)
    // 宛先を表示 array('foo@foo.com' => 'Mr.FooBar')と同じ
    ->setFrom(['foo@foo.com' => 'Mr.FooBar'])
    ->setBody('これはテストメールです。')
;

// メール送信
$result = $mailer->send($message);

echo $result;

exit;