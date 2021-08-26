<?php
header('Content-Type: application/json');
require $_SERVER['DOCUMENT_ROOT'].'/assets/includes/default.php';
require $connection;


if(isset($_POST['selected_companies_submit'])){
    $response_array = array();
    $s_id = htmlentities(trim($_POST['s_id']));
    if(empty($s_id)){
        $response_array['error'] = "Login to your account & Retry";
        echo json_encode($response_array);
        exit();
    }
    $selected_companies_obj = $_POST['selected_companies_obj'];
    $selected_companies = $_POST['selected_companies'];
    $selected_companies_arr = json_decode($selected_companies_obj,true);
    
    $value_array = [];

    $num_of_companies = count($selected_companies_arr);
    $company_values = array_values($selected_companies_arr);
    foreach ($company_values as $company) {
        $company_name = $company['company_name'];
        $profile1 = $company['profile-1'];
        $profile2 = $company['profile-2'];
        array_push($value_array,$company_name,$profile1,$profile2);
    }

    $total_company_and_profiles = 9;
    $current_company_profiles_number = count($value_array);

    $null_array = array_fill($current_company_profiles_number, $total_company_and_profiles - $current_company_profiles_number, NULL);

    $value_array = array_merge($value_array,$null_array);

    if($num_of_companies > 0 && $num_of_companies <= 3){  # Check if companies are not empty and have less than or equal to 3 values
        try{
            $insert_query = "INSERT INTO `SELECTED_COMPANIES`(`s_id`,`company1`, `profile1`, `profile2`, `company2`, `profile3`, `profile4`, `company3`, `profile5`, `profile6`) VALUES (:s_id,:company1, :profile1, :profile2,:company2, :profile3, :profile4,:company3, :profile5, :profile6)";       
            $companies_insert_exec = $con->prepare($insert_query);
            if($companies_insert_exec -> execute(array(":s_id"=>$s_id,":company1"=>$value_array[0],"profile1"=>$value_array[1],":profile2"=>$value_array[2],":company2"=>$value_array[3],":profile3"=>$value_array[4], ":profile4" => $value_array[5],":company3" => $value_array[6], ":profile5" => $value_array[7], ":profile6" => $value_array[8])) ){
                $response_array['success'] = "You've successfully selected the companies";
            }
        }catch(PDOException $e){
            $response_array['error'] = "There was some unexpected error.";
            $response_array['error_detail'] = $e -> getMessage();
        }
    }else{
        $response_array['error'] = "There was some unexpected error.";
        $response_array['error_detail'] = "Number of companies selected is not within the bounds.";
    }
    echo json_encode($response_array);
}

?>
