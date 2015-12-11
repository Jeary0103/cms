<?php namespace Sadmin2\Controller; 

use Hdphp\Controller\Controller;

use Sadmin2\Model\Article;
class ArticleController extends Controller{

    protected $db;
	//构造函数
	public function __init()
	{
        $this->db = new Article;
	}
	
    //动作
    public function index(){
       $data = $this->db->getAll();
       View::with('data',$data)->make();
    }
    public function add() {
        if(IS_POST) {
            if($this->db->store()) {
                View::success('保存成功','index');
            } else{
                View::success($this->db->getError());
            }
        } else{
            $data = new \Sadmin2\Model\Category;
            $data = $data->getAll();
            View::with('data',$data)->make();
        }
        
    }

    public function del() {
        $id = Q('id');
        if($this->db->delete($id)) {
            $this->success('删除成功','index');
        } else{
            $this->error($this->db->getError(),'index');
        }
    }

    public function edit() {
        if(IS_POST) {
            p($_POST['thumb']);
            if($this->db->update()) {
                View::success('修改成功','index');
            } else{
                View::error($this->db->getError());
            }
        }
        $id = Q('id',0,'intval');
        $data = $this->db->where('id',$id)->first();
        p($data);
        $data2 = new \Sadmin2\Model\Category;
        $data2 = $data2->getAll();
        View::with('data',$data)->with('data2',$data2)->make();
    }



    public function uploadThumb() {
        $file = Upload::make();
        $data['path'] = $file[0]['path'];
        $data['url'] = __ROOT__.'/'.$file[0]['path'];
        $this->ajax($data);
    }
   

    public function contentImageUpload() {
        $file = Upload::make();
        $data['error']=0;
        $data['url']=__ROOT__.'/'.$file[0]['path'];
        $this->ajax($data);
    }











}
