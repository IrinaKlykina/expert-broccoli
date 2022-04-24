<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


function isNumberOdLetterNotSmall($numberOfLetters)
{
    if ($numberOfLetters >=10) {
        return true;
    } else {
        return false;
    }
}
function isNumberOdLetterNotBig($numberOfLetters)
{
    if ($numberOfLetters <= 250) {
        return true;
    } else {
        return false;
    }
}
function isNumberBig($number)
{
    if ($number >= 2) {
        return true;
    } else {
        return false;
    }
}
function isNumberSmall($number)
{
    if ($number <= 50) {
        return true;
    } else {
        return false;
    }
}


include(__DIR__ . 'view/index.html');

$db = new \model\Database();
$data = $db->getAllPosts();
var_dump($data);
die();

$headline = $_POST['headline'];
$body = $_POST['body'];

$number = mb_strlen($headline);
$numberOfLetters = mb_strlen($body);


if (isNumberOdLetterNotSmall($numberOfLetters) && isNumberOdLetterNotBig($numberOfLetters) &&  isNumberBig($number) && isNumberSmall($number)) {
	 
    $sql = 'INSERT INTO my_post (headline, body) VALUES (:headline, :body)';
    $stmt= $dbh->prepare($sql);
    $result = $stmt->execute([
        'headline' => $headline,
        'body' => $body,
    ]);
    print "Ваш пост сохранен";
} else {
	if (!isNumberBig($number)) {
	    echo "Заголовок должен быть больше 2 символов";
	}
	if (!isNumberSmall($number)) {
	    echo "Заголовок должен быть меньше 50 символов";
	}
	if (!isNumberOdLetterNotSmall($numberOfLetters)) {
	    echo "Текст поста должен быть больше 10 символов";
	}
	if (!isNumberOdLetterNotBig($numberOfLetters)) {
	    echo "Текст поста должен быть меньше 250 символов";
	}
}
//MVC - модель, вьюшка, контроллер
?>

