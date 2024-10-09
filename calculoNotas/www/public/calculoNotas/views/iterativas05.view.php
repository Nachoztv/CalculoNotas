<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Iterativas 05</h1>

</div>
<!-- Content Row -->
<div class="row">
    <?php
    if(isset($data['contabilizado'])){
        ?>
        <div class="col-12">
            <div class="alert alert-success">
                <?php
                $primera = true;
                foreach($data['contabilizado'] as $palabra => $num){
                    if($primera){
                        echo "$palabra: $num";
                    }
                    else{
                        echo ", $palabra: $num";
                    }
                    $primera = false;
                }
                ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<div class="col-12">
    <div class="card shadow mb-4">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Contar letras</h6>
        </div>
        <div class="card-body">
            <form action="./?sec=iterativas05" method="post">
                <div class="mb-3 col-12">
                    <label for="textarea">Inserte</label>
                    <textarea class="form-control" id="texto" name="texto" rows="3"><?php echo $data['input_texto'] ?? '';?></textarea>
                    <p class = "text-danger small" ><?php echo $data['errors']['texto'] ?? '' ;?></p>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Enviar" name="enviar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
