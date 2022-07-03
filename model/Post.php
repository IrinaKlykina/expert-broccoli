<?php

namespace model;

class Post
{
    public $headline;
    public $body;
    public $headlineLength;
    public $bodyLength;

    public function __construct($post)
    {
        $this->headline = $post['headline'];
        $this->body = $post['body'];

        $this->headlineLength = mb_strlen($this->headline);
        $this->bodyLength = mb_strlen($this->body);
    }

    public function isNumberValid()
    {
        if ($this->headlineLength > 2 && $this->headlineLength < 50) {
            return true;
        } else {
            return false;
        }
    }

    public function isNumberOfLetters()
    {
        if ($this->bodyLength >= 10 && $this->bodyLength <= 250) {
            return true;
        } else {
            return false;
        }
    }
    public function temp()
    {
        $db = new Database();

        $sql = 'INSERT INTO my_post (headline, body, author_id) VALUES (:headline, :body, :author_id)';
        $stmt = $db->dbh->prepare($sql);
        $result = $stmt->execute([
            'headline' => $this->headline,
            'body' => $this->body,
            'author_id' => 1,
        ]);
        return $result;
    }
}