<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 5/23/16
 * Time: 4:13 PM
 */

class ORM{
    static $attributes = [];
    static $table = "";

    static $idcol = "id";
    static function save($values){
        global $db;
        $table = static::$table;
        $keys = "";
        $vals = "";
        foreach($values as $key=>$value){
            $keys .= "`$key`,";
            $vals .= "'$value',";
        }
        $keys = rtrim($keys, ",");
        $vals = rtrim($vals, ",");
        $sql = "INSERT INTO $table ( $keys) VALUES ( $vals)";
        echo $sql;
        $r = $db->prepare($sql);
        $r->execute();
    }

    static function update($id,$values){
        global $db;
        $table = static::$table;
        $vals = "";
        foreach($values as $key=>$value){
            $vals .= " `$key` = '$value',";
        }
        $vals = rtrim($vals, ",");
        $idcol = static::$idcol;
        $sql = "UPDATE $table SET $vals WHERE `$idcol`= $id";
        $r = $db->prepare($sql);
        $r->execute();
    }
    static function Customupdate($values,$where){
        global $db;
        $table = static::$table;
        $vals = "";
        foreach($values as $key=>$value){
            $vals .= " `$key` = '$value',";
        }
        $vals = rtrim($vals, ",");

        $sql = "UPDATE $table SET $vals WHERE $where";
        echo $sql;
        $r = $db->prepare($sql);
        $r->execute();
    }

    static function all(){
        global $db;
        $table = static::$table;
        $r = $db->prepare("SELECT * FROM $table");
        $r->execute();
        return $r->fetchAll();
    }

    static function search($like,$wh=1){
        if($like == "")
            return static::where($wh);
        $where = "";
        foreach(static::$attributes as $attribute){
            $where .= $attribute." LIKE '%$like%' OR ";
        }

        $where = rtrim($where, " OR");
        $where .= ' AND '.$wh;
        return static::where($where);
    }

    static function where($where=1){
        global $db;
        $table = static::$table;
        $r = $db->prepare("SELECT * FROM $table WHERE $where");
        //echo "SELECT * FROM $table WHERE $where";
        $r->execute();
        return $r->fetchAll();
    }

    static function detele($id){
        global $db;
        $table = static::$table;
        $idcol = static::$idcol;
        $r = $db->prepare("DELETE FROM $table where $idcol=$id");
        echo "DELETE FROM $table where $idcol=$id";
        $r->execute();
    }

    static function get($id){
        global $db;
        $table = static::$table;
        $idcol = static::$idcol;
        $r = $db->prepare("SELECT * FROM $table where $idcol=$id");
        $r->execute();
        return $r->fetch();
    }

}