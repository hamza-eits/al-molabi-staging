<script>
$(document).ready(function () {
      $('#umrah-invoice-master-form').on('submit', function(e) {
    e.preventDefault();
    var submit_btn = $('#submit-umrah-invoice-master-btn');
    let createformData = new FormData(this);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('umrah-invoice-master.store')); ?>",
        dataType: 'json',
        contentType: false,
        processData: false,
        cache: false,
        data: createformData,
        enctype: "multipart/form-data",
        beforeSend: function() {
            submit_btn.prop('disabled', true);
            submit_btn.html('Processing');
        },
        success: function(response) {
            
            submit_btn.prop('disabled', false).html('Save');  

            if(response.success == true){
                // $('#umrah-invoice-master-form')[0].reset();  // Reset all form data
                $('#umrah_invoice_master_id').val(response.umrah_invoice_master_id);
                console.log(response.umrah_invoice_master_id);
                
                notyf.success({
                    message: response.message, 
                    duration: 3000
                });
            }else{
                notyf.error({
                    message: response.message,
                    duration: 5000
                });
            }   
        },
        error: function(e) {
            submit_btn.prop('disabled', false).html('Save');
        
            notyf.error({
                message: e.responseJSON.message,
                duration: 5000
            });
        }
    });
});
});
</script>

  <script>
    $(document).ready(function() {
      // Initialize Select2
      $('#PartyID').select2({
        placeholder: 'Select a party',
        allowClear: true
      });

      // Event when selection is made
      $('#PartyID').on('select2:select', function (e) {
        let partyId = $(this).val();

        // Example AJAX call (replace with your Laravel route)
        $.ajax({
          url: '<?php echo e(URL("partyRefNumber")); ?>/' + partyId,
          type: 'GET',
          success: function(data) {
            // Example: display data
            $('#result').html(`
              <h3>Party Details (Mock Data)</h3>
              <p><strong>ID:</strong> ${data.id}</p>
              <p><strong>Name:</strong> ${data.name}</p>
              <p><strong>Email:</strong> ${data.email}</p>
              <p><strong>Phone:</strong> ${data.phone}</p>
            `);
          },
          error: function(xhr) {
            $('#result').html('<p style="color:red;">Error fetching party info.</p>');
          }
        });
      });

      // Optional: handle clearing
      $('#PartyID').on('change', function () {
        if (!$(this).val()) {
          $('#result').empty();
        }
      });
    });
  </script>
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {

  // 1️⃣ Handle outbound departure -> arrival
  $('#FlightDateDeparture').on('change', function () {
    const dep = $(this).val();
    if (dep) {
      $('#FlightDateArrivalDeparture').val(dep);
      $('#FlightDateArrivalDeparture').attr('min', dep);
      calculateNights();
    }
  });

  // 2️⃣ Handle return departure -> arrival
  $('#FlightDateReturn').on('change', function () {
    const ret = $(this).val();
    if (ret) {
      $('#FlightArrivalDateReturn').val(ret);
      $('#FlightArrivalDateReturn').attr('min', ret);
      calculateNights();
    }
  });

  // 3️⃣ Recalculate if user manually changes arrival dates
  $('#FlightDateArrivalDeparture, #FlightArrivalDateReturn').on('change', function () {
    calculateNights();
  });

  // 4️⃣ Nights calculation function
  function calculateNights() {
    const outboundArrival = $('#FlightDateArrivalDeparture').val();
    const returnArrival = $('#FlightArrivalDateReturn').val();

    if (outboundArrival && returnArrival) {
      const start = new Date(outboundArrival);
      const end = new Date(returnArrival);

      const diffTime = end - start;
      const nights = Math.floor(diffTime / (1000 * 60 * 60 * 24));

      if (nights < 0) {
        $('#FlightNights').val('Invalid');
      } else {
        $('#FlightNights').val(nights);
      }
    } else {
      $('#FlightNights').val('');
    }
  }

});
</script>

