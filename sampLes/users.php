<?php 
    require_once("includes/dbconnect.php");
    session_start();
    if(!(isset($_SESSION['UID']))){
        header("location:login.php");
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
        <title>Users</title>
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
                        <h1 class="mt-4">User Accounts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Accounts</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <i class="fas fa-table me-1"></i>
                                        About Us Records
                                    </div>
                                    <div class="col" style="text-align:right">
                                        <a href="newusers.php" class="btn btn-primary">New Record</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>IsActive</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>IsActive</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $sql="SELECT * FROM users ORDER BY userName";
                                            try {
                                                $stmt=$con->prepare($sql);
                                                $stmt->execute();
                                                while ($row=$stmt->fetch(PDO::FETCH_BOTH)) {
                                                    echo "<tr>";
                                                    echo "<td>{$row['userID']}</td>";
                                                    echo "<td>{$row['userName']}</td>";
                                                    $status=$row['isActive']==1?"Active":"Inactive";
                                                    echo "<td>{$status}</td>";
                                                    $mdID=md5($row['userID']);
                                                    $btnDelete="<a href='saveusers.php?delid={$mdID}' class='btn btn-danger'>Delete</a>";
                                                    $btnEdit="<a href='newusers.php?editid={$mdID}' class='btn btn-primary'>Edit</a>";
                                                    echo "<td style='white-space: nowrap;'>{$btnDelete}{$btnEdit}</td>";
                                                    echo "</tr>";
                                                }
                                            } catch (PDOException $e) {
                                                echo "Error : ".$e->getMessage();
                                            }
                                        ?>
                                    </tbody>
                                </table>
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
