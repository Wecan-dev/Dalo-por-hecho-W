<?php
  /////Tareas
  
  $wp_customize->add_section('tareas', array (
    'title' => 'Main Tareas',
    'panel' => 'panel1'
  )); 

  $wp_customize->add_setting('tareas_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tareas_title_control', array (
    'description' => 'Título',
    'section' => 'tareas',
    'settings' => 'tareas_title',
  )));

  $wp_customize->add_setting('tareas_subtitle', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tareas_subtitle_control', array (
    'description' => 'Subtítulo',
    'section' => 'tareas',
    'settings' => 'tareas_subtitle',
  )));

//// Tareas 2
 $wp_customize->add_section('tareas2', array (
    'title' => 'Main Tareas 2',
    'panel' => 'panel1'
  )); 

  $wp_customize->add_setting('tareas2_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tareas2_title_control', array (
    'description' => 'Título',
    'section' => 'tareas2',
    'settings' => 'tareas2_title',
  )));

  $wp_customize->add_setting('tareas2_subtitle', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tareas2_subtitle_control', array (
    'description' => 'Subtítulo',
    'section' => 'tareas2',
    'settings' => 'tareas2_subtitle',
  )));

?>