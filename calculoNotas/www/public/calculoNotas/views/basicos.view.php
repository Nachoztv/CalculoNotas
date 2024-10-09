<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $data['titulo']; ?></h1>

</div>

<!-- Content Row -->

<div class="row">

    <div class="col-6">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['div_titulo1']; ?></h6>
            </div>
            <div class="card-body">
                El cuadrado del número <?php echo $data['ej1_x'];?> es <?php echo $data['ej1_y'];?>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['div_titulo2']; ?></h6>
            </div>
            <div class="card-body">
                El precio hora es <?php echo $data['x'];?> €, se han trabajado <?php echo $data['y'];?> horas por lo que se pagarán <?php echo $data['z'];?> €
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['div_titulo3']; ?></h6>
            </div>
            <div class="card-body">
               Base <?php echo $data['base'];?> y altura <?php echo $data['altura'];?> de un rectangulo. Area: <?php echo $data['area'];?> y Perimetro <?php echo $data['perimetro'];?>
            </div>
        </div>
    </div>
    <div class="col-6">
    <div class="card shadow mb-4">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['div_titulo4']; ?></h6>
        </div>
        <div class="card-body">
            Alumno: <?php echo $data['nombre_alumno'];?> <br> Edad: <?php echo $data['edad_alumno'];?> <br> Nota Media:  <?php echo $data['media_alumno'];?>
        </div>
    </div>
</div>
    <div class="col-6">
    <div class="card shadow mb-4">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['div_titulo5']; ?></h6>
        </div>
        <div class="card-body">
            Hotel Ignacios <br>  precio/noche por temporada baja: <?php echo $data['precio_noche_baja'];?> <br>  precio/noche en temporada alta: <?php echo $data['precio_noche_alta'];?> <br> número de noches alojado en temporada alta:  <?php echo $data['num_noches_alta'];?> <br> número de noches alojado en temporada baja:  <?php echo $data['num_noches_baja'];?> <br> factura de noches alojado en temporada baja:  <?php echo $data['precios_noches_baja'];?> <br> factura de noches alojado en temporada alta:  <?php echo $data['precios_noches_alta'];?>
        </div>
    </div>
</div>
    <div class="col-6">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['div_titulo6']; ?></h6>
            </div>
            <div class="card-body">
                Radio del circulo:  <?php echo $data['radio_cir'];?> <br> Area: <?php echo $data['area_cir'];?> <br> Perimetro: <?php echo $data['perimetro_cir'];?>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['div_titulo7']; ?></h6>
            </div>
            <div class="card-body">
                KM/H:  <?php echo $data['kmh'];?> <br> M/S:  <?php echo $data['ms'];?>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['div_titulo8']; ?></h6>
            </div>
            <div class="card-body">
                El número <?php echo $data['num_entero'];?> está formado por <?php echo $data['c'];?> centenas, <?php echo $data['d'];?> decenas y <?php echo $data['u'];?> unidades
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['div_titulo9']; ?></h6>
            </div>
            <div class="card-body">
                La cadena de texto  "<?php echo $data['cad_texto'];?>" está formada por <?php echo $data['cad_carac'];?> caracteres y <?php echo $data['cad_pala'];?> palabras
            </div>
        </div>
    </div>
</div>

