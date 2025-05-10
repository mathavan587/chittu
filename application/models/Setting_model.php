<?php
class Setting_model extends CI_Model {

    public function get_all() {
        return $this->db->get('settings')->result();
    }

    public function get($id) {
        return $this->db->get_where('settings', ['id' => $id])->row();
    }

    public function insert($data) {
        $this->db->insert('settings', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id)->update('settings', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id)->delete('settings');
    }
}
