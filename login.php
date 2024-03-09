<style>

</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Login WebGal Photo</title>
    <link rel="icon" type="image/x-icon" href="assets/blue.ico" />
</head>

<body>



    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="config/proses_register.php" method="post">
                <h2>Create Account</h2>
                <input type="text" name="username" class="form-control" required placeholder="Username">
                <input type="password" id="passwordInput" name="password" class="form-control" required placeholder="Password">
                <input type="email" name="email" class="form-control" required placeholder="Email">
                <input type="text" name="namalengkap" class="form-control" required placeholder="Nama Lengkap">
                <input type="text" name="alamat" class="form-control" required placeholder="Alamat">
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="config/proses_login.php" method="post">
                <h1>Sign In</h1>
                <label class="form-label"></label>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
                <label class="form-label"></label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>

                <button>Sign In</button>
                <span class="mt-3">Or</span>
                <button class="bg-warning" onclick="window.location.href='index.php';">Back</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Login your account</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello!</h1>
                    <p>Register your new account</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });
    </script>
</body>

</html>