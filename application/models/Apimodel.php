<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apimodel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->db->db_select(DATABASE_NAME);
    }

    public $tablename = "";
    public $jointable = "";

    public function getSingleData($condition = '', $selectedValue = '*')
    {

        if ($condition != '') {
            $query = $this->db->select($selectedValue)
                ->from($this->tablename)
                ->where($condition);
        } else {
            $query = $this->db->select($selectedValue)
                ->from($this->tablename);
        }

        return $query->get()->row();
    }
   

    public function getMultipleData($condition = '', $selectedValue = '*', $limit = 0, $offset = 0)
    {
        if ($limit == 0) {
            if ($condition != '') {
                $query = $this->db->select($selectedValue)
                    ->from($this->tablename)
                    ->where($condition);
            } else {
                $query = $this->db->select($selectedValue)
                    ->from($this->tablename);
            }
        } else {
            if ($condition != '') {
                $query = $this->db->select($selectedValue)
                    ->from($this->tablename)
                    ->where($condition)
                    ->limit($limit, $offset);
            } else {
                $query = $this->db->select($selectedValue)
                    ->from($this->tablename)
                    ->limit($limit, $offset);
            }
        }

        return $query->get()->result();
    }
    public function getMultiple($condition = '', $selectedValue, $limit = 0, $offset = 0)
    {
        if ($limit == 0) {
            if ($condition != '') {
                $query = $this->db->select($selectedValue)
                    ->from($this->tablename)
                    ->where($condition);
            } else {
                $query = $this->db->select($selectedValue)
                    ->from($this->tablename);
            }
        } else {
            if ($condition != '') {
                $query = $this->db->select($selectedValue)
                    ->from($this->tablename)
                    ->where($condition)
                    ->limit($limit, $offset);
            } else {
                $query = $this->db->select($selectedValue)
                    ->from($this->tablename)
                    ->limit($limit, $offset);
            }
        }

        return $query->get()->result();
    }
    public function getMultipleDatawithLimit($condition = '', $limit)
    {
        if ($condition != '') {
            $query = $this->db->select('*')
                ->from($this->tablename)
                ->where($condition)
                ->limit($limit);
        } else {
            $query = $this->db->select('*')
                ->from($this->tablename)
                ->limit($limit);
        }
        return $query->get()->result();
    }


    public function getSingleDataJoin($condition, $selectedValue = '*')
    {
        $this->db->select($selectedValue);
        $this->db->from($this->tablename);
        $this->db->join($this->jointable, $condition);
        $query = $this->db->get();

        return $query->row();
    }

    public function getMultipleDataJoin($condition, $selectedValue = '*')
    {
        $this->db->select($selectedValue);
        $this->db->from($this->tablename);
        $this->db->join($this->jointable, $condition);
        $query = $this->db->get();
        return $query->result();
    }






    public function getMultipleDataJoin1($joins, $select = "*", $conditions = [])
{
    $this->db->select($select);
    $this->db->from($this->tablename);

    // Debugging: Print join structure
    // log_message('debug', 'JOIN INPUT: ' . print_r($joins, true));

    if (!empty($joins) && is_array($joins)) {
        foreach ($joins as $table => $condition) {
            if (is_string($table) && is_string($condition)) {
                $this->db->join($table, $condition, 'left');
            } else {
                log_message('error', 'Invalid join condition detected: ' . print_r($joins, true));
            }
        }
    } else {
        log_message('error', 'Join input is not an array or is empty.');
    }

    if (!empty($conditions)) {
        $this->db->where($conditions);
    }

    $query = $this->db->get();

    // Debug: Print SQL Query
    // log_message('debug', 'SQL QUERY: ' . $this->db->last_query());

    return $query->result();
}

public function getMultipleDataJoin2($joins, $select, $condition) {
    $this->db->select($select);
    $this->db->from($this->tablename);

    // Apply joins
    foreach ($joins as $table => $joinCondition) {
        $this->db->join($table, $joinCondition);
    }

    // Apply conditions
    $this->db->where($condition);

    // Execute the query and return the result
    return $this->db->get()->result();
}




    public function getSingleDataLike($condition = '', $selectedValue = '*')
    {
        if ($condition != '') {
            $query = $this->db->select($selectedValue)
                ->from($this->tablename)
                ->like($condition);
        } else {
            $query = $this->db->select($selectedValue)
                ->from($this->tablename);
        }

        return $query->get()->row();
    }

    public function getMultipleDataLike($condition = '', $selectedValue = '*')
    {
        if ($condition != '') {
            $query = $this->db->select($selectedValue)
                ->from($this->tablename)
                ->like($condition);
        } else {
            $query = $this->db->select($selectedValue)
                ->from($this->tablename);
        }

        return $query->get()->result();
    }

    public function insertData($data)
    {
        $this->db->insert($this->tablename, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function insertData1($data)
    {
        $this->db->insert($this->tablename, $data);
        $insert_id = $this->db->insert_id();
        return  true;
    }
    public function deleteData($data)
    {
        $this->db->delete($this->tablename, $data);
        return  true;
    }

    public function updateData($condition, $data)
    {
        $this->db->where($condition);
        $this->db->update($this->tablename, $data);

        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function login($column, $data)
    {
        $user = $data['user_name'];
        $password = $data['user_pass'];
        $myquery = $this->db->select('*')
            ->from($this->tablename)
            ->where($column, $user);
        $rows = $myquery->row();
        if (isset($rows)) {
            $hash = $rows->password;
            if (md5($password) == $hash) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function user_login($data)
    {
        $email = $data['user_email'];
        $password = $data['user_pass'];
        $myquery = $this->db->query("SELECT * FROM `user` WHERE user_email = '$email'");
        $rows = $myquery->row();
        if (isset($rows)) {
            $hash = $rows->user_pass;
            if (md5($password) == $hash) {
                return $rows;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function admin_login($data)
    {
        
        $user = $data['user_email'];
        $password = $data['user_pass'];
        $myquery = $this->db->query("SELECT * FROM `admin` WHERE user_email = '$user'");
        $rows = $myquery->row();
 
        if (isset($rows)) {
            $hash = $rows->user_pass;
            if (md5($password) == $hash) {
                return $rows;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public function addUser($data)
{
    // First, check if email already exists
    $existingUser = $this->db
        ->select('id')
        ->from($this->tablename)
        ->where('email', $data['email'])
        ->get()
        ->row();

    if ($existingUser) {
        return [
            'status' => false,
            'message' => 'Email already exists.'
        ];
    }

    // Hash the password using MD5
    if (isset($data['password'])) {
        $data['password'] = md5($data['password']);
    }

    // Set default values
    $data['status'] = true;
    $data['delete'] = false;

    // Timestamps
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['modified_at'] = date('Y-m-d H:i:s');

    // Insert the data
    $this->db->insert($this->tablename, $data);

    return [
        'status' => true,
        'insert_id' => $this->db->insert_id(),
        'message' => 'User added successfully.'
    ];
}


}
