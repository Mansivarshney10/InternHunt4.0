<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/includes/default.php';
require $connection;
$company_details_query = "SELECT * FROM `IH4_company`";
$company_details_exec = $con -> prepare($company_details_query);
$company_details_exec -> execute();
$company_details = $company_details_exec -> fetchAll(PDO::FETCH_ASSOC);


foreach($company_details as $company){
    $company_id = $company['company_id'];
    echo "<h4>".$company['company_name']."</h4>";
    echo "<p>
        SELECT CONCAT(fname,' ',lname) as name,email,phone,alt_phone,college,course,year,company,profile1,profile2 FROM student t1 JOIN (SELECT s_id,company1 as company, profile1,profile2 FROM `SELECTED_COMPANIES` WHERE company1 LIKE \"$company_id\" UNION SELECT s_id,company2 as company, profile3,profile4 FROM `SELECTED_COMPANIES` WHERE company2 LIKE \"$company_id\" UNION SELECT s_id,company3 as company, profile5,profile6 FROM `SELECTED_COMPANIES` WHERE company3 LIKE \"$company_id\") t2 ON t1.s_id = t2.s_id;
    </p>
    <br>
    ";
}

?>