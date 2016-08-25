<?php

class Product_model extends CI_Model {
    //Get All Products
    public function get_products(){
        $this->db->select('*');
        $this->db->from('products');
        $query = $this->db->get();

        return $query->result();
    }

    //Get Single Product Details
    public function get_product_details($id){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('id', $id);

        $query = $this->db->get();
        return $query->row();
    }

    // Get Categories
    public function get_categories(){
        $this->db->select('*');
        $this->db->from('categories');
        $query = $this->db->get();

        return $query->result();
    }

    // Get Most Popular
    public function get_popular(){
        $this->db->select('P.*, COUNT(O.id) as total');
        $this->db->from('orders AS O');
        $this->db->join('products AS P','O.id = P.id', 'INNER');
        $this->db->group_by('O.id');
        $this->db->order_by('total','desc');
        $query = $this->db->get();

        return $query->result();
    }

    //Add Order to Database
    public function add_order($order_data){
        $insert = $this->db->insert('orders', $order_data);
        return $insert;
    }
}