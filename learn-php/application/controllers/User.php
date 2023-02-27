<?php
    class User extends CI_Controller{
        public function signup(){
            $this->load->view('signup_form');
            

        }

        public function submit(){
            $this->form_validation->set_rules('email','Email','is_unique[users.email]',array('is_unique'=>'Email already Exists'));
            if($this->form_validation->run()== false) {
                $this->load->view('signup_form');
            }
            else{
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');

            $this->load->model('user_model');
            $response = $this->user_model->store($data);

            if($response == true){
                redirect('user/login');
            }
            else{
                $message = "ERROR!";
                redirect('user/signup_form',array('message'=>$message));
            }
            }
            
        }

        public function login(){
            if($this->session->has_userdata('email')){
                
                redirect ('user/personal_details');

            }
            $this->load->view('login_form');
        }

        public function login_process(){
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('password','Password','required');
            if($this->form_validation->run()== false) {
                $this->load->view('login_form');
            }
            else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->database();
            $this->load->model('user_model');  

            if($user = $this->user_model->getUser($email)){
                if($user->password == $password){
                    $this->load->view('personal_details');
                    $this->session->set_userdata('email',$user->email);
                }
                else{
                    echo 'login error';
                }
            }
            else{
                echo 'No such account for this email !';
            }
            }
            
        }

        public function home(){
            $this->load->view('home');
        }
        public function logout(){
            $this->session->unset_userdata('email');
            redirect ('user/login');
        }

        public function change_password(){
            if($this->session->has_userdata('email')){
                $this->load->view('change_password_form');
            }
            else{
                redirect ('user/login');
            }
           
        }
        public function update_password(){
            $this->load->model('user_model');
            $this->form_validation->set_rules('old_password','Old Passsword','required');
            $this->form_validation->set_rules('new_password','New Passsword','required');
            $this->form_validation->set_rules('confirm_password','Confirm Passsword','required|matches[new_password]');

            if($this->form_validation->run()== false) {
                $this->load->view('change_password_form');
            }
            else{
                $old_password = $this->input->post('old_password');
                $new_password = $this->input->post('new_password');
                $confirm_password = $this->input->post('confirm_password');

                if(strcmp($old_password,$new_password)==0){
                    $message = "New Password should be different!";
                }
                else{
                    $email = $this->session->userdata('email');
                    if($this->user_model->oldPassswordMatches($email,$old_password)){
                        $this->user_model->changePassword($email,$new_password);
                         $message = "Password changed !";
                    }
                    else{
                        $message = "Old Password is Wrong !";
                    }
                    
                }
                $this->load->view('change_password_form',array('message'=>$message));
            }

        }
        public function displaydata(){
            if($this->session->has_userdata('username')){
            $this->load->model('user_model');
            $result['data'] = $this->user_model->display_records();
            $this->load->view('display_data',$result);
            }
            else{
                echo 'YOU DON\'T HAVE RIGHTS TO ACCESS';
                
            }
            
        }
        public function admin_logout(){
            $this->session->unset_userdata('username');
            redirect ('user/admin');
        }

        public function admin(){
            if($this->session->has_userdata('username')){
                redirect ('user/home');

            }
            $this->load->view('admin_login');
        }
        public function admin_login_process(){
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            if($this->form_validation->run()== false) {
                $this->load->view('admin_login');
            }
            else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->database();
            $this->load->model('admin_model');
            

            if($user = $this->admin_model->getUser($username) ){
                if($user->password == $password){
                    $this->load->view('home');
                    $this->session->set_userdata('username',$username);
                }
                else{
                    echo 'login error';
                }
            }
            else{
                echo 'No such account for this username !';
            }
            }
            
        }
    }
?>