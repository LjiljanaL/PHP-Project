<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            background-color: #D8E7F4;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">ПРИЈАВА</h4>
                </div>
                <div class="card-body">
                    <form action="prijavaprovera.php" method="POST">
                        <div class="form-group">
                            <label for="korisnickoIme">Корисник</label>
                            <input name="korisnickoIme" type="text" class="form-control" placeholder="Унесите корисничко име">
                        </div>
                        <div class="form-group">
                            <label for="sifra">Шифра</label>
                            <input name="sifra" type="password" class="form-control" placeholder="Унесите шифру">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="loginuser" value="ПРИЈАВИ СЕ" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>