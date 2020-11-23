<?php

    include_once 'employeeConnection.php';
    include_once 'employeeModel.php';

    function getAll(){
        $employeeConnection = new employeeConnection();
        $employees['data'] = array();

        $result = $employeeConnection->getAll();

        if($result != null){
            foreach($result as $item){
                $employee = new employee($item["idEmployee"],$item["name"],$item["phone"],$item["email"],$item["isActive"]);
                array_push($employees['data'],$employee);
            }
            echo json_encode($employees);
        }else{
            echo "Not Found";
        }
    }

    function getOneById(){
        $employeeConnection = new employeeConnection();
        $employees['data'] = array();

        $result = $employeeConnection->getOneById($_GET['id'])->fetchAll();

        if($result != null){
            foreach($result as $item){
                $employee = new employee($item["idEmployee"],$item["name"],$item["phone"],$item["email"],$item["isActive"]);
                array_push($employees['data'],$employee);
            }
            echo json_encode($employees);
        }else{
            echo "Not Found";
        }
    }

    function insert(){
        $employeeConnection = new employeeConnection();

        $isSucces = $employeeConnection->insert($_POST['name'],$_POST['phone'],$_POST['email']);

        if($isSucces){
            echo json_encode(["Ok"=>true]);
        }
    }

    function update(){
        $employeeConnection = new employeeConnection();

        $isSucces = $employeeConnection->update($_GET["id"],$_POST['name'],$_POST['phone'],$_POST['email']);

        if($isSucces){
            echo json_encode(["Ok"=>true]);
        }
    }

    function delete(){
        $employeeConnection = new employeeConnection();

        $isSucces = $employeeConnection->delete($_GET["id"]);

        if($isSucces){
            echo json_encode(["Ok"=>true]);
        }
    }

    $method = $_SERVER['REQUEST_METHOD'];

    switch($method){
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'),true);
            insert();
            break;
        case 'GET':
            if($_GET['id'] != null && $_GET['id'] != 0 ){
                getOneById();
            }else{
                getAll();
            }
            break;
        case 'PUT':
            $_POST = json_decode(file_get_contents('php://input'),true);
            update();
            break;
        case 'DELETE':
            delete();
            break;
    }
?>

