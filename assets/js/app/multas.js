
  // multas
  $(document).ready(function() {
    <?php if (validation_errors()) { ?>
      // Muestra el modal si hay errores de validación
      $('#modalCrearMulta').modal('show');
    <?php } ?>
  });
  //multas modal form editar 
  $(document).ready(function() {
    // Manejar el clic en el botón de editar
    $('.editar-multa').on('click', function() {
      var multaId = $(this).data('multa-id');
      var baseUrl = '<?= base_url(); ?>';
      // Hacer una solicitud AJAX al servidor para cargar los detalles de la multa
      $.ajax({
        url: baseUrl + 'multa/editarMulta?id=' + multaId,
        method: 'GET',
        dataType: 'json', // Esperamos datos en formato JSON
        success: function(data) {
          // Llenar el formulario de edición con los datos recuperados
          $('#txtNombreMulta').val(data.nombre);
          $('#txtDescripcionMulta').val(data.descripcion);
          $('#txtMontoMulta').val(data.monto);
          $('#txtMonedaMulta').val(data.moneda);
          $('#txtEstadoMulta').val(data.estado);

          // Mostrar el modal de edición
          $('#modalEditarMulta').modal('show');
        },
        error: function() {
          alert('Error al cargar los detalles de la multa. Por favor, inténtalo de nuevo.');
        }
      });
    });
  });
  $(document).ready(function() {
    // Función para realizar el cálculo
    function calcularMontoBSMulta() {
      // Obtener el valor de montoSusMulta y tasa de cambio
      const montoSusMulta = parseFloat($('#txtMontoSusM').val()) || 0;
      const tasaCambio = parseFloat($('#decimalInput').val()) || 0;

      // Calcular el monto en moneda local y llenar el campo montoBSMulta
      const montoBSMulta = montoSusMulta * tasaCambio;
      $('#txtMontoBSMulta').val(montoBSMulta.toFixed(2)); // Limitar a 2 decimales
    }

    // Calcular inicialmente el monto en moneda local
    calcularMontoBSMulta();

    // Escuchar el evento "input" en el campo montoSusMulta y decimalInput
    $('#txtMontoSusM, #decimalInput').on('input', function() {
      // Calcular el monto en moneda local
      calcularMontoBSMulta();
    });
    $('form').on('submit', function(event) {
      // Validar el formulario
      if ($(this).valid()) {
        // Si el formulario es válido, permitir que el modal se cierre
        return true;
      } else {
        // Si hay errores de validación, evitar que el modal se cierre
        event.preventDefault();
        event.stopPropagation();
      }
    });
  });
