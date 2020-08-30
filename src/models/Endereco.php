<?php

    class Endereco extends Model {
        protected static $tableName = 'endereco';
        protected static $columns = [
            'codigo',
            'logradouro',
            'numero',
            'bairro',
            'cidade',
            'estado',
            'cep'
        ]; 
    }
    