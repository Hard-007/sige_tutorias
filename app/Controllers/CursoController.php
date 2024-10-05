<?php
    include_once("../sige_tutorias/app/Models/Curso.php");

class CursoController{

    public function registarCurso(){
        $curso = new Curso();
        $curso->set_idFaculdade($_POST['id_faculdade']);
        $curso->set_nomeCurso($_POST['nome']);

        $curso->registarCurso();
    }

    public function visualizarCurso($id){
        $curso = new Curso();
        $dadosCurso = $curso->visualizarCurso($id);

        if($dadosCurso){
            echo json_encode($dadosCurso);
        }
    }

    public function listarCursos(){
        $cursoList = new Curso();
        $curso = $cursoList->listarCursos();
        echo json_encode($curso);
        
    }

    public function actualizarCurso($id){
        $curso = new Curso();

        //$curso->set_idCurso($_POST['id_curso']);
        $curso->set_idCurso($id);
        $curso->set_idFaculdade($_POST['id_faculdade']);
        $curso->set_nomeCurso($_POST['nome']);

        $curso->actualizarCurso($curso);
    }

    public function apagarCurso($id) {
        $curso = new Curso();
        $curso->apagarCurso($id);
    }

}

?>