<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Grades extends CI_Model
{
    public function insert($data)
    {
        $sql = "INSERT INTO `Grades`(`grade_title`, `date`, `type_job`, `id_student`, `id_course`, `id_teacher`) VALUES (?, ?, ?, ?, ?, ?)";
        $result = $this->db->query($sql, array($data['grade_title'], $data['date'], $data['id_AssignmentType'], $data['id_student'], $data['id_course'], $data['id_teacher']));
        return $result;
    }
    public function select($id_student)
    {
        $sql = "SELECT * FROM Grades, teachers, courses, AssignmentTypes WHERE Grades.id_student =  ? AND Grades.id_teacher = teachers.id_teacher 
AND Grades.id_course = courses.id_course AND 
AssignmentTypes.id_AssignmentType = Grades.type_job";
        $result = $this->db->query($sql, array($id_student));
        return $result->result_array();
    }
    public function selects()
    {
        $sql = "SELECT * FROM Grades, teachers, courses, students WHERE students.id_student = Grades.id_student AND
         Grades.id_course = courses.id_course";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function update($array)
    {
        $sql = "UPDATE `Grades` SET `grade_title`= ? WHERE id_grade = ?";
        $result = $this->db->query($sql, array($array['grade_title'], $array['id_grade']));
        return $result;
    }

        public function selectGrades($id_student)
    {
        $sql = "SELECT * FROM Grades, courses WHERE Grades.id_student =  ? AND 
        Grades.id_course = courses.id_course
        ";
        $result = $this->db->query($sql, array($id_student));
        return $result->result_array();
    }
}
