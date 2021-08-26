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
    <title>Company Selection</title>
    
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Google Font -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
      <?php require $header; ?>

     <style media="screen">
       body{
        background-color: #f0f0f0;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='304' height='304' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='%23ffb3d9' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='%23ff78d4'%3E%3Ccircle cx='769' cy='229' r='5'/%3E%3Ccircle cx='539' cy='269' r='5'/%3E%3Ccircle cx='603' cy='493' r='5'/%3E%3Ccircle cx='731' cy='737' r='5'/%3E%3Ccircle cx='520' cy='660' r='5'/%3E%3Ccircle cx='309' cy='538' r='5'/%3E%3Ccircle cx='295' cy='764' r='5'/%3E%3Ccircle cx='40' cy='599' r='5'/%3E%3Ccircle cx='102' cy='382' r='5'/%3E%3Ccircle cx='127' cy='80' r='5'/%3E%3Ccircle cx='370' cy='105' r='5'/%3E%3Ccircle cx='578' cy='42' r='5'/%3E%3Ccircle cx='237' cy='261' r='5'/%3E%3Ccircle cx='390' cy='382' r='5'/%3E%3C/g%3E%3C/svg%3E");
      }
      .confirmation-tab{
        background:#f2f2f2;
        text-align:center;
        padding:5px;
        transition:height 1s ease;
    }
    .covid-btn{
        border:0;
        margin:0 5px;
        padding:8px 20px;
        box-shadow:0;
        border-radius:1px;
        background:yellow;
    }
    .back-to-top{
        z-index:999 !important;
    }
