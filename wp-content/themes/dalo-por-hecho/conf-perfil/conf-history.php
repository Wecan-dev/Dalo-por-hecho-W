<?php global $current_user, $wp_roles; ?>
                <!--tab history -->
                <div class="tab-pane fade" id="v-pills-history" role="tabpanel"  aria-labelledby="v-pills-history-tab">
                    <?php $pf = 0;
                    $pedidos = get_posts( array(
                    'numberposts' => -1,
                    'meta_key'    => '_customer_user',
                    'meta_value'  => get_current_user_id(),
                    'post_type'   => wc_get_order_types(),
                    'post_status' => "wc-completed",

                    ) );
                    foreach ($pedidos as $pedido)
                    {
                        $wp_pedido = new WC_Order($pedido->ID);
                        $cant_pedidos = $cant_pedidos +1;
                        $gastado = $gastado + $wp_pedido->discount_total;
                        if ($pf < 1) {
                            $primera_fecha = $wp_pedido->date_created; 
                        }
                        $ultima_fecha = $wp_pedido->date_created;
                        $pf = $pf + 1;
                    }
                    $trans = "".$cant_pedidos." transacciones del ".date_order_new($primera_fecha)." al ".date_order_new($ultima_fecha).""; ?>
                    <div class="content-metodos-pago">
                        <h5>Historial de pagos</h5>
                        <div class="container mt-3">
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
                                            <p>Demostración</p>
                                            <div class="cont-pago-estado-form">
                                                <div class="dropdown">
                                                    <button type="button" class="btn-d-estado-p dropdown-toggle"
                                                                    data-toggle="dropdown">Tiempo
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
                                                        <p>$ 000</p>
                                                    </div>
                                            </div>
                                            <small>1 transacciones del 07 de noviembre del 2020 al 30 de
                                                            noviembre del 2020
                                            </small>
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
                                                        <?php if ($recibir_pagos != NULL) { ?>        
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
                                                                            <div class="tabla-pagos_table-valoracion-div-g">
                                                                            </div>
                                                                            <div  class="tabla-pagos_table-valoracion-div-n">
                                                                            </div>
                                                                            <div class="tabla-pagos_table-valoracion-div-n">
                                                                            </div>
                                                                            <div class="tabla-pagos_table-valoracion-div-n">
                                                                            </div>
                                                                            <div class="tabla-pagos_table-valoracion-div-n">
                                                                            </div>
                                                                        </div>
                                                                    </p>
                                                                </td>
                                                                <td class="tabla-pagos_table_td">
                                                                    <p class="n-m">$0000</p>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>   
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
                                                                <h5>Gastado neto</h5>
                                                                <p><?php echo $gastado ?> $000</p>
                                                            </div>
                                                        </div>
                                                        <small><?php echo $trans ?> </small>
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
                                                                    <?php
                                                                    foreach ($pedidos as $pedido)
                                                                    {
                                                                       $wp_pedido = new WC_Order($pedido->ID);?>
                                                                        <tr>
                                                                            <td class="tabla-pagos_table_td">
                                                                                <p><?php echo date("d/m/y",strtotime(get_post($sinparametros[3])->post_date));?></p>
                                                                            </td>
                                                                            <td class="tabla-pagos_table_td">
                                                                                <p><?php echo descrypt_note(order_itemmeta('Description', $wp_pedido->id),'name_tarea') ?></p>
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
                                                                                <p class="n-m">$ <?php if ($wp_pedido->discount_total > 0){echo $wp_pedido->discount_total;}else{ echo "000";} ?></p>
                                                                            </td>
                                                                        </tr>                                                                       

                                                                   <?php } ?>                                                        

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