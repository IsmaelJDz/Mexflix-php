<?php
//Clase Abstracta que nos permitira conectarnos a Mysql
abstract class Model{
    //Atributos
    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = '';
    protected $db_name;
    private static $db_charset = 'utf8';
    private $conn;
    protected $query;
    protected $rows  = array();

    //Métodos
    //métodos abstractos para CRUD de clases que hereden
    abstract protected function set();
    abstract protected function get();
    abstract protected function del();

    //método privado para conectarse a la base de datos;
    private function db_open()
    {
        $this->conn = new mysqli(
            self::$db_host,
            self::$db_user,
            self::$db_pass,
            $this->db_name
        );

        $this->conn->set_charset(self::$db_charset);
    }

    //método privado para desconectarse de la base de datos
    private function db_close()
    {
        $this->conn->close();
    }

    //establecer un query simpre del tipo INSERT, DELETE, updateStateActas
    protected function set_query()
    {
        $this->db_open();
        $this->conn->query( $this->query );
        $this->db_close();
    }

    //obtener datos de un query (SELECT)
    protected function get_query()
    {
        $this->db_open();
        $result = $this->conn->query( $this->query );
        while ( $this->rows[] = $result->fetch_assoc() );
        $result->close();
        $this->db_close();

        return array_pop($this->rows);
    }
}
