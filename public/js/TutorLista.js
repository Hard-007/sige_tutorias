import { getDisciplinaById } from "./DisciplinaLista.js";
import { getFaculdadeById } from "./FaculdadeLista.js";

export async function listarTutores() {
    const response = await fetch('/sige_tutorias/docentes', {
        method: 'GET'
    });
 
    if(!response.ok) {
        throw new Error("There was an error trying to fetch Lista de Cursos");
    }

    return await response.json();
}

async function getTutorById(id) {

    const response = await fetch(`/sige_tutorias/docente/${id}`, {
        method: 'GET'
    });
    
    if (!response.ok) {
        throw new Error('There was an error trying to get tutor data!!');
    }

    return await response.json(); 
}

async function updatePageContent() {
    const response    = await listarTutores();
    var table_content = "";

    for (const  tutor of response) {
        const disciplina_res = await getDisciplinaById(tutor.id_disciplina);
        const faculdade_res  = await getFaculdadeById(tutor.id_faculdade);

        const html = `
            <tr>
                <td>${tutor.id_docente}</td>
                <td>${tutor.nome_docente}</td>    
                <td>${faculdade_res.nome_facul}</td>
                <td>${disciplina_res.nome_disciplina}</td>
            </tr>
        `;

        table_content += html;
    };

    document.querySelector('.js-table-body')
        .innerHTML = `${table_content}`;
}

document.addEventListener('DOMContentLoaded', () => {

    updatePageContent();
    
})

