<?php
    include_once("../sige_tutorias/app/Models/Docente.php");

class DocenteController{


    public function registarDocente(){
        $docente = new Docente();

        $docente->set_idFaculdade($_POST['id_faculdade']);
        $docente->set_idCurso($_POST['id_curso']);
        $docente->set_idDisciplina($_POST['id_disciplina']);
        $docente->set_nome($_POST['nome']);

        $docente->registarDocente($docente);
    }
    
    public function visualizarDocente($id){
        $docente = new Docente();
        $dadosDocente = $docente->visualizarDocente($id);
    
        if($dadosDocente){
            echo json_encode($dadosDocente);
        }
    }

    public function listarDocentes(){
        $docenteList = new Docente();
        $docente = $docenteList->listarDocentes();
        echo json_encode($docente);
        
    }


    public function actualizarDocente($id){
        $docente = new Docente();

        $docente->set_idDocente($id);
        $docente->set_idFaculdade($_POST['id_faculdade']);
        $docente-> set_idCurso($_POST['id_curso']);
        $docente-> set_idDisciplina($_POST['id_disciplina']);
        $docente-> set_nome($_POST['nome']);

        $docente->actualizarDocente($docente);
    }
    
    public function apagarDocente($id) {
        $docente = new Docente();
        $docente->apagarDocente($id);
    }

}

?>