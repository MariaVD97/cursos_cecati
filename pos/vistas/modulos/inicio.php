<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tabla de Cursos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active"> Tabla de Cursos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Grupo</th>
           <th>Nombre del curso</th>
           <th>Docente</th>
           <th>Fecha de Inicio</th>
           <th>Fecha de Terminación</th>
           <th>Inscritos</th>
           <th>Egresados</th>
           <th>Días</th>
           <th>Horario</th>
           <th>Costo</th>
           <th>Observaciones</th>

         </tr> 

        </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          $cursos = ControladorCursos::ctrMostrarCursos($item, $valor);

          foreach ($cursos as $key => $value) {
            echo '<tr>

            <td>'.($key+1).'</td>
            <td>'.$value["grupo"].'</td>
            <td>'.$value["nombre"].' </td>
            <td>'.$value["docente"].'</td>
            <td>'.$value["fecha_inicio"].'</td>
            <td>'.$value["fecha_terminacion"].'</td>
            <td>'.$value["inscritos"].'</td>
            <td>'.$value["egresados"].'</td>
            <td>'.$value["dias"].'</td>
            <td>'.$value["horario"].'</td>
            <td>'.$value["costo"].'</td>
            <td>'.$value["observaciones"].'</td>

          </tr>';



          }

          ?>
          

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>
