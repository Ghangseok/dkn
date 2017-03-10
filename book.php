<?php
    require "header.php";
?>

    <div class="container">
        <form action="" method="POST">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Personal Information <strong>form</strong></h2>
                    <hr>

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Userame</label>
                            <input type="text" class="form-control" value="johndoe123">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Name</label>
                            <input type="text" class="form-control" value="John Doe">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Contact Number</label>
                            <input type="tel" class="form-control" value="647-678-1234">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Email Address</label>
                            <input type="email" class="form-control" value="johndoe@abc.com">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Address</label>
                            <input type="text" class="form-control" value="3456 Yonge St. Apt. 1234">
                        </div>
                        <div class="form-group col-lg-2">
                            <label>City</label>
                            <input type="text" class="form-control" value="Toronto">
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
                            <input type="text" class="form-control" value="M2N 3G8">
                        </div>                       
                    </div>

                    <hr>
                    <h2 class="intro-text text-center">Car Information <strong>form</strong></h2>
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

                    <hr>
                    <h2 class="intro-text text-center">The time you want to be serviced</h2>
                    <hr>
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Date</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Time</label>
                                <input type="text" class="form-control">
                            </div>
                           
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <input type="hidden" name="save" value="contact">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </form>
    </div>

    <!-- /.container -->
<?php
    require "footer.php";
?>
