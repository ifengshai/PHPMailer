<?php
header('content-type:text/html;charset=utf-8');

require_once('class.phpmailer.php');
$mail = new PHPMailer();
try {
	$mail->CharSet='UTF-8';// 设置邮件的字符编码
    $mail->setFrom('from@qq.com', '发件人姓名');
    $mail->addAddress('ifengshai@gmail.com', '收件人姓名');
    $mail->addAddress('173748596@qq.com','收件人2姓名');//收件人邮箱，姓名
    $mail->addReplyTo('backemail@qq.com', '回复人姓名');//回复人邮箱，姓名。仅对部分邮箱有用。
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    $mail->addAttachment('class.smtp.php');      
	
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'mail() subject';
    $mail->Body    = '这是mail()方式测试 <b style="color:red;">nice</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}