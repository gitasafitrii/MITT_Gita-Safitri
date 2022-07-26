<?php
class main extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function register($username, $nama, $alamat, $lahir, $email, $password)
    {
        $data_user = array(
            'username' => $username,
            'nama' => $nama,
            'alamat' => $alamat,
            'lahir' => $lahir,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );
        $this->db->insert('tb_user', $data_user);
    }

    function login_user($username, $password)
    {
        $query = $this->db->get_where('tb_user', array('username' => $username));
        if ($query->num_rows() > 0) {
            $data_user = $query->row();
            if (password_verify($password, $data_user->password)) {
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('nama', $data_user->nama);
                $this->session->set_userdata('is_login', TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function cek_login()
    {
        if (empty($this->session->userdata('is_login'))) {
            redirect('Auth');
        }
    }

    //master
    public function tambah_skill($data)
    {
        $this->db->insert('tb_skill', $data);
    }

    public function hapus_skill($id)
    {
        return $this->db->query("UPDATE tb_skill SET hapus = '1' WHERE id = '$id' ");
    }

    public function update_skill($data, $id_skill)
    {
        $this->db->select('*');
        $this->db->from('');
        $this->db->where('', $id_skill);
        $this->db->update('', $data);
    }
}
