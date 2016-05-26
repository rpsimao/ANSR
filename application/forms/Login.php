<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $this->setAction("/index/login");
        $this->setMethod("POST");
        $this->addAttribs(array('class'=>'form-signin'));


        $nome = new Zend_Form_Element_Text('nome');
        $nome->setLabel('Nome');
        $nome->setRequired(TRUE);
        $nome->setAttribs(['id'=>'inputName', 'class'=>'form-control', 'placeholder'=>'Insira o Nome']);
        $this->addElement($nome);

        $passwd = new Zend_Form_Element_Password('passwd');
        $passwd->setLabel('Palavra-Passe');
        $passwd->setRequired(TRUE);
        $passwd->setAttribs(['id'=>'inputPasswd', 'class'=>'form-control', 'placeholder'=>'Insira a palavra-passe']);
        $this->addElement($passwd);

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Enviar');
        $submit->setAttrib('class', 'btn btn-lg btn-primary btn-block');
        $this->addElement($submit);



    }


}


/**
 *
 *
 * <form class="form-signin">
<h2 class="form-signin-heading">Please sign in</h2>
<label for="inputEmail" class="sr-only">Email address</label>
<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
<label for="inputPassword" class="sr-only">Password</label>
<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>

<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
</form>
 *
 *
 */
