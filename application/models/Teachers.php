<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Teachers extends CI_Model
{
    public function insert($data){ 
        $sql = "INSERT INTO `teachers`(`academic_degree`, `job_title`, `contacts_data`, `id_user`, `department`, `id_course`) VALUES (?, ?, ?, ?, ?, ?)";
        $result = $this->db->query($sql, array($data['academic_degree'], $data['job_title'], $data['contacts_data'], $data['id_user'], $data['department'], $data['id_course']));
        return $result;
    }
    public function select($id_user){ 
        $sql = "SELECT * FROM `teachers` WHERE id_user = ?";
        $result = $this->db->query($sql, array($id_user));
        return $result -> row_array();
    }
}