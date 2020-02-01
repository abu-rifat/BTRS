<footer class="container-fluid" id="footer-distributed">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12" id="footer-left">

                    <h3>Bus<span>TICKET</span>Reservation<span>SYSTEM</span></h3>

                    <p class="footer-links">
                        <a href="home.html">Home</a>
                        -
                        <a href="howtobuy.html">How To Buy</a>
                        -
                        <a href="about.html">About</a>
                        -
                        <a href="tandc.html">T&C</a>
                        -
                        <a href="faq.html">Faq</a>
                    </p>

                    <div class="footer-icons">

                        <a href="https://www.facebook.com/a.r.m.al.hasib" target="_blank"><i
                                class="fab fa-facebook"></i></a>
                        <a href="https://twitter.com/ARM_Al_Hasib" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/in/abu-rifat-534258142/" target="_blank"><i
                                class="fab fa-linkedin"></i></a>
                        <a href="https://github.com/abu-rifat" target="_blank"><i class="fab fa-github"></i></a>

                    </div>

                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" id="footer-right">

                    <p>Contact Us</p>
                    </br>
                    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$fm->validation($_POST['email']);
    $message=$fm->validation($_POST['message']);
    $email=mysqli_real_escape_string($db->link, $email);
    $message=mysqli_real_escape_string($db->link, $message);
    if(empty($email) || empty($message)){
        echo "<span class='error'>Field Must Not Be Empty ! </span>";
    }else {
            $query = "INSERT INTO contact (email, message) VALUES('$email', '$message')";
            $catinsert=$db->insert($query);
            if($catinsert){
                echo "<span class='success' style='color:skyblue;'>Message Send Successfully! </span>";
            }else {
                echo "<span class='error'>Message Not Send Created! </span>";
            }
        }
    }
?>
                    <form action="" method="post">

                        <input type="text" name="email" placeholder=" Email">
                        <textarea name="message" placeholder=" Message"></textarea>
                        <button>Send</button>

                    </form>

                </div>
            </div>
        </div>
</footer>