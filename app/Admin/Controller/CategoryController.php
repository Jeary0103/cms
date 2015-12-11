<?php namespace Admin\Controller; 

//引入模型
use Admin\Model\Category;
use Admin\AuthController as Controller;

class CategoryController extends Controller{
	public $db;

	public function __init()
	{
		$this->db= new Category;
	}
    
    //动作
    public function index()
    {
        $data = $this->db->getAll();
        // p($data);exit;
        View::with('data',$data)->make();
    }

    //修改栏目
    public function edit()
    {
        if(IS_POST)
        {
            if($this->db->update())
            {
                $this->success('更新成功',U('index'));
            }
            else
            {
                $this->error($this->db->getError());
            }
        }
        else
        {
            $field= $this->db->find(Q('id'));
            $data = $this->db->getEditData($field['id'],$field['pid']);
            View::with('data',$data)->with('field',$field)->make();
        }
    }

    //编辑栏目
    public function add()
    {
    	if(IS_POST)
    	{http://cmstop.hd/?m=Admin&c=Article&a=index
    		if($this->db->store())
    		{
    			$this->success('添加成功',U('index'));
    		}
    		else
    		{
    			$this->error($this->db->getError());
    		}
    	}
    	else
    	{
            $pid= Q('pid',0);
            $data = $this->db->getAll();
    		View::with('data',$data)->with('pid',$pid)->make();
    	}
    }
    //删除栏目
    public function del()
    {
        if($this->db->del(Q('id')))
        {
            $this->success('删除成功',U('index'));
        }
        else
        {
            $this->error($this->db->getError());
        }
    }
}





