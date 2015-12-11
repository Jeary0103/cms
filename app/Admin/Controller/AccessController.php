<?php namespace Admin\Controller; 

use Admin\AuthController as Controller;
use Admin\Model\Access;
class AccessController extends Controller{
    public $db;
	//构造函数
	public function __init()
	{
        $this->db = new Access;
	}
	
    //动作
    public function index(){
        $id = Q('pid');
        $node = new \Admin\Model\Node;
        $node = $node->getchannletree();

        $access =(array)$this->db->getAccessNode($id);

        View::with('node',$node)->with('access',$access)->make();
    }

    public function flash() {
        // p($_POST['file']);exit;
        // p($this->db->reflash());exit;
        if($this->db->reflash()) {
            $this->success('更新成功',"Role/index");
        } else{
            $this->error($this->db->getError());
        }
    }
}
