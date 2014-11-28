<?php
    require("database.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
 
    $ProID = null;
    if ( !empty($_GET['ProID'])) {
        $ProID = $_REQUEST['ProID'];
    }
     
    if ( null==$ProID ) {
        header("Location: readPro.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $ProIDError = null;
        $PStageError = null;
        $PSStatusError = null;
        $ProStartDateError = null;
        $ProEndDateError = null;
        $ProDueDateError = null;
        $PSRemarkError = null;
         
        // keep track post values
        $ProID = $_POST['ProID'];
        $PStage = $_POST['PStage'];
        $PSStatus = $_POST['PSStatus'];
        $ProStartDate = $_POST['ProStartDate'];
        $ProEndDate = $_POST['ProEndDate'];
        $ProDueDate = $_POST['ProDueDate'];
        $PSRemark = $_POST['PSRemark'];
         
        // validate input
         $valid = true;
        if (empty($ProID)) {
            $ProIDError = 'Enter Program ID';
            $valid = false;
        }
        if (empty($PStage)) {
            $PStageError = 'Enter Stage';
            $valid = false;
        }
         
        if (empty($PSStatus)) {
            $PSStatusError = 'Enter Stage Status';
            $valid = false;
        }
        
        if ( empty($ProStartDate)) {
            $ProStartDateError = 'Enter Pro. Start Date';
            $valid = false;
        }
         
        if (empty($ProEndDate)) {
            $ProEndDateError = 'Enter Pro. End Date';
            $valid = false;
        }
         if (empty($ProDueDate)) {
            $ProDueDateError = 'Enter Programe Due Date';
            $valid = false;
        }
        if (empty($PSRemark)) {
            $PSRemarkError = 'Enter Stage Remark';
            $valid = false;
        }
        
         
        // update data
        if ($valid) {
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE prostages set ProID = ?, PStage = ?, PSStatus = ?, ProStartDate =?, ProEndDate =?, ProDueDate =?, PSRemak =? WHERE ProID = ?";
            $q = $db->prepare($sql);
            $q->execute(array($ProID,$PStage,$PSStatus,$ProStartDate,$ProEndDate,$ProDueDate,$PSRemark));
            
            header("Location: readPro.php");
        }
    } else {
        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM prostages where ProID = ?";
        $q = $db->prepare($sql);
        $q->execute(array($ProID));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $ProID = $data['ProID'];
        $PStage = $data['PStage'];
        $PSStatus = $data['PSStatus'];
        $ProStartDate = $data['ProStartDate'];
        $ProEndDate = $data['ProEndDate'];
        $ProDueDate = $data['ProDueDate'];
        $PSRemark = $data['PSRemark'];
        
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
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                       <!---for use profile pic- <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span> -->
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
                                        <!--- for use profile pic-<img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span> -->
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
                                    <!-- If use user pic- <span class="pull-left">
                                        <img class="media-object" src="#" alt="">
                                    </span> -->
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user faa-flash animated"></i> <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li class="divider"></li>
                        <li>
                            <a href="logout.phph"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="adminDboard.php"><i class="fa fa-fw fa-dashboard"></i>	Dashboard</a>
                    </li>
                    <li>
                        <a href="projectinfo.php"><i class="fa fa-fw fa-bar-chart-o"></i> Projects</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-table"></i> Mails</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Contracts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li class="active">
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
                                <i class="fa fa-dashboard"></i> Update Projects
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Projects</h3>
                            </div>
                            <div class="panel-body">
                            <div class="container">
     
                <div class="span10 offset1">
                
             
                    <form class="form-horizontal" action="updateProgram.php?ProID=<?php echo $ProID?>" method="post">
                      <div class="control-group <?php echo !empty($ProIDError)?'error':'';?>">
                        <label class="control-label">Program ProID</label>
                        <div class="controls">
                            <input name="ProID" type="text"  placeholder="Program ProID" value="<?php echo !empty($ProID)?$ProID:'';?>">
                            <?php if (!empty($ProIDError)): ?>
                                <span class="help-inline"><?php echo $ProIDError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PStageError)?'error':'';?>">
                        <label class="control-label">Program Stage</label>
                        <div class="controls">
                            <input name="FStage" type="text"  placeholder="Program Stage" value="<?php echo !empty($PStage)?$PStage:'';?>">
                            <?php if (!empty($PStageError)): ?>
                                <span class="help-inline"><?php echo $PStageError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PSStatusError)?'error':'';?>">
                        <label class="control-label">Stage Status</label>
                        <div class="controls">
                            <input name="FSStatus" type="text" placeholder="Stage Status" value="<?php echo !empty($PSStatus)?$PSStatus:'';?>">
                            <?php if (!empty($PSStatusError)): ?>
                                <span class="help-inline"><?php echo $PSStatusError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ProStartError)?'error':'';?>">
                        <label class="control-label">Program Start Date</label>
                        <div class="controls">
                            <input name="TraID" type="text"  placeholder="Program Start Date" value="<?php echo !empty($ProStartDate)?$ProStartDate:'';?>">
                            <?php if (!empty($ProStartDateError)): ?>
                                <span class="help-inline"><?php echo $ProStartDateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ProEndDateError)?'error':'';?>">
                        <label class="control-label">Program End Date</label>
                        <div class="controls">
                            <input name="TraDate" type="text"  placeholder="rogram End Date" value="<?php echo !empty($ProEndDate)?$ProEndDate:'';?>">
                            <?php if (!empty($ProEndDateError)): ?>
                                <span class="help-inline"><?php echo $ProEndDateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ProDueDateError)?'error':'';?>">
                        <label class="control-label">Program Due Date</label>
                        <div class="controls">
                            <input name="TraDueDate" type="text"  placeholder="Program Due date" value="<?php echo !empty($ProDueDate)?$ProDueDate:'';?>">
                            <?php if (!empty($ProDueDateError)): ?>
                                <span class="help-inline"><?php echo $ProDueDateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($PSRemarkError)?'error':'';?>">
                        <label class="control-label">Stage Remark</label>
                        <div class="controls">
                            <input name="PSRemark" type="text"  placeholder="Stage Remark" value="<?php echo !empty($PSRemark)?$PSRemark:'';?>">
                            <?php if (!empty($PSRemarkError)): ?>
                                <span class="help-inline"><?php echo $PSRemarkError;?></span>
                            <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="readPro.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->

             
                    

                            </div> <!---/.body-->
                        </div> 
                    </div><!---/.col-->
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
