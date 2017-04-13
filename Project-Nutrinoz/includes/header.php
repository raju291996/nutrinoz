<div class="header-section nv">
        <div class="mob-div">
            <div class="m-inner-div">
                <div class="left">
                     <li><a href="#" onclick="openNav()"><img src="images/menu-bar.png"/></a></li>
                     <li><a href="#"><img src="images/icon-logo.png" width="32px" height="32px"/></a></li>
                </div>
                <div class="right">
                    <li><a href="#"></a></li>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
        <div class="outer-div">
            <div class="inner-div">
                <div class="n-brand">
                    <div class="n-logo">
                        <a href="index.php"><img src="images/logo_new_icon.png" class="nv-logo" alt="Nutrinoz-logo"/></a>
                    </div>
                </div>
                <div class="n-menu">
                    <div class="n-nav" id="mySidenav">
                        <ul>
                            <li><img src="images/logo_new_icon.png" class="sm-logo"></li>
                            <li><a href="menu.php">menu</a></li>
                            <li><a href="diet-plan.php">diet plan</a></li>
                            <li><a href="#">order</a></li>
                            <li><a href="#">blog</a></li>
                            <li><a href="visit-us.php">visit us</a></li>
                            <?php 
                            if(@!$_SESSION['user_id']){ ?>
                        
                        <li><a href="join-us.php" class="ext-join">join us</a></li>
                        
                        <?php } else{ ?>
                        
                        <li><a href="logout.php">Logout</a></li>
                        
                          <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="clear-crowd"></div>
            </div>
        </div>
    </div>