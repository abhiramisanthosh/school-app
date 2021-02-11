<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
 
/**
 * Signup form
 */
class SignupForm extends Model
{
 
    public $username;
    public $email;
    public $password;
    public $fname;
    public $lname;
    public $gender;
    public $confirmpassword;
    public $image;
    public $dob;
    public $photo;


 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['fname', 'required'],
            ['lname', 'required'],
            ['gender', 'required'],
            ['confirmpassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match"],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            
            ['dob', 'required'],
            ['dob', 'date', 'timestampAttribute' => 'dob'],
            ['photo', 'string', 'max' => 255],
        ];
    }
 
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
 
        if (!$this->validate()) {
            return null;
        }
 
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->fname = $this->fname;
        $user->lname = $this->lname;
        $user->gender = $this->gender;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->dob = date('y-m-d',  $this->dob);
        //$user->photo = UploadedFile::getInstance($user, 'image');

        //echo $user->image;exit;
        return $user->save() ? $user : null;
    }

    public function upload()
    {
        if ($this->validate()) {
            
            $this->image->saveAs('../web/uploads/' . $this->image->username . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }

    
 
}