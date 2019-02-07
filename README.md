# self_made_api

CodeIgniterの勉強を兼ねて、簡易的な自作APIの作成。

使用環境

CodeIgniter '3.2.0-dev'　<br>
php 7.1<br>
mysql '5.7'<br><br>
ローカル環境<br>
docker nginx<br>


application/controllers/test.php<br>

APIのロジック<br>

 ```public function json_hello($id = '')<br>
    {<br>
        $this->load->database();<br>
        if($this->input->post()) {<br>
            $id = $this->input->post('id');<br>
            $result = $this->db->query("SELECT * FROM tests WHERE id = {$id}")->row();<br>
        } else {<br>
            $result = $this->db->query("SELECT text FROM tests WHERE id = {$id}")->row();<br>
        }<br>
        header('Access-Control-Allow-Origin: http://localhost:8099');<br>
        header('Content-Type: application/json; charset=utf-8');<br>
        echo json_encode($result);<br>
    }
    
