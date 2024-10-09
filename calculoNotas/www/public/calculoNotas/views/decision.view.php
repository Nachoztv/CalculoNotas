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
               Es Divisible?  <?php echo $data['esDiv'];?>
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
              <?php echo $data['num1'];?> <?php echo $data['num2'];?> <?php echo $data['num3'];?>
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
                Estos <?php echo $data['seg'];?> segundos, son: <?php echo $data['min'];?> minutos, <?php echo $data['hour'];?> horas, y <?php echo $data['days'];?>  dias.
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
                Año: <?php echo $data['ano'];?><br/>
                Es Bisiesto: <?php echo $data['bisiesto'];?>
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
                <?php echo $data['descuento'];?><br/><?php echo $data['neto'];?><br/><?php if( $data['neto'] > 2000) : ?>
                <p class="alert alert-success">Felicidades, tienes un salario por encima de la media.</p><?php endif;?>
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
                <?php echo $data['nota'];?><br/>
                    <?php if($data['nota'] < 5) : ?>
                        <p class="alert alert-danger"><?php echo $data['cuali'];?></p>
                    <?php elseif($data["nota"] >= 5 && $data["nota"] < 6) : ?>
                        <p class="alert alert-warning"><?php echo $data['cuali'];?></p>
                    <?php elseif($data["nota"] >= 6 && $data["nota"] < 7) : ?>
                        <p class="alert alert-info"><?php echo $data['cuali'];?></p>
                    <?php elseif($data["nota"] >= 7 && $data["nota"] < 8.75) : ?>
                        <p class="alert alert-info"><?php echo $data['cuali'];?></p>
                    <?php elseif($data["nota"] >= 8.75 && $data["nota"] < 10) : ?>
                        <p class="alert alert-success"><?php echo $data['cuali'];?></p>
                    <?php else : ?>
                        <p class="alert alert-success"><?php echo $data['cuali'];?></p>
                    <?php endif;?>
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
                <?php echo $data['bebida'];?> , es un <?php echo $data['tipoBebida'];?>.
            </div>
        </div>
    </div>
</div>