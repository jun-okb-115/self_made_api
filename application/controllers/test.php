<?php

/**
 * 
 */
class Test extends CI_Controller
{
    public function index()
    {
        $this->load->database();
        $result = $this->db->query('SELECT * FROM tests')->result();
        // var_dump($result);
        $this->load->view('todo');
    }

    public function hello($id = '')
    {
        echo "hello world";
        $this->load->database();
        $result = $this->db->query("SELECT * FROM tests WHERE id = {$id}")->result();
        echo '<pre>';
        var_dump($result);
        echo '</pre>';
    }

    public function json_hello($id = '')
    {
        $this->load->database();
        if($this->input->post()) {
            $id = $this->input->post('id');
            $result = $this->db->query("SELECT * FROM tests WHERE id = {$id}")->row();
        } else {
            $result = $this->db->query("SELECT text FROM tests WHERE id = {$id}")->row();
        }
        header('Access-Control-Allow-Origin: http://localhost:8099');
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }

    public function try_get()
    {
        echo "get";
    }

    public function try_post()
    {
        echo "post";
    }

    public function php_info()
    {
        phpinfo();
    }

}
