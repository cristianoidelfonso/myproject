<?php
    class Aluno extends Model {
        protected static $tableName = 'aluno';
        protected static $columns = [
            'codigo','nome','foto','dataNasc','sexo','raca','cpf','identidade','certNasc','naturalidade','escolaridade',
            'nomeMae','nomePai','logradouro','numero','bairro','cidade','estado','cep',
            'telefone','celular','trabalha','profissao','curso','email','senha','horario',
            'dataInicio','dias','possuiPC','conhecInfor','necessidadeEspecial','sala',
            'responsavel','vinculo','cpfResponsavel','identidadeResponsavel',
            'dataMatricula','usuario','instituicao',
        ];
    
        public function insert() {
            $this->validate();
            // $this->isAdmin = isset($this->isAdmin) ? 1 : 0;
            // $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            return parent::insert();
        }
    
        public function update() {
            $this->validate();
            //$this->isAdmin = isset($this->isAdmin) ? 1 : 0;
            //$this->password = password_hash($this->password, PASSWORD_DEFAULT);
            return parent::update();
        }
    
        private function validate() {
            $errors = [];

            if(!$this->cpf) {
                $errors['cpf'] = 'CPF é um campo abrigatório.';
            }
    
            if(!$this->nome) {
                $errors['nome'] = 'Nome é um campo abrigatório.';
            }
    
            if(!$this->email) {
                $errors['email'] = 'Email é um campo abrigatório.';
            } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email inválido.';
            }
    
            if(count($errors) > 0) {
                throw new ValidationException($errors);
            }
        }
    }
    