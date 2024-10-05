<?php
    include_once("../sige_tutorias/app/Models/Disciplina.php");

class DisciplinaController{

    public function registarDisciplina(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            //
            $disciplina = new Disciplina();
            $disciplina->set_nomeDisciplina($_POST['nome_disciplina']);
            $disciplina->set_idCurso($_POST['id_curso']);
            
            $disciplina->registarDisciplina();
        }
    }

    public function visualizarDisciplina($id){
        $disciplina = new Disciplina();
        $dadosDisciplina = $disciplina->visualizarDisciplina($id);

        if($dadosDisciplina){
            echo json_encode($dadosDisciplina);
        }
    }

    public function listarDisciplinas(){
        $disciplinaList = new Disciplina();
        $disciplina = $disciplinaList->listarDisciplinas();
        echo json_encode($disciplina);  
    }

    public function actualizarDisciplina($idDisciplina){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            //
            $disciplina = new Disciplina(); 
            $disciplina->set_nomeDisciplina($_POST['nome_disciplina']);
            $disciplina->set_idCurso($_POST['id_curso']);

            $disciplina->actualizarDisciplina($idDisciplina);
        }
    }

    public function apagarDisciplina($id) {
        $disciplina = new Disciplina();
        $disciplina->apagarDisciplina($id);
    }

}


?>