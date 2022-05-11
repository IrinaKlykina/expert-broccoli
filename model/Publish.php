<?php

namespace model;

class Publish
{
    public $headline;
    public $body;

    public function __construct($post)
    {
        $this->headline = $post['headline'];
        $this->body = $post['body'];

        $this->number = mb_strlen($this->headline);
        $this->numberOfLetters = mb_strlen($this->body);
    }
    public function isNumberValid() {
        if ($this->number > 2 && $this->number < 50) {
            return true;
        } else {
            return false;
        }
    }
    public function isNumberOfLetters() {
    if  ($this->numberOfLetters >= 10 && $this->numberOfLetters <= 250) {
        return true;
    } else {
        return false;
    }
}