<?php

    class Tutoria{
        private $id_tutoria;
        private $id_disciplina;
        private $id_docente;
        private $hora_inicio;
        private $hora_termino;
        private $data_registo;
        private $data_realizacao;
        private $descricao;

        public $conn;
        public function __construct(){
            $this->conn = (new Connect())->connect();
        }

        //getters
        public function getIdTutoria() {
            return $this->id_tutoria;
        }
        public function getIdDisciplina() {
            return $this->id_disciplina;
        }
        public function getIdDocente() {
            return $this->id_docente;
        }
        public function getHoraInicio() {
            return $this->hora_inicio;
        }
        public function getHoraTermino() {
            return $this->hora_termino;
        }
        public function getDataRegisto() {
            return $this->data_registo;
        }
        public function getDataRealizacao() {
            return $this->data_realizacao;
        }
        public function getDescricao() {
            return $this->descricao;
        }
    
        //set
        public function setIdTutoria($id_tutoria) {
            $this->id_tutoria = $id_tutoria;
        }
        public function setIdDisciplina($id_disciplina) {
            $this->id_disciplina = $id_disciplina;
        }

        public function setIdDocente($id_docente) {
            $this->id_docente = $id_docente;
        }

        public function setHoraInicio($hora_inicio) {
            $this->hora_inicio = $hora_inicio;
        }

        public function setHoraTermino($hora_termino) {
            $this->hora_termino = $hora_termino;
        }

        public function setDataRegisto($data_registo) {
            $this->data_registo = $data_registo;
        }
        public function setDataRealizacao($data_realizacao) {
            $this->data_realizacao = $data_realizacao;
        }
        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        // metodos
        public function registarTutoria($tutoria) {
            $connection = $this->conn;

            $id_disciplina = $tutoria->getIdDisciplina();
            $id_docente = $tutoria->getIdDocente();
            $hora_inicio = $tutoria->getHoraInicio();
            $hora_termino = $tutoria->getHoraTermino();
            $data_registo = $tutoria->getDataRegisto();
            $data_realizacao = $tutoria->getDataRealizacao();
            $descricao = $tutoria->getDescricao();
    
            $sqlRegistar = "INSERT INTO `tutoria1` (`id_disciplina`, `id_docente`, `hora_inicio`, `hora_termino`, `data_registo`, `data_realizacao`, `descricao`) VALUES ('$id_disciplina', '$id_docente', '$hora_inicio', '$hora_termino','$data_registo', '$data_realizacao', '$descricao')";

            if(mysqli_query($connection,$sqlRegistar)){
                echo 'TUtoria Registada com Sucesso...';
            }else {
                echo'ERRO ao Registar a tutoria'. mysqli_error($connection);
            }


            mysqli_close($connection);
        }

        public function listarTutorias(){
            $connection = $this->conn;
    
            $sqlListar = "SELECT * FROM `tutoria`";
            $resultado = $connection->query($sqlListar);
    
            $tutorias = [];
            if($resultado->num_rows > 0){
                while($row = $resultado->fetch_assoc()){
                    $tutorias[] = $row;
                }
            }
            mysqli_close($connection);
            return $tutorias;
        }

        public function visualizarTutoria($id_tutoria) {
            $connection = $this->conn;
    
            $sqlVisualizar = "SELECT * FROM `tutoria` WHERE `id_tutoria` = ?";
            $stmt = $connection->prepare($sqlVisualizar);
            $stmt->bind_param("i", $id_tutoria);
    
            if ($stmt->execute()) {
                $resultado = $stmt->get_result();
                if ($resultado->num_rows > 0) {
                    return $resultado->fetch_assoc();
                } else {
                    echo "Nenhuma Tutoria foi encontrada.";
                    return null;
                }
            } else {
                echo "Erro ao buscar a Tutoria: " . $stmt->error;
                return null;
            }
            mysqli_close($connection);

        }

        public function actualizarTutoria(){
            $connection = $this->conn;

            $sqlAtualizar ="UPDATE `tutoria` 
                            SET `id_disciplina` = ?, `id_docente` = ?, `hora_inicio` = ?, `hora_termino` = ?, `data_realizacao` = ?, `descricao` = ?
                            WHERE `id_tutoria` = ?";
            $stmt = $connection->prepare($sqlAtualizar);
            $stmt->bind_param("iissssi", $this->id_disciplina, $this->id_docente, $this->hora_inicio, $this->hora_termino, $this->data_realizacao, $this->descricao, $this->id_tutoria);
            
            return $stmt->execute();

            //mysqli_close($connection);
        }

        public function apagarTutoria($id_tutoria) {
            $connection = $this->conn;
    
            $sqlDeletar = "DELETE FROM `tutoria` WHERE `id_tutoria` = ?";
            $stmt = $connection->prepare($sqlDeletar);
            $stmt->bind_param("i", $id_tutoria);
    
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    echo "Tutoria deletada com sucesso.";
                } else {
                    echo "Tutoria não encontrada.";
                }
            } else {
                echo "Erro ao deletar a Tutoria: " . $stmt->error;
            }
            mysqli_close($connection);

        }

    }


?>