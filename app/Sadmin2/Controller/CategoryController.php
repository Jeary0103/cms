<?php namespace Sadmin2\Controller; 

use Hdphp\Controller\Controller;
use Sadmin2\Model\Category;


class CategoryController extends Controller{
    protected $db;
	//构造函数
	public function __init()
	{
        $this->db = new Category;
	}
	
    //动作
    public function index(){
        $data = $this->db->getAll();
        // p($data);exit;
       View::with('data',$data)->make();
    }

    public function add() {
        if(IS_POST) {
            if($this->db->store()) {
                $this->success('保存成功',U('index'));
            } else{
                $this->error($this->db->getError());
            }
        } else{
            $pid = Q('pid',0);
            $data = $this->db->getAll();
            View::with('data',$data)->with('pid',$pid)->make();
        }
    }

    public  function del() {
        if($this->db->del(Q('id'))) {
            $this->success('删除成功');
        } else{
            $this->error($this->db->getError());
        }
    }


    public function edit() {
        if(IS_POST) {
            if($this->db->store()) {
                $this->success('保存成功',U('index'));
            } else{
                $this->error($this->db->getError());
            }
        } else{
            $data = $this->db->find(Q('id'));
            $data2 = $this->db->getEdit($data['id'],$data['pid']);
            // p($data);exit;
            View::with('data',$data)->with('data2',$data2)->make();
        }
    }

}
