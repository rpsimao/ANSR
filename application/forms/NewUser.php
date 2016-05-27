<?php

class Application_Form_NewUser extends Zend_Form
{

    public function init()
    {
        $this->setAction("/admin/newuserinsert");
        $this->setMethod("POST");
        $this->addAttribs(array('class'=>'form-signin form-border'));


        $nome = new Zend_Form_Element_Text('username');
        $nome->setLabel('Nome');
        $nome->setRequired(TRUE);
        $nome->setAttribs(['id'=>'inputName', 'class'=>'form-control', 'placeholder'=>'Insira o Nome']);
        $this->addElement($nome);

        $passwd = new Zend_Form_Element_Password('password');
        $passwd->setLabel('Palavra-Passe');
        $passwd->setRequired(TRUE);
        $passwd->setAttribs(['id'=>'inputPasswd', 'class'=>'form-control', 'placeholder'=>'Insira a palavra-passe']);
        $this->addElement($passwd);

        $admin = new Zend_Form_Element_Checkbox("admin");
        $admin->setLabel("Administrador?");
        $admin->setAttribs(['id'=>'inputAdmin', 'class'=>'form-control']);
        $this->addElement($admin);


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Enviar');
        $submit->setAttrib('class', 'btn btn-lg btn-primary btn-block');
        $this->addElement($submit);


        $id = new Zend_Form_Element_Hidden('id');
        $this->addElement($id);
    }


}

