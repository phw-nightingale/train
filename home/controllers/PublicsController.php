<?php
namespace app\controllers;

use yii;
use yii\web\Controller;
use common\servers\FileUpload;



class PublicsController extends Controller
{
	
	
	public function beforeAction($action) {  
	  
		$currentaction = $action->id;  
		$novalidactions = ['upload'];
		if(in_array($currentaction,$novalidactions)) {  
			$action->controller->enableCsrfValidation = false;  
		}
		parent::beforeAction($action);  
		return true;  
	} 
	
    public function actionUpload()
    {
		//上传
		$id = Yii::$app->request->get('id');
		$field = Yii::$app->request->get('field');
		$ClassModel = new \common\models\Upfile;
		if($id){//删除文件
			$file = $ClassModel::find()->where(['id'=>$id])->asArray()->One();
			if($file){
				@unlink($file['path'].$file['name']);
				@unlink($file['path_tmp'].$file['name']);
				return $ClassModel::deleteAll(['id'=>$id]);
			}
		}
		
		$path = 'upload/'.date('Ymd').'/';
		if (!file_exists($path)) {
			@mkdir($path);
		}
		$path_tmp = $path.'tmp/';
		if (!file_exists($path_tmp)) {
			@mkdir($path_tmp);
		}
		
		$up = new FileUpload();
		$up->set("path", $path);
		$up->set("allowtype",Yii::$app->params['file_upload']['extensions']);
		$up->set("maxsize", Yii::$app->params['file_upload']['max_size']);
		$up->set("israndname", true);
		if($up->upload("file")){
			$fileName = $up->getFileName();
			$result   = $up->mkThumbnail($path.$fileName, 200, NULL, $path.'tmp/'.$fileName); 
			
			$data['field'] 		= $field;
			$data['name'] 		= $fileName;
			$data['path'] 		= $path;
			$data['path_tmp']  	= $path_tmp;
			$data['filetype'] 	= $up->getFileType();
			$data['add_time']  	= time();
			
			Yii::$app->db->createCommand()->insert($ClassModel->tableName(),$data)->execute();
			$id = Yii::$app->db->getLastInsertId();
			
			die('{"result" : "'.$fileName.'", "id" : "'.$id.'"}');
		}else{
			$errorMsg = getErrorMsg();
			die('{"error" : "'.$errorMsg.'"}');
		}
		
		exit;
    }
	



}
?>
