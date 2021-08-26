<?php 
header('Content-Type: application/json');
date_default_timezone_set('Asia/Kolkata');
require $_SERVER['DOCUMENT_ROOT'].'/assets/includes/default.php';
require $connection;

if(isset($_POST['fetch_details'])){
    $s_id = htmlentities($_POST['id']);
    $details_query = "SELECT CONCAT(fname,' ',lname) as name,phone,email,alt_phone as `phone-2`,section FROM student WHERE s_id = :s_id";
    try{
        $exec_stmt = $con -> prepare($details_query);
        $exec_stmt -> execute(array(":s_id" => $s_id));
        $student = $exec_stmt -> fetch(PDO::FETCH_ASSOC);
        if(!empty($student)){
            $student['success'] = 200;
        }else{
            $student['error'] = 400;
        }
        
        echo json_encode($student);
    }catch(PDOException $e){
        $student = array();
        $student['error'] = 500;
        echo json_decode($student);
    }
}


if(isset($_POST['update_details'])){
    $s_id = strtoupper(htmlentities($_POST['id']));
    $sname = htmlentities($_POST['s_name']);
    $name = explode(' ',$sname); // Fname & Lname

    $email = htmlentities($_POST['s_email']);
    $sphone = htmlentities($_POST['s_phone']);
    $section = htmlentities($_POST['s_section']);
    $alt_phone = htmlentities($_POST['alt_phone']);
    $error_array = array();
    $success_array = array();
    
    
    $email_check_query = "SELECT email FROM student WHERE email = :s_email AND s_id != :s_id";
    $exec_stmt = $con -> prepare($email_check_query);
    $exec_stmt -> execute(array(":s_email" => $email, ":s_id" => $s_id));
    $email_exists = $exec_stmt -> fetch(PDO::FETCH_ASSOC);
    if($email_exists){
        array_push($error_array,"Email already exists");
    }
    
    $phone_check_query = "SELECT phone FROM student WHERE phone = :s_phone AND s_id != :s_id";
    $exec_stmt = $con -> prepare($phone_check_query);
    $exec_stmt -> execute(array(":s_phone" => $sphone,":s_id" => $s_id));
    $phone_exists = $exec_stmt -> fetch(PDO::FETCH_ASSOC);
    if($phone_exists){
        array_push($error_array,"Phone Number already exists");
    }
    
    
    if(!empty($error_array)){
        echo json_encode($error_array);
        exit();
    }else{
        try{
            $update_query = "UPDATE student SET fname = :fname, lname = :lname,email = :email,phone = :phone, alt_phone = :alt_phone,section = :section WHERE s_id = :s_id";
            $exec_stmt = $con -> prepare($update_query);
            if($exec_stmt -> execute(array(":fname" => $name[0], ":lname" => $name[1], ":email" => $email, ":phone" => $sphone,":s_id" => $s_id,":alt_phone" => $alt_phone,":section"=> $section))){
                $success['success_message'] = "Updated Successfully";
                $success['status_code'] = 200;
                echo json_encode($success);
            }
                
        }catch(PDOException $e){
            $error_array = "Something went wrong";
            echo json_encode($error_array);
            exit();
        }
    }
    
}
?>
