<?php


class QueryBuilder
{

    protected  $pdo;

    public function __construct($pdo){
           $this->pdo= $pdo;

    }

    public function selectAll($table){


        $statement= $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);


    }

    public function insert($table, $parameters){
        $sql= sprintf('insert into %s (%s) values (%s)',

            $table, implode(',', array_keys($parameters)), ':'.implode(', :', array_keys($parameters))

        );
        try{


            $statement= $this->pdo->prepare($sql);
            $statement->execute($parameters);





        }
        catch(PDOException $e){

        }

    }

    public function selectWhere($table, $condition){
        $sql = "select * from {$table} where ". $condition;

        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e){
            $e.message();
        }
    }
    public function selectWhereSingle($table, $condition,$class){
        $sql = "select * from {$table} where ". $condition;

        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS,$class);
        }
        catch (PDOException $e){
            $e.message();
        }
    }
    public function selectAssoc($table, $condition){
        $sql = "select * from {$table} where ". $condition;

        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e){
            $e.message();
        }
    }




    public function delete($table,$condition){
        $sql= "DELETE FROM {$table} where ".$condition;
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        }
        catch (PDOException $e){
            $e.message();
        }

    }

    public function modify($value, $rowname, $table, $condition){

        $sql="UPDATE {$table} SET {$rowname}='{$value}' WHERE ".$condition;
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            return true;
        }
        catch (PDOException $e){
            $e.message();
            return false;
        }

    }


}