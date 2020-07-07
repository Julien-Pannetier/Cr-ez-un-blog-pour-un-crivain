<!DOCTYPE html>
<html lang="fr">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Nam condimentum sapien et purus convallis euismod. Praesent blandit eget ligula id placerat. Nunc quis dignissim quam. Duis quis orci erat. Nunc eros justo, placerat dapibus sollicitudin non, lacinia eu nibh.">
        <meta name="author" content="Jean Forteroche" />

        <title>Jean Forteroche</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Toastr CSS -->
        <link href="vendor/toastr/toastr.min.css" rel="stylesheet">

        <!-- Custom fonts -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles -->
        <link href="public/css/main.css" rel="stylesheet">
    </head>
      
    <body>
        <?= $content ?>

        <!-- Footer -->
        <footer class="bg-black small text-center text-white-50">
            <div class="container">
                <div class="social d-flex justify-content-center">
                    <a href="https://www.twitter.com" class="mx-2" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.facebook.com" class="mx-2" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com" class="mx-2" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Toastr JavaScript -->
        <script src="vendor/toastr/toastr.min.js"></script>
        <script>            
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            <?php if(isset($_SESSION['flash'])): ?>
                Command: toastr["<?php echo $_SESSION['flash']['type']; ?>"]("<?php echo $_SESSION['flash']['msg']; ?>")
            <?php 
                unset($_SESSION['flash']);
                endif;
            ?>
        </script>

        <!-- Custom scripts -->
        <script src="public/js/main.js"></script>
    </body>
</html>