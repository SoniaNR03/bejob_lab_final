<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formato registro SCIII</title>
    <link rel="estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="group">
        <form method="POST" action="">
            <h2><em>Formulario de registro</em></h2>
            <label for="nombre">Nombre <span><em>(requerido)</em></span></label>
            <input type="text" name = "nombre" class="form-input" required/>

            <label for="apellido">Apellido <span><em>(requerido)</em></span></label>
            <input type="text" name = "apellido" class="form-input" required/>

            <label for="email">Email <span><em>(requerido)</em></span></label>
            <input type="text" name = "email" class="form-input" required/>

            <input type="submit" class="form-btn" name="submit" value="suscribirse"/>


        <?php
        if($_POST){
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $email = $_POST["email"];
            // conexion con PDO
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cursosql";
            // create conection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // check connection
            if($conn->connect_error){
                die("Connection failed: " .$conn->connect_error);
            }
            $sql = "INSERT INTO usuarios (nombre, apellido, email)
            VALUES ('$nombre', '$apellido', '$email')";
            if($conn->query($sql) === TRUE){
                echo "New record created successfully";

            }else{
                echo "Error: " .$sql . "<br>" . $conn->error;

            }
            $conn->close();
        
        }
        ?>

        </form>
    </div>
    
</body>
</html>
