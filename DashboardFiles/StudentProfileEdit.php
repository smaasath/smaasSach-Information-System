<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Student profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="../Profile/student-form/style.css">
    </head>
    <body>
        
            <div class="container py-md-5">
        
                        <div class="card shadow mb-3">
                            <div class="card-header py-3 text-center">
                                <p class="m-0 fw-bold ">STUDENT PROFILE</p>
                            </div>
                            <form>
                            <div class="card-body">                                
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="Department"><strong>Department</strong></label><input class="form-control" type="text" id="Department" placeholder="Computer science and infomatics" name="Department" readonly></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="Degree"><strong>Degree</strong></label><input class="form-control" type="text" id="Degree" placeholder="Computer science and technology" name="Degree" readonly></div>
                                        </div>
                                    </div>
                                    <div class="mb-3"></div>                               
                            </div>
                            <div class="card-body">                                
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" id="first_name-4" placeholder="Gimhani" name="first_name"></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" id="last_name-4" placeholder="Pathulpana" name="last_name"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3"></div>                                
                            </div>
                            <div class="card-body">                                
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="DOB"><strong>DOB</strong></label></div><input class="form-control" type="date">
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="Gender"><strong>Gender</strong></label></div><select class="form-select">
                                                <optgroup>
                                                    <option value="12" selected="">Female</option>
                                                    <option value="13">Male</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>                                
                            </div>
                            <div class="card-body">                                
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="tel"><strong>Contact</strong></label></div><input class="form-control" type="tel" placeholder="0777267345">
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label></div><input class="form-control" type="email" id="email-1" placeholder="gim@gmail.com" name="email">
                                        </div>
                                    </div>                                
                            </div>
                            <div class="card-body">                                
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="Address"><strong>Address</strong></label></div><input class="form-control" type="text" placeholder="Induruwa, Kuruvita, Ratnapura.">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="user"><strong>User Name</strong></label></div><input class="form-control" type="text" placeholder="CST20043">
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="password"><strong>Password</strong></label></div><input class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="mb-3"></div>
                                <button class="Submit-Btn" type="submit">Save Changes</button>
                            </div>
                        </form>
                        </div>
                    </div>               
               </div>
            </div>
            <script src="../Profile/student-form/validation.js" type="text/javascript"></script>
        <script src="validation.js" type="text/javascript"></script>     
    </body>
</html>


 


 


