<?php

$method = $_SERVER['REQUEST_METHOD'];
// Переменная, для обхода попадания писем в спам
// Указываем почту сервера
$my_mail = 'amillion@example.com';

//Script Foreach
$c = true;
if ( $method === 'POST' ) {

	$project_name = trim($_POST["project_name"]);
	$admin_email  = trim($_POST["admin_email"]);
	$form_subject = trim($_POST["form_subject"]);
	// Принимаем UTM метки
	$utm_source = trim($_POST["utm_source"]);
	$utm_medium = trim($_POST["utm_medium"]);
	$utm_campaign = trim($_POST["utm_campaign"]);
	$utm_content = trim($_POST["utm_content"]);
	$utm_term = trim($_POST["utm_term"]);
 
	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid; width: 50%;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid; width: 50%;'>$value</td>
			</tr> 
			";
		}
	}
} else if ( $method === 'GET' ) {

	$project_name = trim($_GET["project_name"]);
	$admin_email  = trim($_GET["admin_email"]);
	$form_subject = trim($_GET["form_subject"]);
	// Принимаем UTM метки
	$utm_source = trim($_POST["utm_source"]);
	$utm_medium = trim($_POST["utm_medium"]);
	$utm_campaign = trim($_POST["utm_campaign"]);
	$utm_content = trim($_POST["utm_content"]);
	$utm_term = trim($_POST["utm_term"]);

	foreach ( $_GET as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid; width: 50%;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid; width: 50%;'>$value</td>
			</tr>
			";
		}
	}
}
			
$message = "<table style='width: 100%;'>$message</table>"; 

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$my_mail.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;

mail($admin_email, adopt($form_subject), $message, $headers );
