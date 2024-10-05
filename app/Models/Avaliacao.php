<?php
    Class Avaliacao{
        private $id_avaliacao;
        private $id_disciplina;
        private $id_docente;
        private $teste_numero;
        private $blwas;
        private $data_realizacao;
        private $data_registo;
        private $local;

        //getters
        public function get_idDocente(){
            return $this->id_docente;
        }
        public function get_idFaculdade(){
            return $this->id_faculdade;
        }
        public function get_nome(){
            return $this->nome;
        }

        //setters
        public function set_idDocente($idDoce){
            $this->id_docente = $idDoce;
        }
        public function set_idFaculdade($idFacul){
            $this->id_faculdade = $idFacul;
        }
        public function set_nome($nome){
            $this->nome = $nome;
        }

        //DB
        public function visualizarDocente(){

        }
        public function actualizarDocente(){
            
        }
        public function registarDocente(){
            
        }
        public function apagarDocente(){
            
        }
    }
?>