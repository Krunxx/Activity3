    <?php session_start(); ?>
    <html>

    <head>
        <style>
            .container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                max-width: 300px;
                margin: 100px auto;
                padding: 10px;
                border: 2px solid #ccc;
                border-radius: 5px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                background-color: #F8E8EE;
            }

            .container h3 {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;

            }

            .container input[type="text"],
            .container input[type="password"] {
                width: 100%;
                padding: 8px;
                margin-bottom: 2px;
                border: 1px solid #ccc;
                border-radius: 3px;
                box-sizing: border-box;
            }

            a {
                text-decoration: none;
                color: blue;
                cursor: pointer;
            }

            a:hover {
                text-decoration: underline;
            }

            button {
                width: 100%;
                padding: 8px;
                background-color: #FDCEDF;
                border-radius: 5px;


            }
        </style>
    </head>

    <body>

        <form action="process.php" method="POST">

            <div class="container">

                <h3>LOGIN</h3>
                Email: <input type="text" name="email" required><br><br>
                Password: <input type="password" name="password" id="passwordField" required>
                <a href="#" onclick="togglePasswordVisibility()">Show/Hide Password</a><br><br>
                <button type="submit" name="loginButton">Login</button><br><br>
                <a href="register.php">📝 Register</a>

            </div>

        </form>

        <script>
            function togglePasswordVisibility() {
                var passwordField = document.getElementById("passwordField");

                if (passwordField.type === "password") {
                    passwordField.type = "text";
                } else {
                    passwordField.type = "password";
                }
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <?php
        if (isset($_SESSION['status']) && $_SESSION['status_code'] != '') {
        ?>
            <script>
                swal({
                    title: "<?php echo $_SESSION['status']; ?>",
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                });
            </script>
        <?php
            unset($_SESSION['status']);
            unset($_SESSION['status_code']);
        }
        ?>
    </body>
</html>