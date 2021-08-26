<?php 

require $_SERVER['DOCUMENT_ROOT'].'/assets/includes/default.php';
require $connection;

if($_SESSION['s_id'] && $_SESSION['email']){
  $is_logged_in = true;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>InternHunt 4.0 | Internship Cell - IITM</title>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Spartan&family=Hind:wght@600&display=swap" rel="stylesheet">
  <?php require $header; ?>
</head>
<style>
    html,body{
        scroll-behavior: smooth;
        width:100%;
        margin:0;
    }
    section {
        background:#1d1e21;
    }
    .dist{
        height:50px;
    }
    .gd-wrapper{
        background:#1d1e21;
        background-image:url('https://iitminternware.com/assets/img/ih4/bg.jpg');
        background-size:cover;
        background-repeat:no-repeat;
        height:100vh;
    }
    .gd-logo{
        width:45%;
        transition-duration:3s !important;
        
    }
    .iw-logo{
        width:6rem;
        position:absolute;
        margin-top:-150px;
    }
    .iw-present{
        color:#fff;
        text-shadow: 2px 4px 3px black;
    }
    .custom-text-1{
        color:#FFFFFF;
        font-family:'Hind';
        font-weight:bold;
    }
    
    .scroll-down i{
        font-size:50px;
        color:white;
        font-weight:400;
        margin-top:68vh;
        text-transform:uppercase;
        animation:movedown 2s infinite;
        opacity:0.8;
    }
    .glimpse{
        
        font-family: 'Spartan',sans-serif ;
    }
    .img-glimpse{
        margin:8px;
        width:25%;
    }
    .c-btn{
    font-family: "Roboto", sans-serif;
    font-weight: 500;
    font-size: 14px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 12px 32px;
    border-radius: 50px;
    transition: 0.5s;
    line-height: 1;
    margin: 10px;
    color: #f1932c;
    -webkit-animation-delay: 0.8s;
    animation-delay: 0.8s;
    border: 4px solid #f1932c;
    background:#FFFFFF;
  }
  
  .c-btn:hover {
    background: #f1932c;
    color: #fff;
    text-decoration: none;
    border:4px solid #FFFFFF;
  }
  
  .position-abs{
      position:absolute;
  }
  .left-0{
      left:0;
  }
  .right-0{
      right:0;
  }
  .blob-1{
      width:28%;
      max-width:250px;
      z-index:1;
      transform:rotate(-180deg);
      margin-top:-155px;
  }
  .blob-2{
      opacity:0.2;
      transform:rotate(45deg);
      width:50%;
      max-width:225px;
  }
  .blob-3{
      opacity:0.3;
      width:80%;
      max-width:350px;
      margin-top:-50px;
  }
  .gd-text span{
      padding:7px;
      border-radius:8px;
      transition: all 3s;
  }
  .pos-abs-center{
   margin-left: auto;
  margin-right: auto;
  left: 0;
  right: 0;   
    }
  .gd-text{
      z-index:2;
      font-size:16px;
      color:#FFFFFF;
  }
    
    @keyframes movedown{
        from{margin-top:66vh;}
        to{margin-top:68vh;opacity:0;}
    }
    .gd-heading{
        color: #FFF;
        font-family: 'Spartan',sans-serif ;
    }
    .feedback{
        font-family:'Spartan',sans-serif;
        border-radius:18px;
        border:2px #E71C23 solid;
        padding:15px;
        height:22rem;
        width:20rem;
        text-align:center;
        margin: 28px 8px;
    }
    .feedback i{
        font-size:50px;
        position:absolute;
        margin-top:-48px;
        background:#fffff0;
        margin-left:-25px;
        color:#E71C23;
    }

    .faq-wrapper {
        font-size: 18px;
        min-height: 100vh;
        padding: 10vh 0 0;
        font-family:'Spartan',sans-serif !important;
    }

    .faq-title p {
      padding: 0 190px;
      margin-bottom: 10px;
    }
    
    .faq {
      background: #FFFFFF;
      box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.06);
      border-radius: 4px;
    }
    
    .faq .card {
      border: none;
      background: none;
      border-bottom: 1px dashed #CEE1F8;
    }
    
    .faq .card .card-header {
      padding: 0px;
      border: none;
      background: none;
      -webkit-transition: all 0.3s ease 0s;
      -moz-transition: all 0.3s ease 0s;
      -o-transition: all 0.3s ease 0s;
      transition: all 0.3s ease 0s;
    }
    
    .faq .card .card-header:hover {
        background: rgba(233, 30, 99, 0.1);
        padding-left: 10px;
    }
    .faq .card .card-header .faq-title {
      width: 100%;
      text-align: left;
      padding: 0px;
      padding-left: 30px;
      padding-right: 30px;
      font-weight: 400;
      font-size: 15px;
      letter-spacing: 1px;
      color: #3B566E;
      text-decoration: none !important;
      -webkit-transition: all 0.3s ease 0s;
      -moz-transition: all 0.3s ease 0s;
      -o-transition: all 0.3s ease 0s;
      transition: all 0.3s ease 0s;
      cursor: pointer;
      padding-top: 20px;
      padding-bottom: 20px;
    }
    
    .faq .card .card-header .faq-title .badge {
      display: inline-block;
      width: 22px;
      height: 22px;
      line-height: 14px;
      float: left;
      -webkit-border-radius: 100px;
      -moz-border-radius: 100px;
      border-radius: 100px;
      text-align: center;
      background: #E71C23;
      color: #fff;
      font-size: 12px;
      margin-right: 20px;
    }
    
    .faq .card .card-body {
      padding: 30px;
      padding-left: 35px;
      padding-bottom: 16px;
      font-weight: 400;
      font-size: 16px;
      color: #6F8BA4;
      line-height: 28px;
      letter-spacing: 1px;
      border-top: 1px solid #F3F8FF;
    }
    
    .faq .card .card-body p {
      margin-bottom: 14px;
    }
    .hero-img{
        width:95%;
        max-width:400px;
        display:block;
        margin:9px auto;
    }

    .round-border{
      border-radius:12px;
      width: -moz-max-content;
    }

    .border-white{
      border:4px solid #FFFFFF;
    }
    
    
    @media (max-width: 991px) {
      .faq {
        margin-bottom: 30px;
      }
      .faq .card .card-header .faq-title {
        line-height: 26px;
        margin-top: 10px;
      }
    }

        @media screen and (min-width:1025px){
        .gd-logo{
          max-width:35%;
        }
        }
        @media screen and (max-width:768px){
          .gd-logo{
            margin-top:15%;
          }
                .custom-text-1{
                    font-size:32px;
                }
                .blob-1{
                    width:75%;
                    margin-top:40px;
                    opacity:0.2;
                }
        }
    
        @media screen and (max-width:567px){
        .gd-logo{
            width:90%;
        }
        .iw-present{
            font-size:22px;
        }
        .iw-wrapper{
            
            margin-top:-66px;
        }
        .iw-logo {
            width:4.2rem;
            margin-top: -75px;
        }
       
        .img-glimpse{
            width:90%;
        }
    }    

