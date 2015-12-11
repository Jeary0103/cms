<?php namespace Admin\Controller; 

use Hdphp\Controller\Controller;

class BackupController extends Controller{

	//构造函数
	public function __init()
	{
	}
	
    //动作
    public function index(){
       View::make();
    }

    public function backup() {
        if (IS_POST)
        {
            $config = array(
                'size' => 200,//分卷大小 单位KB
                'dir'  => 'backup/' . date("Ymdhis"),//备份目录
                'time' => 0.2,//备份时间间隔
                'url'  => U('backup'),//备份完成后的跳转地址
            );
            //设置备份配置
            if (Backup::backupInit($config))
            {
                //配置正确执行备份
                go('runBackup');
            }
            else
            {
                $this->error(Backup::getError());
            }
        }
        else
        {
            $data = Db::getAllTableInfo();
            View::with('data', $data['table'])->make();
        }
    }

        //运行备份
    public function runBackup(){
        Backup::backup();
    }

    public function recovery()
       {
           if ($dir = Q("get.dir"))
           {
               $config = array(
                   'dir'  => 'backup/'.$dir,//备份目录
                   'url'  => U('recovery'),//还原完成后的跳转地址
                   'time' => 0.2,//还原间隔时间
               );
               //设置还原配置
               if (Backup::recoveryInit($config))
               {
                   //执行还原
                   go('runRecovery');
               }
               else
               {
                   $this->error(Backup::getError(), 'recovery');
               }
           }
           else
           {
               View::with('data', Backup::getBackupDir('backup'))->make();
           }
       }

       //执行还原
       public function runRecovery(){
           Backup::recovery();
       }
}
