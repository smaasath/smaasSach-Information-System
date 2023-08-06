
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <title></title>
    </head>
    <body>
        <?php
        include '../DashboardPHP/connection.php';
        $userID = 1;
        ?>
        <!--  nav bar start-->
        <div class="navbardah fixed-top d-flex  align-items-center justify-content-end">

            <div id= "resimage" class="p-1 w-50 d-block d-sm-none">
                <a href="#">
                    <img src="../Images/Logo.png" alt="Home" class="img-fluid" style="width: 20%">
                </a>
            </div>

            <h6 class="p-3" href="#">
                <?php
                $query = "SELECT instituteName FROM institute WHERE instituteId=1";
                $result = $conn->query($query);
                if (!$result) {
                    die("Query failed: " . $conn->error);
                }

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row["instituteName"];
                }
                ?>   
            </h6>





            <div class="col-1">
                <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php
                    $queryUserImage = "SELECT Logo FROM institute WHERE instituteId=1";
                    $resultUserImage = $conn->query($queryUserImage);

                    if ($resultUserImage->num_rows > 0) {
                        $row = $resultUserImage->fetch_assoc();
                        $imageData = $row["Logo"];
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" style="width:30%">';
                    } else {
                        echo "Image not found.";
                    }
                    ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="">

                    <li><a class="dropdown-item" href="../index.php">Sign out</a></li>
                </ul>
            </div>

        </div>

        <!--  nav bar end-->
        <br>

        <!-- add button -->
        <div class="container w-25 mt-5" >
            <div class="backcolor m-2 admincount p-2 mb-4 rounded-4 ">
                <div class="row">
                    <div class="col-1 text-center">   
                        <i  href="" class="fa-solid fa-users fa-2xl p-5 ps-1"></i>
                    </div>
                    <div class="col-8 ps-5 d-flex justify-content-center align-items-center flex-column"> 
                        <h7>Students</h7>
                        <h2>
                            <?php
                            $queryStudentCount = "SELECT COUNT(*) AS studentID FROM student WHERE instituteId=$userID";
                            $resultStudentCount = $conn->query($queryStudentCount);
                            $row = $resultStudentCount->fetch_assoc();
                            $resultCount = $row["studentID"];
                            echo $resultCount;
                            ?>
                        </h2>
                    </div>
                </div> 
            </div> 
        </div>

        <!-- add button -->

        <!-- Table -->

        <div class="p-5 ">


            <div class="rounded-top-4 p-0 border border-dark-subtle" style="padding-left: 12px;padding-right: 22px;">
                <div class="row align-items-center">
                    <div class="col-3">           
                        <div class="input-group rounded p-3">
                            <input type="search" class="form-control rounded" placeholder="Search ID" aria-label="Search" aria-describedby="search-addon" >



                        </div>
                    </div>
                    <div class="col-3"> 
                       <select class="form-select"  name="degree" id="degree" aria-label="Default select example">
                                            <?php
                                            $queryGetdegree = "SELECT degreeName,degreeId FROM degree WHERE instituteId=$userID";
                                            $resultDegree = $conn->query($queryGetdegree);
                                            if (!$resultDegree) {
                                                die("Query failed: " . $conn->error);
                                            }

                                            while ($rowdeg = $resultDegree->fetch_assoc()) {
                                                echo '<option  value="' . $rowdeg["degreeId"] . '">' . $rowdeg["degreeName"] . '</option>';
                                            }
                                            ?> 


                                        </select>
                    </div>

                
                    <div class="col-3 "> 
                        <button type="button" class="btn btn-primary bgcol" onclick="Addstudent()">Add Student</button>
                    </div>
                </div>



                <!-- Table Head -->
                <table class="table mb-0">





                </table>
                <!-- Table Head -->
            </div>
            <!-- Table body -->
            <div class="container bg-white mt-0" style=" max-height: 700px; overflow: scroll;">
                <table class="table table-hover">
                    <tr class="sticky-top">

                        <th class="col-1 bgcol p-2">ID</th>
                        <th class="col-3 bgcol p-2">Name</th>
                        <th class="col-2 bgcol p-2">Gender</th>
                        <th class="col-3 bgcol p-2">Contact No</th>
                        <th class="col-3 bgcol p-2"></th>
                        

                    </tr>
                    <!-- Table row -->


                    <?php
                    $queryGettable = "SELECT * FROM student ";

                    $resulttable = mysqli_query($conn, $queryGettable);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($rowtable = mysqli_fetch_assoc($resulttable)) {
                            ?>

                            <tr>
                                <td class = "col-1"> <?php echo $rowtable["studentID"] ?></td>
                                <td class = "col-3"><?php echo $rowtable["studentName"] ?></td>
                                <td class = "col-2"><?php echo $rowtable["gender"] ?></td>
                                <td class = "col-3"><?php echo $rowtable["phoneNo"] ?></td>
                                <td class = "col-3">
                                    <i class="fa-solid fa-user-graduate fa-xl m-2" onclick = "openStudentDetails(<?php echo $rowtable["studentID"] ?>)"></i>
                                    <i class="fa-solid fa-user-shield fa-xl m-2" onclick = "openGuardianDetail(<?php echo $rowtable["studentID"] ?>)"></i>
                                    <i class="fa-sharp fa-solid fa-graduation-cap fa-xl m-2" onclick = "openCourseDetail(<?php echo $rowtable["studentID"] ?>)"></i>
                                    <i class="fa-solid fa-user-pen fa-xl m-2" onclick = "openeditDetailsStudent(<?php echo $rowtable["studentID"] ?>)"></i>
                                    <i class="fa-solid fa-trash fa-xl m-2" style="color: #c41212;" onclick ="studel(<?php echo $rowtable["studentID"] ?>)"></i>


                                </td>



                            </tr>


                            <!-- Table row -->

                            <?php
                        }
                    } else {
                        echo "0 results";
                    }

                    mysqli_close($conn);
                    ?>
                    </tbody>
                </table>
            </div>




            <!-- Student Details Modal -->
            <div class="modal fade" id="StudentDetail" tabindex="-1" aria-labelledby="StudentDetail" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="StudentDetail">Student Details</h1>
                            <button type="button" class="btn-close" onclick="closeModals()"></button>
                        </div>
                        <div class="modal-body">
                        </div> 
                        <div class="modal-footer">



                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Student Details Modal -->




            <!-- Guardian Details Modal -->
            <div class="modal fade" id="GuardianDetail" tabindex="-1" role="dialog" aria-labelledby="modal2Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="GuardianDetail">Guardian Detail</h1>
                            <button type="button" class="btn-close" onclick="closeModals()"></button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">

                    
                            <button type="button" class="btn btn-secondary" onclick="closeModals()" >Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Guardian Details Modal -->

            <!-- Course Details Modal -->
            <div class="modal fade" id="CourseDetail" tabindex="-1" role="dialog" aria-labelledby="modal2Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="CourseDetail">Course Detail</h1>
                            <button type="button" class="btn-close" onclick="closeModals()"></button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">

                         
                            <button type="button" class="btn btn-secondary" onclick="closeModals()" >Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Course Details Modal -->
            
            
             <!-- student Edit Modal -->
              <form method="post" action="../DashboardPHP/studentEdit.php" id="editform">
            <div class="modal fade" id="stdEdit" tabindex="-1" role="dialog" aria-labelledby="modal2Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="CourseDetail">Edit Details</h1>
                            <button type="button" class="btn-close" onclick="closeModals()"></button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">

                          <button type="submit" class="btn btn-primary bgcolli" id="editstudent" >Save</button>
                         
                            <button type="button" class="btn btn-secondary" onclick="closeModals()" >Close</button>
                        </div>
                    </div>
                </div>
            </div>
              </form>
            <!-- Course Details Modal -->






            <!-- Add Student Details Modal -->
            <form method="post" action="../DashboardPHP/StudentAdd.php" id="myform">
                <div class="modal fade" id="AddStudentDetail" tabindex="-1" aria-labelledby="AddStudentDetail" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="AddStudentDetail">Add Student Details</h1>
                                <button type="button" class="btn-close" onclick="closeModals()"></button>
                            </div>
                            <div class="modal-body">



                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <h6>Degree</h6>
                                    </div>
                                    <div class="col-9 p-3">
                                        <select class="form-select"  name="degree" id="degree" aria-label="Default select example">
                                            <?php
                                            $queryGetdegree = "SELECT degreeName,degreeId FROM degree WHERE instituteId=$userID";
                                            $resultDegree = $conn->query($queryGetdegree);
                                            if (!$resultDegree) {
                                                die("Query failed: " . $conn->error);
                                            }

                                            while ($rowdeg = $resultDegree->fetch_assoc()) {
                                                echo '<option  value="' . $rowdeg["degreeId"] . '">' . $rowdeg["degreeName"] . '</option>';
                                            }
                                            ?> 


                                        </select>
                                    </div>
                                </div>




                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <h6>Full Name</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" id="studentName" name="studentName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                    </div>
                                </div>

                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <h6>Entrollment No</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="text"  id="entrlmentNumber" name="entrlmentNumber" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                    </div>
                                </div>

                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <h6>Accedamic Year</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="number"  id="accedamicYear" name="accedamicYear" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                    </div>
                                </div>

                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <h6>DOB</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="Date" id="DOB" name="DOB" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                    </div>
                                </div>

                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <h6>Contact No</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" id="studentContactNum" name="studentContactNum" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                    </div>
                                </div>

                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <h6>Email</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="email" id="studentEmail" name="studentEmail" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                    </div>
                                </div>

                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <h6>Gender</h6>
                                    </div>
                                    <div class="col-9">
                                        <select  name="gender" class="form-select" aria-label="Default select example" required>

                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <h6>Address</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" id="studentAddress" name="studentAddress" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                    </div>
                                </div>

                                <hr>
                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <h6>User Name</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" id="userName" name="userName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                    </div>
                                </div>

                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <h6>Password</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="Password" id="password" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                    </div>
                                </div>








                            </div>

                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary bgcolli" id="AddGuardian" onclick="AddGuardianDetail()" >Add Guardian</button>


                                <button type="button" class="btn btn-secondary" onclick="closeModals()">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Student Details Modal -->





                <!-- Add Guardian Details Modal -->
                <div class="modal fade" id="AddGuardianDetail" tabindex="-1" aria-labelledby="AddGuardianDetail" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="AddGuardianDetail">Add Guardian Detail</h1>
                                <button type="button" class="btn-close" onclick="closeModals()"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row align-items-center">



                                    <div class="row align-items-center pb-3">
                                        <div class="col-3">
                                            <h6>Full Name</h6>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" name="guardianName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                    </div>

                                    <div class="row align-items-center pb-3">
                                        <div class="col-3">
                                            <h6>Relationship</h6>
                                        </div>
                                        <div class="col-9">
                                            <select  name="guardianRelation" class="form-select" aria-label="Default select example" required>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Guardian">Guardian</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row align-items-center pb-3">
                                        <div class="col-3">
                                            <h6>Contact No</h6>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" name="guardianContactNum" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                    </div>





                                    <div class="row align-items-center pb-3">
                                        <div class="col-3">
                                            <h6>Email</h6>
                                        </div>
                                        <div class="col-9">
                                            <input type="email" name="guardianEmail" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                    </div>

                                    <div class="row align-items-center pb-3">
                                        <div class="col-3">
                                            <h6>Address</h6>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" name="guardianAddress" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                    </div>


                                    <div class="row align-items-center pb-3">
                                        <div class="col-3">
                                            <h6>Occupation</h6>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" name="guardianOccupation" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                    </div>

                                    <input type="hidden" name="Instituteid" value=<?php echo $userID; ?>>










                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-primary bgcolli" data-bs-target="#AddStudentDetail" data-bs-toggle="modal">Back</button>
                                    <button type="submit" class="btn btn-primary bgcolli" id="AddStudent" >Save Student</button>


                                    <button type="button" class="btn btn-secondary" onclick="closeModals()">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Add Guardian Details Modal -->


            <!-- Edit Student Details Modal -->
            
            <div class="modal fade" id="EditStudentDetail" tabindex="-1" aria-labelledby="EditStudentDetail" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="EditStudentDetail">Edit Student Details</h1>
                            <button type="button" class="btn-close" onclick="closeModals()"></button>
                        </div>
                        <div class="modal-body">



                       







                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary bgcolli" id="EditStudent" onclick="savestudent" >Save</button>

                           

                            <button type="button" class="btn btn-secondary" onclick="closeModals()">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Student Details Modal -->


            

            <?php
// put your code here
            ?>


        

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    </body>
</html>
