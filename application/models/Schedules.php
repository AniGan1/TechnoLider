<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Schedules extends CI_Model
{
    public function selects()
    {
        $sql = "SELECT * FROM Lessons, StudentGroups, courses WHERE Lessons.id_group  = StudentGroups.id_StudentGroup
        AND Lessons.id_course = courses.id_course ;";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function insert($array)
    {
        $sql = "INSERT INTO `Lessons`(`datetime`, `audience`, `id_course`, `id_group`) VALUES (?, ?, ?, ?)";
        $result = $this->db->query($sql, array($array['datetime'], $array['audience'], $array['id_course'], $array['id_StudentGroup']));
        return $result;
    }

        public function select($id_student)
    {
        $sql = "SELECT * FROM groupsStudents, StudentGroups, Lessons, Teachers, Courses WHERE groupsStudents.id_student =  $id_student AND 
          StudentGroups.id_StudentGroup = groupsStudents.id_group AND 
          Lessons.id_group = groupsStudents.id_group AND
          Lessons.id_course = courses.id_course AND
          teachers.id_course =  courses.id_course
          ";
           
        $result = $this->db->query($sql);

        return $result->result_array();
    }
}
