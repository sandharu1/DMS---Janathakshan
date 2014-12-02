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
        header("Location: adminDboard.php");
    } else {
        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
		$sql = "SELECT * FROM projects INNER JOIN donor ON projects.DID = donor.DID 
                                        INNER JOIN contract ON projects.PID = contract.PID
                                        INNER JOIN financial ON contract.FinID = financial.FinID 
                                        INNER JOIN finstages ON financial.FinID = finstages.FinID
                                        INNER JOIN program ON contract.ProID = program.ProID 
                                        INNER JOIN prostages ON program.ProID = prostages.ProID
                                        WHERE projects.PID = ?";
		
		
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
                    <li class="active">
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
                            <li>
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
                            Project <small>Full info</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-building-o"></i> Project
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
                        <label class="control-label">Project Date: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['PDate'];?>
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
                      <div class="control-group">
                        <label class="control-label">Response people: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['Response'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Project Remarks: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['PRemark'];?>
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
                    </div> <!---/.col-->
                    
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Contract | Donor Info.</h3>
                            </div>
                            <div class="panel-body">
                                 <div class="container">
     
                <div class="span10 offset1">
                                         
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Donor ID: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['DID'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Donor Name: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['DName'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Donor Address: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['DAddress'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Donor Email: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['DEmail'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Contract Approved Date: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['ConAppDate'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Donor Remarks: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['DRemark'];?>
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


<div class="container-fluid">
     
        <div class="row">
           <?php
            //scan "uploads" folder and display them accordingly
           $folder = "uploads";
           $results = scandir('uploads');
           foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            
            if (is_file($folder . '/' . $result)) {
                echo '
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="'.$folder . '/' . $result.'" alt="...">
                            <div class="caption">
                            <p><a href="remove.php?name='.$result.'" class="btn btn-danger btn-xs" role="button">Remove</a></p>
                        </div>
                    </div>
                </div>';
            }
           }
           ?>
        </div>
         
         
 
          <div class="row">
            <div class="col-lg-12">
               <form class="well" action="upload.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="file">Select a file to upload</label>
                    <input type="file" name="file">
                    <p class="help-block">Only jpg,jpeg,pdf and docx file with maximum size of 10 MB is allowed.</p>
                  </div>
                  <input type="submit" class="btn btn-lg btn-primary" value="Upload">
                </form>
            </div>
          </div>
    </div> <!-- /container -->


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
                            <label class="checkbox checkboxread">
                                <?php echo $data['FinID'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Finacial Condition: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['FinCond'];?>
                            </label>
                        </div>
                      </div>
                                       
                        <div class="form-actions checkboxread">
                          <a class="btn" href="projectInfo.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
    <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                              <thead>
                    <tr>
                      <th>Fin. Stage</th>
                      <th>Stage Status</th>
                      <th>Transaction ID</th>
                      <th>Transaction Date</th> 
                      <th>Tra. Due Date</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   
                   
                   
                   $sql = "SELECT * FROM finstages ORDER BY FinID";
                    
                   foreach ($db->query($sql) as $row){
                            
                            echo '<tr class="tablecss">';
                            echo '<td>'. $data['FStage'] . '</td>';
                            echo '<td>'. $data['FSStatus'] . '</td>';
                            echo '<td>'. $data['TraID'] . '</td>';
                            echo '<td>'. $data['TraDate'] . '</td>';
                            echo '<td>'. $data['TraDueDate'] . '</td>';
							echo '<td>'. $row['FSRemark'] . '</td>';
                            echo '</tr>';
                   
                   }
                  ?>
                  </tbody>
            </table>
            </div>
                            </div><!---/.body-->
                         </div><!---/.panel-->
                </div><!---/.col-->
                </div><!---/.row-->

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
                            <label class="checkbox checkboxread">
                                <?php echo $data['ProID'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Program Condition: </label>
                        <div class="controls">
                            <label class="checkbox checkboxread">
                                <?php echo $data['ProCond'];?>
                            </label>
                        </div>
                      </div>
                                       
                        <div class="form-actions">
                          <a class="btn" href="projectInfo.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
    <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                              <thead>
                    <tr>
                      <th>Pro. Stage</th>
                      <th>Stage Status</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Due Date</th>
                      <th>Pro. remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   
                   $sql = "SELECT * FROM prostages ORDER BY ProID";
                   foreach ($db->query($sql) as $row) {
                            echo '<tr class="tablecss">';
                            echo '<td>'. $row['PStage'] . '</td>';
                            echo '<td>'. $row['PSStatus'] . '</td>';
                            echo '<td>'. $row['ProStartDate'] . '</td>';
							echo '<td>'. $row['ProEndDate'] . '</td>';
                            echo '<td>'. $row['ProDueDate'] . '</td>';
                            echo '<td>'. $row['PSRemark'] . '</td>';
                            echo '</tr>';
                   }
                   
                  ?>
                  </tbody>
            </table>
            </div>
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
