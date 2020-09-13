<form action="<?php echo esc_url( $action ); ?>" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">

	
  <input type="hidden" id="_wpjm_nonce" name="_wpjm_nonce" value="1ec4662030"><input type="hidden" name="_wp_http_referer" value="/Dalo-por-hecho-W/post-a-job/">
  



  
  
    <!-- Job Information Fields -->
    
        <label for="job_title">Job Title</label>
          <input type="text" class="input-text" name="job_title" id="job_title" placeholder="" value="" maxlength="" required="">
        <label for="job_location">Location <small>(optional)</small></label>
          <input type="text" class="input-text" name="job_location" id="job_location" placeholder="e.g. &quot;London&quot;" value="" maxlength="">
        <label for="job_type">Job type</label>
          <select name="job_type" id="job_type" class="postform">
  <option class="level-0" value="2">En línea</option>
  <option class="level-0" value="5">En persona</option>
</select>
        <label for="job_category">Job category</label>
          <select name="job_category[]" id="job_category" class="job-manager-category-dropdown select2-hidden-accessible" multiple="" data-placeholder="Choose a category…" data-no_results_text="No results match" data-multiple_text="Select Some Options" tabindex="-1" aria-hidden="true">
  <option class="level-0" value="32">Armar muebles</option>
  <option class="level-0" value="29">Aseo y limpieza</option>
  <option class="level-0" value="37">Cocina</option>
  <option class="level-0" value="33">Construcción</option>
  <option class="level-0" value="31">Cuidado de niños</option>
  <option class="level-0" value="35">Fiestas o eventos</option>
  <option class="level-0" value="30">Fletes y mudanza</option>
  <option class="level-0" value="36">Jardinería</option>
  <option class="level-0" value="34">Marketing y diseño</option>
  <option class="level-0" value="38">Otros</option>
</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Choose a category…" style="width: 1000.39px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
        <label for="job_description">Description</label>
          <div id="wp-job_description-wrap" class="wp-core-ui wp-editor-wrap tmce-active"><link rel="stylesheet" id="editor-buttons-css" href="http://localhost/Dalo-por-hecho-W/wp-includes/css/editor.min.css?ver=5.4.2" type="text/css" media="all">
<style> .mce-top-part button { background-color: rgba(0,0,0,0.0) !important; } </style>
<textarea class="wp-editor-area" rows="8" autocomplete="off" cols="40" name="job_description" id="job_description" aria-hidden="true" style="display: none;"></textarea></div>


          <input type="text" class="input-text" name="application" id="application" placeholder="Enter an email address or website URL" value="mislejose@gmail.com" maxlength="" required="">
        <label for="job_salary">Salary <small>(optional)</small></label>
          <input type="text" class="input-text" name="job_salary" id="job_salary" placeholder="e.g. USD$ 20.000" value="" maxlength="">
        <label for="job_important_info">Important information:  <small>(optional)</small></label>
          <input type="text" class="input-text" name="job_important_info" id="job_important_info" placeholder="e.g. Work visa required" value="" maxlength="">
        <label for="job_direccion">Dirección <small>(optional)</small></label>
          <input type="text" class="input-text" name="job_direccion" id="job_direccion" placeholder="Calle #" value="" maxlength="">
        <label for="job_clp">CLP <small>(optional)</small></label>
          <input type="text" class="input-text" name="job_clp" id="job_clp" placeholder="" value="" maxlength="">
        <label for="job_horas">Horas <small>(optional)</small></label>
          <input type="text" class="input-text" name="job_horas" id="job_horas" placeholder="" value="" maxlength="">
    
    
    <!-- Company Information Fields -->
          <!--<h2>Company Details</h2>-->

      
          <label for="company_name">Company name</label>
            <input type="text" class="input-text" name="company_name" id="company_name" placeholder="Enter the name of the company" value="compay prueba" maxlength="" required="">
          <label for="company_website">Website <small>(optional)</small></label>
            <input type="text" class="input-text" name="company_website" id="company_website" placeholder="http://" value="" maxlength="">
          <label for="company_tagline">Tagline <small>(optional)</small></label>
            <input type="text" class="input-text" name="company_tagline" id="company_tagline" placeholder="Briefly describe your company" value="" maxlength="64">
          <label for="company_video">Video <small>(optional)</small></label>
            <input type="text" class="input-text" name="company_video" id="company_video" placeholder="A link to a video about your company" value="" maxlength="">
          <label for="company_twitter">Twitter username <small>(optional)</small></label>
            <input type="text" class="input-text" name="company_twitter" id="company_twitter" placeholder="@yourcompany" value="" maxlength="">
          <label for="company_logo">Logo <small>(optional)</small></label>

<input type="file" class="input-text wp-job-manager-file-upload" data-file_types="jpg|jpeg|gif|png" name="company_logo" id="company_logo" placeholder="">

          
    
    <p>
      <input type="hidden" name="job_manager_form" value="submit-job">
      <input type="hidden" name="job_id" value="0">
      <input type="hidden" name="step" value="0">
      <input type="submit" name="submit_job" class="button" value="Preview">
      <input type="submit" name="save_draft" class="button secondary save_draft" value="Save Draft" formnovalidate="">      <span class="spinner" style="background-image: url(http://localhost/Dalo-por-hecho-W/wp-includes/images/spinner.gif);"></span>
    </p>

  </form>