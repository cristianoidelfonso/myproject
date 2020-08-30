<?php
    class Matricula extends Model
    {
        protected static $tableName = 'matricula';
        protected static $columns = [
            'codigo',
            'idAluno',
            'idCurso',
            'idUsuario'
        ];

        public function insert()
        {
            $this->validate();
            //$this->nomeCurso = addslashes($this->nomeCurso);
            return parent::insert();
        }

        public function update()
        {
            $this->validate();
            return parent::update();
        }

        private function validate()
        {
            $errors = [];

            if (!$this->idAluno) {
                $errors['idAluno'] = 'É preciso especificar o código de identificação do aluno.';
            }

            if (!$this->idCurso) {
                $errors['idCurso'] = 'É necessario especificar o código de identificação do curso.';
            }
            
            if (!$this->idUsuario) {
                $errors['idUsuario'] = 'É necessario registrar o usuario responsável pela matrícula.';
            }

            if (count($errors) > 0) {
                throw new ValidationException($errors);
            }
        }
    }
