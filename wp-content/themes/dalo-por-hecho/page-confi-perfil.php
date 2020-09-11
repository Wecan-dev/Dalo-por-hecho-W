<?php get_header();?>
    <div class="container perfil m-110">
        <section>
            <div class="container vertical-tabs">
                <div class="row">
                    <div class="col-md-3 content-barra-lateral">
                        <div class="perfil-content">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/user2.png" alt="">
                            <p class="mt-3 mb-4"> Nombre y apellido</p>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab"
                            aria-controls="v-pills-history" aria-selected="false">Hitorial de pagos</a>

                            <a class="nav-link" id="v-pills-method-tab" data-toggle="pill" href="#v-pills-method"
                                role="tab" aria-controls="v-pills-method" aria-selected="false">Método de pago</a>

                            <a class="nav-link" id="v-pills-recomendar-tab" data-toggle="pill" href="#v-pills-recomendar"
                            role="tab" aria-controls="v-pills-recomendar" aria-selected="false">Recomendar a un
                            amigo</a>

                            <a class="nav-link" id="v-pills-f-tab" data-toggle="pill" href="#v-pills-conf" role="tab"
                                aria-controls="v-pills-three" aria-selected="false">Configuración de cuenta</a>

                            <a class="nav-link " id="v-pills-one-tab" data-toggle="pill" href="#v-pills-one"
                            role="tab" aria-controls="v-pills-one" aria-selected="true">Mis aptitudes</a>
                            <a class="nav-link" id="v-pills-f-tab" data-toggle="pill" href="#v-pills-f" role="tab"
                                aria-controls="v-pills-three" aria-selected="false">Mis emblemas</a>
                                
                        
                            <a class="nav-link" id="v-pills-h-tab" data-toggle="pill" href="#v-pills-h" role="tab"
                                aria-controls="v-pills-three" aria-selected="false">Señales de tareas</a>
                                

                        </div>
                    </div>
                    <div class="col-md-8 main-content__tabs">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade " id="v-pills-one" role="tabpanel"
                                aria-labelledby="v-pills-one-tab">
                                <div id="accordion" role="tablist">
                                    <div class="card">
                                        <div class="card-header top-headline" role="tab" id="headingOne">
                                            <h5>
                                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    Mis aptitudes
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show mb-5" role="tabpanel"
                                            aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet
                                                    esse dolorem eligendi dolor assumenda dignissimos, quis laudantium
                                                </p>

                                                <div class="form mb-4">
                                                    <label for="">A que te dedicas</label>
                                                    <input type="text" name="fname"
                                                        placeholder="Coloca tus aptitudes separadas por una ," />
                                                </div>
                                                <div class="form">
                                                    <p>Indica tu medio de transporte</p>
                                                    <div class="col-md-12 check-line">
                                                        <div class="custom-control custom-checkbox">
                                                            <label class="custom-control-label" for="customCheck1">
                                                                En linea</label>
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck1" checked>

                                                        </div>

                                                        <div class="custom-control custom-checkbox">
                                                            <label class="custom-control-label" for="customCheck2">
                                                                Caminando</label>
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck2">

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <label class="custom-control-label" for="customCheck3">
                                                                Bicicleta</label>
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck3">

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <label class="custom-control-label" for="customCheck4">
                                                                Carro</label>
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck4">

                                                        </div>
                                                    </div>
                                                    <div class="form mb-4">
                                                        <label for="">Cuales idioma maneja?</label>
                                                        <input type="text" name="fname" placeholder="Cuales idiomas" />
                                                    </div>

                                                    <div class="form mb-4">
                                                        <label for="">Certificaciones</label>
                                                        <input type="text" name="fname"
                                                            placeholder="Coloca tus aptitudes" />
                                                    </div>

                                                    <div class="form mb-4">
                                                        <label for="">Mi experiencia</label>
                                                        <input type="text" name="fname"
                                                            placeholder="Donde ha trabajado y el tiempo" />
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="" class="btn-custom-bg  mb-5">Guardar cambios</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade  show active" id="v-pills-history" role="tabpanel"
                                aria-labelledby="v-pills-history-tab">
                                <div class="content-metodos-pago">
                                    <h5>Historial de pagos</h5>

                                    <div class="container mt-3">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs h-p-nav-tab">
                                            <li class="nav-item">
                                                <a class="nav-link historial-pago-tab active" data-toggle="tab"
                                                    href="#ganado">Ganado</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link historial-pago-tab" data-toggle="tab"
                                                    href="#saliente">Saliente</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div id="ganado" class="container tab-pane active"><br>
                                                <div class="cont-pago-estado">
                                                    <div class="cont-pago-estado-tab">
                                                        <p>Demostración g</p>
                                                        <div class="cont-pago-estado-form">
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn-d-estado-p dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                    Tiempo
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">Link 1</a>
                                                                    <a class="dropdown-item" href="#">Link 2</a>
                                                                    <a class="dropdown-item" href="#">Link 3</a>
                                                                </div>
                                                            </div>
                                                            <!-- <input class="cont-pago-estado-form_input dropdown-toggle" type="text" placeholder="tiempo"> -->
                                                            <h6>De</h6>
                                                            <input class="cont-pago-estado-form_input" type="date">
                                                            <h6>A</h6>
                                                            <input class="cont-pago-estado-form_input" type="date">
                                                            <div class="cont-pago-estado-form-ganado">
                                                                <h5>Ganado neto</h5>
                                                                <p>000 $</p>
                                                            </div>
                                                        </div>
                                                        <small>1 transacciones del 07 de noviembre del 2020 al 30 de
                                                            noviembre del 2020</small>
                                                        <div class="tabla-pagos">
                                                            <table class="tabla-pagos_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Fecha de la tarea</th>
                                                                        <th>Nombre de la tarea</th>
                                                                        <th>Valoración dada</th>
                                                                        <th>Pago realizado</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="tabla-pagos_table_td">
                                                                            <p>07/11/20</p>
                                                                        </td>
                                                                        <td class="tabla-pagos_table_td">
                                                                            <p>Ayuda para cargar mobiliario</p>
                                                                        </td>
                                                                        <td class="tabla-pagos_table_td">
                                                                            <p>
                                                                            <div class="tabla-pagos_table-valoracion">
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-g">
                                                                                </div>
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-n">
                                                                                </div>
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-n">
                                                                                </div>
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-n">
                                                                                </div>
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-n">
                                                                                </div>

                                                                            </div>
                                                                            </p>
                                                                        </td>
                                                                        <td class="tabla-pagos_table_td">
                                                                            <p class="n-m">$ 20.000</p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="saliente" class="container tab-pane  fade"><br>
                                                <div class="cont-pago-estado">
                                                    <div class="cont-pago-estado-tab">
                                                        <p>Demostración s</p>
                                                        <div class="cont-pago-estado-form">
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn-d-estado-p dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                    Tiempo
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">Link 1</a>
                                                                    <a class="dropdown-item" href="#">Link 2</a>
                                                                    <a class="dropdown-item" href="#">Link 3</a>
                                                                </div>
                                                            </div>
                                                            <!-- <input class="cont-pago-estado-form_input dropdown-toggle" type="text" placeholder="tiempo"> -->
                                                            <h6>De</h6>
                                                            <input class="cont-pago-estado-form_input" type="date">
                                                            <h6>A</h6>
                                                            <input class="cont-pago-estado-form_input" type="date">
                                                            <div class="cont-pago-estado-form-ganado">
                                                                <h5>Ganado neto</h5>
                                                                <p>000 $</p>
                                                            </div>
                                                        </div>
                                                        <small>1 transacciones del 07 de noviembre del 2020 al 30 de
                                                            noviembre del 2020</small>
                                                        <div class="tabla-pagos">
                                                            <table class="tabla-pagos_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Fecha de la tarea</th>
                                                                        <th>Nombre de la tarea</th>
                                                                        <th>Valoración dada</th>
                                                                        <th>Pago realizado</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="tabla-pagos_table_td">
                                                                            <p>07/11/20</p>
                                                                        </td>
                                                                        <td class="tabla-pagos_table_td">
                                                                            <p>Ayuda para cargar mobiliario</p>
                                                                        </td>
                                                                        <td class="tabla-pagos_table_td">
                                                                            <p>
                                                                            <div class="tabla-pagos_table-valoracion">
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-g">
                                                                                </div>
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-n">
                                                                                </div>
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-n">
                                                                                </div>
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-n">
                                                                                </div>
                                                                                <div
                                                                                    class="tabla-pagos_table-valoracion-div-n">
                                                                                </div>

                                                                            </div>
                                                                            </p>
                                                                        </td>
                                                                        <td class="tabla-pagos_table_td">
                                                                            <p class="n-m">$ 20.000</p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-method" role="tabpanel"
                                aria-labelledby="v-pills-method-tab">
                                <p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur
                                    elit id
                                    dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum
                                    duis
                                    aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi
                                    id do
                                    Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in
                                    aute
                                    tempor commodo eiusmod.
                                </p>
                            </div>

                            
                            <div class="tab-pane fade" id="v-pills-recomendar" role="tabpanel"
                                aria-labelledby="v-pills-three-tab">
                                <div class="content-recomendar-amigo">
                                    <h5>Recomendar a un amigo</h5>
                                    <div class="content-recomendar-amigo-creditos">
                                        <div class="content-recomendar-amigo-creditos-inf">
                                            <h4>Obtenga créditos invitando amigos</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit.</p>
                                            <div class="recomendar-link">
                                                <div class="recomendar-link-copiar">
                                                    <input type="text" placeholder="http://www.daloporhecho.com/nombreuser-2020">
                                                </div>
                                                <div class="recomendar-link_a">
                                                    <a class="btn-a-dl" href="#">Copiar link</a>
                                                </div>

                                            </div>
                                            <div class="compartir-en-rs">
                                                <p>Compartir en redes sociales</p>
                                                <div class="redes-sociales-crs">
                                                    <div class="div-rs"></div>
                                                    <div class="div-rs"></div>
                                                    <div class="div-rs"></div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="recomendar-funcionamiento">
                                        <h4>Como funcionan las referencias</h4>
                                        <div class="container">
                                            <div class="row recomendar-funcionamiento_row">
                                                <div class="col-md-4 col-sm-6 recomendar-funcionamiento-col">
                                                    <div class="recomendar-funcionamiento-num">1</div>
                                                    <h6>Invita a tus amigos</h6>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus
                                                        fuga magni</p>
                                                </div>
                                                <div class="col-md-4 col-sm-6 recomendar-funcionamiento-col">
                                                    <div class="recomendar-funcionamiento-num">2</div>
                                                    <h6>Debe realizar su primera tarea</h6>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus
                                                        fuga magni</p>
                                                </div>
                                                <div class="col-md-4 col-sm-6 recomendar-funcionamiento-col">
                                                    <div class="recomendar-funcionamiento-num">3</div>
                                                    <h6>Obten $ 10 de credito</h6>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus
                                                        fuga magni</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="v-pills-conf" role="tabpanel"
                                aria-labelledby="v-pills-f-tab">
                                <div class="card">
                                    <div class="card-header top-headline" role="tab" id="headingOne">
                                        <h5>
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <div class="cont-top-conf-cuenta">
                                                    <div class="cont-top-conf-cuenta_h4">
                                                        Cuenta
                                                    </div>
                                                    <div class="barra-progreso">
                                                        <h6>Completa tu perfil para mejorar tus oportunidades de trabajo
                                                        </h6>
                                                        <br>
                                                        <div class="cont-barra-progreso">

                                                            <div class="progress">
                                                                <div class="progress-bar" style="width:75%"></div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show mb-5" role="tabpanel"
                                        aria-labelledby="headingOne" data-parent="#accordion">

                                        <div class="cont-img-conf-cuenta">
                                            <div class="cont-img-conf-cuenta_img">

                                            </div>
                                            <div class="cont-img-conf-cuenta_a">
                                                <a class="ver-perfil-publico" href="perfil.html">Ver tu perfil publico</a>
                                            </div>
                                        </div>
                                        <div class="cont-inf-conf-cuenta">
                                            <h6>Mejora tu perfil y has mas atractivo tu feed</h6>
                                            <div class="subir-foto">
                                                <h6>Subir foto de portada</h6>
                                            </div>
                                        </div>
                                        <div class="form-conf-cuenta">
                                            <form>
                                                <div class="row cont-row-form">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="email"
                                                            placeholder="Nombre y Apellido" name="email">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control"
                                                            placeholder="Dirección" name="pswd">
                                                    </div>
                                                </div>
                                                <div class="row cont-row-form">

                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control"
                                                            placeholder="Escribe tu frase" name="pswd">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="email"
                                                            placeholder="Enter email" name="email">
                                                    </div>
                                                </div>
                                            </form>
                                            <h6>Fecha de cumpleaños</h6>
                                            <form class="form-inline cumple">
                                                <input type="email" class="form-control" placeholder="DD" id="email">
                                                <input type="password" class="form-control" placeholder="MM" id="pwd">
                                                <input type="password" class="form-control" placeholder="AA" id="pwd">

                                            </form>
                                            <h6>Agrega tu descripción</h6>
                                            <textarea name="" id="" cols="30" rows="10"
                                                class="textarea-conf"></textarea>
                                            <h6>Que deseas en DALO POR HECHO</h6>
                                            <form class="opc-conf-cuenta">
                                                <label class="radio-inline">
                                                    <input type="radio" name="optradio" checked>Publicar Tareas
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="optradio">Hacer Tareas
                                                </label>

                                            </form>
                                            <div class="cont-boton-cambios">
                                                <a class="guardar-cambios" href="#">Guardar cambios</a>
                                                <a class="desactivar-cuenta" href="#">Desactivar cuenta</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="v-pills-f" role="tabpanel" aria-labelledby="v-pills-f-tab">
                                <div class="card">
                                    <div class="card-header top-headline" role="tab" id="headingOne">
                                        <h5>
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Mis emblemas
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show mb-5" role="tabpanel"
                                        aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="content-inf-emblemas">
                                            <div class="content-inf-emblemas_h3">
                                                <h3>Lorem Ipsum es simplemente el texto de relleno de las imprentas y
                                                    archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar
                                                    de las industrias desde el año 1500, cuando un impresor (N. del T.
                                                    persona que se dedica a la imprenta) desconocido usó una galería de
                                                    textos y los mezcló de tal manera que logró hacer un libro de textos
                                                    especimen. No sólo sobrevivió 500 años, sino que tambien ingresó
                                                    como texto de relleno en documentos electrónicos, quedando
                                                    esencialmente igual al original. Fue popularizado en los 60s con la
                                                    creación de las hojas "Letraset", las cuales contenian pasajes de
                                                    Lorem Ipsum, y más recientemente con software de autoedición,Lorem
                                                    Ipsum.</h3>
                                            </div>
                                            <div class="content-inf-emblemas-cont">
                                                <h2 class="mt-3 mb-3">Emblemas Principales</h2>
                                                <div class="row">
                                                    <div class="col-md-6 content-inf-emblemas-cont_col-6">
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 content-inf-emblemas-cont_col-6">
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="content-inf-emblemas-cont">
                                                <h2 class="mt-3 mb-3">Licencia de emblemas</h2>
                                                <div class="row">
                                                    <div class="col-md-6 content-inf-emblemas-cont_col-6">
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 content-inf-emblemas-cont_col-6">
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                        <div class="content-inf-emblemas-cont-box">
                                                            <div class="box-img-emblemas"></div>
                                                            <div class="box-inf-emblemas">
                                                                <h6>Lorem Ipsum</h6>
                                                                <p>Lorem Ipsum es simplemente el texto de relleno de las
                                                                    imprentas y archivos de texto.</p>
                                                            </div>
                                                            <div class="box-boton-emblemas"><a
                                                                    class="box-boton-emblemas_a" href="#">Añadir</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-h" role="tabpanel"
                            aria-labelledby="v-pills-h-tab">
                            <div class="card">
                                <div class="card-header top-headline" role="tab" id="headingOne">
                                    <h5>
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Señales de Tareas
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show mb-5" role="tabpanel"
                                    aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="content-inf-s-tareas">
                                        <div class="content-inf-s-tareas_h3">
                                            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y
                                                archivos de texto. </p>
                                        </div>

                                        <div class="content-card-s-tareas">
                                            <div class="content-card-s-tareas_icon"><img
                                                    src="<?php echo get_template_directory_uri();?>/assets/img/vistobueno.png" alt=""></div>
                                            <div class="content-card-s-tareas_p">
                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis
                                                    laboriosam molestias</p>
                                            </div>
                                        </div>

                                        <div class="s-personalizada_h3">
                                            <h3>AGREGAR SEÑAL PERSONALIZADA</h3>
                                            <h6>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h6>
                                            <input class="s-personalizada_input" type="text"
                                                placeholder="Limpieza, Mecanico, cocina, etc">
                                            <div class="a-btn-n"><a class=" btn-a-dl" href="#">Agregar Señal</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

<?php get_footer(); ?>    