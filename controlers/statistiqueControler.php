<?php

include_once __DIR__.'/../models/statistique.php';

class statistiqueController extends statistique
{


    public function getcategories()
    {
        $result = $this->getAllcategories();
        return $result;
    }
    public function getusers()
    {
        $result = $this->getAllusers();
        return $result;
    }
    public function getposts()
    {
        $result = $this->getAllposts();
        return $result;
    }
}