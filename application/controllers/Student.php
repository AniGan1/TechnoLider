<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Student extends CI_Controller
{

    public function person_cabinet()
    {
        $id_role = $this->session->userdata('id_role');
        $id_user = $this->session->userdata('id_user');

        // Проверка авторизации
        if (empty($id_user) || $id_role != 1) {
            redirect('main/index');
            return;
        }

        $this->load->model('students');
        $data['student'] = $this->students->select($id_user);

        if (empty($data['student'])) {
            $this->load->model('groups');

            if (!empty($_POST)) {
                $_POST['id_user'] = $id_user;

                $this->students->insert($_POST);
                $new_student = $this->students->select($id_user);
                $_POST['id_student'] = $new_student['id_student'];

                $this->groups->insert($_POST);

                redirect('student/person_cabinet');
                return;
            } else {
                $data['groups'] = $this->groups->selects();

                $this->load->view('temp/head');
                $this->load->view('temp/navbar_student');
                $this->load->view('student/person_cabinet', $data); // Создайте этот view для формы
                $this->load->view('temp/footer');
                return;
            }
        }

        // Если студент уже существует, показываем его кабинет
        $this->load->model('groups');
        $data['groups'] = $this->groups->selects();
        $data['student'] = $this->students->select($id_user);

        // Проверяем, есть ли у студента группа
        if (!empty($data['student']['id_student'])) {
            $data['group'] = $this->groups->select($data['student']['id_student']);
        }

        $this->load->view('temp/head');
        $this->load->view('temp/navbar_student');
        $this->load->view('student/person_cabinet', $data);
        $this->load->view('temp/footer');
    }

    public function assessments()
    {
        $id_role = $this->session->userdata('id_role');
        $id_user  = $this->session->userdata('id_user');
        $this->load->model('students');
        $data['student'] = $this->students->select($id_user);
        if ($data['student'] < 1) {
            redirect('student/person_cabinet');
        } else {
            $this->load->model('grades');
            $data['grades'] = $this->grades->select($data['student']['id_student']);
            $data['selectGrades'] = $this->grades->selectGrades($data['student']['id_student']);
            $this->load->view('temp/head');
            if (!empty($id_role) &&  $id_role == 1) {
                $this->load->view('temp/navbar_student');
            } else {
                redirect('main/index');
            }
            $this->load->view('student/assessments', $data);
            $this->load->view('temp/footer');
        }
    }

    public function schedule()
    {
        $id_role = $this->session->userdata('id_role');
        $id_user  = $this->session->userdata('id_user');
        $this->load->model('students');
        $data['student'] = $this->students->select($id_user);
        if ($data['student'] < 1) {
            redirect('student/person_cabinet');
        } else {
            $this->load->model('schedules');
            $data['schedules'] = $this->schedules->select($data['student']['id_student']);
            $this->load->view('temp/head');
            if (!empty($id_role) &&  $id_role == 1) {
                $this->load->view('temp/navbar_student');
            } else {
                redirect('main/index');
            }
            $this->load->view('student/schedule', $data);
            $this->load->view('temp/footer');
        }
    }
}
