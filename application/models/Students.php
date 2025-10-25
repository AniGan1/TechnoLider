<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Students extends CI_Model
{
    public function insert($data)
    {
        $sql = " INSERT INTO `students`( `year_post`, `form_study`, `id_user`, `number_stud_ticket`) VALUES (?, ?, ?, ?)";
        $result = $this->db->query($sql, array($data['year_post'], $data['form_study'], $data['id_user'], $data['number_stud_ticket']));
        return $result;
    }
    public function select($id_user)
    {
        $sql = "SELECT * FROM `students` WHERE id_user = ?";
        $result = $this->db->query($sql, array($id_user));
        return $result->row_array();
    }
    public function selects()
    {
        $sql = "SELECT * FROM `students`";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
