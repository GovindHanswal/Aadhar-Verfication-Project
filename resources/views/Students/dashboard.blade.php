<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Boxicon-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="sidebar active">
        <div class="logo_contant">
            <div class="logo">
                <i class='bx bxl-heroku'></i>
                <div class="logo_name">Hackethon</div>
            </div>
            <i class='bx bx-menu' id=btn></i>
        </div>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_detail">
                    <!-- <img src="12345.jpg" alt=""> -->
                    <div class="name_job">
                        <div class="name">Student Dashboard</div>
                        <!-- <div class="job">WEb Devlopement</div> -->
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav_list">
             <!-- <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Search">
                <span class="tooltip">Search</span>
            </li>  -->
             <li class="aps">
                <a href="#" class="active-tab">
                    <!-- <i class='bx bx-grid-alt active'></i> -->
                    <i class='bx bx-male active'></i>
                    
                    <span class="links_name active">Student Detail's</span>
                </a>
                <span class="tooltip">Student Detail's</span>
            </li>
            <li class="ws">
                <a href="#">
                <i class='bx bx-time-five'></i>
                    <span class="links_name">Online Exam</span>
                </a>
                <span class="tooltip active">Online Exam</span>
            </li>
            <li class="as">
                <a href="#">
                    <i class='bx bxs-check-square'></i>
                    <span class="links_name">Live Classes</span>
                </a>
                <span class="tooltip active">Live Classes</span>
            </li>
            <li>
                <a href="{{route('logout')}}">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>


        </ul> 
    </div>
    <!--
    <div class="main-div">
        <section class="main">
            <div class="main_top">
                <h1>Courses</h1>
                <i class='bx bxs-book-reader'></i>
            </div>
            <div class="main-courses">
                <div class="card">
                    <i class='bx bx-analyse'></i>
                    <h3>Data Analysis</h3>
                    <p>Join over 2 Millon Student</p>
                    <button>Join</button>
                </div>
                <div class="card">
                    <i class='bx bx-cloud'></i>
                    <h3>Cloud Computing</h3>
                    <p>Join over 1 Millon Student</p>
                    <button>Join</button>
                </div>
                <div class="card">
                    <i class='bx bxl-android'></i>
                    <h3>Android Devlopment</h3>
                    <p>Join over 3 Millon Student</p>
                    <button>Join</button>
                </div>
                <div class="card">
                    <i class='bx bx-data'></i>
                    <h3>SQL</h3>
                    <p>Join over 5 Millon Student</p>
                    <button>Join</button>
                </div>
            </div>

        </section>
        <section class="main">

            <div class="main_top">
                <h3>My courses</h3>
                <i class='bx bx-play-circle'></i>
            </div>
            <div class="main-courses">
                <ul>
                    <li class="active">In Progress</li>
                    <li>Incoming</li>
                    <li>Completed</li>
                </ul>
                <div class="card">
                    <i class='bx bx-analyse'></i>
                    <h3>Web Development</h3>
                    <p>Course in progress..0%</p>
                    <button>View</button>
                </div>
                <div class="card">
                    <i class='bx bx-cloud'></i>
                    <h3>Blockchain Development</h3>
                    <p>Course in progress..0%</p>
                    <button>View</button>
                </div>

            </div>

        </section>
    </div>
-->
    <div class="table-container">
        <h1>Welcome To Student Dashboard !!</h1>

        <div class="student_container">

                <div class="row">
                    <div class="col1">
                        <p><b>Name</b></p>
                    </div>
                    <div class="col2">
                        <p> Govind Hanswal</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col1">
                        <p><b>Date of Birth</b></p>
                    </div>
                    <div class="col2">
                        <p> 22/08/2000</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col1">
                        <p><b>Course</b></p>
                    </div>
                    <div class="col2">
                        <p>MCA Cyber Security</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col1">
                        <p><b>College</b></p>
                    </div>
                    <div class="col2">
                        <p>Jaipur National University</p>
                    </div>
                </div>
                
        </div>
    </div>

    <script> 
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector(".sidebar");
        let searchBtn = document.querySelector(".bx-search");
        let aps=document.querySelector(".links_name");
        let bx=document.querySelector(".bx");

      
        btn.onclick = function() { 
            sidebar.classList.toggle("active");
        }
        searchBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        aps.onclick = function(){
            links_name.classList.toggle("active");
        }
        bx.onclick = function(){
            bx.classList.toggle("active");
        }
      

    </script>
</body>

</html> 