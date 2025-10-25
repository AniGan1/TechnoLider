<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Courses extends CI_Model
{
    public function selects(){ 
        $sql = "SELECT * FROM `courses` ";
        $result = $this->db->query($sql);
        return $result -> result_array();
    }

    public function select($idteacher){ 
        $sql = "SELECT * FROM courses, teachers WHERE teachers.id_course = courses.id_course";
        $result = $this->db->query($sql);
        return $result -> result_array();
    }
}