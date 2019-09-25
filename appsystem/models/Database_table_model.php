<?php
//------------[Model File name : Web_gallery_model.php ]--------------------//
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Database_table_model extends CI_Model
{
    public $dbDriver;
    public function __construct()
    {
        parent::__construct();
        $this->dbDriver = $this->db->dbdriver;
    }

    public function get_table_schema()
    {
        switch ($this->dbDriver) {
            case 'postgre':
                return $this->get_table_schema_postgreSQL();
                break;
            case 'mysqli':
                return $this->get_table_schema_postgreSQL();
                break;

            default:
                // code...
                break;
        }
    }

    public function get_table($table_schema)
    {

        switch ($this->dbDriver) {
            case 'postgre':
                return $this->get_table_postgreSQL($table_schema);
                break;
            case 'mysqli':
                return $this->get_table_MySQL($table_schema);
                break;

            default:
                // code...
                break;
        }

    }

    public function get_column($table_name='')
    {
        switch ($this->dbDriver) {
            case 'postgre':
                return $this->get_column_postgreSQL($table_name);
                break;
            case 'mysqli':
                return $this->get_column_MySQL($table_name);
                break;

            default:
                // code...
                break;
        }

    }



    //========== PRIVATE METHOD =============//

    private function get_table_schema_postgreSQL()
    {
        $sql = "SELECT table_schema
                FROM information_schema.tables
                WHERE table_schema <> 'information_schema'
                	AND table_schema <> 'pg_catalog'
                GROUP BY table_schema
                ORDER BY table_schema";
        return $this->db->query($sql)->result();


    }

    private function get_table_postgreSQL($table_schema='')
    {
        $sql = "SELECT table_schema,table_name
                FROM information_schema.tables
                WHERE table_schema = {$this->db->escape($table_schema)}
                ORDER BY table_schema,table_name";
        return $this->db->query($sql)->result();


    }

    private function get_column_postgreSQL($table_name ='')
    {
        $exp = explode('.', $table_name);
        $schema = $exp[0];
        $table_name = $exp[1];
        $sql = "SELECT column_name, data_type, column_default
                FROM information_schema.columns
                WHERE table_name = {$this->db->escape($table_name)}
                ORDER BY ordinal_position";
        return $this->db->query($sql)->result();

    }

    private function get_table_schema_MySQL()
    {
        $sql = "SELECT * FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME";
        return $this->db->query($sql)->result();


    }


    private function get_table_MySQL($table_schema)
    {
        $sql = "SELECT table_schema,table_name
                FROM information_schema.tables
                WHERE table_schema = {$this->db->escape($table_schema)}
                ORDER BY table_schema,table_name";
        return $this->db->query($sql)->result();
    }

    private function get_column_MySQL($table_name)
    {
        $exp = explode('.', $table_name);
        $schema = $exp[0];
        $table_name = $exp[1];
        $sql = "SELECT column_name, data_type, column_default
                FROM information_schema.columns
                WHERE table_name = {$this->db->escape($table_name)}
                	AND table_schema = {$this->db->escape($schema)}";
        return $this->db->query($sql)->result();

    }



}//END CLASS
