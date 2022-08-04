<?php

namespace model;

/**
 * Модель для таблицы my_post
 * todo: переименовать таблицу
 */
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

    /**
     * @return bool
     */
    public function isNumberValid()
    {
        if ($this->headlineLength > 2 && $this->headlineLength < 50) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function isNumberOfLetters()
    {
        if ($this->bodyLength >= 10 && $this->bodyLength <= 250) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return array|false
     */
    public static function getAllPosts()
    {
        $db = new Database();
        $sth = $db->dbh->prepare('SELECT * from my_post join user on my_post.author_id=user.id ORDER BY my_post.id DESC');
        $sth->execute();
        $data = $sth->fetchAll();

        return $data;
    }

    /**
     * @return bool
     */
    public function save()
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