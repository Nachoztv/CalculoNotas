<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Iterativas 07</h1>

</div>
<!-- Content Row -->
<div class="row">
    <?php
    if(isset($data['contabilizado'])){
        ?>
        <div class="col-12">
            <div class="alert alert-success">
                <?php print_r($data['contabilizado']);?>
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
            <h6 class="m-0 font-weight-bold text-primary">Inserte un numero</h6>
        </div>
        <div class="card-body">
           <?php if (isset($_GET['carton'])){
                //var_dump($_GET['carton']);
               var_dump($_GET);
               $carton = $_GET['carton'];
               $bolas = $_GET['bolas'];
           }else{
               $carton = [rand(1,79)];
                   $bolas = [];
           }
           $bolas[] = rand(1,79);
           $datos = [

               'carton' =>$carton,
               'bolas' => $bolas
           ];
           ?>
        </div>
    </div>
</div>