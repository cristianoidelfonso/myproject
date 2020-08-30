<?php
    class User extends Model {
        protected static $tableName = 'usuario';
        protected static $columns = [
            'codigo',
            'nome',
            'cpf',
            'email',
            'login',
            'password',
            'instituicao',
            'isAdmin'
        ];
    
        public static function getActiveUsersCount() {
            return static::getCount(['raw' => 'end_date IS NULL']);
        }
    
        public function insert() {
            $this->validate();
            //$this->isAdmin = isset($this->isAdmin) ? 1 : 0;
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            return parent::insert();
        }
    
        public function update() {
            $this->validate();
            //$this->isAdmin = isset($this->isAdmin) ? 1 : 0;
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            return parent::update();
        }
    
        private function validate() {
            $errors = [];
    
            if(!$this->nome) {
                $errors['nome'] = 'Nome é um campo abrigatório.';
            }

            if(!$this->cpf) {
                $errors['cpf'] = 'CPF é um campo abrigatório.';
            }
            
            if(!$this->login) {
                $errors['login'] = 'Login é um campo abrigatório.';
            }
    
            if(!$this->email) {
                $errors['email'] = 'Email é um campo abrigatório.';
            } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email inválido.';
            }
    
            if(!$this->password) {
                $errors['password'] = 'Senha é um campo abrigatório.';
            }
    
            if(!$this->confirm_password) {
                $errors['confirm_password'] = 'Confirmação de Senha é um campo abrigatório.';
            }
    
            if($this->password && $this->confirm_password 
                && $this->password !== $this->confirm_password) {
                $errors['password'] = 'As senhas não são iguais.';
                $errors['confirm_password'] = 'As senhas não são iguais.';
            }
    
            if(count($errors) > 0) {
                throw new ValidationException($errors);
            }
        }
    }
    