<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Lessons extends CI_Model
{
    public function update($array)
    {
        $sql = "UPDATE `Lessons` SET `datetime`= ?,`audience`= ? WHERE id_lesson = ? ";
        $result = $this->db->query($sql, array($array['datetime'], $array['audience'], $array['id_lesson'],));
        return $result;
    }
}
