<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Calculo Notas</h1>

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
                    #myLists ul{
                        border:3px solid brown;
                        border-radius:22px;
                        list-style: none;
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
                            nota más alta(persona)
                        </th>
                        <th>
                            nota más alta
                        </th>
                        <th>
                            nota más baja(persona)
                        </th>
                        <th>
                            nota más baja
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
    <div id="myLists">
    <div class="col-12">
        <div class="card-body">
            <div class="list list-group-item-success">
                <ul>
                    <?php
                    if(!empty($subValor['todo_aprobado'])) {
                        echo "<h3>Alumnos que han aprobado todo:</h3>";
                        foreach ($subValor['todo_aprobado'] as $alumno_aprobado) {
                            echo "<li>" . $alumno_aprobado . "</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card-body">
            <div class="list list-group-item-warning">
                <ul>
                    <?php
                        if (!empty($subValor['alumnos_asignatura_suspensa'])) {
                            echo "<h3>Alumnos que han suspendido al menos una asignatura:</h3>";
                            foreach ($subValor['alumnos_asignatura_suspensa'] as $alumno_suspenso) {
                                echo "<li>" . $alumno_suspenso . "</li>";
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
        <div class="col-12">
            <div class="card-body">
                <div class="list list-group-item-info">
                    <ul>
                        <?php
                        if (!empty($subValor['alumnos_promocionan'])) {
                            echo "<h3>Alumnos que promocionan (alumnos que han suspendido como máximo una asignatura):</h3>";
                            foreach ($subValor['alumnos_promocionan'] as $alumno_promociona) {
                                echo "<li>" . $alumno_promociona . "</li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
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
            <form action="./?sec=calculoNotas.ignacio" method="post">
                <div class="mb-3 col-12">
                    <label for="textarea">Inserte un json</label>
                    <textarea class="form-control" id="json" name="json" rows="10"><?php echo $data['input_json'] ?? '';?></textarea>
                    <p class = "text-danger small" ><?php echo $data['errors']['json'] ?? '' ;?></p>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Enviar" name="enviar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

