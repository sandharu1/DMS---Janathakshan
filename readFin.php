<?php
    require("database.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }

    $PID = null;
    if ( !empty($_GET['PID'])) {
        $PID = $_REQUEST['PID'];
    }
     
    if ( null==$PID ) {
        header("Location: PinfoFinacial.php");
    } else {
        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $sql = "SELECT * FROM projects INNER JOIN donor ON projects.DID = donor.DID 
                                        INNER JOIN contract ON projects.PID = contract.PID
                                        INNER JOIN financial ON contract.FinID = financial.FinID 
                                        INNER JOIN finstages ON financial.FinID = finstages.FinID WHERE projects.PID = ?";
        $q = $db->prepare($sql);
        $q->execute(array($PID));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        
    }
?>

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
	<!--- admin CSS-->
    <link href="css/admin.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <!-- font awesome animation-->
    <link rel="stylesheet" href="css/font-awesome-animation.min.css"> 

    


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
                <a class="navbar-brand" href="adminDboard.php"><stromg>Janathakshan(GTE) Ltd</stromg> - <small>DocMonSys </small></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user faa-flash animated"></i> <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                     <li>
                        <a href="adminDboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="projectInfo.php"><i class="fa fa-fw fa-building-o"></i> Projects</a>
                    </li>
                    <li>
                        <a href="donorsList.php"><i class="fa fa-fw fa-users"></i> Donors</a>
                    </li>
                                      
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Contracts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="PinfoProgram.php">Program</a>
                            </li>
                            <li class="active">
                                <a href="PinfoFinacial.php">Finacial</a>
                            </li>
                        </ul>
                    </li>
                   <li> <img class="img-responsive" src="Images/logo-default.png"> </li>
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
                            Finacial <small>Full info</small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

                

               
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-pie-chart fa-fw"></i>Projects Finacial Info.</h3>
                            </div>
                            <div class="panel-body">
                                 <div class="container">
     
                <div class="span10 offset1">
                 
                      <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Project ID: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['PID'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Project Name: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['PName'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Donor ID: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['DID'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Project Status: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['PStatus'];?>
                            </label>
                        </div>
                      </div>
                     
                     
                        <div class="form-actions">
                          <a class="btn" href="PinfoFinacial.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
    
                            </div>
                        </div>
                    </div> <!---/.col-->
                    
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Contract | Finacial Info.</h3>
                            </div>
                            <div class="panel-body">
                                 <div class="container">
     
                <div class="span10 offset1">
                                         
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Contract ID: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['ConID'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Finacial ID: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['FinID'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Total Finance: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['TotFinacial'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Remarks: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['PRemark'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="PinfoFinacial.php">Back</a>
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
                      <p>
                    <a href="createFinacial.php" class="btn btn-info">Create</a>
                </p>
                            <table class="table table-striped table-bordered">
                              <thead>
                    <tr>
                      <th>Fin. Stage</th>
                      <th>Stage Status</th>
                      <th>Transaction ID</th>
                      <th>Transaction Date</th>
                      <th>Due Date</th>
                      <th>Remarks</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   
                   $sql = 'SELECT * FROM finstages ORDER BY FinID DESC';
                   foreach ($db->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td class="tablecss">'. $row['FStage'] . '</td>';
                            echo '<td class="tablecss">'. $row['FSStatus'] . '</td>';
                            echo '<td class="tablecss">'. $row['TraID'] . '</td>';
                            echo '<td class="tablecss">'. $row['TraDate'] . '</td>';
                            echo '<td class="tablecss">'. $row['TraDueDate'] . '</td>';
							echo '<td class="tablecss">'. $row['FSRemark'] . '</td>';
							echo '<td width=250>';
                            echo '<a class="btn btn-warning" href="updateFinacial.php?FinID='.$row['FinID'].'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="deleteFinacial.php?FinID='.$row['FinID'].'">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   
                  ?>
                  </tbody>
            </table>
                            </div><!---/.body-->
                         </div><!---/.panel-->
                </div><!---/.col-->
                </div><!---/.row-->

				
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <footer class="footercss">
      <div class="container">
      </i><p class="tx"><i class="fa fa-cubes"></i> TeamV3 &copy; 2014</p>
      </div>
    </footer> <!--/.footer-->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>

</html>
