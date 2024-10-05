import { getCursoById } from "./CursoLista.js";
import { getDisciplinaById } from "./DisciplinaLista.js";
import { getFaculdadeById } from "./FaculdadeLista.js";
import { listarTutores } from "./TutorLista.js";

document.addEventListener("DOMContentLoaded", () => {   

    const activatePup  = document.querySelector('.js-choose-docente-button');
    const quitButton   = document.querySelector('.js-quit-pop-up-button');
    const popUp        = document.querySelector('.js-pop-up');

    activatePup.addEventListener('click', () =>  {
        popUp.style.display = 'block';
    });

    document.addEventListener('keydown', (e) => {
        if (e.key == "Escape") {
            hidePopUp();
        }
    })
    
    quitButton.addEventListener("click", () => {
        hidePopUp();
    });

    function hidePopUp() {
        popUp.style.display = 'none';
    }

    async function setPopUpContent() {
        const response = await listarTutores();
        var table_content = "";

        for (const tutor of response) {
            const disciplina_res = await getDisciplinaById(tutor.id_disciplina);
            const faculdade_res  = await getFaculdadeById(tutor.id_faculdade);
            
            const html  = `
                <tr class="js-record-line" data-record-id="${tutor.id_docente}">
                    <td style="display: none;">${tutor.id_docente}</td>
                    <td>${tutor.nome_docente}</td>
                    <td>${disciplina_res.nome_disciplina}</td>
                    <td>${faculdade_res.nome_facul}</td>
                </tr>
            `;

            table_content += html;
        };

        document.querySelector('.js-table-body-disciplinas') 
            .innerHTML = table_content;

        document.querySelectorAll('.js-record-line').forEach((record) => {
            record.addEventListener('click', () => {
                const nameInput   = document.querySelector('.docente-name-input');
                const hiddenInput = document.querySelector('.hidden-input');
                const linhas = record.children;

                nameInput.value   = linhas[1].textContent;
                hiddenInput.value = linhas[0].textContent;

                hidePopUp();
            });
        });
    }

    setPopUpContent();
    
})
