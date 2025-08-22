{{-- Alerta para MENSAGEM DE SUCESSO na sessão --}}
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                title: "Pronto!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonColor: '#3085d6'
            });
        });
    </script>
@endif

{{-- Alerta para MENSAGEM DE ERRO na sessão --}}
@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                title: "Atenção!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonColor: '#3085d6'
            });
        });
    </script>
@endif

{{-- Alerta para ERROS DE VALIDAÇÃO do formulário --}}
@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let errorMessages = '';
            @foreach ($errors->all() as $error)
                errorMessages += '<li>{{ $error }}</li>';
            @endforeach

            Swal.fire({
                title: 'Oops! Algo deu errado.',
                html: `<ul style="list-style: none; padding-left: 0; text-align: left;">${errorMessages}</ul>`,
                icon: 'error',
                confirmButtonColor: '#3085d6'
            });
        });
    </script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Seleciona todos os formulários com a classe delete-form
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // previne o envio imediato do formulário

                Swal.fire({
                    title: 'Tem certeza?',
                    text: "Essa ação não pode ser desfeita!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // envia o formulário se confirmado
                    }
                });
            });
        });
    });
</script>