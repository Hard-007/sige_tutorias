<?php
include_once("../sige_tutorias/app/Models/Tutoria.php");

class TutoriaController {


    public function registarTutoria() {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['id_disciplina'], $_POST['id_docente'], $_POST['hora_inicio'], $_POST['hora_termino'], $_POST['data_registo'], $_POST['data_realizacao'], $_POST['descricao'])){
                //
                $tutoria = new Tutoria();

                $tutoria->setIdDisciplina($_POST['id_disciplina']);
                $tutoria->setIdDocente($_POST['id_docente']);
                $tutoria->setHoraInicio($_POST['hora_inicio']);
                $tutoria->setHoraTermino($_POST['hora_termino']);
                $tutoria->setDataRegisto($_POST['data_registo']);
                $tutoria->setDataRealizacao($_POST['data_realizacao']);
                $tutoria->setDescricao($_POST['descricao']);

                $tutoria->registarTutoria($tutoria);

            }
        }
    }

    public function visualizarTutoria($id_tutoria) {
        $tutoria = new Tutoria();
        $dadosTutoria = $tutoria->visualizarTutoria($id_tutoria);

        if ($dadosTutoria) {
            echo json_encode($dadosTutoria);
        } else {
            echo json_encode(['error' => 'Tutoria não encontrada']);
        }
    }
   
    public function listarTutorias() {
        $tutoria = new Tutoria();
        $tutorias = $tutoria->listarTutorias();
        echo json_encode($tutorias);
    }

    public function actualizarTutoria($id) {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['id_disciplina'], $_POST['id_docente'], $_POST['hora_inicio'], $_POST['hora_termino'], $_POST['data_registo'], $_POST['data_realizacao'], $_POST['descricao'])){
                //
                $tutoria = new Tutoria();

                $tutoria->setIdDisciplina($id);
                $tutoria->setIdDisciplina($_POST['id_disciplina']);
                $tutoria->setIdDocente($_POST['id_docente']);
                $tutoria->setHoraInicio($_POST['hora_inicio']);
                $tutoria->setHoraTermino($_POST['hora_termino']);
                $tutoria->setDataRegisto($_POST['data_registo']);
                $tutoria->setDataRealizacao($_POST['data_realizacao']);
                $tutoria->setDescricao($_POST['descricao']);

                $result = $tutoria->actualizarTutoria();

                if ($result) {
                    echo "Tutoria atualizada com sucesso.";
                } else {
                    echo "Nenhuma alteração foi feita ou Tutoria não encontrada.\n";
                }
            }
        }
        
    }

    public function apagarTutoria($id_tutoria) {
        $tutoria = new Tutoria();
        $tutoria->apagarTutoria($id_tutoria);
    }
}

?>
