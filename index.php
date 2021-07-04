<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form>
            <h2>Login</h2>
            <div class="form-group">
                <label for="username">Username : </label>
                <input type="text" name="username" id="username" placeholder="Username" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password : </label>
                <input type="password" placeholder="Password" class="form-control" name="password" id="password" pattern=".{8,12}" title="Harus 8-12 karakter" autocomplete="off">
                    <i class="bi bi-eye" id="togglePassword"></i>
            </div>
            <div class="login-btn">
                <p>Belum punya akun ? <a href="form/register.php">Register</a></p>
                <button type="button" class="btn btn-primary" id="login">Login</button>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="assets/js/jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery/jquery.mask.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
});

    function post(){
        
    }

    $("#login").click(function(){
        var username = $("#username").val();
        var password = $("#password").val();

        if(username == ""){
            Swal.fire({
                icon: 'error',
                text: 'Username harus diisi !',
            }); 
        }
        else if(password == ""){
            Swal.fire({
                icon: 'error',
                text: 'Password harus diisi !',
            }); 
        }
        else{
            $.ajax({
                type: 'POST',
                url: 'form/backend/login_register.php',
                data: { 
                    username: username,
                    password: password,
                    type: "login",
                },
                success:function(response){
                    var jsonData = JSON.parse(response);

                    if(jsonData.error == "not_found"){
                        Swal.fire({
                            icon: 'error',
                            title: 'Username Not Found',
                            text: 'Username tidak ditemukan !',
                        }); 
                    }
                    else if(jsonData.error == "wrong_password"){
                        Swal.fire({
                            icon: 'error',
                            title: 'Wrong Password',
                            text: 'Password salah !',
                        }); 
                    }
                    else if(jsonData.success == "login success"){
                        window.location.href = "form/index.php";
                    }
                }
            });
        }
    }); 

    var input = document.getElementById("password");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            var username = $("#username").val();
            var password = $("#password").val();

            if(username == ""){
                Swal.fire({
                    icon: 'error',
                    text: 'Username harus diisi !',
                }); 
            }
            else if(password == ""){
                Swal.fire({
                    icon: 'error',
                    text: 'Password harus diisi !',
                }); 
            }
            else{
                $.ajax({
                    type: 'POST',
                    url: 'form/backend/login_register.php',
                    data: { 
                        username: username,
                        password: password,
                        type: "login",
                    },
                    success:function(response){
                        var jsonData = JSON.parse(response);

                        if(jsonData.error == "not_found"){
                            Swal.fire({
                                icon: 'error',
                                title: 'Username Not Found',
                                text: 'Username tidak ditemukan !',
                            }); 
                        }
                        else if(jsonData.error == "wrong_password"){
                            Swal.fire({
                                icon: 'error',
                                title: 'Wrong Password',
                                text: 'Password salah !',
                            }); 
                        }
                        else if(jsonData.success == "login success"){
                            window.location.href = "form/index.php";
                        }
                    }
                });
            }
        }
    });
</script>