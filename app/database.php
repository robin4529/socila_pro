<?php

    //database conncetion//
    function connect(){
        return new mysqli (HOST, USER, PASS,DB);
    }
    //create database function//

    function create($Sql){

        connect()-> query($Sql);
    }
        //get all data//
        function all($table){
            return  connect()->query("SELECT *FROM {$table}");
            
        }
        //find singel data//

        function find($table, $id)
        {
            $Sql ="SELECT*FROM {$table} WHERE id='$id'";
            
           $data = connect()->query( $Sql);
            return $data->fetch_object();

        }
?>
