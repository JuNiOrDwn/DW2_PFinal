<!--
Integrantes: Carlos Chango, Fernando Vasconez, Juan Negrete
Proyecto: Final (ejercicios PHP)
Archivo: index.php
Descripción: contiene la página principal
-->

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Entregable2</title>
</head>
<body>

<?php
    $formulario = array(
        'nombre' =>
        array('label' => 'Nombre', 'tipo' => 'text', 'placeholder' => 'Ingresa tu nombre', 'minlength' => '10', 'maxlength' => '20', 'required'),
        'apellido' =>
        array('label' => 'Apellido', 'tipo' => 'text', 'placeholder' => 'Ingresa tu apellido', 'minlength' => '10', 'maxlength' => '20', 'required'),
        'correo' =>
        array('label' => 'Correo Electronico', 'tipo' => 'email', 'placeholder' => 'Ingresa tu dirección de email', 'minlength' => '10', 'maxlength' => '20', 'required'),
        'mensaje' =>
        array('label' => 'Mensaje', 'tipo' => 'textarea', 'placeholder' => 'Escribe tu mensaje', 'rows' => '15', 'cols' => '40', 'minlength' => '25', 'maxlength' => '40', 'required'),
        'boton' =>
        array('label' => 'Enviar', 'tipo' => 'submit', 'placeholder' => 'ENVIAR')
    );
?>

<?php

$output = ''; //variable que contendrá el código HTML generado 
foreach ($formulario as $nombre => $atributos) {

    switch ($atributos['tipo']) {

        case "textarea":
            $label = '<label for="' . $nombre . '">' . $atributos['label'] . '</label>';
		    $input = '<textarea name="' . $nombre . '" rows="' . $atributos['rows'] .'" cols="' . $atributos['cols'] .'" minlength="' . $atributos['minlength'] .'" maxlength="' . $atributos['maxlength'] .'" placeholder="' . $atributos['placeholder'] . '" required></textarea>';
        break;

        case "submit":
            $label = '<label></label>';
            $input = '<input type="' . $atributos['tipo'] . '" name="' . $nombre . '" placeholder="' . $atributos['placeholder'] . '" ></input>';
        break;

        default: //caso por defecto para campos tipo text
            $label = '<label for="' . $nombre . '">' . $atributos['label'] . '</label>';
            $input = '<input labe="' . $atributos['label'] . '" type="' . $atributos['tipo'] . '" name="' . $nombre . '" minlength="' . $atributos['minlength'] .'" maxlength="' . $atributos['maxlength'] .'" placeholder="' . $atributos['placeholder'] . '" required></input>';
        break;
    }
    $output .= $label . '<p>' . $input . '</p>'; //concatenar label y campo generados
}

?>

<?php
function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="fondo">
    <div class="cabeza">
        <h1>Universidad San Francisco de Quito</h1>
        <h4>Entregable 2</h4>
    </div>
    <fieldset class="formulario">
        <div class="base"></div>
        <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
            <hr>
            <?php 
            print_r($output);
            ?>
        </from>
    </fieldset>
</div>
</body>
</html>