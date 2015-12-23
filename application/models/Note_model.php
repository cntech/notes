<?php
class Note_model extends CI_Model {
  
  public function __construct()
  {
    $this->load->database();
  }
  
  public function get_notes($slug = FALSE)
  {
    if($slug === FALSE)
    {
      $this->db->order_by('created_at', 'desc');
      $query = $this->db->get('notes');
      return $query->result_array();
    }
    
    $query = $this->db->get_where('notes', array('slug' => $slug));
    return $query->row_array();
  }
  
  public function set_note()
  {
    // create slug from title if it is empty
    $this->load->helper('url');
    $slug = $this->input->post('slug');
    if(empty($slug))
    {
      $slug = url_title($this->input->post('title'), 'dash', TRUE);
      // <-- TRUE means: force lowercase letters
    }
    
    $data = array(
      'slug' => $slug,
      'title' => $this->input->post('title'),
      'text' => $this->input->post('text')
    );
    
    return $this->db->insert('notes', $data);
  }
  
  public function update_note($slug = FALSE)
  {
    if($slug !== FALSE) {
      $new_slug = $this->input->post('slug');
      $title = $this->input->post('title');
      $text = $this->input->post('text');
    
      $data = array();
    
      if(!empty($new_slug))
      {
        $data['slug'] = $new_slug;
      }
      if(!empty($title))
      {
        $data['title'] = $title;
      }
      if(!empty($text))
      {
        $data['text'] = $text;
      }
    
      $this->db->where('slug', $slug);
      return $this->db->update('notes', $data);
    }
  }
  
  public function delete_note($slug = FALSE)
  {
    if($slug !== FALSE)
    {
      return $this->db->delete('notes', array('slug' => $slug));
    }
  }
  
}
  
?>