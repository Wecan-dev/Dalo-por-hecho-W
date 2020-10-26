<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>
            <?php 
                $array_note = order_itemmeta('Description',$order->get_id());
                $name_tarea = descrypt_note($array_note,'name_tarea');
                $title_tarea2 = $name_tarea."- Pedido#".$order->get_id();
                $id_tarea = descrypt_note($array_note,'id_tarea');                
                $id_postulacion  = descrypt_note($array_note,'id_postulacion');
                $email_empleador = meta_value('ofertar_email_empleador', $id_postulacion);
                $name_empleado = descrypt_note($array_note,'name_empleado');
                $id_empleado = descrypt_note($array_note,'id_empleado');
                $monto_tarea =  meta_value('ofertar_monto_tarea', $id_postulacion);
                $monto_pagar =  $monto_tarea-($monto_tarea*0.10);
 
            ?>
            <?php echo do_shortcode('[formidable id=10]');  ?>
            <?php //echo do_shortcode('[frm-set-get asignar_title_tarea_publicada='.$title_tarea.'][frm-set-get asignar_name_tarea_publicada='.$name_tarea.'][frm-set-get asignar_id_tarea_publicada='.$id_tarea.'][frm-set-get asignar_email_empleador='.$email_empleador.'][frm-set-get asignar_name_empleado='.$name_empleado.'][frm-set-get asignar_id_empleado='.$id_empleado.'][frm-set-get asignar_monto_tarea='.$monto_tarea.'][formidable id=10]');  ?>
			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
<style type="text/css">
form#form_asignados {
    display: none;
}	
.frm_message {
    display: none;
}
</style>

<script>
       var id_postulacion = "<?= $id_postulacion ?>"; 		
       var name_tarea = "<?= $name_tarea ?>"; 
       var title_tarea2 = "<?= $title_tarea2 ?>";
       var id_tarea = "<?= $id_tarea ?>";
       var email_empleador = "<?= $email_empleador ?>";
       var name_empleado = "<?= $name_empleado ?>";
       var id_empleado = "<?= $id_empleado ?>";
       var monto_tarea = "<?= $monto_tarea ?>";
       var monto_pagar = "<?= $monto_pagar ?>";

       $("input#field_asignar_title_tarea2").val(title_tarea2);
       $("input#field_asignar_id_postulacion").val(id_postulacion);
       $("input#field_asignar_name_tarea_publicada").val(name_tarea);       
       $("input#field_asignar_id_tarea_publicada").val(id_tarea);
       $("input#field_asignar_email_empleador").val(email_empleador);
       $("input#field_asignar_name_empleado").val(name_empleado);
       $("input#field_asignar_id_empleado").val(id_empleado);
       $("input#field_asignar_monto_tarea").val(monto_tarea) 
       $("input#field_asignar_monto_a_pagar").val(monto_pagar) 


    form = document.getElementById('form_asignados');
    form.submit();	
 </script>