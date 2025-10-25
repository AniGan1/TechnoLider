<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Groups extends CI_Model
{
    public function insert($array)
    {
        $sql = "INSERT INTO `groupsStudents`( `id_student`, `id_group`) VALUES (?, ?) ";
        $result = $this->db->query($sql, array($array['id_student'], $array['id_StudentGroup'] ));
        return $result;
    }
    public function selects()
    {
        $sql = "SELECT * FROM `StudentGroups` ";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function select($id_student)
    {
        $sql = "SELECT * FROM groupsStudents,StudentGroups WHERE groupsStudents.id_student = ? AND
        groupsStudents.id_group = StudentGroups.id_StudentGroup";
        $result = $this->db->query($sql, array($id_student));
        return $result->result_array();
    }
}
