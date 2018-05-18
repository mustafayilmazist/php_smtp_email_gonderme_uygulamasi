<?php 

$gonderen ="Mustafa YILMAZ";
$kime = "gidecekmailadresi@gidecekmailadresi.com";
$konu = "email gönderme konusu";
$icerik = "ad = mustafa <br> soyad = yılmaz";

$hostt = "smtp.yandex.com.tr";
$usernamee = "sizinmailadresiniz@yandex.com"
$password = "şifreniz";

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->SMTPDebug=0;
$mail->SMTPSecure='tls'; // güvenli bağlantı ise ssl
$mail->Host =$hostt;
$mail->Port=587; // güvenli bağlantı için 465
$mail->isHTML(true);
$mail->SetLanguage('tr','PHPMailer/language');
$mail->CharSet='UTF-8';
$mail->Username=$usernamee;
$mail->Password=$password;
$mail->SetFrom( $mail->Username, $gonderen);
$mail->AddAddress($kime,"");
$mail->Subject = $konu;
$mail->MsgHTML($icerik);
$gonder = $mail->Send();

if ( $gonder ) {
	
	echo "<p>E-Posta gönderildi.</p>";
	
}else{

	echo "<p>E-Posta gönderilemedi.</p>";
	echo "<p>Oluşan Hata = $mail->ErrorInfo</p>";
	
}
