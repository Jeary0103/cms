<?php namespace Admin\Controller; 

use Admin\AuthController as Controller;
use Admin\Model\User;
class AdminController extends Controller{
    public $db;
	//构造函数
	public function __init()
	{
        $this->db = new User;
	}
	
    //动作
    public function index(){
        $data = $this->db->getAll();
        // p($data);exit;
        View::with('data',$data)->make();
    }

    public function del() {
        $id = Q('get.id');
        // p($id);
        if($this->db->del($id)) {
            $this->success('删除成功','index');
        } else{
            $this->error($this->db->getError());
        }
    }

    public function add() {
        if(IS_POST) {
            // p($_POST);exit;
            if($this->db->store()) {
                $this->success('添加管理员成功','index');
            } else{
                $this->error($this->db->getError());
            }
        } else{
            $data = Db::table('role')->where('type',1)->get();
            View::with('data',$data)->make();
        }
        
    }

    public function edit() {
        if(IS_POST) {
            // p($_POST);
            // p($this->db->upd());exit;
            if($this->db->upd()){
                $this->success('更新成功','index');
            } else{
                $this->error($this->db->getError());
            }
        } else{
            $id = Q('id');
            $id_data = $this->db->getAll($id);
            $data = new \Admin\Model\Role;
            $data = $data->getAll(1);
            View::with('id_data',$id_data)->with('data',$data)->make();
        }
        
    }



























}
