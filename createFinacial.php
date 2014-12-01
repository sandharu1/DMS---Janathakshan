<?php
     
    require("database.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
 
    if ( !empty($_POST)) {
        // keep track validation errors on finacial form
        $FStageError = null;
        $FSStatusError = null;
        $TraIDError = null;
        $TraDateError = null;
		$TraDueDateError = null;
		$FSRemarkError = null;
		
        // keep track post values of finacial table
        $FStage = $_POST['FStage'];
        $FSStatus = $_POST['FSStatus'];
        $TraID = $_POST['TraID'];
        $TraDate = $_POST['TraDate'];
		$TraDueDate = $_POST['TraDueDate'];
		$FSRemark = $_POST['FSRemark'];
		
        // validate input on finacial table
        $valid = true;
        if (empty($FStage)) {
            $FinStageError = 'Enter Finacial stage';
            $valid = false;
        }
         
        if (empty($FSStatus)) {
            $FSStatusError = 'Enter Stage Status';
            $valid = false;
        }
		
		if ( empty($TraID)) {
            $TraIDError = 'Enter Transaction ID';
            $valid = false;
        }
         
        if (empty($TraDate)) {
            $TraDateError = 'Enter Transaction Date';
            $valid = false;
        }
		 if (empty($TraDueDate)) {
            $TraDueDateError = 'Enter Tra. Due Date';
            $valid = false;
        }
        if (empty($FSRemark)) {
            $FSRemarkError = 'Enter Stage Remark';
            $valid = false;
        }
				
        // insert data in to finacial table
        if ($valid) {
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO FinStages (FStage,FSStatus,TraID,TraDate,TraDueDate,FSRemark) values(?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($FStage,$FSStatus,$TraID,$TraDate,$TraDueDate,$FSRemark));
            header("Location: readFin.php");
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
                <a class="navbar-brand" href="index.php"><stromg>Janathakshan(GTE) Ltd</stromg> - <small>DocMonSys </small></a>
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
                            Finacial <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Create Finacial Stages
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
                               
             
                    <form class="form-horizontal" action="createFinacial.php" method="post">
                      <div class="control-group <?php echo !empty($FStageError)?'error':'';?>">
                        <label class="control-label">Finacial Stage</label>
                        <div class="controls">
                            <input name="FStage" type="text"  placeholder="Finacial Stage" value="<?php echo !empty($FStage)?$FStage:'';?>">
                            <?php if (!empty($FStageError)): ?>
                                <span class="help-inline"><?php echo $FStageError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($FSStatusError)?'error':'';?>">
                        <label class="control-label">Stage Status</label>
                        <div class="controls">
                            <input name="FSStatus" type="text" placeholder="Stage Status" value="<?php echo !empty($FSStatus)?$FSStatus:'';?>">
                            <?php if (!empty($FSStatusError)): ?>
                                <span class="help-inline"><?php echo $FSStatusError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($TraIDError)?'error':'';?>">
                        <label class="control-label">Transaction ID</label>
                        <div class="controls">
                            <input name="TraID" type="text"  placeholder="Transaction ID" value="<?php echo !empty($TraID)?$TraID:'';?>">
                            <?php if (!empty($TraIDError)): ?>
                                <span class="help-inline"><?php echo $TraIDError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($TraDateError)?'error':'';?>">
                        <label class="control-label">Transaction Date</label>
                        <div class="controls">
                            <input name="TraDate" type="text"  placeholder="Transaction Date" value="<?php echo !empty($TraDate)?$TraDate:'';?>">
                            <?php if (!empty($TraDateError)): ?>
                                <span class="help-inline"><?php echo $TraDateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                       <div class="control-group <?php echo !empty($TraDueDateError)?'error':'';?>">
                        <label class="control-label">Transaction Due Date</label>
                        <div class="controls">
                            <input name="TraDueDate" type="text"  placeholder="Transaction Due Date" value="<?php echo !empty($TraDueDate)?$TraDueDate:'';?>">
                            <?php if (!empty($TraDueDateError)): ?>
                                <span class="help-inline"><?php echo $TraDueDateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($FSRemarkError)?'error':'';?>">
                        <label class="control-label">Stage Remark</label>
                        <div class="controls">
                            <input name="FSRemark" type="text"  placeholder="Stage Remark" value="<?php echo !empty($FSRemark)?$FSRemark:'';?>">
                            <?php if (!empty($FSRemarkError)): ?>
                                <span class="help-inline"><?php echo $FSRemarkError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
              
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="readFin.php">Back</a>
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
