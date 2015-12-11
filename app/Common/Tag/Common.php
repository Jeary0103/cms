<?php namespace Common\Tag;

use Hdphp\View\TagBase;

class Common extends TagBase
{
    protected $nichtsehn= ['20'];
    /**
     * 标签声明
     * @var array
     */
    public $tags = array(
        'category' => array('block' => 1, 'level' => 4),
        'arclist' => array('block' => 1, 'level' => 4),
        'pagelist' => array('block' => 1, 'level' => 4),
        'pageshow' => array('block' => 0, 'level' => 4),
        'prenext' => array('block' => 0, 'level' => 4),
        'notice' => array('block' => 1, 'level' => 4),
        'kleinstuck' => array('block' => 1, 'level' => 4),
        'strlength' => array('block' => 0, 'level' => 4),
        );
    public function _strlength($attr, $content, &$hd) {
        $length = isset($attr['length'])?$attr['length']:20;
        $php = <<<str
        <?php
        echo mb_substr(\$panmian['title'],0,$length,"utf-8");?>
str;
        return $php;    
    }
    /**
     * 首页今日点评 一系列模块读取
     * @param  [type] $attr    [gros表示显示大块的个数 rows表示除了大块只读标题的个数 cid 表示在category中对应的栏目id]
     * @param  [type] $content [要显示的内容 因为第一条数据 和第二条数据的样子不一样 所以我的思想是把第一条读到的数据用一个变量名称表示 然后其他数据用另一个变量名称表示
     * name 命名是用的名字】
     * @param  [type] &$hd     [description]
     * @return [type]          [返回要进行编译的数据]
     */
    public function _kleinstuck($attr, $content, &$hd) {
        $rows = isset($attr['rows'])?$attr['rows']:2;
        $catname = $attr['catname'];
        $name = $attr['name'];

$php = <<<STR
    <?php
        \$cid = Db::table('category')->where('catname',"$catname")->pluck('id');
        \$first['url'] = "list_\$cid";
        \$data = Db::table('article');
        \$data = \$data->where('cid',\$cid)->orderBy('addtime','DESC')->limit(0,$rows)->get();
        foreach (\$data as \$key => $$name) { 
            \${$name}['url'] = "article_".\${$name}['id']; ?>
            $content
        <?php } ?>
STR;
        return $php;
    }

    public function _notice($attr, $content, &$hd) {
        $num = isset($attr['limit'])?$attr['limit']:3;
        $id = isset($attr['id'])?$attr['id']:var_export($this->nichtsehn,true);
        $php = <<<NOTICE
    <?php
        \$data = Db::table('article');
        \$data = \$data->where('cid',20)->limit($num)->get();
        foreach (\$data as \$key => \$field) {  
            \$field['url']="article_{\$field['id']}";
            ?>
            $content
       <?php } ?>
NOTICE;
        return $php;

    }
    /**
     * 测试标签
     * @param $attr 属性
     * @param $content 内容
     * @param $hd HdView模型引擎对象
     */
    public function _category($attr, $content, &$hd)
    {
        $attr['id'] = isset($attr['id'])?$attr['id']:0;
        $attr['proteced'] =isset($attr['proteced'])?var_export($attr['proteced'],true):var_export($this->nichtsehn,true);
        $php=<<<str
        <?php
        \$db = Db::table("category");

        switch('{$attr['type']}')
        {
            case 'top':
                //顶级
            \$data = \$db->where('pid',0)->logic('AND')->whereNotIn('id',{$attr['proteced']})->where('sichtbar',1)->get();
            break;
            case 'self':
                //同级
            \$pid = \$db->where('id',{$attr['id']})->pluck('pid');
            \$data = \$db->where('pid',\$pid)->get();
            break;
            case 'son':
            \$data = \$db->where('pid',{$attr['id']})->get();
            break;
        }
        foreach(\$data as \$field):
            \$field['url']="list_{\$field['id']}";
            ?>
        {$content}
        <?php endforeach;
    ?>
str;
        return $php;
    }

    public function _arclist($attr, $content, &$hd)
    {
        $titlelen = isset($attr['titlelen'])?$attr['titlelen']:20;
        $row = isset($attr['row'])?$attr['row']:10;
        $cid = isset($attr['cid'])?$attr['cid']:0;

$php =<<<str
    <?php
        \$cid = "$cid";
        \$db = Db::table('article');
        if(\$cid)
        {
            \$data = \$db->whereIn('cid',explode(',',\$cid))->limit($row)->get();
        }
        else
        {
            \$data = \$db->limit($row)->get();
        }

        foreach(\$data as \$field):
            \$field['title']=mb_substr(\$field['title'], 0,$titlelen,'utf8');
            \$field['url']=U('Home/Index/article',array('id'=>\$field['id']));
        ?>
        $content
        <?php 
        endforeach;
        ?>
str;
        return $php;
    }

    //栏目页分页数据展示
    public function _pagelist($attr,$content,&$hd)
    {
        //每页显示条数
        $row = isset($attr['row'])?$attr['row']:10;
       
        $php=<<<str
        <?php
        \$db = Db::table('article');
        
        \$count = \$db->where("cid",{$_GET['id']})->count('*');

        Page::row($row)->make(\$count);
        
        \$limit =  Page::limit();

        \$data = \$db->where('cid',{$_GET['id']})->limit(\$limit)->get();

        foreach(\$data as \$field):
            \$field['url']=U('Home/Index/article',array('id'=>\$field['id']));;
            ?>
           $content
        <?php endforeach;?>
str;
        return $php;
    }

    public function _pageshow($attr,$content,&$hd)
    {
        $php=<<<str
        <?php 
        \$db = Db::table('article');

        \$count = \$db->where("cid",{$_GET['id']})->count('*');

        echo Page::row({$attr['row']})->make(\$count);
        ?>
str;
        return $php;
    }

    //上一篇与下-篇
    public function _prenext($attr,$content,&$hd)
    {
        $php=<<<str
        <?php
 \$id= (int)\$_GET['id'];//5   6789
        \$pre = Db::table('article')->where("id",'<',\$id)->orderBy('id','DESC')->first();

        \$next = Db::table('article')->where("id",'>',\$id)->orderBy('id','ASC')->first();
        if(\$pre)
        {
          \$preLink = "<li><a href='".U('Home/Index/article',array('id'=>\$pre['id']))."'>".\$pre['title']."</a></li>";   
        }
        else{
            \$preLink="没有了";
        }

        if(\$next)
        {
          \$nextLink = "<li><a href='".U('Home/Index/article',array('id'=>\$next['id']))."'>".\$next['title']."</a></li>";   
        }
        else{
            \$nextLink="没有了";
        }
        echo \$preLink.\$nextLink;
        ?>
str;
       

       return $php;
    }
}




















