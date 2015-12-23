<?php
class Notes extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('note_model');
    $this->load->helper('url_helper'); // use for site_url in a view
  }
  
  public function index()
  {
    $data['notes'] = $this->note_model->get_notes();
    
    $this->load->view('templates/header', $data);
    $this->load->view('notes/index', $data);
    $this->load->view('templates/footer', $data);
    
  }
  
  public function view($slug = NULL)
  {
    $data['note'] = $this->note_model->get_notes($slug);
    
    if(empty($data['note']))
    {
      show_404();
      return;
    }
    
    $this->load->view('templates/header', $data);
    $this->load->view('notes/view', $data);
    $this->load->view('templates/footer', $data);
    
  }
  
  public function create()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');
    
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Text', 'required');
    
    if($this->form_validation->run() === FALSE)
    {
      $data['note'] = array(
        'title' => $this->input->post('title'),
        'text' => $this->input->post('text')
      );
      $this->load->view('templates/header', $data);
      $this->load->view('notes/create', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $this->note_model->set_note(); // retrieves field values by itself
      redirect(site_url('notes'));
    }
    
  }
  
  public function update($slug = NULL)
  {
    $data['note'] = $this->note_model->get_notes($slug);
    
    if(empty($data['note']))
    {
      show_404();
      return;
    }
    
    $this->load->helper('form');
    $this->load->library('form_validation');
    
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Text', 'required');
    
    if($this->form_validation->run() === FALSE)
    {
      $this->load->view('templates/header', $data);
      $this->load->view('notes/update', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $this->note_model->update_note($slug); // retrieves field values by itself
      redirect(site_url('notes'));
    }
    
  }
  
  public function delete($slug = NULL)
  {
    $this->note_model->delete_note($slug);
    redirect(site_url('notes'));
  }
  
}
  
?>