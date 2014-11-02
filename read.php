<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Janathakshan - DMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Default CSS -->
    <link href="css/default.css" rel="stylesheet">
	<!--- admin CSS--->
    <link href="css/admin.css" rel="stylesheet">

    <!-- Morris Charts CSS 
    <link href="css/plugins/morris.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Drojects where id = ?";
		$sql = "SELECT * FROM Donor where id = ?"; 
		$sql = "SELECT * FROM Contract where id = ?";
		$sql = "SELECT * FROM Program where id = ?";
		$sql = "SELECT * FROM Finacial where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Janathakshan(GTE) Ltd.</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                       <!-------for use profile pic---- <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span> ---->
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>CEO</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Test...test...test...test...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <!------- for use profile pic----<img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span> --->
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Donor</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Test...test...test...test...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <!-- If use user pic-------- <span class="pull-left">
                                        <img class="media-object" src="#" alt="">
                                    </span> --->
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Finacial manager</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Test...test...test...test...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> User <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="adminDboard.php"><i class="fa fa-fw fa-dashboard"></i>	Dashboard</a>
                    </li>
                    <li>
                        <a href="projectInfo.php"><i class="fa fa-fw fa-bar-chart-o"></i> Projects</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-table"></i> Mails</a>
                    </li>
                    <!---<li>
                        <a href="#"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-wrench"></i> Projects</a>
                    </li> --->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Contracts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Program</a>
                            </li>
                            <li>
                                <a href="#">Finacial</a>
                            </li>
                        </ul>
                    </li>
                   <!------ <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li> ----->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Project <small>Full info</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Project
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                

               
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Projects Info.</h3>
                            </div>
                            <div class="panel-body">
                                 <div class="container">
     
                <div class="span10 offset1">
                 
                      <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Project ID: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['PID'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Project Name: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['PName'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Donor ID: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['DID'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Project Status: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Status'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Response people: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Response'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Remarks: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Remarks'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="projectInfo.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
    
                            </div>
                        </div>
                    </div> <!-----/.col--->
                    
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Contract & Donor Info.</h3>
                            </div>
                            <div class="panel-body">
                                 <div class="container">
     
                <div class="span10 offset1">
                                         
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Donor ID: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['DID'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Donor Name: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['DName'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Donor Address: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['DAddress'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Donor Email: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Status'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Contract Approved Date: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['CAppDate'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Donor Remarks: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['DRemarks'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="projectInfo.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
    
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

          		<div class="row">
                <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Finacial Info.</h3>
                            </div>
                            <div class="panel-body">
                                  <div class="container">
     
                <div class="span10 offset1">
                                         
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Finacial ID: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['DID'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">finacial Condition: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['DName'];?>
                            </label>
                        </div>
                      </div>
                                       
                        <div class="form-actions">
                          <a class="btn" href="projectInfo.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
                            <table class="table table-striped table-bordered">
                              <thead>
                    <tr>
                      <th>Fin. Stage</th>
                      <th>Stage Status</th>
                      <th>Transaction ID</th>
                      <th>Transaction Date</th>
                      <th>Due Date</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM PStages ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['FStage'] . '</td>';
                            echo '<td>'. $row['status'] . '</td>';
                            echo '<td>'. $row['TraID'] . '</td>';
                            echo '<td>'. $row['TraDate'] . '</td>';
                            echo '<td>'. $row['DueDate'] . '</td>';
							echo '<td>'. $row['FSRemarks'] . '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
                            </div><!----/.body--->
                         </div><!----/.panel----->
                </div><!--------/.col--->
                </div><!----/.row--->

				<div class="row">
                <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Program Info.</h3>
                            </div>
                            <div class="panel-body">
                                  <div class="container">
     
                <div class="span10 offset1">
                                         
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Program ID: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['DID'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Program Condition: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['DName'];?>
                            </label>
                        </div>
                      </div>
                                       
                        <div class="form-actions">
                          <a class="btn" href="projectInfo.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
                            <table class="table table-striped table-bordered">
                              <thead>
                    <tr>
                      <th>Pro. Stage</th>
                      <th>Stage Status</th>
                      <th>Start Date</th>
                      <th>Due Date</th>
                      <th>Pro. remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM PStages ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['Stage'] . '</td>';
                            echo '<td>'. $row['Status'] . '</td>';
                            echo '<td>'. $row['StartDate'] . '</td>';
                            echo '<td>'. $row['DueDate'] . '</td>';
                            echo '<td>'. $row['PSRemarks'] . '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
                            </div><!----/.body--->
                         </div><!----/.panel----->
                </div><!--------/.col--->
                </div><!----/.row--->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>

</html>
