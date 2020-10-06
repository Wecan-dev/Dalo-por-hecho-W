	<!-- Modal step -->
	<?php global $current_user, $wp_roles;?>
	<div class="modal fade" id="step" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="signup-step-container">
						<div class="">
							<div class="row d-flex justify-content-center">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div class="col-md-9">

									<div class="wizard">
										<div class="wizard-inner">
											<div class="connecting-line"></div>
											<ul class="nav nav-tabs" role="tablist">
												<!-- <li role="presentation" class="active">
													<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
														aria-expanded="true"><span class="round-tab"></span> <i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
														aria-expanded="false"><span class="round-tab"></span>
														<i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step3" data-toggle="tab" aria-controls="step3"
														role="tab"><span class="round-tab"></span> <i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step4" data-toggle="tab" aria-controls="step4"
														role="tab"><span class="round-tab"></span> <i></i></a>
												</li> -->
												
												<li role="presentation" class="active">
													<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
														aria-expanded="true"><span class="round-tab"></span> <i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="<?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Publicar Tareas" ){ echo"#step2"; } ?>" data-toggle="tab" aria-controls="step2" role="tab"
														aria-expanded="false"><span class="round-tab"></span>
														<i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="<?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Publicar Tareas" ){ echo"#step3"; } ?>" data-toggle="tab" aria-controls="step3"
														role="tab"><span class="round-tab"></span> <i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="<?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Publicar Tareas" ){ echo"#step4"; } ?>" data-toggle="tab" aria-controls="step4"
														role="tab"><span class="round-tab"></span> <i></i></a>
												</li>
											</ul>
										</div>
										<div role="form" action="index.html" class="login-box">
										<form action="<?php echo esc_url( $action ); ?>" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">
											 <?php echo do_shortcode('[submit_job_form]');  ?>
										</form>
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

	<script type="text/javascript">
$(document).ready(function () {
        $("#job_clp").keyup(function () {
            var valuea =  document.getElementById("job_horas").value*$(this).val();
            $("#job_salary").val(valuea);
        });    
        $("#job_horas").keyup(function () {
            var valuea =  document.getElementById("job_clp").value*$(this).val();
            $("#job_salary").val(valuea);
        })                   
});
	
	/*-- multistep form --*/


	$(document).ready(function () {
	$(".nav-tabs > li a[title]").tooltip();

	//Wizard
	$('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
		var target = $(e.target);

		if (target.parent().hasClass("disabled")) {
			return false;
		}
	});

	$(".next-step").click(function (e) {
		var active = $(".wizard .nav-tabs li.active");
		active.next().removeClass("disabled");
		nextTab(active);
	});
	$(".prev-step").click(function (e) {
		var active = $(".wizard .nav-tabs li.active");
		prevTab(active);
	});
});

function nextTab(elem) {
	$(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
	$(elem).prev().find('a[data-toggle="tab"]').click();
}

$(".nav-tabs").on("click", "li", function () {
	$(".nav-tabs li.active").removeClass("active");
	$(this).addClass("active");
	if(".tab-step2.active"){
		$(".tab-step1").addClass("check-tab");
	}else{
		
	}
});



	$('.panel-collapse').on('show.bs.collapse', function () {
  $(this).siblings('.panel-heading').toggleClass('active');
});

$('.panel-collapse').on('hide.bs.collapse', function () {
  $(this).siblings('.panel-heading').removeClass('active');
});
  </script>