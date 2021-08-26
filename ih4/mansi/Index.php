<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/includes/default.php';
require $connection;

if($_SESSION['s_id'] && $_SESSION['email']){
  $is_logged_in = true;
  $s_id = $_SESSION['s_id'];
  $is_enrolled_ih4_query = "SELECT s_id FROM `IH4` WHERE s_id LIKE :s_id";
  $is_enrolled_ih4_exec = $con -> prepare($is_enrolled_ih4_query);
  $is_enrolled_ih4_exec -> execute(array(":s_id" => $s_id));
  $is_enrolled_ih4 = $is_enrolled_ih4_exec -> fetch();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>InterHunt 4.0</title>
    <!--<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />-->

    <link rel="stylesheet" href="hunt.css">
    <link href="https://iitminternware.com/assets/css/OwlCarousel2/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://iitminternware.com/assets/css/OwlCarousel2/dist/assets/owl.theme.default.css" rel="stylesheet">
    <link href="https://iitminternware.com/assets/css/OwlCarousel2/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- js -->


    <!-- Google Font -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
      <?php require $header; ?>

      <!-- sponsors Image styling -Mansi Varshney -->
     <style media="screen">

      .gradient:after {
        background: linear-gradient(to bottom, #2c1bce4f 20%, #669965 87%);
      }

      #Sponsor1:before {
        background: 50% -10px / 300px url('./images/BD.png');
        z-index: 2;
      }

      #Sponsor2:before {
        background: 50% -10px / 300px url('./images/Ipu buzz.png');
        z-index: 2;
      }

      #Sponsor3:before {
        background: 50% -10px / 300px url('./images/Final Revise.png');
        z-index: 2;
      }

      #Sponsor4:before {
        background: 50% -10px / 300px url('./images/Brand Factory.png');
        z-index: 2;
      }

      #Sponsor5:before {
        background: 50% -10px / 300px url('./images/DU.png');
        z-index: 2;
      }

      #Sponsor6:before {
        background: 50% -10px / 300px url('./images/TDS.png');
        z-index: 2;
      }

      #Sponsor7:before {
        background: 50% -10px / 300px url('./images/Yocket.png');
        z-index: 2;
      }
      /* #Yochet {
        padding-top: -50px;
        background-color: white;
      } */

      #Sponsor8:before {
        background: 50% -10px / 300px url('./images/Official.png');
        z-index: 2;
      }

      #Sponsor9:before {
        background: 50% -10px / 300px url('./images/DU Club.png');
        z-index: 2;
      }

      #Sponsor10:before {
        background: 50% -10px / 300px url('./images/Insightone.jpg');
        z-index: 2;
      }

      .text1 {
        padding-top: 100px !important;
      }

      </style>
      <!-- ENDS -->

  </head>
  <body>
    <header id="header" class="fixed-top header-transparent">
     <?php require $nav; ?>
