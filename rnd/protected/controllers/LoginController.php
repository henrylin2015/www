<?php
class LoginController extends Controller {
	public function init() {
		$this->layout = "layout1";
	}
	public function actionIndex() {
		if (!empty(Yii::app()->session['userKey'])) {
			$userUser = User_user::model();
			$cri      = new CDbCriteria();
			$cri->addCondition("txn_id = :key");
			$cri->params[':key'] = Yii::app()->session['userKey'];
			$info                = $userUser->find($cri);
			if ($info === null) {
				//$this->render("set_email");
				Yii::error("用户超时或是在别的地方登陆了。谢谢！！！", "index.php?r=login/index", "5");
				Yii::app()->session['userKey'] = "";
				exit();
			}
			$this->redirect(array('index/index'));
		}
		$this->render("set_email");
	}
	public function actionLogin() {
		$_email = "";
		if (!empty($_REQUEST['UserEmail'])) {
			$_email = $_REQUEST['UserEmail'];
		}
		//判断接收到的邮件是否存在
		$u_user = $this->ifUserExists($_email);
		if ($u_user != 1) {
			$client_ip          = $this->get_client_ip();
			$log_att            = new Log_attempts();
			$log_att->ip        = $client_ip;
			$log_att->created   = date("Y-m-d H:i:s", time());
			$log_att->bad_email = $_email;
			$log_att->save();
			//$this->redirect(array("login/index",array('error'=>'email is error')));
			Yii::error("Your email is not registered, please confirm it and try again.", "index.php?r=login/index", "5");
			exit();
		}

		//session password
		$session_password = $this->getRandString(8);
		//获取客户端ip
		$client_ip = $this->get_client_ip();
		//修改user数据表
		//$userInfo = DbRnd::model();
		$userInfo = User_user::model()->find(array(
				'condition' => 'Paid_user_email=:email',
				'params'    => array(":email"    => $_email),
			));
		$userInfo->session_password      = $session_password;
		$userInfo->Time_password_request = date("Y-m-d H:i:s", time());
		$userInfo->Session_IP            = $client_ip;
		if ($userInfo->save() <= 0) {
			//$this->redirect(array("login/index",array('error'=>'email is error1')));
			Yii::error("Email or password is not correct, then try again.", "index.php?r=login/index", "5");
			exit();
		}
		if ($this->sendToEmail($userInfo['first_name'], $_email, $session_password)) {
			$this->render("login", array("_email" => $_email));
			exit();
		}
		//$this->redirect(array("login/index",array('error'=>'email is error')));
		Yii::error("Email or password is not correct, then try again.", "index.php?r=login/index", "5");
		eixt();
	}

	public function actionGetpassword() {
		if (!empty($_REQUEST['UserEmail']) && !empty($_REQUEST['password']) && !empty($_REQUEST['agreeName'])) {
			$_email    = $_REQUEST['UserEmail'];
			$_password = $_REQUEST['password'];
		} else {
			Yii::error("You must agree with our terms and conditions to view our research.", "", "5");
			//$this->redirect(array("login/index",array('error'=>'email is error3')));
			exit();
		}
		$txn_id              = $this->getRandChar(10);
		$loginForm           = new LoginForm();
		$loginForm->username = trim($_email);
		$loginForm->password = trim($_password);
		if ($loginForm->validate() && $loginForm->login()) {
			$userUser                     = User_user::model()->findByAttributes(array('Paid_user_email' => $_email, 'session_password' => $_password));
			$userUser->txn_id             = $txn_id;
			$userUser->Time_session_login = date("Y-m-d H:i:s", time());
			if ($userUser->save() <= 0) {
				//$this->redirect(array("login/index",array('error'=>'email is error login')));
				Yii::error("Email or password is not correct, then try again.", "index.php?r=login/index", "5");
			}
			//向登录表中添加数据
			$log_in          = new Log_in();
			$log_in->email   = $_email;
			$log_in->session = $txn_id;
			$log_in->ip      = $this->get_client_ip();
			$log_in->in      = date("Y-m-d H:i:s", time());
			$log_in->save();
			Yii::app()->session['userKey'] = $txn_id;
			if ($userUser->save() && $log_in->save()) {
				Yii::app()->user->setFlash("success", "login success");
				return $this->redirect(array('index/index'));
				exit();
			}
			//$this->redirect(array("login/index",array('error'=>'email is error3')));
			Yii::error("Email or password is not correct, then try again.", "index.php?r=login/index", "5");
			eixt();
		}
		//$this->redirect(array("login/index",array('error'=>'email is error3')));
		Yii::error("Email or password is not correct, then try again.", "index.php?r=login/index", "5");
		eixt();

	}
	/*========================logout====================*/
	public function actionLogout() {
		if (!empty(Yii::app()->session['userKey'])) {
			$res   = $this->updateTime(Yii::app()->session['userKey']);
			$login = Log_in::model()->find(array(
					'condition' => 'session=:session',
					'params'    => array(':session'    => Yii::app()->session['userKey']),
				));
			if ($login) {
				$login->out = date("Y-m-d H:i:s", time());
				$login->save();
			}

		}
		unset(Yii::app()->session['userKey']);
		Yii::app()->session->clear();
		Yii::app()->session->destroy();
		//logout
		Yii::app()->user->logout();
		$this->redirect(array("login/index"));
	}
	//*============================查询某个邮件是否在表中存在=================================*/
	public function ifUserExists($_email) {
		$userUser = User_user::model();
		$cri      = new CDbCriteria();
		$cri->addCondition("Paid_user_email='".$_email."'");
		$count = $userUser->count($cri);
		//return $dbrnd->find($cri);
		return $count;
	}

