<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Calculo Notas</h1>

</div>
<!-- Content Row -->
<div class="row">

    <div class="col-12">
            <!--class="table table-striped"-->
        <div class="card-body">
                <?php
                if(isset($data['resultado'] )){?>
                <style>
                    table, th, td {
                        border: 1px solid black;

                        text-align: center;
                    }
                </style>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            Asignatura
                        </th>
                        <th>
                            nota media
                        </th>
                        <th>
                            número de aprobados
                        </th>
                        <th>
                            número de suspenso
                        </th>
                        <th>
                            nota más alta
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
                echo "<td>".((is_numeric($subValor['media'])) ? number_format($subValor['media'], 2, ',') : $subValor['media'])."</td>";
                echo "<td>".$subValor['aprobados']."</td>";
                        echo "<td>".$subValor['suspensos']."</td>";
                echo "<td>".$subValor['max']['alumnos'].":".$subValor['max']['notas']."</td>";
                echo "<td>".$subValor['min']['alumnos'].":".$subValor['min']['notas']."</td>";
                echo "</tr>";
                    }
                        ?>

                    </tbody>
                </table>
            </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="card-body">
            <div class="alert alert-success">
                <ul>
                    <?php
                    if (!empty($subValor['todo_aprobado'])) {
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
    <div class="col-12 col-lg-6">
        <div class="card-body">
            <div class="alert alert-warning">
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
        <div class="col-12 col-lg-6">
            <div class="card-body">
                <div class="alert alert-info">
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
        <div class="col-12 col-lg-6">
            <div class="card-body">
                <div class="alert alert-danger">
                    <ul>
                        <?php
                        if (!empty($subValor['alumnos_no_promocionan'])) {
                            echo "<h3>Alumnos que no promocionan (alumnos que han suspendido 2 o más asignaturas)</h3>";
                            foreach ($subValor['alumnos_no_promocionan'] as $alumno_no_promociona) {
                                echo "<li>" . $alumno_no_promociona . "</li>";
                            }
                        }
                        ?>
                    </ul>
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
                    <textarea class="form-control" id="json" name="json" rows="10"><?php echo isset($data['input']['json']) ? $data['input']['json'] : ''; ?></textarea>
                    <p class = "text-danger small" ><?php if(isset($data['errors']['json'])) foreach($data['errors']['json'] as $error){if (is_array($error)){
                        echo implode("<br>", $error) . '<br/>';
                        }else{
                        echo $error . '<br/>';
                        }}?></p>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Enviar" name="enviar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

