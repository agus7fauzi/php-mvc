<?php

/*
* @class Books_model
*
*@version 0.0.1
*/

class Books_model
{
    /*
    * @property string $table
    */
    private $table = 'php_mvc__books';

    /*
    * @property \Database $db
    */
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBook()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function getBookById($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id=:id");
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function addABook($data)
    {

        $query = "INSERT INTO $this->table
                    VALUES
                    ('', :title, :author, :price, :image)";

        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('author', $data['author']);
        $this->db->bind('price', $data['price']);
        $this->db->bind('image', $data['image']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteABook($id)
    {

        $query = "DELETE FROM $this->table WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getImgById($id)
    {
        $query = "SELECT image FROM $this->table WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->single();
    }
}