	/*============================随机生产密码的方法=================================*/
	public function getRandString($n) {
		$len  = intval($n);
		$temp = md5(rand());

		for ($i = 0; $i <= $n; $i++) {
			$temp .= md5(rand());
		}

		return substr($temp, 0, $len);
	}
	/*============================返回客户端的ip=================================*/
	public function get_client_ip() {
		if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
			$ip = getenv("HTTP_CLIENT_IP");
		} else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		} else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
			$ip = getenv("REMOTE_ADDR");
		} else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
			$ip = $_SERVER['REMOTE_ADDR'];
		} else {

			$ip = "unknown";
		}

		return ($ip);
	}
	/*==============send email=======*/
	public function sendToEmail($userName, $user_email, $password) {
		$mail_arr['to_name'] = $userName;
		$mail_arr['to']      = $user_email;
		$mail_arr['body']    = $password;

		$mail_subject = 'Password for China R&D Center';
		$mail_body    = 'Dear '.ucfirst($mail_arr['to_name']).',
	          <br /><br />
	          Thanks for visiting your personalized China R&D Center.
	          <br /><br />
	          Your session password is: '.$mail_arr['body'].'
	          <br /><br />
	          Continue log in by entering the password in the field provided and click the "Login" button. Please note this password is valid for 24 hours, from the location the request was made. If you need to log in from a different location, you will have to request a new password. If you have problems logging in, please emai support@chinarnd.com
	          <br /><br />
	          Thank you for using the China R&D Center.
	          <br /><br />
	          Best regards, <br />
	          The Modular Development Team';
		$mailer       = Yii::createComponent('application.extensions.mailer.EMailer');
		$mailer->Host = 'cps2.webserversystems.com';
		$mailer->IsSMTP();
		$mailer->SMTPAuth = true;
		$mailer->From     = 'admin@chinarnd.com';
		$mailer->AddReplyTo('admin@chinarnd.com');
		$mailer->AddAddress($user_email);
		$mailer->FromName  = 'Modular R&D';
		$mailer->Username  = 'admin@chinarnd.com';//这里输入发件地址的用户名
		$mailer->Password  = 'Jiang1su1lu4$$$';//这里输入发件地址的密码
		$mailer->SMTPDebug = false;//设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
		$mailer->CharSet   = 'UTF-8';
		$mailer->Subject   = $mail_subject;
		$mailer->IsHTML(true);// set email format to HTML //是否使用HTML格式
		$mailer->Body = $mail_body;
		if ($mailer->Send()) {
			return true;
		}
		return false;
	}

	/**
	 * 这个方法是随机生成字符串的方法
	 */
	function getRandChar($length) {
		$str    = null;
		$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
		$max    = strlen($strPol)-1;

		for ($i = 0; $i < $length; $i++) {
			$str .= $strPol[rand(0, $max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
		}
		return md5(time().$str);
	}
	//修改退出登陆时间的方法
	public function updateTime($key) {
		$userUser                      = User_user::model();
		$cri                           = new CDbCriteria();
		$cri->condition                = "txn_id = :key";
		$cri->params[':key']           = $key;
		$userUser->Time_session_logout = date("Y-m-d H:i:s", time());
		if ($userUser->save()) {
			return true;
		}
		return false;
	}

}