<?php 
    date_default_timezone_set('America/Santiago'); 
    include "./db.php";

    $sql = "SELECT * FROM form";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StartCoffeUp</title>
    <link rel="stylesheet" href="/styles/main.css">
</head>
<body>
    <div class="contact_nav">
        <p>
            <strong>Email:</strong>
            <a href="mailto:contac@startcoffeup.cl">contac@startcoffeup.cl</a>
        </p>
        <p>
            <strong>Numero:</strong>
            <a href="tel:+56912345678">+569 12345678</a>
        </p>
        <p>
            <strong>Direccion</strong>
            <span>Calle Coffe #1213, Chillan</span>
        </p>
    </div>
    <nav>
        <h1 class="name_page">
            StartCoffeUp
        </h1>
        <div class="menu">
            <ul>
                <li><a href="index.html#inicio">Inicio</a></li>
                <li><a href="menu.html#cafe">Café</a></li>
                <li><a href="menu.html#comida">Comida</a></li>
                <li><a href="index.html#eventos">Eventos y torneos</a></li>
                <li><a href="nosotros.html">Nosotros</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <form action="/send.php" method="post">
            <input type="text" name="date" id="date" value='<?php echo date("Y-m-d H:i:s"); ?>'>
            <h1>Formulario de Reclamo y Felicitaciones</h1>
            <div class="box">
                <label for="firts_name">Nombre</label>
                <label for="last_name">Apellido</label>
                <input type="text" name="firts_name" id="firts_name">
                <input type="text" name="last_name" id="last_name">
            </div>

            <div class="box">
                <label for="id_rut">RUT</label>
                <label for="type">Tipo</label>
                <input type="text" max='9' name="id_rut" id="id_rut">
                <select name="type" id="type">
                    <option value="_">-- Seleccionar Uno --</option>
                    <option value="great">Felicitaciones</option>
                    <option value="bad">Reclamo</option>
                </select>
            </div>

            <label for="desc">Descripcion</label>
            <textarea name="desc" id="desc" cols="30" rows="10"></textarea>

            <button>Enviar</button>
        </form>

        <section class='list'>
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='card ".$row['type']."'>
                            <div class='header'>
                                ".$row['firts_name']." ".$row['last_name']."

                                <span class='rut'>".$row['id_rut']."</span>
                                <span class='date'>".$row['datr']."</span>
                            </div>
                            <div class='body'>
                                ".$row['descr']."
                            </div>
                        </div>";
                    }
                } else {
                    echo "0 results";
                }
                  $conn->close();
            ?>
        </section>
    </main>
    <footer>
        Creado por un Inacapino <br>
        &copy; StartCoffeUp 2023
    </footer>
</body>
</html>