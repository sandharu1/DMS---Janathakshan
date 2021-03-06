<?php
     
    require("database.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
 
    if ( !empty($_POST)) {
        // keep track validation errors of projects table
        $PIDError = null;
        $DIDError = null;
        $PNameError = null;
        $PStatusError = null;
        $ResponseError = null;
		$PRemarkError = null;
		$TotFinacialError = null;
		$PDateError = null;
		
        // keep track post values of projects table
        $PID = $_POST['PID'];
        $DID = $_POST['DID'];
        $PName = $_POST['PName'];
        $PStatus = $_POST['PStatus'];
        $Response = $_POST['Response'];
		$PRemark = $_POST['PRemark'];
		$TotFinacial = $_POST['TotFinacial'];
		$PDate = $_POST['PDate'];
		
        // validate input on new project
        $valid = true;
        if (empty($PID)) {
            $PIDError = 'Enter Project ID';
            $valid = false;
        }
        
         if (empty($DID)) {
            $DIDError = 'Enter Donor ID';
            $valid = false;
        }

        if (empty($PName)) {
            $PNameError = 'Enter Project Name';
            $valid = false;
        }
		
		if ( empty($PStatus)) {
            $PStatusError = 'Enter Project Status';
            $valid = false;
        }
         
        if (empty($Response)) {
            $ResponseError = 'Enter Project Responsor';
            $valid = false;
        }
		 if (empty($PRemark)) {
            $PRemarkError = 'Enter Project Responsor';
            $valid = false;
        }
        if (empty($TotFinacial)) {
            $TotFinacialError = 'Enter P. Total Finacial Amount';
            $valid = false;
        }
		if (empty($PDate)) {
            $PDateError = 'Enter Project Date';
            $valid = false;
        }
		
        // insert data into projects table
        if ($valid) {
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO projects (PID,DID,PName,PStatus,Response,PRemark,TotFinacial,PDate) values (?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $db->prepare($sql);
            $q->execute(array($PID,$DID,$PName,$PStatus,$Response,$PRemark,$TotFinacial,$PDate));
            
            header("Location: projectInfo.php");
        }
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

    <title>CreateProject - Janathakshan - DMS</title>

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
                            Projects <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-pencil-square-o"></i> Create Projects
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-building-o fa-fw"></i>Projects</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                        <h3>Create a Project</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($PIDError)?'error':'';?>">
                        <label class="control-label">Project ID</label>
                        <div class="controls">
                            <input name="PID" type="text"  placeholder="Project ID" value="<?php echo !empty($PID)?$PID:'';?>">
                            <?php if (!empty($PIDError)): ?>
                                <span class="help-inline"><?php echo $PIDError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($DIDError)?'error':'';?>">
                        <label class="control-label">Donor ID</label>
                        <div class="controls">
                            <input name="DID" type="text"  placeholder="Donor ID" value="<?php echo !empty($DID)?$DID:'';?>">
                            <?php if (!empty($DIDError)): ?>
                                <span class="help-inline"><?php echo $DIDError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PNameError)?'error':'';?>">
                        <label class="control-label">Project Name</label>
                        <div class="controls">
                            <input name="PName" type="text" placeholder="Project Name" value="<?php echo !empty($PName)?$PName:'';?>">
                            <?php if (!empty($PNameError)): ?>
                                <span class="help-inline"><?php echo $PNameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PStatusError)?'error':'';?>">
                        <label class="control-label">Project Status</label>
                        <div class="controls">
                            <input name="PStatus" type="text"  placeholder="Project Status" value="<?php echo !empty($PStatus)?$PStatus:'';?>">
                            <?php if (!empty($PStatusError)): ?>
                                <span class="help-inline"><?php echo $PStatusError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ResponseError)?'error':'';?>">
                        <label class="control-label">Project Responsor</label>
                        <div class="controls">
                            <input name="Response" type="text"  placeholder="Project Responsor" value="<?php echo !empty($Response)?$Response:'';?>">
                            <?php if (!empty($ResponseError)): ?>
                                <span class="help-inline"><?php echo $ResponseError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                       <div class="control-group <?php echo !empty($PRemarkError)?'error':'';?>">
                        <label class="control-label">Project Remarks</label>
                        <div class="controls">
                            <input name="PRemark" type="text"  placeholder="Project Remarks" value="<?php echo !empty($PRemark)?$PRemark:'';?>">
                            <?php if (!empty($PRemarkError)): ?>
                                <span class="help-inline"><?php echo $PRemarkError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($TotFinacialError)?'error':'';?>">
                        <label class="control-label">Project Total finacial</label>
                        <div class="controls">
                            <input name="TotFinacial" type="text"  placeholder="Project Total Finacial" value="<?php echo !empty($TotFinacial)?$TotFinacial:'';?>">
                            <?php if (!empty($TotFinacialError)): ?>
                                <span class="help-inline"><?php echo $TotFinacialError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PDateError)?'error':'';?>">
                        <label class="control-label">Project Date</label>
                        <div class="controls">
                            <input name="PDate" type="text"  placeholder="Project Date" value="<?php echo !empty($PDate)?$PDate:'';?>">
                            <?php if (!empty($PDateError)): ?>
                                <span class="help-inline"><?php echo $PDateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="projectInfo.php">Back</a>
                        </div>
                    </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

          		

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
