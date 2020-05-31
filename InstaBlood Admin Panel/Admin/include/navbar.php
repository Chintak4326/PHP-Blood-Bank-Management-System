<?php
    session_start();
?>
<nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">ADMIN VIEW - INSTA BLOOD</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                         <ul class="nav pull-right top-menu">
                            <li class="dropdown">
                                 <?php if (!empty($_SESSION['username'])) { ?>
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" >
                                        <img alt="" src="images/user.png" style="height: 40px;">
                                        <span class="username"><?php echo $_SESSION['username']; ?></span>
                                        <b class="caret"></b>
                                    </a><?php } else { ?>
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                        <img alt="" src="images/user.png" style="height: 40px;">
                                        <span class="username">Admin</span>
                                        <b class="caret"></b>
                                    </a>
                                    <?php } 
                                ?>
                                <ul class="dropdown-menu extended logout">
                                    <!-- <li><a href="#"><i class="material-icons">person</i>Profile</a></li> -->
                                    <li><a href="signup.php"><i class="material-icons">group</i> Add New Admin</a></li>
                                    <li><a href="logout.php"><i class="material-icons">input</i>Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>