<div class="ih4-wrapper">
    <!--<span class="rings ring"></span>-->
      <!--<span class="rings ring-2"></span>-->
    <div class="background">

      <div class = "center">
    <div class="logo-w">
        <img class = "image" src = "images/huntwht.png" alt = "" width = "40%">
    </div>
    <h3 class = "heading3">8<sup>th</sup> May, 2021</h3>
       <?php
        if($is_logged_in && !$is_enrolled_ih4) {
            $opening_time = "11 April 2021 11:00 AM";
            $closing_time = "01 May 2021 6:00 PM";
            if($_SESSION['year'] == 1 && ($_SESSION['college'] == "IITM" || $_SESSION['college'] == "IINTM" || $_SESSION['college'] == "IPITM")){
                echo "<button class='border-button'>Eligibilty Criteria not met. Read the FAQs for more</button>";
            }
            else if(strtotime('now') > strtotime($opening_time)){
             include('./includes/detail-verification-modal.php');
             include('./includes/payment_form.php');
             echo '<button id = "submitBtn" class = "ih4-btn animated fadeInUp" type="button" data-toggle="modal" data-target="#exampleModalCenter">Register Now</button>';
            }else if(strtotime('now') < strtotime($opening_time)){
                echo '<button id = "submitBtn" class = "ih4-btn animated fadeInUp">Registrations Begin @ 12 April 11 AM</button>';
            }else if(strtotime('now') > strtotime($closing_time)){
                echo '<button id = "submitBtn" class = "ih4-btn animated fadeInUp">Registrations Closed</button>';
            }else{
                echo '<button id = "submitBtn" class = "ih4-btn animated fadeInUp">Registrations down for maintainence</button>';
            }
        } else if($is_logged_in && $is_enrolled_ih4){
            echo '<a href="https://iitminternware.com/profile"><button class = "border-button animated fadeInUp">You\'re successfully registered. View Pass</button></a>';
        }
        else { ?>

        <center>
          <a href="https://iitminternware.com/login">
            <button class="border-button">Login</button>
          </a>
          <a href="https://iitminternware.com/form">
            <button class="border-button">Sign Up</button>
          </a>
        </center>
        <?php
        }
        ?>
    <i class="bi bi-chevron-double-down"></i>
      </div>
    </div>


 <?php include "./includes/recruiters_section.php" ?>

  <!-- Previous InternHunts -->
  <section class="">
      <div class="text-center pb-3">
        <h2 class="section-heads" style="line-height:3.7rem">PREVIOUS INTERNHUNTS</h2>
      </div>
      <hr style="width:6rem;background-color:#E71C23;">
      <div class="cards-container">
  <div class="gradient-card">
    <span></span>
    <div class="content">
      <h2>InternHunt 3.0</h2>
      <p>Our recent event, Virtual Internship Fair attracted more than 700 students in an attempt to help students grab the opportunity of having corporate exposure, an Internship where they can learn and grow. </p>
      <a href="https://iitminternware.com/internhunt3">
          Know More
       </a>
    </div>
  </div>

  <div class="gradient-card">
    <span></span>
    <div class="content">
      <h2>InternHunt 2.0</h2>
      <p>One of the successful event of internware. Where internware provided internships to the student in a large number yet again.</p>
      <a href="https://iitminternware.com/events/internhunt2" target="_blank">Know More</a>
    </div>
  </div>

  <div class="gradient-card">
    <span></span>
    <div class="content">
      <h2>InternHunt 1.0</h2>
      <p>The very first flagship event of Internware. Internhunt 1.0 was a internship fair where 18+ renowned and startup companies came to hire interns.</p>
      <a href="https://iitminternware.com/events/internhunt1" target="_blank">Know More</a>
    </div>
  </div>
