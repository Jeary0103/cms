<?php namespace Admin\Model;

use Hdphp\Model\Model;

class User extends Model{

	//数据表
	public $table = "user";

	//自动验证
	protected $validate=array(
		//字段名: 表单字段名
		//验证方法: 函数或模型方法
		//验证条件: 1有字段时验证(默认)	2值不为空时验证  	3必须验证 
		//验证时间: 1 插入时验证		2更新时空时验证 	3全部情况验证 (默认)
		// array('字段名','验证方法','提示信息',验证条件,验证时间),
		array('username','required','名称不能为空',1,3),
		array('password','confirm:c_password','两次密码不一致',2,3),
	);

	//自动完成
	protected $auto=array(
		//字段名: 表单字段名
		//处理方法: 函数或模型方法
		//方法类型: string(字符串 默认)  function(函数)  method(模型方法)
		//处理时间: 1 插入时  2更新时 3全部情况 (默认)
		// array('字段名','处理方法','方法类型',处理时间),
		array('password','md5','function'),
		array('c_password','md5','function'),
	);
	public function getAll($id=''){
		if(empty($id)) {
			return Db::table('user u')->
			field('u.id','u.username','r.name')->
			join('user_role ur','ur.user_id','=','u.id')->
			join('role r','r.id','=','ur.role_id')->where('r.type',1)->get();
		} else{
			return Db::table('user u')->
			field('u.id','u.username','r.name')->
			join('user_role ur','ur.user_id','=','u.id')->
			join('role r','r.id','=','ur.role_id')->
			where('r.type',1)->where('u.id',$id)->first();
		}
	}
	public function login()
	{
		if(strtoupper($_POST['code']) !=$_SESSION['code'])
		{
			$this->error = ' 验证码输入错误';
			return false;
		}
		$user=  $this->where('username',$_POST['username'])->first();
		if(!$user)
		{
			$this->error = '帐号不存在';
			return false;
		}
		if($user['password']!=md5($_POST['password']))
		{
			$this->error =  '密码错误';
			return false;
		}
		$_SESSION['id']=$user['id'];
		return true;
	}
	public function store() {
		// $_POST;
		if($this->create()) {
			if($this->add()) {
				$data['role_id'] = $_POST['role_id'];
				$data['user_id'] = $this->getInsertId();
				Db::table('user_role')->insert($data);
				return true;
			}
		}
	}
	/**
	 * 删除$id对应的user里面的id和user_role里面的对应的id
	 * @param  [对应的id号] $id [对应的user id的id号码]
	 * @return [booble]     [description]
	 */
	public function del($id) {
		if($this->where('id',$id)->delete()) {
			if(Db::table('user_role')->where('user_id',$id)->delete()) {
				return true;
			}
		}

	}


	public function upd(){
		if($this->create()) {
			if($this->save()) {
				$data['role_id'] = $_POST['role_id'];
				$data['user_id'] = $_POST['id'];
				return Db::table('user_role')->where('user_id',$_POST['id'])->update($data);
			}
		} 
					// return Db::getqueryLog();

	}



























	//时间操作
	protected $timestamps=false;

	//允许插入的字段
	protected $insertFields=array();

	//允许更新的字段
	protected $updateFields=array();


}
