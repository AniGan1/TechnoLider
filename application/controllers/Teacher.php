<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Teacher extends CI_Controller
{

    public function person_cabinet()
    {
        $id_role = $this->session->userdata('id_role');
        $id_user = $this->session->userdata('id_user');

        $this->load->model('teachers');
        $this->load->model('courses');
        if (!empty($_POST)) {
            $_POST['id_user'] = $id_user;
            $this->teachers->insert($_POST);
            redirect('teacher/person_cabinet');
        } else {
            $data['courses'] = $this->courses->selects();
            $data['teacher'] = $this->teachers->select($id_user);
            $this->load->view('temp/head');
            if (!empty($id_role) &&  $id_role == 2) {
                $this->load->view('temp/navbar_teacher');
            } else {
                redirect('main/index');
            }
            $this->load->view('teacher/person_cabinet', $data);
            $this->load->view('temp/footer');
        }
    }

    public function assessments()
    {
        $id_role = $this->session->userdata('id_role');
        $id_user  = $this->session->userdata('id_user');
        $this->load->model('teachers');
        $data['teacher'] = $this->teachers->select($id_user);
        if ($data['teacher'] < 1) {
            redirect('teacher/person_cabinet');
        } else {
            if (!empty($_POST)) {
                $_POST['date'] = date("y.m.d");
                $_POST['id_teacher'] = $data['teacher']['id_teacher'];
                $this->load->model('grades');
                $this->grades->insert($_POST);
                redirect('teacher/assessments');
            } else {
                $this->load->model('students');
                $data['students'] = $this->students->selects();
                $this->load->model('courses');
                $data['courses'] = $this->courses->select($data['teacher']['id_teacher']);
                $this->load->model('assignmentTypes');
                $data['assignmentTypes'] = $this->assignmentTypes->selects();
                $this->load->model('grades');
                $data['grades'] = $this->grades->selects();
                $this->load->view('temp/head');
                if (!empty($id_role) &&  $id_role == 2) {
                    $this->load->view('temp/navbar_teacher');
                } else {
                    redirect('main/index');
                }
                $this->load->view('teacher/assessments', $data);
                $this->load->view('temp/footer');
            }
        }
    }
    public function schedule()
    {
        $id_role = $this->session->userdata('id_role');
        $id_user  = $this->session->userdata('id_user');
        $this->load->model('teachers');
        $data['teacher'] = $this->teachers->select($id_user);
        if ($data['teacher'] < 1) {
            redirect('teacher/person_cabinet');
        } else {
            if (!empty($_POST)) {
                $this->load->model('schedules');
                $this->schedules->insert($_POST);
                redirect('teacher/schedule');
            } else {
                $this->load->model('groups');
                $data['groups'] = $this->groups->selects();
                $this->load->model('courses');
                $data['courses'] = $this->courses->select($data['teacher']['id_teacher']);
                $this->load->model('schedules');
                $data['schedule'] = $this->schedules->selects();
                $this->load->view('temp/head');
                if (!empty($id_role) &&  $id_role == 2) {
                    $this->load->view('temp/navbar_teacher');
                } else {
                    redirect('main/index');
                }

                $this->load->view('teacher/schedule', $data);
                $this->load->view('temp/footer');
            }
        }
    }
    public function works()
    {
        $id_role = $this->session->userdata('id_role');
        $id_user  = $this->session->userdata('id_user');
        $this->load->model('teachers');
        $data['teacher'] = $this->teachers->select($id_user);
        if ($data['teacher'] < 1) {
            redirect('teacher/person_cabinet');
        } else {
            $this->load->model('assignmentTypes');
            if (!empty($_POST)) {
                $this->assignmentTypes->insert($_POST);
                redirect('teacher/works');
            } else {
                $data['assignmentTypes'] = $this->assignmentTypes->selects();
                $this->load->view('temp/head');
                $this->load->view('temp/navbar_teacher');
                $this->load->view('teacher/assignmentTypes', $data);
                $this->load->view('temp/footer');
            }
        }
    }

    public function editgrade($id_grade)
    {
        if (!empty($_POST)) {
            $_POST['id_grade'] = $id_grade;
            $this->load->model('grades');
            $this->grades->update($_POST);
            redirect('teacher/assessments');
        } else {
            $this->load->view('temp/head');
            $this->load->view('temp/navbar_teacher');
            $this->load->view('teacher/editgrade');
            $this->load->view('temp/footer');
        }
    }

    public function editlesson($id_lesson)
    {
        if (!empty($_POST)) {
            $_POST['id_lesson'] = $id_lesson;
            $this->load->model('lessons');
            $this->lessons->update($_POST);
            redirect('teacher/schedule');
        } else {
            $this->load->view('temp/head');
            $this->load->view('temp/navbar_teacher');
            $this->load->view('teacher/editlesson');
            $this->load->view('temp/footer');
        }
    }
}
