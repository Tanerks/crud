<?php
require_once("includes/connect.php");

$titulo = null;
$author = null;
$dateposted = null;
$story = null;
if (isset($_GET['editnewsid'])) {
    try {
        $selId = $_GET['editnewsid'];
        $selSQL = "SELECT id, title, author, dateposted, story FROM news WHERE md5(id)=?";
        $selData = array($selId);
        $stmtSel = $con->prepare($selSQL);
        $stmtSel->execute($selData);
        $rowSel = $stmtSel->fetch();

        if ($rowSel) {
            $actualid = $rowSel[0];
            $titulo = $rowSel[1];
            $author = $rowSel[2];
            $dateposted = $rowSel[3];
            $story = $rowSel[4];
        } else {
            echo "<div style='color: red;'>No record found with the provided ID.</div>";
        }
    } catch (PDOException $th) {
        echo "<div style='color: red;'>" . $th->getMessage() . "</div>";
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
    <?php require_once('includes/header.php'); ?>
    <!-- end of navbar -->
    <div id="layoutSidenav">
        <!-- start of menu -->
        <?php require_once('includes/menu.php'); ?>
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
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Records</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Data Entry</button>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane " id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>DatePosted</th>
                                                <th>Story</th>
                                                <th>Picture</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT id,title,author,dateposted,story,md5(id),picture FROM news";
                                            $stmt = $con->prepare($sql);
                                            $stmt->execute();
                                            $strtable = "";
                                            while ($row = $stmt->fetch()) {
                                                $strtable .=     "<tr>";
                                                $strtable .= "<td>{$row[0]}</td>";
                                                $strtable .= "<td>{$row[1]}</td>";
                                                $strtable .= "<td>{$row[2]}</td>";
                                                $strtable .= "<td>{$row[3]}</td>";
                                                $strtable .= "<td>" . substr(nl2br($row[4]), 0, 500) . "...</td>";
                                                $strtable .= "<td>{$row[6]}</td>";
                                                $strtable .= "<td>
                                <a href='news.php?editnewsid={$row[5]}' class='btn btn-success'>Edit</a>
                                <a href='process_about.php?delnewsid={$row[5]}' class='btn btn-warning'>Delete</a>
                              </td>";
                                                $strtable .= "</tr>";
                                            }
                                            echo $strtable;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <form action="process_about.php" method="POST" enctype="multipart/form-data">

                                    <input type="hidden" name="editnewsid" value="<?= isset($selId) ? $selId : '0' ?>">

                                    <div class="mb-3" style="margin-bottom: 0.75rem; width:300px;">
                                        <label for="txtTitle" class="form-label" style="margin-bottom: 0.1rem; font-size: 0.85rem;">Title</label>
                                        <input type="text" class="form-control" name="txtTitle" required value="<?= $titulo ?>" style="padding-top: 0.3rem; padding-bottom: 0.3rem; font-size: 0.85rem;">
                                    </div>

                                    <div class="mb-3" style="margin-bottom: 0.75rem;">
                                        <label for="txtAuthor" class="form-label" style="margin-bottom: 0.1rem; font-size: 0.85rem;">Author</label>
                                        <input type="text" class="form-control" name="txtAuthor" required value="<?= $author ?>" style="padding-top: 0.3rem; padding-bottom: 0.3rem; font-size: 0.85rem;">
                                    </div>

                                    <div class="mb-3" style="margin-bottom: 0.75rem;">
                                        <label for="txtDateposted" class="form-label" style="margin-bottom: 0.1rem; font-size: 0.85rem;">DatePosted</label>
                                        <input type="date" class="form-control" name="txtDateposted" required value="<?= $dateposted ?>" style="padding-top: 0.3rem; padding-bottom: 0.3rem; font-size: 0.85rem;">
                                    </div>

                                    <div class="mb-3" style="margin-bottom: 0.75rem;">
                                        <label for="txtStory" class="form-label" style="margin-bottom: 0.1rem; font-size: 0.85rem;">Story</label>
                                        <input type="text" class="form-control" name="txtStory" required value="<?= $story ?>" style="padding-top: 0.3rem; padding-bottom: 0.3rem; font-size: 0.85rem;">
                                    </div>

                                    <div class="mb-3" style="margin-bottom: 0.75rem;">
                                        <label for="txtContent" class="form-label" style="margin-bottom: 0.1rem; font-size: 0.85rem;">Upload Image</label>
                                        <input type="file" class="form-control" name="picture" style="font-size: 0.85rem; padding-top: 0.2rem; padding-bottom: 0.2rem;">
                                    </div>

                                    <button type="submit" class="btn btn-primary" style="padding: 0.4rem 0.8rem; font-size: 0.85rem;">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </main>
            <!-- start of footer -->
            <?php require_once('includes/footer.php'); ?>
            <!-- end of footer -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>