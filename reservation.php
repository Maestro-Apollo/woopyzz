<?php
session_start();
error_reporting(0);
include('class/database.php');
class reservation extends database
{
    protected $link;
    public function confirmFunction()
    {
        if (isset($_POST['confirm'])) {
            $code = $_SESSION['code'];
            $confirm = 1;
            $sql = "update `reservation_tbl` SET `user_confirm` = $confirm where code = '$code' ";
            $res = mysqli_query($this->link, $sql);
            if ($res) {
                $code = $_SESSION['code'];

                $email = $_SESSION['email'];

                $subject = "Heroku App";
                $message = 'Your code is: ';
                $message .= "$code";
                $headers = "From: woopyzz.com \r\n";
                $headers .= "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
                mail($email, $subject, $message, $headers);
                header('location:profile.php');
                return $res;
            } else {
                return false;
            }
        }
        # code...
    }
    public function cancelFunction()
    {
        if (isset($_POST['cancel'])) {
            $code = $_SESSION['code'];
            $sql = "DELETE FROM `reservation_tbl` WHERE `reservation_tbl`.`code` = $code";
            $res = mysqli_query($this->link, $sql);
            if ($res) {
                $msg = "Deleted";
                unset($_SESSION['code']);
                return $msg;
            } else {
                $msg = "Not Deleted";
                return $msg;
            }
        }
        # code...
    }
    public function featureFunction()
    {
        $name = $_SESSION['rname'];
        $sql = "select * from restaurant_feature where rest_name = '$name' LIMIT 1";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        # code...
    }
}
$obj = new reservation;
$objConfirm = $obj->confirmFunction();
$objCancel = $obj->cancelFunction();
$objFeature = $obj->featureFunction();
$show = mysqli_fetch_assoc($objFeature);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('layout/style.php'); ?>

</head>

<body class="bg-light">
    <?php include('layout/navbar.php'); ?>

    <?php include('layout/hero_section.php'); ?>

    <form action="" method="post">
        <section>
            <div class="container bg-white pr-4 pl-4 log_section pb-5 reserve_section">
                <h4 class="text-center pt-5 font-weight-bold">Thanks for your reservation</h4>
                <div class="container">
                    <div class="row pt-5">
                        <div class="col-md-4">
                            <h4 class="font-weight-bold"><?php echo $_SESSION['rname']; ?></h4>
                            <small class="d-block mb-4 text-secondary"><span><i
                                        class="fas fa-map-marker-alt mr-2"></i></span><?php echo $_SESSION['address']; ?></small>
                            <i class="fas fa-star fa-2x star"></i>
                            <i class="fas fa-star fa-2x"></i>
                            <i class="fas fa-star fa-2x"></i>
                            <i class="fas fa-star fa-2x"></i>
                            <i class="fas fa-star fa-2x"></i>
                            <p class="mt-3">Bar | <span class="font-weight-bold"><?php echo $show['bar']; ?></span></p>
                            <p class="mt-3">Music | <span class="font-weight-bold"><?php echo $show['music']; ?></span>
                            </p>
                            <p class="mt-3">Parking | <span class="font-weight-bold"><?php echo $show['park']; ?></span>
                            </p>
                            <p class="mt-3">Terrace | <span
                                    class="font-weight-bold"><?php echo $show['terrace']; ?></span></p>
                        </div>
                        <div class="col-md-4 mx-auto">
                            <?php if ($objCancel) { ?>
                            <?php if (strcmp($objCancel, 'Deleted') == 0) { ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Reservation is removed!</strong>
                            </div>
                            <?php } ?>
                            <?php if (strcmp($objCancel, 'Deleted') == 1) { ?>
                            <div class="alert alert-warning alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Already Removed!</strong>
                            </div>
                            <?php } ?>

                            <?php } ?>
                            <img src="images/google-maps.jpg" alt="">
                        </div>
                        <div class="col-md-4 p-5 bg-light">
                            <h4 class="font-weight-bold text-center">Reservation Code</h4>
                            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
                            <?php if (isset($_SESSION['code'])) { ?>
                            <input type="text" name="code" class="form-control border-0 bg-white mt-5"
                                placeholder="Enter Code" value="<?php echo $_SESSION['code']; ?>" readonly>
                            <?php } else { ?>
                            <input type="text" name="code" class="form-control border-0 bg-white mt-5"
                                placeholder="Reservation Code" value="" readonly required>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container reserve_section_btn">
                <div class="row">
                    <div class="col-md-6 pt-3">
                        <button type="submit" name="cancel" class="btn btn-block btn-lg font-weight-bold">Cancel
                            Reservation</button>

                    </div>
                    <div class="col-md-6 pt-3">
                        <button type="submit" name="confirm"
                            class="btn color_btn btn-block btn-lg font-weight-bold">Confirm My Reservation</button>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <?php include('layout/footer.php'); ?>


    <?php include('layout/script.php') ?>
</body>

</html>