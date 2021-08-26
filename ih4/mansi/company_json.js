  const COMPANIES = [
        {
            "company_id": "inception-wave",
            "company_name": "Inception Wave",
            "img_name": "Inception Wave.png",
            "profiles": ["Growth Hacking", "Marketing & Research", "HR Management", "Graphic Design"],
            "jd_name": "Inception Wave Job Description.pdf"
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
            "Marketing Analytics", "Statsitician", "R Programmer", "Data Manipulation", "Big Data", "Python Programmer", "Database Administrator", "Deep Learning", "Image Processing Applied Finance", "Human Resource"],
            "website_link": "http://www.medtoureasy.com/"
        },
        {
            "company_id": "sharekhan",
            "company_name": "Sharekhan",
            "img_name": "Sharekhan.png",
            "profiles": ["Client Acquisition"],
            "jd_name": "Sharekhan JD.pdf"
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
            "company_id": "the-health-company",
            "company_name": "The Health Company",
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
