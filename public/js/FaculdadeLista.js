export async function listarFaculdades() {
    const response = await fetch('/sige_tutorias/faculdades', {
        method: 'GET'
    })

    if(!response.ok) {
        throw new Error("There was an error trying to fetch Lista de Faculdades");
    }
    
    return response.json();
}

export async function getFaculdadeById(id) {
    const response =  await fetch(`/sige_tutorias/faculdade/${id}`, {
        method: 'GET'
    });

    if (!response.ok) {
        throw new Error('There was an error trying to fetch Faculdade');
    }

    return await response.json();
}

async function updatePageContent() {
    const response = await listarFaculdades();
    var table_content = "";

    response.forEach((faculdade, index) => {
        const html = `
            <tr>
            <td>${faculdade.id_faculdade}</td>
                <td>${faculdade.nome_facul}</td>
                <td>${faculdade.endereco}</td>
            </tr>
        `;

        table_content += html;
    });

    if (document.querySelector(`.js-table-body[data-context="faculdade"]`)) {
        document.querySelector(`.js-table-body[data-context="faculdade"]`)
        .innerHTML = `${table_content}`;
       }
}

document.addEventListener('DOMContentLoaded', () => {

    updatePageContent();
    
})

