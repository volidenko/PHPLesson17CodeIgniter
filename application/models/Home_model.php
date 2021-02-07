<?php
class Home_model extends CI_Model
{
  function __construct()
  {
    $this->load->database();
  }

  public function getCustomers()
  {
    $res = $this->db->get("customers");
    return $res->result_array();
  }

  public function getUserById($userid)
  {
    $res = $this->db->get_where("customers", array("id" => $userid));
    return $res->result_array();
  }

  public function addImage($data)
  {
    //INSERT INTO Images (itemid, imagePath) VALUS();
    $insert = $this->db->insert("images", $data);
    if ($insert)
      return $this->db->insert_id();
    else return false;
  }

  public function getCategories()
  {
    $this->db->order_by("id");
    $res = $this->db->get("categories");
    return $res->result();
  }

  public function getCategoryById($id)
  {
    $res = $this->db->get_where("categories", array("id" => $id));
    return $res->row();
  }

  public function editCategory($id, $category)
  {
    $this->db->update("categories", array("category" => $category), array("id" => $id));
    //UPDATE Categories SET category= $category WHERE id=$id;
  }

  public function deleteCategory($id)
  {
    $this->db->delete("categories", array("id" => $id));
  }

  public function getFullInfo($id)
  {
    $this->db->delete("categories", array("id" => $id));
  }

  public function getItems()
  {
    $res = $this->db->get('items');
    return $res->result_array();
  }
}