<script>
function calculateNetPayable() {
   // Get values from input fields
  const visa = parseFloat(document.getElementById('VisaPurchaseTotal').value) || 0;
  const ticket = parseFloat(document.getElementById('TicketPurchaseTotal').value) || 0;
  const hotel = parseFloat(document.getElementById('HotelPurchaseTotal').value) || 0;
  const transport = parseFloat(document.getElementById('TransportPurchaseTotal').value) || 0;

   // Sum them
  const total = visa + ticket + hotel + transport;

  // Set the NetPayable fields
  document.getElementById('NetPayableTotal').value = total.toFixed(2);


 const visa_amount = parseFloat(document.getElementById('VisaPurchaseAmount').value) || 0;
  const ticket_amount = parseFloat(document.getElementById('TicketPurchaseAmount').value) || 0;
  const hotel_amount = parseFloat(document.getElementById('HotelPurchaseAmount').value) || 0;
  const transport_amount = parseFloat(document.getElementById('TransportPurchaseAmount').value) || 0;

  // Sum them
  const total_amount = visa_amount + ticket_amount + hotel_amount + transport_amount;

  // Set the NetPayable fields
 



  document.getElementById('NetPayable').value = total_amount.toFixed(2);
}



function calculateNetReceivable() {
   // Get values
  const visa_rec = parseFloat(document.getElementById('VisaSaleTotal').value) || 0;
  const ticket_rec = parseFloat(document.getElementById('TicketSaleTotal').value) || 0;
  const hotel_rec = parseFloat(document.getElementById('HotelSaleTotal').value) || 0;
  const transport_rec = parseFloat(document.getElementById('TransportSaleTotal').value) || 0;

  console.log('Totals:', {visa_rec, ticket_rec, hotel_rec, transport_rec});

  const total_rec = visa_rec + ticket_rec + hotel_rec + transport_rec;

  document.getElementById('NetReceivableTotal').value = total_rec.toFixed(2);

  const visa_rec_amount = parseFloat(document.getElementById('VisaSaleAmount').value) || 0;
  const ticket_rec_amount = parseFloat(document.getElementById('TicketSaleAmount').value) || 0;
  const hotel_rec_amount = parseFloat(document.getElementById('HotelSaleAmount').value) || 0;
  const transport_rec_amount = parseFloat(document.getElementById('TransportSaleAmount').value) || 0;

  console.log('Amounts:', {visa_rec_amount, ticket_rec_amount, hotel_rec_amount, transport_rec_amount});

  const total_rec_amount = visa_rec_amount + ticket_rec_amount + hotel_rec_amount + transport_rec_amount;

  document.getElementById('NetReceivable').value = total_rec_amount.toFixed(2);
}



</script>


<script>
 $(document).ready(function () {
  calculateNetPayable();
  calculateNetReceivable();

 });
</script>


<script>
$(document).ready(function () {
    $('#submitButton').click(function (e) {
        e.preventDefault();

        let form = $('#PartyForm')[0]; // Get the form DOM element
        let formData = new FormData(form); // Create FormData object

        $.ajax({
            url: '<?php echo e(url("/ajax_party_save2")); ?>',
            type: 'POST',
            data: formData,
            contentType: false, // Important for FormData
            processData: false, // Important for FormData
            success: function (response) {
                console.log(response);


                $('#exampleModal').modal('hide'); // ✅ This closes the modal

                // Append new option to PartyID select box
                $("#PartyID").append(
                    '<option value="' + response.PartyID + '" selected>' +
                    response.PartyID + ' - ' + response.PartyName + ' - ' + response.Phone +
                    '</option>'
                );

                $('#addClientModal').modal('hide');
                $('#PartyForm')[0].reset();



                 if(response.success == true){
                         
                        $('#addClientModal').modal('hide');
                    
                        notyf.success({
                            message: response.message, 
                            duration: 3000
                        });
                    }else{
                        notyf.error({
                            message: response.message,
                            duration: 5000
                        });
                    }      


             },
           error: function (xhr, status, error) {
    let message = "An error occurred";

    if (xhr.responseJSON && xhr.responseJSON.message) {
        // Laravel validation error (custom message)
        if (typeof xhr.responseJSON.message === 'object') {
            // If message is an object (multiple validation errors)
            message = Object.values(xhr.responseJSON.message).join('<br>');
        } else {
            // If message is a string
            message = xhr.responseJSON.message;
        }
    }

    notyf.error({
        message: message,
        duration: 5000
    });
}
        });
    });
});
</script>
<?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/umrah/invoice_masters/js/umrah_invoice_master.blade.php ENDPATH**/ ?>