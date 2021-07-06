<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <title>Register</title>
</head>
<body>
    <div class="container">
        <form>
            <h2>Register</h2>
            <div class="form-group">
                <label for="username">Username : </label>
                <input type="text" name="username" id="username" placeholder="Username" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="name">Nama : </label>
                <input type="text" name="name" id="name" placeholder="Nama" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password : </label>
                <input type="password" placeholder="Password" class="form-control" name="password" id="password" pattern=".{8,12}" title="Harus 8-12 karakter" autocomplete="off">
                    <i class="bi bi-eye" id="togglePassword"></i>
            </div>
            <div class="form-group">
                <label for="re-password">Confirm Password : </label>
                <input type="password" placeholder="Confirm Password" class="form-control" name="re_password" id="re-password" pattern=".{8,12}" title="Harus 8-12 karakter" autocomplete="off">
                    <i class="bi bi-eye" id="togglePassword1"></i>
            </div>
            <div class="login-btn">
                <p>Sudah punya akun ? <a href="../">Login</a></p>
                <button type="button" class="btn btn-primary" id="register">Register</button>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="../assets/js/jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/sweetalert2/sweetalert2.min.js"></script>
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

const togglePassword1 = document.querySelector('#togglePassword1');
    const password1 = document.querySelector('#re-password');

    togglePassword1.addEventListener('click', function (e) {
    // toggle the type attribute
    const type1 = password1.getAttribute('type') === 'password' ? 'text' : 'password';
    password1.setAttribute('type', type1);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
});

    $("#register").click(function(){
        var username = $("#username").val();
        var name = $("#name").val();
        var pass = $("#password").val();
        var re_pass = $("#re-password").val();

        if(username == ""){
            Swal.fire({
                icon: 'error',
                text: 'Username harus diisi !',
            }); 
        }
        else if(name == ""){
            Swal.fire({
                icon: 'error',
                text: 'Nama harus diisi !',
            }); 
        }
        else if(name == username){
            Swal.fire({
                icon: 'error',
                text: 'Nama dan Username tidak boleh sama !',
            }); 
        }
        else if(pass == ""){
            Swal.fire({
                icon: 'error',
                text: 'Password harus diisi !',
            }); 
        }
        else if(re_pass == ""){
            Swal.fire({
                icon: 'error',
                text: 'Confirm Password harus diisi !',
            }); 
        }
        else if(pass != re_pass){
            Swal.fire({
                icon: 'error',
                title: 'Password tidak cocok',
                text: 'Password dan Confirm Password tidak sama !!!',
            }); 
        }
        else{
            $.ajax({
                type: 'POST',
                url: 'backend/login_register.php',
                data: {
                    username: username,
                    name: name,
                    password: pass,
                    type: "register",
                },
                success:function(response){
                    var jsonData = JSON.parse(response);
                    if(jsonData.username_found == "found"){
                        Swal.fire({
                            icon: 'error',
                            title: "Username Found",
                            text: 'Username telah dipakai !',
                            allowOutsideClick: false,
                        });
                    }
                    else if(jsonData.success == "berhasil"){
                        Swal.fire({
                            icon: 'success',
                            title: 'Registrasi',
                            text: 'Registrasi berhasil dilakukan !',
                            allowOutsideClick: false,
                        }).then((result)=>{
                            if(result.isConfirmed){
                                window.location.href = "register.php";
                            }
                        });
                    }
                }
            });
        }
    });
</script>