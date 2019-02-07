# self_made_api

CodeIgniterの勉強を兼ねて、簡易的な自作APIの作成。

使用環境

CodeIgniter '3.2.0-dev'　<br>
php 7.1
mysql '5.7'
ローカル環境
docker nginx


application/controllers/test.php

APIのロジック

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
    
