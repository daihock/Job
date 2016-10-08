<?php

/**
 * Created by PhpStorm.
 * User: daihock
 * Date: 07.10.2016
 * Time: 23:27
 */

class Request
{
    private $request;
    private $file;

    public function getFile ($req) {
        if ($str = strpos($req, 'http')!== 0) {
            return -1;
        }
        $this->request = $req.'/robots.txt';
        $this->file = fopen($this->request, "r");
        if ($this->file != false) {
            return $this->file;
        } else {
            return -2;
        }
    }
}