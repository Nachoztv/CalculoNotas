<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Iterativas 08 n</h1>

</div>
<!-- Content Row -->
<div class="row">

    <div class="col-12">
            <!--class="table table-striped"-->
        <div class="card-body">
            <div class="table table-striped">
                <?php
                if(isset($data['resultado'] )){?>
                <style>
                    table, th, td {
                        border: 1px solid black;

                        text-align: center;
                    }
                </style>
                <table>
                    <thead>
                    <tr>
                        <th style="width:12.5 %">
                            Asignatura
                        </th>
                        <th>
                            nota media
                        </th>
                        <th>
                            número de suspenso
                        </th>
                        <th>
                            número de aprobados
                        </th>
                        <th>
                            nota más alta
                        </th>
                        <th>
                            nota más alta(persona)
                        </th>
                        <th>
                            nota más baja
                        </th>
                        <th>
                            nota más baja(persona)
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($data['resultado'] as $subKey => $subValor){
                echo "<tr>";
                echo "<td>".$subKey."</td>";
                echo "<td>".number_format($subValor['media'],2,',')."</td>";
                echo "<td>".$subValor['suspensos']."</td>";
                echo "<td>".$subValor['aprobados']."</td>";
                    foreach($subValor['max'] as $subMax => $subMaxValor) {
                        echo "<td>" . $subMaxValor . "</td>";
                    }
                        foreach($subValor['min'] as $subMin => $subMinValor) {
                            echo "<td>" . $subMinValor . "</td>";
                        }
                echo "<tr>";
                    }
                        ?>

                    </tbody>
                </table>
            </div>
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
            <h6 class="m-0 font-weight-bold text-primary">Inserte un json</h6>
        </div>
        <div class="card-body">
            <form action="./?sec=iterativas08" method="post">
                <div class="mb-3 col-12">
                    <label for="textarea">Inserte un json</label>
                    <textarea class="form-control" id="json" name="json" rows="30"><?php echo $data['input_json'] ?? '';?></textarea>
                    <p class = "text-danger small" ><?php echo $data['errors']['json'] ?? '' ;?></p>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Enviar" name="enviar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

