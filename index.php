<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Arreglos y vectores</title>
        <link rel="stylesheet" type="text/css" href="estilo.css"/>

        <?php
            function obtenerPromedioGeneral($vector){
                $cont = 0;
                $promedio = 0;

                foreach ($vector as $key => $value) {
                    foreach ($value as $c){
                        $promedio += $c;
                        $cont++;
                    }
                }

                return $promedio / $cont;
                
            }

            function obtenerPromedioPorAlumno($vector){
                foreach ($vector as $key => $value) {
                    $promedioAl = 0;
                    $cont = 0;
                    foreach ($value as $c){
                        $promedioAl += $c;
                        $cont++;
                    }
                    
                    $promedioPorAlumno[$key] = ($promedioAl / $cont);
                }

                return $promedioPorAlumno;
            }

            function obtenerPromedioPorMateria($vector){
                $posicion = 0;
                $materias = array(
                    "Conmutación y Enrutamiento en Redes de Datos",
                    "Lenguajes y Automatas II",
                    "Programación Paralela y Concurrente",
                    "Programación Web",
                    "Sistemas Programables",
                    "Taller de Investigación I"
                );
                

                while($posicion < sizeof($materias)){
                    $promedioMa = 0;
                    $cont = 0;

                    foreach ($vector as $key => $value) {
                        $promedioMa += $value[$posicion];
                        $cont++;
                    }

                    $promedioPorMateria[$materias[$posicion]] = $promedioMa / $cont;
                    $posicion++;
                }

                return $promedioPorMateria;
            }

            function obtenerMejorPromedioPorAlumno($vector){
                $mejor = 0;
                $clave = "";
                
                foreach ($vector as $key => $value) {
                    if ($value > $mejor) {
                        $mejor = $value;
                        $clave = $key;
                    }
                }

                $mejorPromedio[$clave] = $mejor;

                //en caso de que sean dos o mas con el mismo promedio
                foreach ($vector as $key => $value) {
                    if ($value == $mejor) {
                        $mejorPromedio[$key] = $value;
                    }
                }

                 return $mejorPromedio;  
            }

            function obtenerAlumnosPromedioArribaPromedioGeneral($vector, $promedioG){
                $alumnosArribaPromedio = 0;

                foreach ($vector as $key => $value) {
                    if ($value >= $promedioG) {
                        $alumnosArribaPromedio++;
                    }
                }
                
                return $alumnosArribaPromedio;  
            }
        ?>
    </head>

    <body>
        <header>
			<h1>Arreglos y vectores</h1>
		</header>

		<nav>
			<a class="active"></a>
		</nav>

        <br><br>
        <h3>Lista de alumnos y calificaciones</h3>

        <table>
            <thead>
                <th class="titulos">Alumno</th>
                <th class="titulos">Conmutación y Enrutamiento en Redes de Datos</th>
                <th class="titulos">Lenguajes y Automatas II</th>
                <th class="titulos">Programación Paralela y Concurrente</th>
                <th class="titulos">Programación Web</th>
                <th class="titulos">Sistemas Programables</th>
                <th class="titulos">Taller de Investigación I</th>
            </thead>
            <tbody>
                <?php
                    $vector_calificaciones_alumnos = array(
                        "Juan Perez" => array(100, 80, 95, 75, 85, 90),
                        "Cristofer Casas" => array(90, 100, 80, 85, 90, 95),
                        "Guadalupe Vazquez" => array(85, 90, 95, 95, 100, 100),
                        "Adriana Marquez" => array(80, 85, 90, 95, 100, 80),
                        "Benjamin Viramontes" => array(75, 80, 85, 90, 95, 100),
                        "Alan Guzman" => array(75, 80, 80, 85, 85, 95),
                        "Leticia Carrera" => array(90, 90, 85, 75, 95, 100),
                        "Berenice Flores" => array(100, 90, 100, 95, 85, 90),
                        "Perla Reveles" => array(90, 90, 85, 85, 85, 80),
                        "Habraham Rios" => array(85, 85, 90, 90, 95, 90),                
                    );

                    foreach ($vector_calificaciones_alumnos as $key => $value) {
                        echo "<tr><td class='alumno'>".$key."</td>";
                        foreach ($value as $c){
                            echo "<td>".$c."</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

        <br><br>
        <h3>Lista de alumnos y calificaciones CON PROMEDIO</h3>

        <?php
            //echo "<label> El promedio general es: ";
            $promedioGeneral = obtenerPromedioGeneral($vector_calificaciones_alumnos);
            //echo $promedioGeneral."</label><hr>";
            
            $promedioAlumnos = obtenerPromedioPorAlumno($vector_calificaciones_alumnos);
            //foreach ($promedioAlumnos as $key => $value) {
            //    echo "<label>El promedio de \"".$key."\" es: ".$value."</label><br>";
            //}
            //echo "<hr>";

            $promedioMaterias = obtenerPromedioPorMateria($vector_calificaciones_alumnos);
            //foreach ($promedioMaterias as $key => $value) {
            //    echo "<label>El promedio de \"".$key."\" es: ".$value."</label><br>";
            //}
            //echo "<hr>";
        ?>

        <table>
            <thead>
                <th class="titulos">Alumno</th>
                <th class="titulos">Conmutación y Enrutamiento en Redes de Datos</th>
                <th class="titulos">Lenguajes y Automatas II</th>
                <th class="titulos">Programación Paralela y Concurrente</th>
                <th class="titulos">Programación Web</th>
                <th class="titulos">Sistemas Programables</th>
                <th class="titulos">Taller de Investigación I</th>
                <th class="titulos2">Promedio</th>
            </thead>
            <tbody>
                <?php
                    foreach ($vector_calificaciones_alumnos as $key => $value) {
                        echo "<tr><td class='alumno'>".$key."</td>";
                        foreach ($value as $c){
                            echo "<td>".$c."</td>";
                        }
                        echo "<td class='promedio'>".$promedioAlumnos[$key]."</td>";
                        echo "</tr>";
                    }
                    echo "<tr><td class='alumno2'>Promedio</td>";
                    foreach ($promedioMaterias as $key => $value) {
                        echo "<td class='promedio'>".$value."</td>";
                    }
                    echo "<td class='promedioG'>".$promedioGeneral."</td>";
                    echo "</tr>";
                ?>
            </tbody>
        </table>

        <br><hr>

        <?php
            $promedioMasAlto = obtenerMejorPromedioPorAlumno($promedioAlumnos);
            foreach ($promedioMasAlto as $key => $value) {
                echo "<label> El alumno con mejor promedio es \"".$key."\" con: ".$value." de promedio</label><br>";
            }
            echo "<hr>";

            echo "<label> La cantidad de alumnos que tienen promedio por arriba del promedio general es: ".obtenerAlumnosPromedioArribaPromedioGeneral($promedioAlumnos, $promedioGeneral)."</label><hr>";
        ?>

        <footer> 
			<div>
				&copy; Derechos Reservados <b> CCM </b> <i> 2020 </i>
			</div>

			<div>
				Contacto: cristofer32513@gmail.com
			</div>
		</footer>
    </body>
</html>