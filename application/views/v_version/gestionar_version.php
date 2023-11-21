<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <center><h3 class="text text-muted"><strong>Bienvenido a la <?= $nombre?></strong>  </h3></br>
    <div class="row">
        <div class="col-md-6 col-offset-md-1">
            <center class="text text-success">Porcentaje de Alumnos Aprobados y Reprobados por Modulo (%)</center>
            <center><div id="grafica_modu_porcent" style="height: 180px; width: 500px; "></div></center>
            <pre id="code" class="prettyprint linenums"></pre>
        </div>
        <div class="col-md-5">
            <center class="text text-success">Defensas de Monografia por Fecha</center>
            <center><div id="graph5" style="height: 180px; width: 500px; "></div></center>
            <pre id="code" class="prettyprint linenums"></pre>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col-md-6 col-offset-md-1">
            <center class="text text-danger"><strong>Alumnos Reprobados por Modulo (%)</strong></center>
            <center><div id="gReprobados_donut" style="height: 200px; width: 400px; "></div></center>
            <pre id="" class="prettyprint linenums"><center class="text text-danger">Reprobados por Modulo (%)</center></pre>
        </div>
        <div class="col-md-5">
            <center class="text text-primary"><strong>Alumnos Aprobados por Modulo (%)</strong></center>
            <center><div id="gAprobados_donut" style="height: 200px; width: 400px; "></div></center>
            <pre id="" class="prettyprint linenums"><center class="text text-default"> Reprobados por Modulo (%)</center></pre>
        </div>
    </div>
</div>