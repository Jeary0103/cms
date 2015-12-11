<?php namespace Admin\Controller; 

use Admin\AuthController as Controller;

use Admin\Model\Role;

class RoleController extends Controller{
    public $db;
	//构造函数
	public function __init()
	{
        $this->db = new Role;
	}
	
    //动作
    public function index(){
        // $data = Db::table('role')->get();
        $data = (array)$this->db->getAll();
        // p($data);exit;
       View::with('data',$data)->make();
    }
    public function add() {
        if(IS_POST) {
            if($this->db->store()) {
                $this->success('保存成功','index');
            } else {
                $this->error($this->db->getError());
            }
        } else{
            View::make();
        }
    }
    public function edit() {
        if(IS_POST) {
            // p($_POST);exit;
            if($this->db->upd()) {
                $this->success('修改成功','index');
            } else {
                $this->error($this->db->getError());
            }
        } else{
            $id = Q('id');
            $data = $this->db->where('id',$id)->first();
            // p($data);exit;
            View::with('data',$data)->make();
        }
    }

    public function del() {
        $id = Q('id');
        if($this->db->del($id)) {
            $this->success('删除成功');
        } else{
            $this->error($this->db->getError());
        }
    }
}
