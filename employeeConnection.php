<?php

    require_once 'dbConfig.php';
    class employeeConnection extends DB{

        function getAll(){
            $query = $this->connect()->query('SELECT * FROM employees');

            return $query;
        }

        function getOneById($idEmployee){
            $stmt = $this->connect()->prepare('SELECT * FROM employees where idEmployee = :id');
            $stmt->execute(array(
                ':id' => $idEmployee
            ));

            return $stmt;
        }

        function insert($name,$phone,$email){
            try{
                $conn = $this->connect();
                $stmt= $conn->prepare("INSERT INTO employees (name, phone, email, isActive) VALUES (?,?,?,1)");
                $stmt->execute([$name, $phone, $email]);
                return $conn->commit();
            }catch(PDOException $ex){
                echo("Error".$ex->getMessage());
            }
        }

        function update($id,$name,$phone,$email){
            try{
                $conn = $this->connect();
                $stmt= $conn->prepare('UPDATE employees  SET name=:name, phone=:phone, email=:email WHERE idEmployee=:id');
                $stmt->execute(array(
                    ':id' => $id,
                    ':name' => $name,
                    ':phone' => $phone,
                    ':email' => $email,
                ));
                return $conn->commit();
            }catch(PDOException $ex){
                echo("Error".$ex->getMessage());
            }
        }

        function delete($id){
            try{
                $conn = $this->connect();
                $stmt= $conn->prepare('DELETE FROM employees WHERE idEmployee=:id');
                $stmt->execute(array(
                    ':id' => $id
                ));
                return $conn->commit();
            }catch(PDOException $ex){
                echo("Error".$ex->getMessage());
            }
        }
    }
?>