<?php
require_once("includes/connect.php");

if(isset($_GET['editid'])){
    try {
        $selId=$_GET('editid');
        $selSQL=" SELECT * FROM tblabout WHERE aboutId=?";
        $selData=array($id);
        $stmtSel=$con->prepare($selSQL);
        $stmtSel->execute($dataLoad);
        $rowSel=$stmtSel->fetch();
        $titulo= $rowSel[1];
        $laman=$rowSel[2];

    }catch(PDOException $th){
        echo $th->getMessage();
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
        <title>About Us</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- start of navbar -->
            <?php require_once('includes/header.php');?>
        <!-- end of navbar --> 
        <div id="layoutSidenav">
        <!-- start of menu -->
            <?php require_once('includes/menu.php');?>
        <!-- end of memu -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">About Us</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <p>This page allows end-user to facilitate adding, modifying, and deleting ABOUT US records.</p>
                                <button type="submit" class="btn btn-primary">Add New Record</button>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <!-- Nav tabs -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Records</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Data Entry</button>
                                </li>
                                
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Action</th>
                                            <td>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tilte</th>
                                            <th>Content</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $sql="SELECT * FROM tblabout";
                                            $stmt=$con->prepare($sql);
                                            $stmt->execute();
                                            $strTable="";
                                            while($row=$stmt->fetch()){
                                                $strTable.="<tr>";
                                                $strTable.="<td>{$row[0]}</td>";
                                                $strTable.="<td>{$row[1]}</td>";
                                                $content= substr(nl2br($row[2]),0,500);
                                                $strTable.="<td>($content)...</td>";
                                                
                                                $strDelButton="<button class='btn btn-warning'>
                                                                <a href='process_about.php?delid={$row[0]}'>
                                                                Delete</a></button>";
                                                
                                                $strEditButton="<button class='btn btn-success'>
                                                                <a href='process_about.php?editid={$row[0]}'>
                                                                Edit</a></button>";
                                                
                                                $strTable.="<td>{$strEditButton} {$strDelButton} </td>";
                                                $strTable.="</tr>";
                                            }
                                            echo $strTable;
                                            //     $tableAbout.="<td>{$content}</td>";
                                            //     $tableAbout.="
                                            //         // <td>
                                            //         // <button type='button' class='btn btn-info p-1'>View</button>
                                            //         // <button type='button' class='btn btn-warning p-1'>Edit</button>
                                            //         // <button type='button' class='btn btn-danger p-1'>Delete</button>                
                                            //         // </td>";
                                            //     $tableAbout.="</tr>";
                                            // }
                                            // echo $tableAbout;
                                        ?>                                                                                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                
                
                
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <form form action="process_about.php" method="GET">
                            <div class="mb-3"> 
                                <label for="txtTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="txtTitle" required value="<?=$titulo?>">
                                    </div>

                                    <div class="mb-3">
                                    <label for="txtContent" class="form-label">Text Area</label>
                                    <textarea class="form-control" name="txtContent" rows="3" required value="<?=$laman?>"></textarea>
                                    </div>
                                    <button>Submit</button>
                            </div>
                            
                            </form>
                    </div>
                    </div>
                    </div>
                
                </main>
                <!-- start of footer -->
                    <?php require_once('includes/footer.php');?>
                <!-- end of footer -->
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
