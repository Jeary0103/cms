<?php namespace Admin\Controller; 

use Hdphp\Controller\Controller;

class HtmlController extends Controller{

	//构造函数
	public function __init()
	{
	}
	
    //动作
    public function createHome(){
        if(IS_POST) {
            ob_start();
            $obj = new \Home\Controller\IndexController;
            $obj->index();
            $content = ob_get_clean();
            file_put_contents('index.html', $content)?$this->success('首页生成成功'):$this->error('首页生成失败');
        } else{
            View::make();
        }
    }    

    public function createArticleConfig() {
        if(IS_POST) {
            $article = Db::table('category')->where('sichtbar',0)->lists('id');
            $array = [];
            foreach ($article as $key => $value) {
                $array['cate'][$value] = 0;
            }
            $array['row'] = $_POST['row'];
            F('__HTML__',$array);
            go('createArticle');
        } else{
            View::make();
        }
    }

    public function createArticle() {
        $cache = F('__HTML__');
        // p($cache);exit;
        if(empty($cache['cate'])) {
            F('__HTML__','[del]');
            $this->success('所有栏目生成成功',U('createArticleConfig'));
        }

        foreach ($cache['cate'] as $catId => $limit) {
            $catename = Db::table('category')->where('id',$catId)->pluck('catname');
            $article = Db::table('category c')->
                        JOIN('article a','c.id','=','a.cid')->
                        where('cid',$catId)->
                        limit($limit,$cache['row'])->get();
            if(empty($article)) {
                unset($cache['cate'][$catId]);
                F('__HTML__',$cache);
                $this->success($catename."生成成功",U('createArticle'));
            }

            foreach ((array)$article as $a) {
                
                $date = getdate($a['addtime']);
                p($a['arthtml']);
                $arthtml = 'h/'.str_replace(array('{dir}',"{y}",'{m}','{id}'),
                    array($a['dir'],$date['year'],$date['mday'],$a['id']),
                    $a['arthtml']);
                p($a['arthtml']);
                p($arthtml);exit;
                is_dir(dirname($arthtml)) || mkdir(dirname($arthtml),0777,true);
                $_GET['id'] = $a['id'];
                ob_start();
                $obj = new \Home\Controller\IndexController;
                $obj->article();
                $content = ob_get_clean();

                file_put_contents($arthtml,$content);
            }

            $cache['cate'][$catId] = $cache['cate'][$catId] + $cache['row'];
            F('__HTML__',$cache);
            go('createArticle');

        }
    }

    public function createCategoryConfig(){
        if (IS_POST) {
            $cat = Db::table('category') -> get();
            $data = array();
            foreach ($cat as $c)
            {
                $_GET['id'] = $c['id'];
                ob_start();
                $obj = new \Home\Controller\IndexController;
                $obj -> category();
                ob_get_clean();
                // $c['id'] = 20;
                $num = Page::getTotalPage();
                $data[$c['id']]=$num;
            }
            F('__HTML__',$data);
            go('createCategory');
        } else {
            F('__HTML__','[del]');
            View::make();
        }
    }

    public function createCategory() {
       $cache = F('__HTML__');
       foreach ((array)$cache as $id => $num) {
           $cat = Db::table('category')->where('id',$id)->first();
           // p($cat);
           for ($i=1; $i <= $num; $i++) { 
               $_GET['id'] = $id;
               $_GET['page'] = $i;
               ob_start();
               $obj = new \Home\Controller\IndexController;
               $obj->category();
               $con = ob_get_clean();
               $file='h/'.str_replace(array('{dir}','{page}'),
                array($cat['dir'],$i), $cat['cathtml']);
               // p($file);exit;
                is_dir(dirname($file))||mkdir(dirname($file),0777,true);
                file_put_contents($file, $con);
                if($i==1) {
                    copy($file,dirname($file).'index.html');
                }

           }
       }
    }
}
