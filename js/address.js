$(document).ready(function () {
    // Consulta o endereço na API ViaCEP ao digitar o CEP
    $('#zipcode').on('blur', function () {
        const cep = $(this).val().replace(/\D/g, '');

        if (cep.length === 8) {
            $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function (data) {
                if (!("erro" in data)) {
                    $('#road').val(data.logradouro);
                    $('#neighborhood').val(data.bairro);
                    $('#city').val(data.localidade);
                    $('#state').val(data.uf);
                } else {
                    alert('CEP not found.');
                }
            }).fail(function () {
                alert('Error retrieving data.');
            });
        } else {
            alert('Invalid ZIP code format.');
        }
    });

    $(document).on('click', '.delete-address-button', function () {
        const addressCard = $(this).closest('.address-card');
        const addressId = addressCard.data('id-address');
    
        console.log('Attempting to delete address with ID:', addressId); // Adiciona um log para verificar o ID
    
        if (confirm('Are you sure you want to delete this address?')) {
            $.ajax({
                url: '../handlers/del_address.php',
                type: 'POST',
                data: { id_address: addressId },
                dataType: 'json',
                success: function (response) {
                    console.log(response); // Verifica a resposta do servidor
                    if (response.status === 'success') {
                        alert(response.message);
                        addressCard.remove();
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function () {
                    alert('Error deleting address.');
                }
            });
        }
    });
    
    // Definir como principal - utilizando delegação de eventos
    $(document).on('click', '.set-main-button', function () {
        const addressCard = $(this).closest('.address-card'); // Captura o card correto
        const addressId = addressCard.data('id-address'); // Obtém o ID correto

        $.ajax({
            url: '../handlers/set_main_address.php',
            type: 'POST',
            data: { id_address: addressId },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                    // Atualiza o layout dos cards para mostrar o novo principal
                    $('.address-card').each(function () {
                        $(this).find('h3').remove(); // Remove o indicador de principal de todos
                    });
                    addressCard.prepend('<h3>Principal</h3>'); // Adiciona ao card correto
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function () {
                alert('Error setting main address.');
            }
        });
    });

    // Envia o formulário para cadastrar ou editar o endereço
    $('#address-form').on('submit', function (e) {
        e.preventDefault();
        const formData = $(this).serialize();

        $.ajax({
            url: '../handlers/save_address.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                    window.location.href = '/address/';  // Redireciona para a lista de endereços
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function () {
                alert('Error saving address.');
            }
        });
    });
});
