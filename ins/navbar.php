<?php
        if(isset($_GET['action']) && $_GET['action']=="logout"){
        Session:: destroy2();
    }
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark shadow p-1">
        <a class="navbar-brand" href="#">Bus<span>TICKET</span>Reservation<span>SYSTEM</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"> <i class="far fa-home" aria-hidden="true"></i> HOME <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-question"></i> HOW TO BUY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-users"></i> ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="confirm.php"><i class="far fa-check"></i> CONFIRM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-user-minus"></i> CANCEL
                        TICKET</a>
                </li>


            </ul>
            <div class="logsign">
                <button class="rounded-left" id="" onclick="location.href='login.html'"
                    type="submit"><?php echo Session::get2('User_Name'); ?></button>
                    <a href="?action=logout" style="color:white; font-size:15px;padding:2px; background-color:red">Logout</a>
            </div>
        </div>
    </nav>