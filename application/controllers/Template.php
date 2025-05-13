<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Template';

    // company_profile
    $this->data['company_data']    					  = $this->Company_model->company_profile();

    // template
    $this->data['logo_header_template'] 			= $this->Template_model->logo_header();
		$this->data['navbar_template'] 					  = $this->Template_model->navbar();
		$this->data['sidebar_template'] 					= $this->Template_model->sidebar();
		$this->data['background_template'] 			  = $this->Template_model->background();
    $this->data['sidebarstyle_template'] 		  = $this->Template_model->sidebarstyle();

    $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
  }

  function update($id)
  {
    is_login();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['template']     = $this->Template_model->get_by_id($id);

    if($this->data['template'])
    {
      $this->data['page_title'] = 'Update Template';
      $this->data['action']     = 'template/update_action';

      $this->data['id'] = [
        'name'          => 'id',
        'type'          => 'hidden',
      ];
      $this->data['name'] = [
        'name'          => 'name',
        'class'         => 'form-control',
        'readonly'      => '',
      ];
      $this->data['value'] = [
        'name'          => 'value',
        'class'         => 'form-control',
      ];
      $this->data['logo_header_value'] = array(
        'dark'        => 'Dark',
        'blue'        => 'Blue',
        'purple'      => 'Purple',
        'light-blue'  => 'Light Blue',
        'green'       => 'Green',
        'orange'      => 'Orange',
        'red'         => 'Red',
        'white'       => 'White',
        'dark2'       => 'Dark2',
        'blue2'       => 'Blue2',
        'purple2'     => 'Purple2',
        'light-blue2' => 'Light Blue2',
        'green2'      => 'Green2',
        'orange2'     => 'Orange2',
        'red2'        => 'Red2',
      );
      $this->data['navbar_value'] = array(
        'dark'        => 'Dark',
        'blue'        => 'Blue',
        'purple'      => 'Purple',
        'light-blue'  => 'Light Blue',
        'green'       => 'Green',
        'orange'      => 'Orange',
        'red'         => 'Red',
        'white'       => 'White',
        'dark2'       => 'Dark2',
        'blue2'       => 'Blue2',
        'purple2'     => 'Purple2',
        'light-blue2' => 'Light Blue2',
        'green2'      => 'Green2',
        'orange2'     => 'Orange2',
        'red2'        => 'Red2',
      );
      $this->data['sidebar_value'] = array(
        ''     => 'White',
        'dark'      => 'Dark',
        'dark2'     => 'Dark2',
      );
      $this->data['background_value'] = array(
        'bg2'       => 'White',
        'bg1'       => 'Grey',
        'bg3'       => 'Grey2',
        'dark'      => 'Dark',
      );
      $this->data['sidebarstyle_value'] = array(
        'sidebar'                 => 'Style 1',
        'sidebar sidebar-style-2' => 'Style 2',
      );

      $this->load->view('back/template/template_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('dashboard');
    }

  }

  function update_action()
  {
    $data = array(
      'value'             => $this->input->post('value'),
    );

    $this->Template_model->update($this->input->post('id'),$data);

    write_log();

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
    redirect('template/update/'.$this->input->post('id'));
  }

}
