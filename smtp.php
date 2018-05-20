<?php
header('content-type:text/html;charset=utf-8');

require_once('class.phpmailer.php');
require_once('class.smtp.php');
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
	$mail->CharSet='UTF-8';// 设置邮件的字符编码
    $mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	
	$mail->Host = 'smtp.qq.com';							//smtp服务器
    $mail->Username = '173748596@qq.com';                 // SMTP username
    $mail->Password = 'ffzugqfrntfdbhgd';                   // SMTP password
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	
    $mail->setFrom('173748596@qq.com', '发件人姓名');				//设置发件人邮箱，姓名。same with username
    $mail->addAddress('ifengshai@gmail.com', '收件人姓名');     // 添加收件人
	$mail->addAddress('173748596@qq.com', '收件人姓名');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('backemail@qq.com', '回复人姓名');//回复人邮箱，姓名。仅对部分邮箱有用。
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('class.smtp.php');         // 添加附件
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'smtp subject';
    $mail->Body    = '这是smtp方式测试 <b style="color:red;">nice</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}