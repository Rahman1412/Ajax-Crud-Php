<?php require_once("includes/header.php"); ?>

<div class="container">
        <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">ADD STUDENT FORM</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" id="student_form" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="f_name">First Name</label>
                                <input type="text" class="form-control" id="f_name" name="f_name">
                                <span class="text-danger error_f_name"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="l_name">Last Name</label>
                                <input type="text" class="form-control" id="l_name" name="l_name">
                                <span class="text-danger error_l_name"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                                <span class="text-danger error_email"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                                <span class="text-danger error_phone"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <span class="text-danger error_image"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="dob">D.O.B</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                                <span class="text-danger error_dob"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <span class="text-danger error_password"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="c_password">Confirm Password</label>
                                <input type="password" class="form-control" id="c_password" name="c_password">
                                <span class="text-danger error_c_password"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <button type="button" class="form-control bg-danger text-white" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" id="submit" class="form-control bg-success text-white">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-sm-10 text-center">
            <h1>CRUD APPLICATION USING AJAX</h1>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#myModal">ADD STUDENT</button>
        </div>
    </div>
    <div class="student-table">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>D.O.B</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="student_record">
                
            </tbody>
        </table>
    </div>
</div>

<?php require_once("includes/footer.php"); ?>