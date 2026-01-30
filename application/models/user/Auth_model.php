<?PHP

require_once __DIR__ . "/User_model.php";
require_once __DIR__ . "/constants.php";
require_once __DIR__ . "/../core/Token_model.php";
require_once __DIR__ . "/../core/Template_model.php";
require_once __DIR__ . "/../core/Session_model.php";


class Auth_model extends BaseMySQL_model
{

	public function __construct()
	{
		parent::__construct(TABLE_USER);
		$this->User = new User_model();
		$this->Token = new Token_model();
		$this->Session = new Session_model();

		$this->type_forgot = "forgot_password";
		
		// Load LDAP library
		$this->CI =& get_instance();
		$this->CI->load->library('ldap_auth');
		$this->CI->config->load('ldap', TRUE);
	}

	public function login($data)
	{
		$username = trim($data['username']);
		$password = $data['password'];
		
		// Try LDAP authentication first (for non-demo accounts)
		if (strpos($username, '.demo') === false) {
			$ldap_config = $this->CI->config->item('ldap');
			if ($ldap_config['ldap_enabled']) {
				log_message('debug', 'Attempting LDAP authentication for: ' . $username);
				$ldap_user = $this->CI->ldap_auth->authenticate($username, $password);
				
				if ($ldap_user) {
					log_message('info', 'LDAP authentication successful for: ' . $username);
					
					// Check if user exists in database
					$users = $this->User->getBy('*', array('username' => $username));
					$user = $this->User->getOneItem($users);
					
					// Auto-create user if enabled and user doesn't exist
					if (!$user && $ldap_config['ldap_auto_create_user']) {
						log_message('info', 'Auto-creating user account for: ' . $username);
						$full_name = trim($ldap_user['first_name'] . ' ' . $ldap_user['last_name']);
						$user_id = $this->User->register([
							'username' => $ldap_user['username'],
							'email' => $ldap_user['email'],
							'name' => $full_name,
							'password' => uniqid(), // Random password, won't be used
							'type' => $ldap_config['ldap_default_user_type'],
							'status' => STATUS_ACTIVE
						]);
						
						if ($user_id) {
							$users = $this->User->getBy('*', array('id' => $user_id));
							$user = $this->User->getOneItem($users);
						}
					}
					
					if ($user && $user['status'] == STATUS_ACTIVE) {
						unset($user['password']);
						return $user;
					}
				}
			}
		}
		
		// Fall back to database authentication (for demo accounts and if LDAP fails)
		log_message('debug', 'Attempting database authentication for: ' . $username);
		$users = $this->User->getBy('*', array('username' => $username));
		$user = $this->User->getOneItem($users);
		
		// Debug logging
		log_message('debug', 'Login attempt - Username: ' . $username);
		log_message('debug', 'User found: ' . ($user ? 'yes' : 'no'));
		if ($user) {
			log_message('debug', 'User status: ' . $user['status']);
			log_message('debug', 'Password hash in DB: ' . $user['password']);
			log_message('debug', 'Password hash computed: ' . $this->User->hashPassword($password));
			log_message('debug', 'Passwords match: ' . ($user['password'] === $this->User->hashPassword($password) ? 'yes' : 'no'));
		}
		
		if ($user && $user['password'] === $this->User->hashPassword($password) && $user['status'] == STATUS_ACTIVE)
		{
			unset($user['password']);
			return $user;
		}
		return false;
	}

	// public function sendResetPasswordLink($userId=null)
	// {
	//     $user = $this->User->getUsersBy(array('id' => $userId));
	//     if(count($user) < 1)
	//         return false;
	//     $user = $user[0];
	//     $type = "forgot_password";
	//     $token = $this->Token->create($user['id'], $this->type_forgot);
	//     $userdata = $user;
	//     $userData['token'] = $token;

	//     $this->sendResetLink($userData);
	// }


	//todo
	public function sendResetLink($id)
	{
		//Create instance for template model here for just one method
		$this->template = new Template_model();

		$templateId = $this->template->getTemplatesBy(array('type' => 'forgot_password'));
		$templateId = $templateId[0];

		$user = $this->User->getUsersBy(null,$query = ['id' => $id]);
		$user = $user[0];

		$token = $this->Token->generate($id, $this->type_forgot);
		$url = $this->generatePasswordResetLink($user['username'], $token);

		$data = array(
			'username' => $user['username'],
			'token' => $user['token']
		);

		$htmlData = $this->Template->parseById($templateId['id'], $data);
		$res = $this->mailer->send(CLIENT_SUPPORT_EMAIL, $user['email'], 'Password Reset Link', $htmlData);
		return $res;
	}

	public function generatePasswordResetLink($username, $token)
	{
		$url = BASE_URL . "auth/reset_password?username=$username&token=$token";
		return $url;
	}

	public function verifyPasswordResetLink($username, $token)
	{
		$user = $this->User->getUsersBy(null,array('username' => $username));
		if (count($user) < 1)
			return false;

		$user = $user[0];
		$result = $this->Session->verifyToken($user['username'], $token);
		if (!$result)
			return false;
		$newPassword = $this->generateRandomPassword(6);
		return $newPassword;
	}

	public function generateRandomPassword($n)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@$^#';
		$randomString = '';

		for ($i = 0; $i < $n; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$randomString .= $characters[$index];
		}
		return $randomString;
	}


	public function setRandomPassword($username)
	{
		$random_password = $this->generateRandomPassword(8);
		$res = $this->user->update_user($username, array('password' => md5($random_password)));
		$user = $this->User->get_user_details($username);
		if ($res) {
//            Send Mail or Sms
			$body = 'Hi ' . $username . ', You recently requested a password reset. Your new password is' . $random_password;
//            $this->mailer->send($user['email'], 'jbi@fixange.com', 'Password Reset Request', $body);
//            $this->SMS->sendSMS($user['mobile'], "Dear " . $user['name'] . " Your new password is " . $random_password);
		}
		return $res;

	}


	public function do_payment($userData)
	{
		$_SESSION['pending_registration'] = $userData;
		$this->load->model('payment/Paytm_model', 'Paytm');
		$desc = 'Member Registration for ' . $userData['name'].', Mobile number - ' . $userData['mobile'];
		$payment = $this->Paytm->generateTX(USER_SYSTEM_USERID, CLIENT_REGISTRATION_FEE, 0, TX_TYPE_DEPOSIT, $desc);
		$payment['redirect'] = BASE_URL . "/auth/registration_payment";
		$_SESSION[PAYMENT_SESSION_KEY] = $payment;
		return $payment['html'];
	}



}
