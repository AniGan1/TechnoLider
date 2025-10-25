<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class AssignmentTypes extends CI_Model
{
    public function insert($array)
    {
        $sql = "INSERT INTO `AssignmentTypes`( `title_types`, `weight`) VALUES (?, ?) ";
        $result = $this->db->query($sql, array($array['title'], $array['weight']));
        return $result;
    }
    public function selects()
    {
        $sql = "SELECT * FROM `AssignmentTypes` ";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
