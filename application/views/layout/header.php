<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>welcome/dashboard" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><i class="fa fa-dashcube" aria-hidden="true"></i></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>My Expenses</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="header-welcome"> Welcome <?php echo $this->session->userdata('name'); ?></div>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <span class="hidden-xs"><a href="<?php echo base_url(); ?>login/logout" class="btn" style="color: white;
              font-size: 15px;
              padding-top: 12px;">Sign out</a></span>

            </ul>
        </div>
    </nav>
</header>