<?php
include('header.php');

require_once('config.php');

error_reporting(0);

if (isset($_POST['submit'])) {
    $full_name = $_POST['input-name'];
    $email = $_POST['input-email'];
    $phonenum = $_POST['input-phone'];
    $substype = $_POST['input-type'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows <= 0) {
        $sql = "INSERT INTO orders (full_name, email, phone_number, subscriptions_type)
					VALUES ('$full_name', '$email', '$phonenum', '$substype')";
        $result = mysqli_query($conn, $sql);
        $valid = $result;
        if ($result) {
            $success_order = "Your order has been sent. Please wait for confirmation.";
            $full_name = "";
            $email = "";
            $phonenum = "";
            $substype = "";
        } else {
            $error_order = "Something went wrong. Please try again.";
        }
    } else {
        $error_email = "Email doesn't exist.";
    }
}

?>

<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-5">Quater Minion</h1>

        <div class="container" style="color: black;">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header" style="font-weight: bold;">Order Page</div>
                <div class="card-body" style="text-align: start; padding: 40px;">
                    <form method="POST">
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="input-name" class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-name" name="input-name" placeholder="Enter your full name" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="input-email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-email" name="input-email" placeholder="Enter your email" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="input-number" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-phone" name="input-phone" placeholder="Enter your phone number" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="input-type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="input-type" name="input-type">
                                    <option value="Monthly">Monthly</option>
                                    <option value="Quarterly">Quarterly</option>
                                    <option value="Annualy">Annualy</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mx-auto" style="width: fit-content;">
                            <button name="submit" type="submit" class="btn btn-secondary">Confirm Order</button>
                        </div>
                        <br>
                        <?php
                        if (isset($error_order)) echo "<div class='alert alert-danger'>" . $error_order . "</div>";
                        if (isset($error_email)) echo "<div class='alert alert-danger'>" . $error_email . "</div>";
                        if ($valid) echo "<div class='alert alert-success'>" . $success_order . "</div>";
                        ?>
                    </form>
                </div>
            </div>
        </div>
</header>

<?php include('footer.php') ?>