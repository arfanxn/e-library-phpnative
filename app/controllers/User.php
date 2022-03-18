<?php

class User extends Controller
{
  private $username;
  public function index() //sign in page
  {
    isset($_SESSION['user']) ?  header('LOCATION: ' . BASEURL . '/') : false;
    $data = [
      'htmlTitle' => 'Sign In',
      'allowGuest' => true
    ];
    $this->view('user/signIn', $data);
  }
  public function signUp() // sign up page 
  {
    isset($_SESSION['user']) ?  header('LOCATION: ' . BASEURL . '/') : false;
    $data = [
      'htmlTitle' => 'E-Library | SignUp',
      'allowGuest' => true
    ];
    $this->view('user/signUp', $data);
  }

  public function profile_settings()
  {
    $data = [
      'htmlTitle' => "| Profile"
    ];
    $this->view("user/setting/profile", $data);
  }

  public function security_settings()
  {
    $data = [
      'htmlTitle' => "| Security"
    ];
    $this->view("user/setting/security", $data);
  }

  public function signIn_validation() // sign in verification
  {
    $userM = $this->model('User');
    $user = $userM->getUserByUsername($_POST['username']);
    if ($user) {
      if ($userM->verifyPasswordbyUsername($user['username'], $_POST['password'])) {
        $userM->setSessionbyUsername($_POST['username']);
        sleep(1.5);
        return header('LOCATION: ' . BASEURL);
      } else {
        Flasher::setFlash('Username or password wrong', 'danger');
        return header('LOCATION: ' . BASEURL . '/user/index');
      }
    } else {
      Flasher::setFlash('Username doesnt exists in our records', 'danger');
      return header('LOCATION: ' . BASEURL . '/user/index');
    }
  }

  public function signOut()
  {
    session_destroy();
    header('LOCATION: ' . BASEURL . '/user');
  }

  public function setting($arg = 'profile')
  {
    $data = [
      'htmlTitle' => "| $arg"
    ];
    $this->view("user/setting/$arg", $data);
  }

  public function create()
  {
    $userM = $this->model('User');
    if ($userM->verifySignupInput($_POST)) {
      if ($userM->verifyConfirmPassword($_POST['password'], $_POST['confirmPassword'])) {
        if (!$userM->getUserByUsername($_POST['username'])) {
          $userM->create($_POST);
          Flasher::setFlash('Account created please ', 'success', 'login', BASEURL . '/');
          return header('Location: ' . BASEURL . '/user/signup');
        } else {
          Flasher::setFlash('Username already taken', 'danger');
          return header('LOCATION: ' . BASEURL . '/user/signup');
        }
      } else {
        Flasher::setFlash('Your confirm password not match', 'danger');
        return header('LOCATION: ' . BASEURL . '/user/signup');
      }
    } else {
      return header('LOCATION: ' . BASEURL . '/user/signup');
    }
  }

  public function updateSecurity()
  {
    $username = $_SESSION['user']['username'];
    $password = $_POST['password'];
    $newPass = $_POST['newPassword'];
    $confNewPass =  $_POST['confirmNewPassword'];
    $model = $this->model('User');
    if ($model->verifyPasswordByUsername($username, $password)) {
      if ($model->verifyConfirmPassword($newPass, $confNewPass)) {
        $model->updatePasswordByUsername($username, $newPass);
        sleep(1.5);
        session_destroy();
        return header('LOCATION: ' . BASEURL . '/user');
      } else {
        Flasher::setFlash('Your confirm password not match' . 'danger');
        return header('LOCATION: ' . BASEURL . '/user/setting/security');
      }
    } else {
      Flasher::setFlash('Your current password not match', 'danger');
      return header('LOCATION: ' . BASEURL . '/user/setting/security');
    }
  }

  public function updateProfile()
  {
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $username = $_SESSION['user']['username'];
    $profilePicture = $_FILES['profilePicture'];
    $model = $this->model('User');
    if ($model->verifyPasswordByUsername($username, $password)) {
      if ($profilePicture['error'] == 4) {
        $model->updateFullnameByUsername($username, $fullname);
        $model->setSessionByUsername($username);
        Flasher::setFlash('Profile saved');
        sleep(1);
        return header('LOCATION: ' . BASEURL . '/user/setting/profile');
      }
      if ($model->updateProfilePictureByUsername($username, $profilePicture)) {
        $model->updateFullnameByUsername($username, $fullname);
        $model->setSessionByUsername($username);
        Flasher::setFlash('Profile saved');
        sleep(1);
        return header('LOCATION: ' . BASEURL . '/user/setting/profile');
      } else {
        Flasher::setFlash('Please insert image not other file', 'warning');
        return header('LOCATION: ' . BASEURL . '/user/setting/profile');
      }
    } else {
      Flasher::setFlash('Password not match', 'warning');
      return header('LOCATION: ' . BASEURL . '/user/setting/profile');
    }
  }
}
