<?php
require_once('config.php');

include('header.php');
?>

<?php
$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id_user='$id'";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['full_name'];
    $email = $row['email'];
    $password = $row['password'];
    $status = $row['subscription_status'];
}

if (isset($_POST['submit-identity'])) {
    $new_name = $_POST['input-name'];
    $new_email = $_POST['input-email'];

    $query = "UPDATE users SET full_name='$new_name', email='$new_email' WHERE id_user='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['full_name'] = $new_name;
        $name = $new_name;
        $email = $new_email;
        header("Location: profile.php");
    }
}

if (isset($_POST['submit-password'])) {
    if ($_POST['input-new-password'] == $_POST['input-conf-new-password']) {
        if (hash("sha256", $_POST['input-password']) == $password) {
            $new_password = hash("sha256", $_POST['input-new-password']);
            $query = "UPDATE users SET password='$new_password' WHERE id_user='$id'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $password = $new_password;
                header("Location: profile.php");
            }
        }
    }
}

if (isset($_POST['submit-subs'])) {
    header('Location: order_page.php');
}
?>

<script>
    function confirmChange() {
        confirm("Are you sure?");
    }
</script>

<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-5">Quater Minion</h1>

        <div class="container" style="color: black;">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header" style="font-weight: bold;">Identity</div>
                <div class="card-body" style="text-align: start; padding: 40px;">
                    <form method="POST">
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="input-name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-name" name="input-name" value="<?= $name; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="input-email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="input-email" name="input-email" value="<?= $email; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row mx-auto" style="width: fit-content;">
                            <button name="submit-identity" type="submit" class="btn btn-secondary" onclick="confirmChange()">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header" style="font-weight: bold;">Reset Password</div>
                <div class="card-body" style="text-align: start; padding: 40px;">
                    <form method="POST">
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="input-password" class="col-sm-3 col-form-label">Current Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="input-password" name="input-password" placeholder="Current password" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="input-new-password" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="input-new-password" name="input-new-password" placeholder="New password" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="input-conf-new-password" class="col-sm-3 col-form-label">Confirm New Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="input-conf-new-password" name="input-conf-new-password" placeholder="Confirm new password" required>
                            </div>
                        </div>
                        <div class="form-group row mx-auto" style="width: fit-content;">
                            <button name="submit-password" type="submit" class="btn btn-secondary" onclick="confirmChange()">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header" style="font-weight: bold;">Subscription</div>
                <div class="card-body" style="text-align: start; padding: 40px;">
                    <form method="POST">
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="input-status" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="input-status" name="input-status" value="<?= $status; ?>">
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="input-subs-date" class="col-sm-3 col-form-label">Subscription Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="input-subs-date" name="input-subs-date">
                            </div>
                        </div>
                        <div class="form-group row mx-auto" style="width: fit-content;">
                            <button name="submit-subs" type="submit" class="btn btn-secondary">Upgrade</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<?php
include('footer.php');
?>