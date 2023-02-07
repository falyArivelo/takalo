<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
    <script src="../assets/js/bootstrap/bootstrap.min.js"></script>
    <title>Sign up To Takalo-Takalo</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header"> Insertion </div>
            
            <div class="card-body">
                <form action="<?php echo base_url() ; ?>Authentification/data_insert" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nom : </label>
                                <input type="text" class="form-control" name="email" placeholder="Votre nom ... ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mot de passe : </label>
                                <input type="password" class="form-control" name="password" placeholder="Votre mot de passe ... ">
                            </div>
                        </div>

                        <input type="submit" value="Okay" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>