<?php
namespace common\utils\verifyCode;

use Yii;
use common\utils\verifyCode\ImageParam;



class VerifyServer{
	
	/**
	 * 显示一个
	 */
	public function displayVerify()
	{
		
		$code = new ImageParam();
		$datapath= Yii::getAlias('@common/utils/verifyCode/');
		$code->code = $this->random(6,1);
		$code->width = 128;
		$code->height = 48;
		$code->background = 1;
		$code->adulterate = 1;
		$code->scatter = '';
		$code->color = 1;
		$code->size = 0;
		$code->shadow = 1;
		$code->animator = 0;
		$code->datapath = $datapath;
		$code->display();
		Yii::$app->session->set("verify_code", $code->code);
		
	}
	
	//获取验证码
	public function getVerify(){
		return Yii::$app->session->get("verify_code", 0);
	}
	
	/**
	 * 取得随机数
	 *
	 * @param int $length 生成随机数的长度
	 * @param int $numeric 是否只产生数字随机数 1是0否
	 * @param string $seccode 哈希数
	 * @return string
	 */
	function random($length, $numeric = 0) {
		$seed = base_convert(md5(microtime() . $_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
		$seed = $numeric ? (str_replace('0', '', $seed) . '012340567890') : ($seed . 'zZ' . strtoupper($seed));
		$hash = '';
		$max = strlen($seed) - 1;
		for ($i = 0; $i < $length; $i++) {
			$hash .= $seed{mt_rand(0, $max)};
		}
	
		$s = sprintf('%04s', base_convert($hash, 10, 23));
		$seccodeunits = 'ABCEFGHJKMPRTVXY2346789';
		if ($seccodeunits) {
			$seccode = '';
			for ($i = 0; $i < 4; $i++) {
				$unit = ord($s{$i});
				$seccode .= ($unit >= 0x30 && $unit <= 0x39) ? $seccodeunits[$unit - 0x30] : $seccodeunits[$unit - 0x57];
			}
		}
		return $seccode;
	}
}