.confirmation-tab:hover{
  height:18rem !important;
}
.confirmation-tab i{
  right:0;
  margin-right:0px;
  position:absolute;
  margin-top: -39px;
  background:#000;
  
  padding:4px 10px;
  border-radius:5px;
}
#selected-comp{
    text-align:center;
    font-family:'Spartan' , Arial;
    width:55%;
    margin:auto;
}
#selected-comp p {
    background:#FFF222;
    border-radius:4px;
    padding:5px;
}
#submit-comp{
    letter-spacing:1.8px;
    font-family:'Spartan',Arial;
    width: 100%;
    max-width:16rem;
    margin: auto;
}
@media only screen and (max-width: 768px) {
  #selected-comp{
      width:99%;
  }
}
        .company-card{
            height:19rem;
            width:16rem;
            max-width:90%;
            background: #ff9966;  /* fallback for old browsers */
            background: -webkit-linear-gradient(45deg, #ff5e62, #ff9966);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(45deg, #ff5e62, #ff9966); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            display:flex;
            border:1px solid #ff5e62;
            border-radius:12px;
            flex-direction:column;
            align-items:center;
            padding:8px;
            margin:12px 12px;
        }
        .card-title{
          margin-top:10px;
          font-size: 18px;
          padding: 3px;
          color: #ff5e62;
          border-radius: 3px;
          background: #FFFFFF;
          font-family:'Arial';
        }
        .card-image{
          display: flex;
          min-height: 7rem;
          width: 100%;
          background: cornsilk;
          border-radius: 5px;
        }
        .card-image img{
          max-width: 105px;
          display: block;
          object-fit:contain;
          max-height: 7rem;
          margin: 2px auto;
        }
        .content{
          text-align:center;
        }
        .select-btn{
          
        }
        .btn-gradient{
          margin: 8px auto;
          border-radius: 5px;
          padding: 8px 32px;
          color:#ff5e62;
          background:#FFF;
          border:2px solid #ff5e62;
        }
    </style>

  </head>
  <body>
    <header id="header" class="fixed-top">
     <?php require $nav; ?>
     <br><br><br>
<div class="hero">
<div class="img-container d-flex justify-content-center">
  <img src="https://iitminternware.com/assets/img/ih4/hunt2.png" alt="IH4 Logo" width="270"/>
</div>

<br>
<div class="container">
  <h3 align="center">COMPANY SELECTION</h3>
  <p align="center" style="font-size:17px;font-family:Arial;letter-spacing:1.2px;">SELECT UPTO 3 COMPANIES</p>
  <p class="text-center alert alert-warning"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>
Kindly be careful, while choosing your companies and profiles. Once chosen, no request for change shall be entertained</p>
</div>
<div class="row d-flex justify-content-center" id="company-container">
    
</div>

<div class="container">
  <h5 align="center">Selected Companies & Profiles</h5>
  <div id="selected-comp">
    
  </div>
  <button class="btn btn-dark" id="selected-companies-submit" style="display:block;margin:4px auto;">Submit & Proceed to Upload Resume</button>
</div>

<!-- Modal -->
<div class="modal fade" id="attentionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attention</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="font-weight-bold">Registered students to please note that completing all 3 steps - Preference filling, resume uploading & joining respective watsapp group is compulsory so that InternWare team can provide right support. </p>
        <p class="text-center">Student shall not claim any support incase all steps are not completed by May 2 @ 11:30 PM</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</div>
  <?php require $footer; ?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <?php require $footer_js; ?>

  <script>
   $(window).on('load', function() {
        $('#attentionModal').modal('show');
    });

      const COMPANIES = [
        {
            "company_id": "inception-wave",
            "company_name": "Inception Wave",
            "img_name": "Inception Wave.png",
            "profiles": ["Growth Hacking", "Marketing & Research", "HR Management", "Graphic Design"],
            "jd_name": "Inception Wave Job Description.pdf",
            "website_link":"https://www.inceptionwave.in/"
        },
        {
            "company_id": "dynamiser-solutions",
            "company_name": "Dynamiser Solutions",
            "img_name": "dynamisers.png",
            "jd_name": "Dynamiser Solution Job Descriptions.pdf",
            "profiles": ["Business Development", "Content Writing", "Digital Marketing", "Graphic Design", "Online Bidding", "PHP Development", "Product Development", "Shopify Development", "Social Media", "Training Coordinator"],
            "website_link": "http://www.dynamisers.com/"
        },
        {
            "company_id": "omnis-healthcare",
            "company_name": "Omnis Healthcare",
            "img_name": "Omnis logo.jpeg",
            "jd_name": "OMNIS JD.pdf",
            "profiles": ["Finance & Sales/Marketing"],
            "website_link": "http://www.bimaforall.com/"
        },
        {
            "company_id": "dhirati-education",
            "company_name": "Dhirati Education",
            "img_name": "dhirati.jpg",
            "jd_name": "Dhirati Education JD.pdf",
            "profiles": ["Sales Executive", "Marketing", "Business Development", "Video Animator Executive"],
            "website_link": "http://www.dhiratieducation.com/"
        },
        {
            "company_id": "medtoureasy",
            "company_name": "MedTourEasy",
            "img_name": "MTE.jpg",
            "jd_name": "MedTourEasy JD.pdf",
            "profiles": ["Finance", "Quantitative Analyst", "Machine Learning", "Data Scientist", "Cloud Computing", "Data Engineering", "Finance & Business", "Business Analytics", "Business Analyst", "Data Analyst",
            "Marketing Analytics", "Statsitician", "R Programmer", "Data Manipulation", "Big Data", "Python Programmer", "Deep Learning", "Image Processing Applied Finance", "Human Resource"],
            "website_link": "http://www.medtoureasy.com/"
        },
        {
            "company_id": "sharekhan",
            "company_name": "Sharekhan",
            "img_name": "Sharekhan.png",
            "profiles": ["Client Acquisition"],
            "jd_name": "Sharekhan JD.pdf",
            "website_link": "https://www.sharekhan.com/"
        },
        {
            "company_id": "soch-rangmanch",
            "company_name": "Soch Rangmanch",
            "img_name": "Soch Rangmanch.png",
            "jd_name": "Soch Rangmanch JD.pdf",
            "profiles": ["Marketing and Public Relation", "Media Manager", "Human Resourse", "Production Support"],
            "website_link": "http://www.sochtheatregroup.com/"
        },
        {
            "company_id": "insplore",
            "company_name": "Insplore",
            "img_name": "Insplore.png",
            "jd_name": "Insplore JD.pdf",
            "profiles": ["Marketing", "Finance Trainee", "Human Resource"],
            "website_link": "http://www.insploreconsultants.com/"
        },
        {
            "company_id": "education-tree",
            "company_name": "Education Tree",
            "img_name": "The Education Tree.png",
            "jd_name": "The Education Tree JD.pdf",
            "profiles": ["Content Development", "Graphic Designing", "Video Editor"],
            "website_link": "https://www.theeducationtree.com/"
        },
        {
            "company_id": "jazba",
            "company_name": "Jazba",
            "img_name": "Jazba.jpg",
            "jd_name": "Jazba JD.pdf",
            "profiles": ["Public Relations", "Fundraising", "Campus Ambassador", "E-Shishalaya(Virtual Volunteership Programme)", "Social Ambassador", "Graphic designer"],
            "website_link": "https://jazba.co.in/"
        },
        {
            "company_id": "edu4sure",
            "company_name": "Edu4Sure",
            "img_name": "Edu4Sure.png",
            "jd_name": "Edu4sure JD.pdf",
            "profiles": ["HR Consultant", "Research and Strategy", "Business Development", "Entrepreneur in Residence", "content writing and Promotion", "video Editing", "CST Growth Hacker", "Graphir Designing", "Digital Marketing"],
            "website_link": "http://www.edu4sure.com"
        },
        {
            "company_id": "the-healthy-company",
            "company_name": "The Healthy Company",
            "img_name": "The Healthy Company.png",
            "jd_name": "Healthy Company JD.pdf",
            "profiles":["Content writing", "Business Development", "Social media/Digital Marketing"],
            "website_link": "https://www.thehealthycompany.in/"
        },
        {
            "company_id": "knr",
            "company_name": "KNR",
            "img_name": "KNR.png",
            "jd_name": "KNR JD.pdf",
            "profiles":["Research Associate (Executive Search and Talent Mapping)", "International Business Development" ],
            "website_link": "http://www.knrglobal.com/"
        },
        {
            "company_id": "grivaa-capital",
            "company_name": "Grivaa Capital",
            "img_name": "Grivaa.png",
            "jd_name": "Grivva JD.pdf",
            "profiles":["Web Development", "App Development", "Operations"],
            "website_link": "https://www.grivaacapital.com/"
        },
        {
            "company_id": "aim-india",
            "company_name": "Aim India",
            "img_name": "Aim.png",
            "jd_name": "AIM India JD.pdf",
            "profiles":["Marketing", "Marketing + Finance (Dual specialisation)", "Marketing + HR (Dual specialisation)"],
            "website_link": "http://www.aimincorp.com/"
        },
        {
            "company_id": "acuevers",
            "company_name": "Acuevers",
            "img_name": "Acuevers.png",
            "jd_name": "Acuevers JD.pdf",
            "profiles":["BD/Sales", "Web Development", "Graphic Designing", "Content Writing", "Affiliate Marketing"],
            "website_link": "https://www.acuevers.com/"
        },
        {
            "company_id": "the-times-of-india",
            "company_name": "The Times of India",
            "img_name": "TTOI.png",
            "jd_name": "TOI JD.pdf",
            "profiles":["Sales and Marketing"],
            "website_link": "https://www.timesgroup.com/"
        },
        {
            "company_id": "homeflick-wegrow",
            "company_name": "Homeflick Wegrow",
            "img_name": "Homeflic Wegrow.png",
            "jd_name": "WeGrow JD.pdf",
            "profiles":["Content Creation", "Social Media Marketing", "Human Resource Management", "Business Development", "Marketing and Sales"],
            "website_link": "http://www.homeflicwegrow.com"
        },
        {
            "company_id": "smdevops",
            "company_name": "SMDevOps",
            "img_name": "SM DevOps.png",
            "jd_name": "SM DevOps",
            "profiles":["Digital Marketing", "HR Executive", "Project Coordinator", "Lead Generation", "Contant Writing", "Sales"],
            "website_link": "https://smdevops.com/"
        },
        {
            "company_id": "ucliq",
            "company_name": "Ucliq",
            "img_name": "Ucliq.png",
            "jd_name": "Ucliq JD.pdf",
            "profiles":["Seo Expert", "Human Resource", "Graphic Designing", "Content Writing", "Social Media Expert", "Business Developer", "Category Manager", "Videography/ Photography"],
            "website_link": "http://www.ucliq.in/ucliq/"
        }

  ];



  COMPANIES.forEach( ({company_id,company_name,img_name,jd_name,profiles,website_link}) => {
    let profile_options = ``;

    profiles.forEach(profile => {
      profile_options += `
        <option value="${profile}">${profile}</option>
        `;
      
    });
    

        let company_card = `
    <div class="company-card" id="${company_id}">
        <div class="card-image">
            <img src="https://iitminternware.com/2021-22/internhunt 4/images/${img_name}" alt="${company_name}">
        </div>
        <div class="content">
          <a href="${website_link}" target="_blank">
            <h4 align="center" class="card-title">${company_name}  <i class="fa fa-external-link" aria-hidden="true"></i></h4>
          </a>
            <div class="row mb-1">
                <div class="col-5">
                    <label for="profile">Profile 1:</label>
                </div>
                <div class="col-7">
                    <select class="form-control" id="${company_id}-profile-1">
                        ${profile_options}
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="profile">Profile 2:</label>
                </div>
                <div class="col-7">
                    <select class="form-control" id="${company_id}-profile-2">
                        <option value="NA" selected>-</option>
                        ${profile_options}
                    </select>
                </div>
            </div>
            <button class="btn btn-gradient select-btn" id="${company_id}-select-btn">SELECT</button>
        </div>
    </div>`;

    $("#company-container").append(company_card);

      });


    const selected_companies = [];
    const selected_companies_obj = {};

    const updateModal = (obj) => {
      $('.company-modal-body').html('');
      $('#selected-comp').html('');
      if(Object.keys(obj).length > 0){
        for(let key in obj){
          if(obj.hasOwnProperty(key)){
            $('.company-modal-body').append(`<p>${obj[key].company_name}</p>`);
            $('#selected-comp').append(`<p><span style="text-transform:capitalize;font-weight:bold;">${obj[key]['company_name']} </span> : <span style="font-size:14px"> [ Profile-1 : ${obj[key][`profile-1`]} , Profile-2 : ${obj[key]['profile-2']} ]</span></p>`);
          }
        }
      } else {
        $('#selected-comp').html('<p>No Company Selected </p>');
      }
    }

    $(document).on('click', '.unselect-btn', function (e) {
        let company_card_id = e.currentTarget.parentElement.parentElement.id;
        if(selected_companies.includes(company_card_id)){
            let company_index = selected_companies.indexOf(company_card_id);;
            selected_companies.splice(company_index, 1);
            delete selected_companies_obj[company_card_id];
            updateModal(selected_companies_obj);


          
            $(`#${company_card_id}-profile-1`).prop("disabled", false);
            $(`#${company_card_id}-profile-2`).prop("disabled", false);
            $(`#${company_card_id}-select-btn`).html('SELECT').removeClass('unselect-btn').addClass('select-btn');
            $(`#${company_card_id}`).css({'background': 'linear-gradient(45deg, #ff5e62, #ff9966)'}) ;
        }
    });
    
    $(document).on('click','.select-btn',function(e) {
        let company_card_id = e.currentTarget.parentElement.parentElement.id;
        let profile_1 = document.querySelector(`#${company_card_id}-profile-1`).value;
        let profile_2 = document.querySelector(`#${company_card_id}-profile-2`).value;

        if(selected_companies.length == 3){
            alert("You've selected maximum number of companies.");
            return;
        }

        if(selected_companies.indexOf(company_card_id) < 0 && selected_companies.length <= 2){
            let current_company_obj = {
                "company_name": company_card_id,
                "profile-1": profile_1,
                "profile-2": profile_2
            };
            let company_number = selected_companies.length;
            
            selected_companies_obj[company_card_id] = current_company_obj;
            selected_companies.push(company_card_id);

            updateModal(selected_companies_obj);

            $(`#${company_card_id}-profile-1`).prop("disabled", true);
            $(`#${company_card_id}-profile-2`).prop("disabled", true);
            $(`#${company_card_id}-select-btn`).html('SELECTED').removeClass('select-btn').addClass('unselect-btn');
            $(`#${company_card_id}`).css({'background': 'linear-gradient(45deg, #dce35b, #45b649)'}) ;
        }
    });

    $('#selected-companies-submit').on('click', function(){
        if(selected_companies.length > 0 && Object.keys(selected_companies_obj).length > 0){
            $.ajax({
                method: "POST",
                url: "server.php",
                data: {
                    "s_id": "<?php echo $_SESSION['s_id'] ?>",
                    "selected_companies_submit": 1,
                    "selected_companies_obj": JSON.stringify(selected_companies_obj),
                    "selected_companies": selected_companies
                },
                success: function(response){
                    if(response.success){
                      alert(response.success);
                      window.location.href = "https://iitminternware.com/profile";
                    }else{
                      alert(response.error);
                    }
                }
            });
        }else{
            alert("Please select atleast 1 Company");
        }
    });

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
