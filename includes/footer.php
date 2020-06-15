<!-- Bootstrap core JavaScript
       ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


<script src="lib/js/bootstrap.min.js"></script>
<script src="lib/js/holder.min.js"></script>
<script src="lib/js/jquery.mask.min.js"></script>
<script>
    const j = jQuery.noConflict();

    //mask
    j('.Expiration').mask('00/0000');
    j('.CVV').mask('000');
    j('.card-credit').mask('0000 0000 0000 0000');
    j('.cpf').mask('000.000.000-00', {reverse: true});
    j('.cep').mask('00000-000');

   j(document).ready(function() {
    j('#example').DataTable({
        responsive: true,
        "order": [0, 'desc' ],
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 },
                {targets:2, orderable:false }
            ],
        });
    } );
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>
</html>
