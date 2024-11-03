<?php
include "model/auth.php";
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <div class="container">
            <h1 class="text-center py3 text-capitalize">Login</h1>
            <div class="login-result"></div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="" method="post" id="registration-form">
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input
                        type="text"
                        name="user-name"
                        id="user-name"
                        class="form-control"
                        placeholder=""
                        aria-describedby="helpId"
                    />
                    <small class="name_error"></small>
                </div>
                
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input
                        type="text"
                        name="user-password"
                        id="user-password"
                        class="form-control"
                        placeholder=""
                        aria-describedby="helpId"
                    />
                    <small  class="name_error"></small>
                </div>
                <button
                    type="submit"
                    class="btn btn-outline-primary"
                    id="registeration"name="registeration"
                >
                    Submit
                </button>
                </form>
            </div>
        </div>
        </div>
        <script src="assets/js/jquery-3.7.1.min.js"></script>
        <script src="assets/js/script.js"></script>

    </body>
</html>
