<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class UserModel
{
  private $table = 'users', $db;
  private $fullname, $username, $password, $photo, $bookmark, $level;
  public function __construct()
  {
    $this->db = new Database;
  }

  public function getUserByUsername($username)
  {
    $this->db->query("SELECT * FROM $this->table WHERE username= " . "'$username'");
    return $this->db->result();
  }

  public function verifyPasswordByUsername($username, $password)
  {
    $this->db->query("SELECT * FROM $this->table WHERE username= " . "'$username'");
    $user = $this->db->result();
    if (password_verify($password, $user['password'])) {
      return true;
    } else {
      return false;
    }
  }

  public function verifyConfirmPassword($password, $confirmPassword)
  {
    return $password == $confirmPassword ? true : false;
  }

  public function create($data)
  {
    $this->fullname = filter_var($data['fullname'], FILTER_SANITIZE_STRING);
    $this->username = filter_var($data['username'], FILTER_SANITIZE_STRING);
    $this->password = password_hash($data["password"], PASSWORD_DEFAULT);

    $query = "INSERT INTO $this->table VALUES 
              ('' , :fullname, :username, :password, :profilePicture, :bookmark, :level)";
    $this->db->query($query);
    $this->db->bind('fullname', $this->fullname);
    $this->db->bind('username', $this->username);
    $this->db->bind('password', $this->password);
    $this->db->bind('profilePicture', 'default.jpg');
    $this->db->bind('bookmark', 'bookmark');
    $this->db->bind('level', 'level');

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function updateFullnameByUsername($username, $fullname)
  {
    $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);
    $query = "UPDATE $this->table SET fullname = :fullname
              WHERE username = '$username'";
    $this->db->query($query);
    $this->db->bind('fullname', $fullname);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function updateProfilePictureByUsername($username, $profilePicture)
  {
    $extension = strtolower(pathinfo($profilePicture['name'], PATHINFO_EXTENSION));
    $randBasename = $username . '_' . rand(1000000, 999999999) . '.' . $extension;
    $target  =  'img/profilePicture/' . $randBasename;
    if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
      $query = "UPDATE $this->table SET  
                profilePicture = :profilePicture
                WHERE username = '$username' ";
      $this->db->query($query);
      $this->db->bind('profilePicture', $randBasename);
      $this->db->execute();
      move_uploaded_file($profilePicture['tmp_name'], $target);
      return true;
    } else {
      return false;
    }
  }

  public function updatePasswordByUsername($username, $password)
  {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE $this->table SET password = :password
              WHERE username = '$username'";
    $this->db->query($query);
    $this->db->bind('password', $this->password);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function setSessionbyUsername($username)
  {
    $this->db->query("SELECT * FROM $this->table WHERE username= " . "'$username'");
    $user = $this->db->result();
    $_SESSION['user'] = [
      'id' => $user['id'],
      'fullname' => $user['fullname'],
      'username' => $user['username'],
      'password' => $user['password'],
      'profilePicture' => $user['profilePicture']
    ];
  }

  public function verifySignupInput($data)
  {
    $username = $data['username'];
    if (strlen($username) < 8 or strlen($data['password']) < 8) {
      Flasher::setFlash(
        'Your username or password must be atleast 8 char',
        'warning'
      );
      return false;
    }
    if (strlen($data['fullname']) < 2) {
      Flasher::setFlash(
        'Your fullname must be atleast 2 char',
        'warning'
      );
      return false;
    }
    return true;
  }

  public function verifySecurityInput($data)
  {
    if (!password_verify($data['password'], $data['passwordVerify'])) {
      Flasher::setFlash('Your current password not match', 'danger');
      return false;
    }
    if ($data['newPassword'] != $data['newPasswordVerify']) {
      Flasher::setFlash('Your confirm password not match', 'danger');
      return false;
    } else {
      return $this;
    }
  }

  public function verifyPassword($pass1, $pass2, $type = 'hashed')
  {
    if ($type == 'hashed' || $type == 'hash') {
      if (password_verify($pass1, $pass2)) {
        return $this;
      } else {
        return false;
      }
    } else {
      if ($pass1 == $pass2) {
        return $this;
      } else {
        return false;
      }
    }
  }
}
