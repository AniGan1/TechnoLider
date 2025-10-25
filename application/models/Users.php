<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Users extends CI_Model
{
    public function insertUser($data){ 
        $sql = "INSERT INTO `users`(`login`, `password`, `email`) VALUES (?, ?, ?)";
        $result = $this->db->query($sql, array($data['login'], $data['password'], $data['email']));
        return $result;
    }
    public function selectUser($data){ 
        $sql = "SELECT * FROM users WHERE login = ? AND password = ? ";
        $result = $this->db->query($sql, array($data['login'], $data['password']));
        return $result -> row_array();
    }
}