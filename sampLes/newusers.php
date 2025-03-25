<?php 
    session_start();
    require_once("includes/dbconnect.php");
    if(!(isset($_SESSION['UID']))){
        header("location:login.php");
    }
    $id="";
    $username="";
    $pw="";
    if(isset($_GET['editid'])){
        try {
            $sql="SELECT * FROM users WHERE md5(userID)=?";
            $id=$_GET['editid'];
            $stmt=$con->prepare($sql);
            $data=array($id);
            $stmt->execute($data);
            $row=$stmt->fetch();
            $id=$row['userID'];
            $username=$row['userName'];
            $pw=$row['password'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Accounts</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php require_once("includes/header.php");?>
        <div id="layoutSidenav">
        <?php require_once("includes/sidenav.php");?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">User Account Data Entry</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="users.php">User Accounts</a></li>
                            <li class="breadcrumb-item active">New User Account Records </li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Entry :
                            </div>
                            <div class="card-body">
                                <form action="saveusers.php" method="post">
                                    <input type='text' name="txtid" value="<?=$id;?>">
                                    <div class="mb-3">
                                        <label for="txtuname" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="txtuname" placeholder="Enter username" required value="<?=$username?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtuname" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="txtpw1" placeholder="Enter username" required value="<?=$pw?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtuname" class="form-label">Re-type Password</label>
                                        <input type="password" class="form-control" name="txtpw2" placeholder="Enter username" required value="<?=$pw?>">
                                    </div>
                                    <div class="mb-3">
                                         <input class="form-check-input" type="checkbox" value="1" id="chkActive" name="chkActive" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Is Active
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <?php require_once("includes/footer.php") ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
