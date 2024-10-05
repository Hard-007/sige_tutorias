<?php
    Class Docente{
        private $id_docente;
        private $id_faculdade;
        private $nome;
        private $id_disciplina;
        private $id_curso;

        public $conn;
        public function __construct(){
            $this->conn = new Connect();
        }

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
        public function get_idCurso(){
            return $this->id_curso;
        }
        public function get_idDisciplina(){
            return $this->id_disciplina;
        }

        //setters
        public function set_idDocente($idDocente){
            $this->id_docente = $idDocente;
        }
        public function set_idFaculdade($idFaculdade){
            $this->id_faculdade = $idFaculdade;
        }
        public function set_nome($nome){
            $this->nome = $nome;
        }
        public function set_idCurso($idCurso){
            $this->id_curso = $idCurso;
        }
        public function set_idDisciplina($idDisciplina){
            $this->id_disciplina = $idDisciplina;
        }

        //DB
        public function registarDocente($docente){
            $connection = $this->conn->connect();

            $idDocente = $docente->get_idDocente();
            $nome = $docente->get_nome();
            $idFaculdade = $docente->get_idFaculdade();
            $idCurso = $docente->get_idCurso();
            $idDisciplina = $docente->get_idDisciplina();

            $sqlRegistar = "INSERT INTO `docente` (`id_docente`, `id_faculdade`, `id_curso`, `id_disciplina`, `nome_docente`) 
            VALUES ('$idDocente', '$idFaculdade', '$idCurso', '$idDisciplina', '$nome')";

            if (mysqli_query($connection, $sqlRegistar)) {
                echo "Docente registada com sucesso!";
            } else {
                echo "Erro ao registrar o Docente: " . mysqli_error($connection);
            }
            mysqli_close($connection);
        }

        public function visualizarDocente($id){
            $connection = $this->conn->connect();

            $sqlVisualizar = "SELECT * FROM `docente` WHERE `id_docente` = ?";
            $stmt = $connection->prepare($sqlVisualizar);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                $resultado = $stmt->get_result();
                if ($resultado->num_rows > 0) {
                    $docente = $resultado->fetch_assoc();
                   
                    return $docente;
                } else {
                    echo "Nenhum Docente foi encontrado.";
                    return null;
                }
            } else {
                echo "Erro ao buscar o Docente: " . $connection->error;
                return null;
            }

            mysqli_close($connection);

        }

        public function listarDocentes() {
            $connection = $this->conn->connect();
        
            $sqlListar = "SELECT * FROM `docente`";
            $resultado = $connection->query($sqlListar);
        
            $docente = [];
            if ($resultado->num_rows > 0) {
                while($row = $resultado->fetch_assoc()) {
                    $docente[] = $row;
                }
            }
            return $docente;
            mysqli_close($connection);
        }



        public function actualizarDocente($docente){
            $connection = $this->conn->connect();

            $idDoce = $docente->get_idDocente();
            $idFacul = $docente->get_idFaculdade();
            $idCurso = $docente->get_idCurso();
            $idDiscip = $docente->get_idDisciplina();
            $nome = $docente->get_nome();

            $sqlAtualizar = "UPDATE `docente` SET  'id_faculdade' = ?,'id_curso'=? ,'id_disciplina'=?,'nome_docente'=? WHERE 'id_docente' = ?";
            $stmt = $connection->prepare($sqlAtualizar);
            $stmt->bind_param("iiisi", $idFacul, $idCurso, $idDiscip, $nome, $idDoce);

            if ($stmt->execute()) {
                echo "Docente actualizado!";
            } else {
                echo "Erro ao actualizar o Docente: " . $connection->error;
            }

            mysqli_close($connection);   
            

        }

        public function apagarDocente(){
            $connection = $this->conn->connect();

            $sqlApagar = "DELETE FROM `docente1` WHERE 'id_docente' = ?";
            $stmt = $connection->prepare($sqlApagar);
            $stmt->bind_param("i", $id);
        
            if ($stmt->execute()) {
                echo "Docente apagado com sucesso!";
            } else {
                echo "Erro ao apagar o Docente: " . $connection->error;
            }
        
            mysqli_close($connection); 
        }
    }
?>