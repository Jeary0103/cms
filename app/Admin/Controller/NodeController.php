<?php namespace Admin\Controller; 

use Admin\AuthController as Controller;
use Admin\Model\Node;
class NodeController extends Controller{
    public $db;
	//构造函数
	public function __init()
	{
        $this->db = new Node;
	}
	
    //动作
    public function index(){
        $data = $this->db->getAll();
        // p($data);
        View::with('data',$data)->make();
    }


    public function edit(){
        if(IS_POST) {
            if($this->db->upd()){
                $this->success('节点更新成功','index');
            } else{
                $this->error($this->db->getError());
            }
        } else{
            $id = Q('id');
            $field = $this->db->getAll($id);
            $data = $this->db->getAll();
            View::with('field',$field)->with('data',$data)->make();
        }
    }

    public function create(){
        if(IS_POST) {
            if($this->db->store()) {
                $this->success('创建节点成功','index');
            } else{
                $this->error($this->db->getError());
            }
        } else{
            $data = $this->db->getAll();
            // p($data);
            View::with('data',$data)->make();
        }
    }

    public function del(){
        $id = Q('id');
        if($this->db->del($id)) {
            $this->success('节点删除成功','index');
        } else{
            $this->error($this->db->getError());
        }
    }



















}
