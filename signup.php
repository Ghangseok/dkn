<?php
    require "header.php";
?>

    <div class="container">
        
        <form role="form">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Sign up <strong>form</strong></h2>
                    <hr>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Username</label>
                            <input type="text" name="Username" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Password</label>
                            <input type="password" class="form-control">
                        </div>
                            <div class="form-group col-lg-4">
                            <label>Confirm password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Contact Number</label>
                            <input type="tel" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Email Address</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Address</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-lg-2">
                            <label>City</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="province">Province</label>
                            <select class="form-control" id="province">
                                <option>Ontario</option>
                                <option>Quebec</option>
                                <option>British Columbia</option>
                                <option>Nova Scotia</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-2">
                            <label>Postal Code</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
        
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Car Information <strong>form</strong></h2>
                    <hr>
                    <div class="clearfix" align="right">
                        <div class="form-group col-lg-12">
                            <input type="hidden" name="save" value="contact">
                            <button type="button" class="btn btn-danger">Add</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Make</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Model</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Year</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <hr>
                
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Make</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Model</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Year</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <div class="clearfix">
                        <div class="form-group col-lg-12">                            
                            <button type="button" class="btn-lg btn-success">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>

    </div>
    <!-- /.container -->
<?php
    require "footer.php";
?>
