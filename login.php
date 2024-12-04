<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Admin</title>
    <link href="src/" rel="stylesheet">
    <link href="src/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="src/dist/css/style.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .auth-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .auth-box {
            display: flex;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 800px;
        }

        .modal-bg-img {
            background-image: url(https://cdni.iconscout.com/illustration/premium/thumb/abstract-geometric-pattern-with-stripes-lines-illustration-download-in-svg-png-gif-file-formats--line-logo-pack-background-patterns-illustrations-1555636.png);
            background-size: cover;
            background-position: center;
            width: 50%;
        }

        .bg-white {
            width: 50%;
            padding: 40px;
        }

        .auth-box .p-3 {
            padding: 40px;
        }

        h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #495057;
        }

        input {
            font-size: 16px;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ced4da;
            width: 100%;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            font-size: 16px;
            padding: 10px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 6px;
            background-color: #f8d7da;
            color: #721c24;
            text-align: center;
        }

        @media (max-width: 768px) {
            .auth-box {
                flex-direction: column;
                width: 90%;
            }

            .modal-bg-img {
                display: none;
            }

            .bg-white {
                width: 100%;
                padding: 30px;
            }
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div class="auth-wrapper">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <h2 class="mt-5 text-center">Admin Login</h2>
                        <p class="mt-4 text-center">Enter your username and password</p>

                        <!-- Tampilkan pesan error jika login gagal -->
                        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                            <div class="alert alert-danger text-center">Invalid username or password!</div>
                        <?php endif; ?>

                        <!-- Form login -->
                        <form action="process/process_login.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="src/assets/libs/jquery/dist/jquery.min.js "></script>
    <script src="src/assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="src/assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>
