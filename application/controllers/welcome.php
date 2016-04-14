<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Welcome extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('WebSite');
        $this->load->model('Admin_model');
        $currentDate = date("Y-m-d");
    }
        
    public function index()
	{
		$this->load->view('website/header');
		$this->load->view('website/pages/index');
        $this->load->view('website/footer');
	}

    public function about(){
        $this->load->view('website/header');
        $this->load->view('website/pages/about');
        $this->load->view('website/footer');
    }

    public function contact(){
        $this->load->view('website/header');
        $this->load->view('website/pages/contact');
        $this->load->view('website/footer');
    }

    public function candidateRegistration(){
        $data['category']= $this->Admin_model->get_all_category();
        $this->load->view('website/header');
        $this->load->view('website/pages/candidateRegistration',$data);
        $this->load->view('website/footer');
    }

    public function voterRegistration(){
        $data['category']= $this->Admin_model->get_all_category();
        $this->load->view('website/header');
        $this->load->view('website/pages/voterRegistration',$data);
        $this->load->view('website/footer');
    }

    public function saveCandidate(){
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
                'candidate_name' => $this->input->post('name'),
                'candidate_age' => $this->input->post('age'),
                'candidate_gender' => $this->input->post('gender'),
                'candidate_phoneNo' => $this->input->post('phoneNumber'),
                'candidate_email' => $this->input->post('email'),
                'candidate_password' => md5($this->input->post('password')),
                'candidate_category' => $this->input->post('category'),
                'candidate_qualifaction' => $this->input->post('qualification'),
                'candidate_noCase' => $this->input->post('nlcp'),
                'candidate_acNumber' => $this->input->post('acNumber'),
                'candidate_status' => "Block"
            );
            if( $this->db->insert('candidates',$params)){
                $sdata['message'] = 'Your request is send to Admin for approve, Please login few moment later';
                $this->session->set_userdata($sdata);
                redirect('welcome/candidateRegistration');
            }
        }
        else
        {
            return false;
            redirect('welcome');
        }

    }

    public function saveVoter(){
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
                'voter_name' => $this->input->post('name'),
                'voter_age' => $this->input->post('age'),
                'voter_gender' => $this->input->post('gender'),
                'voter_phnNumber' => $this->input->post('phoneNumber'),
                'voter_email' => $this->input->post('email'),
                'voter_password' => md5($this->input->post('password')),
                'voter_location' => $this->input->post('location'),
                'voter_qualification' => $this->input->post('qualification'),
                'voter_acNumber' => $this->input->post('acNumber'),
                'voter_status' => 'Block'
            );

            $voter_id = $this->WebSite->add_voter($params);
                $data= array();
            foreach($this->input->post('category') as $cat){
                $data['voter_id']=$voter_id;
                $data['cat_id']=$cat;
                $this->db->insert('cat_voters', $data);
            }
            $sdata['message'] = 'Your request is send to Admin for approve, Please login few moment later';
            $this->session->set_userdata($sdata);
            redirect('welcome/voterRegistration');
        }
        else
        {
            $this->load->view('welcome');
        }
    }

    public function saveMessage(){
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
                'messages_from' => $this->input->post('messages_from'),
                'messages_subject' => $this->input->post('messages_subject'),
                'messages_details' => $this->input->post('messages_details'),
                'message_status' =>'unread',
            );

           if($this->db->insert('messages',$params)){
               $sdata['message'] = 'Your message sent successfully';
               $this->session->set_userdata($sdata);
               redirect('welcome/contact');
           }
        }
        else
        {
            $this->load->view('message/add');
        }
    }

    public function updateEvent($currentDate){
        $date=strtotime($currentDate);
        $this->db->select('*');
        $this->db->from('events');
        $query = $this->db->get();
        foreach ($query->result() as $event){
          $eventDate = strtotime($event->event_endDate);
            if($eventDate<=$date){
                $data['event_status']="end";
                $this->db->where('event_id', $event->event_id);
                $this->db->update('events', $data);
            }
        }
    }
}