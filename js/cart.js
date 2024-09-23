$(document).ready(function () {
    $('#add-to-cart').on('click', function () {
        // Coleta os dados do botão "Adicionar ao Carrinho"
        const productId = $(this).data('id-product');
        const price = parseFloat($(this).data('price')).toFixed(2);
        const variations = $(this).data('variations');

        // Coleta a variação selecionada
        const selectedColor = $('.variation-button.color.active').data('color');
        const selectedSize = $('.variation-button.size.active').data('size');

        // Busca a variação correspondente no array de variações
        const variation = variations.find(v =>
            (v.color_name === selectedColor && !selectedSize) ||
            (v.size_name === selectedSize && !selectedColor) ||
            (v.color_name === selectedColor && v.size_name === selectedSize)
        );

        // Define o ID da variação e o preço correto se houver uma variação selecionada
        const variationId = variation ? variation.id_product_variation : null;
        const finalPrice = variation ? parseFloat(variation.price).toFixed(2) : price;

        // Envia o AJAX para adicionar o produto ao carrinho
        $.ajax({
            url: '../handlers/add_to_cart.php',
            type: 'POST',
            data: {
                id_product: productId,
                id_product_variation: variationId,
                quantity: 1,
                price: finalPrice
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function () {
                alert('Error adding to cart.');
            }
        });
    });

    // Aumentar a quantidade do item
    $('.increase-qty').on('click', function () {
        const cartItem = $(this).closest('.cart-item');
        const cartId = cartItem.data('id-cart');
        updateCartQuantity(cartId, 1);
    });

    // Diminuir a quantidade do item
    $('.decrease-qty').on('click', function () {
        const cartItem = $(this).closest('.cart-item');
        const cartId = cartItem.data('id-cart');
        updateCartQuantity(cartId, -1);
    });

    // Remover o item do carrinho
    $('.delete-item').on('click', function () {
        const cartItem = $(this).closest('.cart-item');
        const cartId = cartItem.data('id-cart');
        removeCartItem(cartId, cartItem);
    });

    // Função para atualizar a quantidade do carrinho
    function updateCartQuantity(cartId, change) {
        $.ajax({
            url: '../handlers/update_cart.php',
            type: 'POST',
            data: {
                id_cart: cartId,
                change: change
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    const quantityElement = $(`.cart-item[data-id-cart="${cartId}"] .quantity`);
                    const newQuantity = parseInt(quantityElement.text()) + change;
                    if (newQuantity > 0) {
                        quantityElement.text(newQuantity);
                    } else {
                        removeCartItem(cartId, quantityElement.closest('.cart-item'));
                    }
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('Error updating cart quantity.');
            }
        });
    }

    // Função para remover o item do carrinho
    function removeCartItem(cartId, cartItemElement) {
        $.ajax({
            url: '../handlers/delete_cart_item.php',
            type: 'POST',
            data: {
                id_cart: cartId
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    cartItemElement.remove();
                    alert('Item removed from cart.');
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('Error removing item from cart.');
            }
        });
    }

});