</div>
  </section>
    <section class="faq-wrapper" >
      <div class="container">
            <div class="row">
                  <!-- ***** FAQ Start ***** -->
                    <div class="col-md-6 offset-md-3">

                        <div class="faq-title text-center pb-3">
                            <h2 class="section-heads" style="line-height:3.7rem">FREQUENTLY ASKED QUESTIONS</h2>
                        </div>
                        <hr style="width:6rem;background-color:#E71C23;">
                    </div>
                    <div class="col-md-12" style="z-index:22;">
                        <div class="faq" id="accordion"></div>

                    </div>
                  </div>
                </div>
  </section>
  </div>
    <?php require $footer; ?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <?php require $footer_js; ?>

  <?php if($is_logged_in && !$is_enrolled_ih4) { ?>

  <script>
  const processPaymentButton = (e) => {
    if(e.checked){
      $('#payment-btn').prop('disabled', false);
      $("#payment-btn").attr("disabled", false);
    }else{
      $('#payment-btn').prop('disabled', true);
      $("#payment-btn").attr("disabled", true);
    }
  }
      $('#payment-btn').on('click', () => {
        $('#payment-form').submit();
      }) ;
  </script>
  <script src="./includes/ih4_script.js"></script>
  <script>
        fetchDetails("<?php echo $_SESSION['s_id'] ?>");
  </script>
  <?php } ?>
  <script src="https://iitminternware.com/assets/css/OwlCarousel2/dist/owl.carousel.min.js"></script>
    <script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                margin: 10,
                responsiveClass: true,
                autoplay:true,
                autoplayTimeout:4000,
                autoplayHoverPause:true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true,
                    dots:true,
                    dotsEach:true,
                    margin:30
                  },
                  600: {
                    items: 2,
                    nav: true,
                    margin:30
                  },
                  1000: {
                    items: 3,
                    nav: true,
                    loop: true,
                    margin: 20
                  }
                }
              })
            })
    </script>

  <script>

          const FAQs = [
  {
    question: "What is InternHunt?",
    answer:"InternHunt is the annual flagship event of a InternWare wherein internships are provided to the students to embark the necessary corporate exposure."
  },
  {
    question: "When is InternHunt 4.0?",
    answer: "InternHunt 4.0 will be held on May 8, 2021."
  },
  {
    question: "Will InternHunt 4.0 be an online event?",
    answer: "Yes, InternHunt 4.0 will be an online event and will take place on May 8, 2021 in a virtual setback.",
  },
  {
    question: "When will the registrations start?",
    answer: "The Registrations for InternHunt 4.0 are wide and open till May 1, 2021.",
  },
  {
    question: "How to register for InternHunt 4.0?",
    answer: "The Registrations for InternHunt 4.0 are live and thereon the students can register for the same by visiting our website www.iitminternware.com to register themselves.",
  },
  {
    question: "What is the registration fee for the event?",
    answer:  "Registration fee for IITM/IINTM/IPITM colleges will be ₹100/- and for other colleges the fee shall be ₹120/-",
  },
  {
    question: "What form of payment method is accepted?",
    answer:  "Only Online Payment methods are accepted for registering in InternHunt 4.0.",
  },
  {
    question: "What kind of payment method is accepted?",
    answer: "Payments can be made using UPI/Debit Card/Credit Card/Net Banking through your Paytm Account.",
  },
  {
    question: "Can the participants register offline?",
    answer: "No, the participants cannot register offline.",
  },
  {
    question: "Will on the spot registrations be allowed",
    answer: "No, on the spot registrations aren’t allowed, thereforth students are requested to participate within the stipulated time period.",
  },
  {
    question: "What should the participants prepare for the personal interviews ??",
    answer:  "The participants should prepare their resumes for the personal Interviews.",
  },
  {
    question: "Can any College student register for the event?",
    answer:  "Yes",
  },
  {
    question: "Can any First year students from IPU university register for InternHunt 4.0?",
    answer: "No, First Year students from the IPU University cannot register for the event.",
  },
  {
    question: "Is the registration amount refundable?",
    answer: "No the registration amount is not refundable.",
  },
  {
    question: "Is the registration amount transferable?",
    answer: "No, only the registered students can take part in the event.",
  },
  {
    question: "What will be the time period of the internship!? ",
    answer: "The time period for which the company assigns an intern varies from one company to another. The basic time period shall revolve around the candidates summer internship, ie, 45-60 days.",
  },
  {
    question: "How will the candidates know about their selection?",
    answer: "You will receive updates on InternWare’a website alongside the letter of intent on your mail (if selected)",
  },
  {
    question: "How many companies can a participant go for?",
    answer: "Students can choose upto 4 companies for the Personal Interview.",
  },
  {
    question: "How many companies are there in InternHunt 4.0?",
    answer: "20+",
  },
  {
    question: "How many profiles are there?",
    answer: "More than 12 profiles are necessitated for the participants",
  },
  {
    question: "What is the dress code for the event?",
    answer: "Participants are requested to be in a formal attire.",
  },
];


FAQs.forEach(({ question, answer }, index) => {
  let faqAccordion = `<div class="card">
                                <div class="card-header" id="faqHeading-${index}">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-${index}" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                            <span class="badge">${
                                              index + 1
                                            }</span>${question}
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-${index}" class="collapse" aria-labelledby="faqHeading-${index}" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>${answer}</p>
                                    </div>
                                </div>
                            </div>`;
  $("#accordion").append(faqAccordion);
});

  </script>
  </body>
</html>
