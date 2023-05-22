jQuery(document).ready(function($) {
    $('#products-per-page').change(function() {
      var productsPerPage = $(this).val();
      var currentUrl = window.location.href;
      var newUrl = updateQueryStringParameter(currentUrl, 'products-per-page', productsPerPage);
  
      $.ajax({
        url: newUrl,
        type: 'GET',
        success: function(response) {
          var $newContent = $(response).find('.products');
          var $newPagination = $(response).find('.woocommerce-pagination-col');
  
          // Update the product listing content
          $('.products').html($newContent.html());
  
          // Update the pagination section
          $('.woocommerce-pagination-col').html($newPagination.html());
        },
        error: function(xhr, status, error) {
          console.log('An error occurred');
        }
      });
    });
  
    // Function to update query string parameter
    function updateQueryStringParameter(url, key, value) {
      var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
      var separator = url.indexOf('?') !== -1 ? "&" : "?";
      if (url.match(re)) {
        return url.replace(re, '$1' + key + "=" + value + '$2');
      } else {
        return url + separator + key + "=" + value;
      }
    }
  });
  