</style>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
  <?php require $nav; ?>
  <section class="gd-wrapper">
      <div class="dist"></div>
      <div class="gd-logo-wrapper" style="position:absolute;width:100%; height:55%; display: flex; align-items: center; justify-content: center;">
          <div class="iw-wrapper" style="position:absolute;width:100%; display: flex;justify-content: center;margin-top:-89px;">
              
              <img src="https://iitminternware.com/assets/img/logo/logo_w.png" class="iw-logo">
              <!--<h4 class="iw-present" data-aos="fade-down">INTERNWARE PRESENTS</h4>-->
              
          </div> 
    <img class="gd-logo" data-aos="zoom-out-up" data-aos-duration="2000" src="https://iitminternware.com/assets/img/ih4/ih4_logo_white.png" alt="InternHunt 4.0">
          
      </div>
      <h1 class="custom-text-1 text-center" style="margin-top:37vh">08 May 2021</h1>
      <div style="margin:4px auto;padding:12px 6px;width:fit-content" class="round-border border-white">
        <p class="text-white text-center">Entry Fees for participating in InternHunt 4.0 is :</p>
        <p class="text-white text-center">IITM/IINTM/IPITM : <strong> Rs. 100/- only. </strong> </p>
        <p class="text-white text-center">OTHER COLLEGES : <strong> Rs. 120/- only. </strong> </p>
      </div>
      <div class="" style="margin-top:5vh;">
       <?php if($is_logged_in) { 
        include('./detail-verification-modal.php'); 
        ?>

        <center>
            <button class="c-btn" data-toggle="modal" data-target="#exampleModalCenter">Register Now</button>
        </center>


	<form method="post" id="payment-form" action="https://iitminternware.com/paytm_gd/PaytmKit/pgRedirect.php" style="display:none;">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  $_SESSION['s_id']."_".rand(1,50000); ?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
		 		</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="1">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>
        

        <?php } else { ?>
        <center>
          <a href="http://iitminternware.com/login">
            <button class="c-btn">Login</button>
          </a>
            <button class="c-btn">Sign Up</button>
        </center>
        <?php } ?>
      </div>
  </section>
  <section class="glimpse" id="glimpse">
        <!-- <img class="position-abs right-0 blob-1" src="https://iitminternware.com/assets/img/gd21/blob2.png"> -->
          <h3 class="text-white" align="center">Page Under Construction Brooo</h3>
   </section>    
  <?php require $footer; ?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  
  <?php require $footer_js; ?>
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

      const FAQs = [
  {
    question: "What is the GD Competetion?",
    answer:
      "As the name suggests, it is a discussion amidst a group on a given topic where members  dwell upon their speaking, listening and analytical skills to arrive at a conclusion within a stipulated time period to engage and enhance their corporate skill set upon.",
  },
  {
    question: "When is the GD Competition?",
    answer:
      "GD Competition is on the 5th and 6th of March 2021. On March 5, 2021 the GD rounds for all the applicants shall take place, the selected student base shall then proceed with the Extempore round on March 6, 2021",
  },
  {
    question: "How to register for the GD Competition?",
    answer:
      "Visit the profile section on our website that is, iitminternware.com and register yourselves for the event therein or scan the QR Code on the poster that is to be made available to the students on February 21, 2021.",
  },
  {
    question: "When will the registration open ?",
    answer: "Registration fee for GD Competition is ₹25/- only.",
  },
  {
    question: "What is registration fee for the event?",
    answer: "Registration fee for GD Competition is ₹25/- only.",
  },
  {
    question: "Can participants register offline?",
    answer: "No, only online payment is accepted.",
  },
  {
    question: "How is the payment for the GD Competition being accepted?",
    answer:
      "Payment can be made only through Paytm. Participants can make payments through Paytm wallet, UPI and card payment as a part of the Paytm structure. No other payment modes are acceptable.",
  },
  {
    question: "Will on the spot registration be allowed?",
    answer:
      "No. On the spot registration for the participants shall not  be entertained.",
  },
  {
    question: "Will the GD Competition be held offline?",
    answer: "Yes, the GD Competition shall be held offline at the IITM Campus.",
  },
  {
    question: "How will the participants get an entry on March 5-6, 2021?",
    answer:
      "All the participants will be allotted a QR code after the completion of the registration process. On the day of the event, participants are supposed to show in the QR code and get a smooth entry.",
  },
  {
    question: "What is dress code for the event?",
    answer: "Participants should be in a proper formals.",
  },
  {
    question: "What are the rewards for winner?",
    answer:
      "• E-Certificate to be provided to all the present participants.• Top 10 winners will get the golden ticket for InternHunt 4.0 • Top 3 winner will be awarded on stage.",
  },
  {
    question: "What is the Golden Ticket?",
    answer:
      "Golden ticket is a pass for InternHunt 4.0. This ticket allows you to skip GD round in InternHunt and participants can give direct interviews in companies.",
  },
  {
    question: "Is the registration amount refundable?",
    answer: "No, the registration amount is not refundable.",
  },
  {
    question: "Is the registration transferable?",
    answer: "No, only the registered students can take part in the event.",
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