<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

echo '<pre>';
var_dump($_POST);
echo '</pre>';

include(__DIR__ . '/index.html');
$dbh = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$sth = $dbh->prepare('SELECT * from my_post');
$sth->execute();
$data = $sth->fetchAll();

$headline = $_POST['headline'];
$body = $_POST['body'];

$number = mb_strlen($headline);
var_dump($number);

		
$numberOfLetters = mb_strlen($body); 
var_dump ($numberOfLetters);

if ($numberOfLetters >=10 && $numberOfLetters <= 250 && $number >= 2 && $number <= 50) {
	 
$sql = 'INSERT INTO my_post (headline, body) VALUES (:headline, :body)';
var_dump ($sql);
$stmt= $dbh->prepare($sql);
var_dump ($stmt);
$result = $stmt->execute([
	'headline' => $headline,
	'body' => $body,
]);

} else {
	if ($number < 2) { 
	echo "Заголовок должен быть больше 2 символов";
	}
	if ($number > 50){
	echo "Заголовок должен быть меньше 50 символов";
	}
	if ($numberOfLetters <10) {
	echo "Текст поста должен быть больше 10 символов";
	}
	if ($numberOfLetters > 250) {
	echo "Текст поста должен быть меньше 250 символов";
	}
}
?>