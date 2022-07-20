<?php include('partials/nav.php'); ?>

            <div class="con">
                <h1>Contact Us</h1>
            </div>
        </div>
</div>
        <section class="location">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.328095156271!2d90.3665091140243!3d23.806929392533494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d6f6b8c2ff%3A0x3b138861ee9c8c30!2sMirpur%2010%20Roundabout%2C%20Dhaka%201216!5e0!3m2!1sen!2sbd!4v1623370524656!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </section>
        <section class="contact">
            <div class="row1">
                <div class="con-col">
                    <div>
                        <i class="fas fa-home"></i>
                        <span>
                            <h5>Mirpur-10, Dhaka 1216, Bangladesh</h5>
                            <!-- <p>gufrydfu</p> -->
                        </span>
                    </div>
                    <div>
                        <i class="fab fa-whatsapp"></i>
                        <span>
                            <h5>+880 1946121570</h5>
                            <p>Saturday to Friday, 8AM to 12PM</p>
                        </span>
                    </div>
                    <div>
                        <i class="far fa-envelope"></i>
                        <span>
                            <h5>eshanexclabur02@gmail.com</h5>
                            <p>Email us for any query</p>
                        </span>
                    </div>
                </div>
                <div class="con-col">
                    <form action="https://formspree.io/f/mgerylov" method="POST">
                        <input type="text" name="Name" placeholder="Name" required>
                        <input type="text" name="Email" placeholder="Email" required>
                        <input type="text" name="subject" placeholder="Subject" required>
                        <textarea rows="8" name="Message" placeholder="Message" required></textarea>
                        <button type="submit" class="button-c">Send Message</button>
                    </form>
                </div>
            </div>
        </section>


<!-- js for toggle menu -->
    <script>
        var Menu = document.getElementById("Menu");
        Menu.style.maxHeight= "0px";
        function menutoggle(){
            if(Menu.style.maxHeight == "0px")
            {
                Menu.style.maxHeight="200px";
            }
            else
            {
                Menu.style.maxHeight="0px";
            }
        }
    </script>

<?php include('partials/footer.php'); ?>

</body>
</html>