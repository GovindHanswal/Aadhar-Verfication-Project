<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <!-- Boxicon-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <div class="sidebar jecrc-dashboard active">
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
                    <img src="12345.jpg" alt="">
                    <div class="name_job">
                        <div class="name">Govind Hanswal</div>
                        <div class="job">WEb Devlopement</div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav_list">
            <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Search">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-user'></i>
                    <!----><span class="links_name">Student Details</span>
                </a>
                <span class="tooltip">Student Details</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-package'></i>
                    <span class="links_name">Live Classes</span>
                </a>
                <span class="tooltip">Live CLasses</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-edit'></i>
                    <span class="links_name">Online Exam</span>
                </a>
                <span class="tooltip">Online Exam</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxl-flickr-square'></i>
                    <span class="links_name">Quick Quizez</span>
                </a>
                <span class="tooltip">Quick Quizez</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
            <li>
                <a href="#">
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
        <h1 class="heading">Applied Students</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Aadhar Number</th>
                    <th>Course Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requestList as $list)
                    <tr>
                        <td>{{$list['full_name']}}</td>
                        <td>{{$list['aadhaar_no']}}</td>
                        <td>{{$list['course']}}</td>
                        <td>
                            <a class="approve-btn" href="">Approve</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


<script>
    let btn = document.querySelector('#btn');
    let sidebar = document.querySelector(".sidebar");
    let searchBtn = document.querySelector(".bx-search");
    btn.onclick = function() {
        sidebar.classList.toggle("active");
    }
    searchBtn.onclick = function() {
        sidebar.classList.toggle("active");
    }
</script>


</body>

</html>