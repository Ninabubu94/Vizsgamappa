<?php
session_start();
class Account_manager
{
    public static function Create_session()
    {
        $_SESSION['login'] = 1;
        
    }
   
    public static function Has_session()
    {
        return isset($_SESSION['login']) && $_SESSION['login'] ==1;
    }
    public static function Clear_session()
    {
        unset($_SESSION['login']);
    }
    public static function Check_login_requests()
    {   if(Params::Get_func() == 'logout')
    {
        self::Clear_session();
        
    }
        if(isset($_POST['user']) && isset($_POST['pass']))
        {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            if($user == 'admin' && $pass == '1234')
            {
                self::Create_session();
            }
        }
    }
    public static function Login_form()
        {
            View::Open_section('Bejelentkezés', 'Az adminisztrációs felület csak az üzemeltető számára elérhető');
            $form = new Inputform('post', '?func=categories');
            $form->add(new InputField('felhasználónév','user', 'text'));
            $form->add(new InputField('Jelszó', 'pass','password'));
            $form->set_button('Belépés');
            
            $form->on_submit (function()
            {
               View::Error_message('Sikertelen belépési kísérlet', 'A beírt felhasználónév, vagy jelszó nem megfelelő');
               
            });
            echo $form->get_html();
            
            View::Close_section();
            
        }

}