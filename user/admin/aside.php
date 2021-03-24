<?php

?>

<aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
        <!-- begin sidebar branding-->
        <img class="admin-brand-logo">LOGO TEAM </img>
        <!-- end sidebar branding-->
        <div class="ml-auto">
            <!-- sidebar pin-->
            <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
            <!-- sidebar close for mobile device-->
            <a href="#" class="admin-close-sidebar"></a>
        </div>
    </div>
    <div class="admin-sidebar-wrapper js-scrollbar">
        <ul class="menu">
            <li class="menu-item active ">
                <a href="#" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Homescreen
                        </span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder fe fe-activity "></i>
                    </span>
                </a>
            </li>
            <li class="menu-item ">
                <a href="#" class="open-dropdown menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Dashboard
                        </span>

                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder fe fe-edit "></i>
                    </span>
                </a>
            </li>
            <li class="menu-item active opened">
                <a href="#" class="open-dropdown menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Manage System
                            <span class="menu-arrow"></span>
                        </span>

                    </span>
                    <span class="menu-icon">
                        <i class="mdi mdi-buffer mdi-24px "></i>
                    </span>
                </a>
                <!--submenu-->
                <ul class="sub-menu" style="display: block;">

                    <li class="menu-item ">
                        <a href="/light/" class=" menu-link">
                            <span class="menu-label">
                                <a href="./listOfUser.php"> <span class="menu-name">Manage Account</span></a>
                            </span>
                            <span class="menu-icon">
                                <i class="mdi mdi-account-multiple mdi-24px "></i>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="manage-facutlies.php" class=" menu-link">
                            <span class="menu-label">
                                <a href="./manage_facutlies.php"><span class="menu-name">Manage Faculty</span></a>
                            </span>
                            <span class="menu-icon">
                                <i class="mdi mdi-briefcase mdi-24px "></i>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="./manage-topics.php" class=" menu-link">
                            <span class="menu-label">
                                <a href="./add-topic.php"><span class="menu-name">Manage Topic</span></a>
                            </span>
                            <span class="menu-icon">
                                <i class="mdi mdi-book-open-variant mdi-24px "></i>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="/light/dashboard-03" class=" menu-link">
                            <span class="menu-label">
                                <span class="menu-name">Manage User</span>
                            </span>
                            <span class="menu-icon">
                                <i class="mdi mdi-book-open-variant mdi-24px "></i>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="./manage-articles.php" class=" menu-link">
                            <span class="menu-label">
                                <a href="./viewReportPage.php"> <span class="menu-name">Manager Article</span></a>
                            </span>
                            <span class="menu-icon">
                                <i class="mdi mdi-file mdi-24px "></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>