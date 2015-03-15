<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index($type = "")
	{
		$this->load->model('taskModel', '', TRUE);
		
		if($type == ""){
			$aTaskList = $this->taskModel->getAllTask();	
		}else{
			$aWhere = array("status" => $type);
			$aTaskList = $this->taskModel->getTask($aWhere);
		}
		
		$aStatus = $this->taskModel->get_enums('status');
		$aPriority = $this->taskModel->get_enums('priority');
		$aAddJsFiles = array(
            'task.js'
        );
        $this->smarty->add_js($aAddJsFiles);
		
	
		$this->smarty->assign("aStatus", $aStatus);
		$this->smarty->assign("aPriority", $aPriority);
		$this->smarty->assign("taskList", $aTaskList);
		$this->smarty->view('task/index');
	}

	public function info($type="add", $key="")
	{
		$aTaskInfo = array();
		$vTaskName = $vPriority = $vStatus = $vTaskId = "";
		if(!is_null($key)){
			$this->load->model('taskModel', '', TRUE);
			$aWhere = array("id" => $key);
			$aTaskInfo = $this->taskModel->getTask($aWhere,true);
			if(is_object($aTaskInfo)){
				$vTaskName = $aTaskInfo->name;
				$vPriority = $aTaskInfo->priority;
				$vStatus = $aTaskInfo->status;
				$vTaskId = $aTaskInfo->id;
			}
		}
		$aAddJsFiles = array(
            'task.js'
        );
        $this->smarty->add_js($aAddJsFiles);
		$aStatus = $this->taskModel->get_enums('status');
		$aPriority = $this->taskModel->get_enums('priority');
		$this->smarty->assign("aStatus", $aStatus);
		$this->smarty->assign("aPriority", $aPriority);
		$this->smarty->assign("vTaskName", $vTaskName);
		$this->smarty->assign("vPriority", $vPriority);
		$this->smarty->assign("vStatus", $vStatus);
		$this->smarty->assign("vTaskId", $vTaskId);
		
		$this->smarty->assign("type", $type);
		$this->smarty->view('task/create');
	}

	public function createtask(){
		$vTaskName = $this->input->post('taskName');
        $vTaskPriority = $this->input->post('taskPriority');
        $vTaskStatus = $this->input->post('taskStatus');
        $vTaskType = $this->input->post('taskType');
        $vTaskId = $this->input->post('taskId');
        $this->load->model('taskModel', '', TRUE);
        $response = array();
        if($vTaskName == "" || $vTaskPriority == "" || $vTaskStatus == ""){
			$response = array("status" => false,"message"=>"Please check input parameters");
        }else{
        	$aData = array(
        				"name" => $vTaskName,
        				"priority" => $vTaskPriority,
        				"status" => $vTaskStatus);
        	if($vTaskId){
				$vTaskId = $this->taskModel->updateTask($aData,array("id"=>$vTaskId));
        	}else{
        		$vTaskId = $this->taskModel->addTask($aData);
        	}
        	
        	if($vTaskId > 0){
        		$response = array("status" => true,"message"=>"");
        	}else{
        		$response = array("status" => false,"message"=>"Problem while inserting");
        	}
        }
        echo json_encode($response);
	}

	public function updatetaskstatus(){
		$aOverallStatus = $this->input->post('overalltask');
		$vStatusType = $this->input->post('statusType');

		$this->load->model('taskModel', '', TRUE);
		$this->taskModel->updateOverallTaskStatus($aOverallStatus,$vStatusType);
		redirect("task");

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */