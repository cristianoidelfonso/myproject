<?php
    class Curso extends Model {
        protected static $tableName = 'curso';
        protected static $columns = [
            'codigo',
            'nomeCurso',
            'instituicao',
            'cargaHoraria',
        ];
    
        public function insert() {
            $this->validate();
            //$this->nomeCurso = addslashes($this->nomeCurso);
            return parent::insert();
        }
    
        public function update() {
            $this->validate();
            return parent::update();
        }
        
         private function validate() {
            $errors = [];
    
            if(!$this->nomeCurso) {
                $errors['nomeCurso'] = 'Nome do curso é um campo abrigatório.';
            }
    
            if(!$this->cargaHoraria) {
                $errors['cargaHoraria'] = 'Carga horaria é um campo abrigatório.';
            }

            if(!$this->instituicao) {
                $errors['instituicao'] = 'A sigla da instituição é um campo abrigatório.';
            }
    
            if(count($errors) > 0) {
                throw new ValidationException($errors);
            }
        }
    }
    