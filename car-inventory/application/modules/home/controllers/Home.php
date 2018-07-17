<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index(){ 
       $this->load->view('manufacturer');
                
    }

    function addManufacturer(){


        $this->form_validation->set_rules('manufacturerName','Manufacture','required',array('required'=>'Please enter manufacturer '));
        if($this->form_validation->run() == FALSE){

            $data['error'] = validation_errors();
            $response = array('status' => 0, 'message' => $data['error']); //error msg
        }else{
            
            $this->load->model('Manufacture_model');
            $manufacture = ucwords($this->input->post('manufacturerName'));
            $dataVal['manufacturerName'] = $manufacture;
            $isAdd = $this->Manufacture_model->insertData('manufacturer',$dataVal);
            $response = array('status' => 1, 'message' => 'Manufacture added successfully'); //success msg
            
        }
        echo json_encode($response); 
    }

    public function model(){ 

        $this->load->model('Manufacture_model');
        $data['manufacturer'] = $this->Manufacture_model->getsingle('manufacturer');
        $this->load->view('model',$data);
                
    }

    function addModel(){


        $this->form_validation->set_rules('modelName','Model','required',array('required'=>'Please enter model '));
        $this->form_validation->set_rules('manufacturer','Manufacturer','required',array('required'=>'Please select manufacturer '));
        if($this->form_validation->run() == FALSE){

            $data['error'] = validation_errors();
            $response = array('status' => 0, 'message' => $data['error']); //error msg
        }else{
            
            $this->load->model('Manufacture_model');
            $modelName = ucwords($this->input->post('modelName'));
            $manufacturer = ucwords($this->input->post('manufacturer'));
            $dataVal['modelName'] = $modelName;
            $dataVal['manufacturer_id'] = $manufacturer;
            $isAdd = $this->Manufacture_model->insertData('model',$dataVal);
            $response = array('status' => 1, 'message' => 'Model added successfully'); //success msg
            
        }
        echo json_encode($response); 
    }


    function getRecords(){
        $this->load->view('modelList');
    }

    function modelList(){

        $this->load->model('Manufacture_model');
        $list = $this->Manufacture_model->get_list(); 

        $data = array();
        $no = !empty($_POST['start']) ? $_POST['start'] : 0;
        foreach ($list as $get) { 
            $action ='';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $get->manufacturerName;
            $row[] = $get->modelName;
            $row[] = $get->count;
            $modelName = $get->modelName;
            $clkStatus = "updateStatus('".$modelName."')" ;
            $action .= '<a href="javascript:void(0)" title="Sold" onclick="'.$clkStatus.'" class="on-default edit-row table_action sold">'.'Sold'.'</a>';

            $row[] = $action;
            $data[] = $row;
            $_POST['draw']='';
        }

        $output = array(
                "draw" => $_POST['draw'], 
                "recordsTotal" => $this->Manufacture_model->count_all(),
                "recordsFiltered" => $this->Manufacture_model->count_filtered(),
                "data" => $data
        );
        echo json_encode($output);

    }

     function updateCount(){

        $this->load->model('Manufacture_model');
        $modelName = $this->input->post('name');
        $count = $this->Manufacture_model->getId('model',array('modelName'=>$modelName));
        $isDelete = $this->Manufacture_model->deleteData('model',array('modelId'=>$count[0]->modelId));
        if(!$isDelete){
            $response = array('status' => 0, 'message' => 'Something went wrong'); //success msg
        }
        $response = array('status' => 1, 'message' => 'Item sold'); //success msg
        echo json_encode($response);   

    }



} //End class
