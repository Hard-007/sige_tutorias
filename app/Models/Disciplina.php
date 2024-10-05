 <?php
    Class Disciplina{
        private $id_disciplina;
        private $id_curso;
        private $id_docente;
        private $nome_disciplina;

        public $conn;
        public function __construct(){
            $this->conn = (new Connect())->connect();
        }

        //getters
        public function get_idDisciplina(){
            return $this->id_disciplina;
        }
        public function get_idCurso(){
            return $this->id_curso;
        }
        public function get_idDocente(){
            return $this->id_docente;
        }
        public function get_nomeDisciplina(){
            return $this->nome_disciplina;
        }

        //setters
        public function set_idDisciplina($idDisciplina){
            $this->id_disciplina = $idDisciplina;
        }
        public function set_idCurso($idCurso){
            $this->id_curso = $idCurso;
        }
        public function set_idDocente($idDocente){
            $this->id_docente = $idDocente;
        }
        public function set_nomeDisciplina($nomeDisciplina){
            $this->nome_disciplina = $nomeDisciplina;
        }

        public function registarDisciplina(){
            $connection = $this->conn;
            $nomeDisciplina = $this->get_nomeDisciplina();
            $idDocente = $this->get_idDocente();
            $idCurso = $this->get_idCurso();

            $sqlRegistar = "INSERT INTO `disciplina` (`id_curso`, `nome_disiplina`) VALUES ('$idCurso', '$nomeDisciplina')";

            if (mysqli_query($connection, $sqlRegistar)) {
                echo "Disciplina registada com sucesso!";
            } else {
                echo "Erro ao registrar a Disciplina: " . mysqli_error($connection);
            }
            mysqli_close($connection);
        }


        public function visualizarDisciplina($id){
            $conn = new Connect();
            $connection = $conn->connect();

            $sqlVisualizar = "SELECT * FROM `disciplina` WHERE id_disciplina = ?";
            $stmt = $connection->prepare($sqlVisualizar);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                $resultado = $stmt->get_result();
                if ($resultado->num_rows > 0) {
                    $disciplina = $resultado->fetch_assoc();
                   
                    return $disciplina;
                } else {
                    echo "Nenhuma Disciplina encontrada.";
                    return null;
                }
            } else {
                echo "Erro ao buscar a Disciplina: " . $connection->error;
                return null;
            }

            mysqli_close($connection);
        }

        
        public function listarDisciplinas() {
            $conn = new Connect();
            $connection = $conn->connect();
        
            $sqlListar = "SELECT * FROM `disciplina`";
            $resultado = $connection->query($sqlListar);
        
            $disciplina = [];
            if ($resultado->num_rows > 0) {
                while($row = $resultado->fetch_assoc()) {
                    $disciplina[] = $row;
                }
            }
            return $disciplina;
            mysqli_close($connection);
        }
        

        public function actualizarDisciplina(){
            $conn = new Connect();
            $connection = $conn->connect();

            $sqlAtualizar = "UPDATE 'disciplina' SET `nome_disciplina` = ?, `id_curso` = ? WHERE `id_disciplina` = ?";
            $stmt = $connection->prepare($sqlAtualizar);
            $stmt->bind_param("ssi", $this->nome_disciplina, $this->id_curso, $id);

            if ($stmt->execute()) {
                echo "Disciplina actualizada!";
            } else {
                echo "Erro ao actualizar a Disciplina: " . $connection->error;
            }

            mysqli_close($connection);   
        }

        public function apagarDisciplina(){
            $conn = new Connect();
            $connection = $conn->connect();

            $sqlApagar = "DELETE FROM 'disciplina' WHERE `id_disciplina` = ?";
            $stmt = $connection->prepare($sqlApagar);
            $stmt->bind_param("i", $id);
        
            if ($stmt->execute()) {
                echo "Disciplina apagada com sucesso!";
            } else {
                echo "Erro ao apagar a faculdade: " . $connection->error;
            }
        
            mysqli_close($connection); 

        }
    }
?>