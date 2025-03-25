<?php
include "includes/connect.php";
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
                                         
                                    

                                    if(isset($_GET['editid'])){
                                        try {
                                            $selId=$_GET('editid');
                                            $selSQL=" SELECT * FROM tblabout WHERE aboutId=?";
                                            $selData=array($id);
                                            $stmtSel=$con->prepare($selSQL);
                                            $stmtSel->execute($selData);
                                            $rowSel=$stmtSel->fetch();
                                            $titulo= $rowSel[1];
                                            $laman=$rowSel[2];
                                            echo $titulo;
                                    
                                        }catch(PDOException $th){
                                            echo $th->getMessage();
                                        }
                                    }
                                    ?></button>