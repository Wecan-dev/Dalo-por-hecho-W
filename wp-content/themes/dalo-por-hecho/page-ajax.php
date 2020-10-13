<?php
global $wpdb; 


$html = '';
$key = $_POST['key'];
$job_location = $_POST['job_location'];


$arraycolombia = array(
'Bogotá, Cundinamarca',
'Medellín, Antioquia',
'Cali, Valle del Cauca',
'Barranquilla, Atlántico',
'Cartagena de Indias, Bolívar',
'Soacha, Cundinamarca',
'Cúcuta, Norte de Santander',
'Soledad, Atlántico',
'Bucaramanga, Santander',
'Bello, Antioquia',
'Villavicencio, Meta',
'Ibagué, Tolima',
'Santa Marta, Magdalena',
'Valledupar, Cesar',
'Manizales, Caldas',
'Pereira, Risaralda',
'Montería, Córdoba',
'Neiva, Huila',
'Pasto, Nariño',
'Armenia, Quindío',


	);
if($key != NULL){ 
$termToSearch = $key;
$matches = array_filter($arraycolombia, function($var) use ($termToSearch) { return stristr($var, $termToSearch); });
if($matches) {
   // echo 'Se ha encontrado el termino "'.$termToSearch.'" en los siguientes campos: <br>';
    foreach ($matches as $match) {
      //  echo $match.'<br>';
        $html .= '<div><a href="'.get_home_url().'/buscar-tarea/?location='.$match.'" class="suggest-element"  data="'.$match.'" id="product'.$row['id_product'].'">'.$match.'</a></div>';
    }
} else {
    echo 'El termino "'.$termToSearch.'" no se ha encontrado en el array.';
}
}//if
if($job_location != NULL){ 
$termToSearch = $job_location;
$matches = array_filter($arraycolombia, function($var) use ($termToSearch) { return stristr($var, $termToSearch); });
if($matches) {
   // echo 'Se ha encontrado el termino "'.$termToSearch.'" en los siguientes campos: <br>';
    foreach ($matches as $match) {
      //  echo $match.'<br>';
          $match1 = $match;
        $html .= '<div><a class="suggest-element"  data="'.$match.'" id="product'.$row['id_product'].'">'.$match.'</a></div>';
    }
} else {
    echo 'El termino "'.$termToSearch.'" no se ha encontrado.';
}
}//if
echo $html;
?>