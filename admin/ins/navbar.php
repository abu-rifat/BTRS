<?php
        if(isset($_GET['action']) && $_GET['action']=="logout"){
        Session:: destroy();
    }
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark shadow p-1">
        <a class="navbar-brand" href="#">Bus<span>TICKET</span>Reservation<span>SYSTEM</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto"></ul>
            <div class="logsign">
                <button class="rounded-left" id="" onclick="location.href='login.html'"
                    type="submit"><?php echo Session::get('A_Name'); ?></button>
                    <a href="?action=logout" style="color:white; font-size:15px;padding:2px; background-color:red">Logout</a>
            </div>
        </div>
    </nav>