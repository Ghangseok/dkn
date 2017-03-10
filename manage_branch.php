<?php
    require "header.php";
?>

    <div class="container">
        <form action="" method="POST">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Branch Information <strong>form</strong></h2>
                    <hr>

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Branch Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Contact Number</label>
                            <input type="tel" class="form-control" value="">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Email Address</label>
                            <input type="email" class="form-control" value="">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Address</label>
                            <input type="text" class="form-control" value="">
                        </div>
                        <div class="form-group col-lg-2">
                            <label>City</label>
                            <input type="text" class="form-control" value="">
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
                        <div class="form-group col-lg-4">
                            <label>Map</label>
                            <input type="text" class="form-control" value="">
                        </div>                       
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-12">
                        <button type="submit" class="btn-lg btn-danger">Submit</button>
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

