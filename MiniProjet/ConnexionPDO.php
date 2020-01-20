<?php
/**
 * Created by PhpStorm.
 * User: HAFID MOHAMED
 * Date: 31/03/2018
 * Time: 22:29
 */

class ConnexionPDO extends  PDO
{
    private $dbtype = "mysql";
    private $dbhost = "localhost";
    private $dbname = "demo";
    private $dbuser = "root";
    private $dbpass = "";
    private $erreur = "";
    private $db;
    public $conn;
    public function __construct(){
        if(!$this->conn){
            try{
                $this->db = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname,$this->dbuser,$this->dbpass);
                $this->db->exec('SET NAMES utf8');
                $this->conn = true;
            }catch (PDOExeption $e){
                $this->erreur=$e->getMessage();
                $this->conn=false;
            }
        }else{
            $this->conn=true;
        }
    }
    public function getDataBase(){
        return $this->db;}
    public function getErreur(){
        die($this->erreur);}
    public function close(){
        $this->db=null;}

}
?>