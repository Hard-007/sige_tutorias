document.addEventListener('DOMContentLoaded', () => {

    function listarCursos() {
        fetch('/sige_tutorias/tutorias', {
            method: 'GET'
        })
        .then((response) => {
            if(!response.ok) {
                throw new Error('Erro na requisição: ' + response.status);
            }
    
            return response.json();
        })
        .then((response) => {
            var content = "";

            response.forEach((tutoria) => {
                console.log(tutoria);

                const html = `
                    <tr>
                        <td>${tutoria.id_tutoria}</td>
                        <td>${tutoria.id_disciplina}</td>
                        <td>${tutoria.descricao}</td>
                        <td>${tutoria.data_realizacao}</td>
                    </tr>
                `;

                content += html;
            });

            document.querySelector('.js-table-body')
                .innerHTML = `${content}`;  
        })
        .catch((error) => {
            console.error(error);
        })
    }

    listarCursos();

})

