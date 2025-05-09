<?php
class Blog_model extends CI_Model {

    public function get_all() {
        return $this->db->order_by('created_at', 'DESC')->get('blogs')->result();
    }

    public function get($id) {
        return $this->db->get_where('blogs', ['id' => $id])->row();
    }

    public function insert($data) {
        $this->db->insert('blogs', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        return $this->db->update('blogs', $data, ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('blogs', ['id' => $id]);
    }
}

