import { getFaculdadeById } from "./FaculdadeLista.js";

export async function listarCursos() {
    const response = await fetch('/sige_tutorias/cursos', {
        method: 'GET'
    });
 
    if(!response.ok) {
        throw new Error("There was an error trying to fetch Lista de Cursos");
    }

    return await response.json();
}

export async function getCursoById(id) {
    const response = await fetch(`/sige_tutorias/curso/${id}`, {
        method: 'GET'
    });

    if (!response.ok) {
        throw new Error('An error ocurred when trying to fetch curso!!');
    }

    return await response.json();
}

async function updatePageContent() {
    const response    = await listarCursos();
    var table_content = "";
    
    for (const curso of response) {
        const faculdade_res = await getFaculdadeById(curso.id_faculdade);
        
        const html = `
                <tr>
                <td>${curso.id_curso}</td>
                <td>${curso.nome_curso}</td>    
                <td>${faculdade_res.nome_facul}</td>
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

