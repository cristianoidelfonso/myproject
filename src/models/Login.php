<?php
    class Login extends Model {
    
        public function validate() {
            $errors = [];
    
            if(!$this->email) {
                $errors['email'] = 'E-mail é um campo obrigatório.';
            }
    
            if(!$this->password) {
                $errors['password'] = 'Por favor, informe a senha.';
            }
    
            if(count($errors) > 0) {
                throw new ValidationException($errors);
            }
        }
    
       public function checkLogin() {            
            $this->validate();
            $user = User::getOne(['email' => $this->email]);
            
            //$this->password = password_hash($this->password, PASSWORD_DEFAULT);
            
            if($user) {
                /*    
                if(is_string($this->password) && is_string($user->password)){
                    $num1 = strlen($this->password);
                    $num2 = strlen($user->password);
                    echo $this->password . ' - ' .$num1 . ' <br>';
                    echo $user->password . ' - '. $num2 . ' <br>';
                }
                */
                
                if(password_verify($this->password, $user->password)) {
                    //echo 'Senhas conferem <br>';
                    //print_r($user);
                    return $user;
                }
            }
            throw new AppException('Usuário e Senha inválidos.');
        }
    }
    