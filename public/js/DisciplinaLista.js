import { getCursoById } from "./CursoLista.js";

export async function listarDisciplinas() {
    const response = await fetch('/sige_tutorias/disciplinas', {
        method: 'GET'
    });
 
    if(!response.ok) {
        throw new Error("There was an error trying to fetch Lista de Cursos");
    }

    return await response.json();
}

export async function getDisciplinaById(id) {
    const response = await fetch(`/sige_tutorias/disciplina/${id}`, {
        method: 'GET'
    });

    if (!response.ok) {
        throw new Error('There was an error trying to fetch disciplina');
    }

    return await response.json();
}

async function updatePageContent() {
    const response = await listarDisciplinas();
    var content = "";

    for (const disciplina of response) {
        const curso_res = await getCursoById(disciplina.id_curso);
        
        const html = `
            <tr>
                <td>${disciplina.id_disciplina}</td>
                <td>${disciplina.nome_disciplina}</td>
                <td>${curso_res.nome_curso}</td>
            </tr>
        `;

        content += html;
    }

    document.querySelector('.js-table-body')
        .innerHTML = content;
}

document.addEventListener('DOMContentLoaded', () => {

    updatePageContent();
    
});