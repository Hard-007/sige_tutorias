<?php
// rafa
    require "app/config/Router.php";
    
    include "app/Controllers/UserController.php";
    include "app/Controllers/TutoriaController.php";
    include "app/Controllers/FaculdadeController.php";
    include "app/Controllers/DocenteController.php";
    include "app/Controllers/CursoController.php";
    include "app/Controllers/DisciplinaController.php";

    //include "app/Views/fragments/header.php";

    $router = new Router();
    
    $router->get('/sige_tutorias/teste', function() {
        echo "Rota de teste funcionando!";
    });

    $router->get('/', function() {
        include "public/index.php";
    });
    $router->get('/home', function() {
        include "app/Views/index.php";
    });
    $router->get('/exit', function() {
        session_destroy();
    });

    /***
     * 
     * 
     * Auth ********************/
    $router->get('/sige_tutorias/entrar', function() {
        include "app/Views/auth/login.php";
    });
    $router->get('/sige_tutorias/registar', function() {
        include "app/Views/auth/signin.php";
    });

    $router->post('/sige_tutorias/entrar', function() {
        $userController = new UserController();
        
        if($userController->login()){
            header("Location: /sige_tutorias/home");
        }
        
    });
    $router->post('/sige_tutorias/registar', function() {
        $userController = new UserController();
        
        if($userController->signin()){
            header("Location: /sige_tutorias/entrar");
        }
        
    });

    /***
     * 
     * 
     * Faculdade ********************/
    $router->post('/sige_tutorias/faculdade/registar', function() {
        $faculdadeController = new FaculdadeController();
        $faculdadeController->registarFaculdade();

    });

    $router->get('/sige_tutorias/faculdade/{id}', function($id) {
        $faculdadeController = new FaculdadeController();
        $faculdadeController->visualizarFaculdade($id);
    });
    
    $router->get('/sige_tutorias/faculdades', function() {
        $faculdadeController = new FaculdadeController();
        $faculdadeController->listarFaculdades();
        
    });
    
    $router->post('/sige_tutorias/faculdade/{id}/actualizar', function($id) {
        $faculdadeController = new FaculdadeController();
        $faculdadeController->actualizarFaculdade($id);
    });
    

    $router->delete('/sige_tutorias/faculdade/{id}/apagar', function($id) {
        $faculdadeController = new FaculdadeController();
        $faculdadeController->apagarFaculdade($id);
    });

    /***
     * 
     * 
     *    Docente ********************/
    $router->post('/sige_tutorias/docente/registar', function() {
        $docenteController = new DocenteController();
        
        $docenteController->registarDocente();
    });

    $router->get('/sige_tutorias/docente/{id}', function($id) {
        $docenteController = new DocenteController();
        $docenteController->visualizarDocente($id);
    });

    $router->get('/sige_tutorias/docentes', function() {
        $docenteController = new DocenteController();
        $docenteController->listarDocentes();
    });

    $router->post('/sige_tutorias/docente/{id}/actualizar', function($id) {
        $docenteController = new DocenteController();
        $docenteController->actualizarDocente($id);
    });
  
    $router->delete('/sige_tutorias/docente/{id}/apagar', function($id) {
        $docenteController = new DocenteController();
        $docenteController->apagarDocente($id);
    });

    /***
     *
     * 
     *    Curso ***********************/
    $router->post('/sige_tutorias/curso/registar', function() {
        $cursoController = new CursoController();
        $cursoController->registarCurso();
    });

    $router->get('/sige_tutorias/cursos', function() {
        $cursoController = new CursoController();
        $cursoController->listarCursos();
    });

    $router->get('/sige_tutorias/curso/{id}', function($id) {
        $cursoController = new CursoController();
        $cursoController->visualizarCurso($id);
    });

    $router->post('/sige_tutorias/curso/{id}/actualizar', function($id) {
        $cursoController = new CursoController();
        $cursoController->actualizarCurso($id);
    });

    $router->delete('/sige_tutorias/curso/{id}/apagar', function($id) {
        $cursoController = new CursoController();
        $cursoController->apagarCurso($id);
    });

    /***
     * 
     * 
     * Tutoria ***********************/
    $router->post('/sige_tutorias/tutoria/registar', function() {

        $tutoriaController = new TutoriaController();
        
        $tutoriaController->registarTutoria();
    });
    
    $router->get('/sige_tutorias/tutorias', function() {
        $tutoriaController = new TutoriaController();
        $tutoriaController->listarTutorias();
    });
    
    $router->get('/sige_tutorias/tutoria/{id}', function($id) {
        $tutoriaController = new TutoriaController();
        $tutoriaController->visualizarTutoria($id);
    });
    
    $router->post('/sige_tutorias/tutoria/{id}/actualizar', function($id) {

        $tutoriaController = new TutoriaController();
        $tutoriaController->actualizarTutoria($id);
    });
    
    $router->delete('/sige_tutorias/tutoria/{id}/apagar', function($id) {
        $tutoriaController = new TutoriaController();
        $tutoriaController->apagarTutoria($id);
    });

    /***
     *
     * 
     *    Disciplina ******************/
    $router->post('/sige_tutorias/disciplina/registar', function() {
        $disciplinaController = new DisciplinaController();
        
        $disciplinaController->registarDisciplina();
    
        echo "Disciplina registrada com sucesso";
    });
    
    $router->get('/sige_tutorias/disciplina/{id}', function($id) {
        $disciplinaController = new DisciplinaController();
        $disciplinaController->visualizarDisciplina($id);
    });
    
    $router->get('/sige_tutorias/disciplinas', function() {
        $disciplinaController = new DisciplinaController();
        $disciplinaController->listarDisciplinas();
    });
    
    $router->post('/sige_tutorias/disciplina/{id}/actualizar', function($id) {
        $disciplinaController = new DisciplinaController();
        $disciplinaController->actualizarDisciplina($id);
    });
    
    $router->delete('/sige_tutorias/disciplina/{id}/apagar', function($id) {
        $disciplinaController = new DisciplinaController();
        $disciplinaController->apagarDisciplina($id);
    });
   
    $router->run();

