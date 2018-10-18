<div class="container">
      <footer>
        <p>&copy; LST NET</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url();?>/assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="<?php echo base_url();?>/assets/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/main.js"></script>
<!--        <script type="text/javascript" src="<?php #echo base_url();?>/assets/md/js/popper.min.js"></script>-->
<!--        <script type="text/javascript" src="<?php #echo base_url();?>/assets/md/js/mdb.min.js"></script>-->
<script>
$(document).ready(function() {
    $('#dataTable').DataTable( {
        "language": {
            "lengthMenu": "Wyświetl _MENU_ wierszy na stronę",
            "zeroRecords": "Przepraszamy - niczego nie znaleziono",
            "info": "Strona _PAGE_ z _PAGES_",
            "infoEmpty": "Brak pasujących wierszy",
            "infoFiltered": "(przeszukano _MAX_ wierszy)",
            "previous": "Brak pasujących wierszy",
            "infoEmpty": "Brak pasujących wierszy",
            "search": "Wyszukaj w wynikach",
            "paginate": {
              "previous": "Poprzednia strona",
              "next": "Następna strona"
            }
        }
    } );
} );
</script>
   <script>
$('#submitChangeForm .submit--this').change(function() {
    $(this).closest('form').submit();
});
</script>
   
    
    </body>
</html>