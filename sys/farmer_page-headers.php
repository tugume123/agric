<nav id="sidebar">
    <div class="sidebar-header">
        <h6>Climacast </h6>
    </div>

    <ul class="list-unstyled components">
        <p></p>
        <li class="active">
            <a href="farmer_dashboard.php" class="fa fa-th">  Farmer Dashboard</a>

        </li>
        
         
       <li>
            <a href="#pageSubmenuRuebaeRamus"  data-toggle="collapse" aria-expanded="false" class="fa fa-thermometer-half dropdown-toggle"> Weather Updates</a>
            <ul class="collapse list-unstyled" id="pageSubmenuRuebaeRamus">
                <li>
                    <!-- <a href="weather_add.php">Add</a> -->
                </li>

                <li>
                    <a href="farmer_weather_view.php">view</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#pageSubmenuRuebae"  data-toggle="collapse" aria-expanded="false" class="fa fa-bug dropdown-toggle"> Pest Control</a>
            <ul class="collapse list-unstyled" id="pageSubmenuRuebae">
                <li>
                    <!-- <a href="pest_add.php">Add</a> -->
                </li>

                <li>
                    <a href="farmer_pest_view.php">view</a>
                </li>
            </ul>
        </li>
        
       
</nav>


<!-- Page Content  -->
<div id="content">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn sm-btn-toggle ">
            <i class="fa fa-align-left"></i>
            <span>Toggle</span>
        </button>
    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php" class="fa fa-power-off">Welcome <?php echo $_SESSION['name'].' '.$_SESSION['surname'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="date_time"></a>
                <script type="text/javascript">window.onload = date_time('date_time');</script>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php" class="fa fa-power-off">logout</a>
            </li>
        </ul>
    </div>
    </div>
</nav>