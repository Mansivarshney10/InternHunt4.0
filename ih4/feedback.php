<?php
 require $_SERVER['DOCUMENT_ROOT'].'/assets/includes/default.php';
 require $connection;

$ih4_feedback_query = 'SELECT CONCAT(fname," ",lname) as name,rating,review FROM ih4_feedback, student WHERE (ih4_feedback.s_id = student.s_id AND rating NOT LIKE "null") LIMIT 12';
$ih4_feedback_exec_stmt = $con -> prepare($ih4_feedback_query);
$ih4_feedback_exec_stmt -> execute(); 
$ih4_feedbacks = $ih4_feedback_exec_stmt -> fetchAll(PDO::FETCH_ASSOC);
?>

<html>
    <head>
        <title> Feedback </title>
        <?php require $header ?>
        <!-- <link rel="stylesheet" href="hello.css"> -->
    </head>

    <body>
        <section class="wrapper">
            <h1 class="text-center">InternHunt 4.0 Feedbacks</h1>
            <div class="container">
                <?php foreach($ih4_feedbacks as $ih4_feedback) {
                    // Foreach Body
                ?>
                <!-- Card -->
                <div class="Feedback">
                  <div class="card w-75">
                      <div class="card-body">
                          <h5 class="card-title">Name : <?php echo $ih4_feedback['name'] ?></h5>
                          <p class="card-text">Rating : <?php echo $ih4_feedback['rating'] ?></p>
                          <p class="card-text"><?php echo $ih4_feedback['review'] ?></p>
                      </div>
                  </div>
                </div>
                <!-- Card End -->
                <?php } ?>
            </div>
        </section>
    </body>
    <?php require $footer_js ?>
</html>
