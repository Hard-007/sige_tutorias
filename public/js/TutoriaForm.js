import { listarCursos } from "./CursoLista.js";

async function updatePageContent() {
    const response = await listarCursos();  
    var content = `<option value="">Seleccionar Curso</option>`;

    response.forEach((curso) => {
        const html = `
            <option value="${curso.id_curso}">${curso.nome_curso}</option>
        `;

        content += html;
    });

    document.querySelector('.js-select-curso')
        .innerHTML = `${content}`;
}

document.addEventListener('DOMContentLoaded', () => {

    updatePageContent();
    
})

