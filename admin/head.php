<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Univar Apparel - Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
	<style>
		label{float: left;}
	</style>
	<style>
		.cerror{border:red 1px solid;}
	</style>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><b>Univar</b>Apparel</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="home_redirect.php"> <i class="menu-icon fa fa-home"></i>Home</a>
                    </li>
					
					 <h3 class="menu-title">Browse</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Products</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="viewproducts.php">View Products</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="addproduct.php">Add Products</a></li>     
                        </ul>						
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>User</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="userform.php">User login</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="usertable.php">user information</a></li>     
                        </ul>                       
                    </li>
                
                    <li class="menu-item-has-children dropdown">
                        <a href="employee_message.php"> <i class="menu-icon fa fa-laptop"></i>Messages</a>
                        
                    </li>



					<li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Branch</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="branchform.php">Add branch </a></li>
                            <li><i class="fa fa-id-badge"></i><a href="branchtable.php">Branch information</a></li>
                         
                        </ul>
                    </li>

					<li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Assets</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="assetform.php">Add Assets </a></li>
                            <li><i class="fa fa-id-badge"></i><a href="assettable.php">Asset information</a></li>
                         
                        </ul>
					
					
                    <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Customer</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="customerform.php">customer Registration</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="customertable.php">Customer Informations</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                           
                        </ul>
						
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="orderstable.php"> <i class="menu-icon fa fa-laptop"></i>Orders</a>
                        
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Supplier</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="supplierform.php">Supplier Registration</a></li>
                            <li><i class="fa fa-table"></i><a href="suppliertable.php">Supplier Information</a></li>
                        </ul>
                    </li>
					
		
					 <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Employee</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="employeeform.php">Employee Register</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="employeetable.php">Employee information</a></li>
                         
                        </ul>
						
                    </li>

                    <h3 class="menu-title">Reports</h3><!-- /.menu-title -->

                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Stocks</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa  fa-shopping-cart"></i><a href="products_report.php">Products Availability</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Assets</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa  fa-shopping-cart"></i><a href="asset_report.php">Available Assets</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-arrow-left"></i></a>                 
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="logout_code.php" ><span>Logout </span><i class="fa fa fa-power-off"></i></a>
                        
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->


        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="card">
                    
                    <div class="card-body">

                        <div class="fontawesome-icon-list">