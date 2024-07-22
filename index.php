<?php

require_once '../Database.php';
require_once 'system/page.php';
require_once 'system/params.php';
require_once 'system/form-builder/inputform.php';
require_once 'system/view.php';
require_once 'system/account-manager.php';
require_once 'system/data-manager.php';
require_once 'system/termek-module.php';
require_once 'system/kategoria-module.php';
require_once 'system/table.php';
require_once 'system/alkategoria-module.php';
require_once 'system/kerdes-module.php';
require_once 'system/velemeny-module.php';

Account_manager::check_login_requests();
Page::Begin();

if(Account_manager::Has_session())
{
    switch(Params::Get_func())
    {
            case 'uj-termek':
                    Termek_module::New();
                    break;
            case 'termekek': 
                    Termek_module::List(); 
                    break;
            case 'edit-termek':
                    $id = Params::Get_id();
                    Termek_module::Edit($id);
                    break;
            case 'uj-alkategória': 
                    Alkategoria_module::New(); 
                    break; 
            case 'alcategories': 
                    Alkategoria_Module::List(); 
                    break;
            case 'edit-alcategory': 
                    $id = Params::Get_id();
                    Alkategoria_module::Edit($id); 
                    break;
            case 'uj-kategória': 
                    Kategoria_module::New(); 
                    break; 
            case 'categories': 
                    Kategoria_module::List(); 
                    break;
            case 'edit-category': 
                    $id = Params::Get_id();
                    Kategoria_module::Edit($id); 
                    break;
            case  'kerdesek':
                    kerdes_module::List();
                    break; 
            case 'valasz-kerdesek':
                   $id = Params::Get_id();
                   kerdes_module::Valasz($id);
                   break; 
             case  'velemeny':
                    Velemeny_Module::List();
                    break; 
              case 'edit-velemeny':  
                    $id = Params::Get_id();
                    Velemeny_Module::Edit($id); 
                    break;
                       
} }   
    else
    {
        Account_manager::Login_form();
        
    }

Page::End();


?>