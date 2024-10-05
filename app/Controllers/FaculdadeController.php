<?php
    include_once("../sige_tutorias/app/Models/Faculdade.php");

class FaculdadeController {
    public function registarFaculdade() {
        $faculdade = new Faculdade();
        
        $faculdade->set_nomeFaculdade($_POST['nome_faculdade']);
        $faculdade->set_endereco($_POST['endereco']);

        $faculdade->registarFaculdade($faculdade);
    }

    public function visualizarFaculdade($id) {
        $faculdade = new Faculdade();
        $dadosFaculdade = $faculdade->visualizarFaculdade($id);

        if ($dadosFaculdade) {
            //include 'app/Views/visualizarFaculdade.php'; // caso Wady queira utilizar uma view para isso
          echo json_encode($dadosFaculdade);
        }
    }

    public function listarFaculdades() {
        $faculdade = new Faculdade();
        $facul = $faculdade->listarFaculdades();
        echo json_encode($facul);
    }

    public function actualizarFaculdade($id) {
        $faculdade = new Faculdade();
         
        $faculdade->set_idFaculdade($id);
        $faculdade->set_nomeFaculdade($_POST['nome_faculdade']);
        $faculdade->set_endereco($_POST['endereco']);

        $faculdade->actualizarFaculdade($faculdade);
    }

    public function apagarFaculdade($id) {
        $faculdade = new Faculdade();
        $faculdade->apagarFaculdade($id);
    }

}
?>
