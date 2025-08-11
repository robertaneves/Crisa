import IMask from 'imask';

document.addEventListener('DOMContentLoaded', () => {
    const telefoneElement = document.getElementById('telefone');
    const cpfElement = document.getElementById('cpf');
    const cepElement = document.getElementById('cep');

    if (telefoneElement) {
        const telefoneMaskOptions = {
            mask: [{
                mask: '(00) 0000-0000',
                maxLength: 14
            }, {
                mask: '(00) 00000-0000',
                maxLength: 15
            }]
        };
        IMask(telefoneElement, telefoneMaskOptions);
    }

    if(cpfElement){
        const cpfMaskOptions = {
            mask: '000.000.000-00'
        };
        IMask(cpfElement, cpfMaskOptions);
    }

    if(cepElement){
        const cepMaskOptions = {
            mask: '00000-000'
        };
        IMask(cepElement, cepMaskOptions);
    }
});