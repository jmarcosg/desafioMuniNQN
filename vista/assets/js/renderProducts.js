const buildProductList = () => {
    $.each(productsInCart, (i, el) => {
      const product = renderProducts(el)
      $('#product-list').append(product);
    })
  }
  
  const buildDropdownCart = () => {
    $.each(productsInCart, (i, el) => {
      const product = renderDropdownProducts(el);
      $('#dropdown-cart').append(product)
    })
  }
  
  const bindProductEvents = () => {
    $('button.increase').on('click', (e) => {
      increaseProductQuantity(e.currentTarget);
    });
  
    $('button.decrease').on('click', (e) => {
      subtractProductQuantity(e.currentTarget);
    });
  
    $('a.remove-product').on('click', (e) => {
      removeProduct(e.currentTarget);
    });
  }