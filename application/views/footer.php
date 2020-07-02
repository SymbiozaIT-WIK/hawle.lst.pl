<footer class="sticky-footer">
    <div class="container my-auto">
        <span>&copy; <a href="https://symbioza.it">Copyright © Symbioza.IT / LST-NET  </a></span>
    </div> <!-- /container -->        
</footer>
        <script>window.jQuery || document.write('<script src="<?php echo base_url();?>/assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="<?php echo base_url();?>/assets/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/main.js"></script>
<!--        <script type="text/javascript" src="<?php #echo base_url();?>/assets/md/js/popper.min.js"></script>-->
<!--        <script type="text/javascript" src="<?php #echo base_url();?>/assets/md/js/mdb.min.js"></script>-->
<script>
$(document).ready(function() {
    $('.summernote').summernote({
        placeholder: 'Wpisz treść...',
        tabsize: 2,
        minHeight: 100
      });
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
            searchPlaceholder: "zacznij wpisywać numer katalogowy lub index...",
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
<script>
$(window).load(function(){
   $('#overlay').fadeOut();
});
</script>
 <script>
//$(":checkbox").on('click', function(){
//    	$(this).parent().toggleClass("cell--green");
//});
     
//$(":checkbox").on('click', function(){
//    	$(this).closest("tr").toggleClass("row-checked");
//});

$(":checkbox").change(function(){
    if($(this).is(":checked")) {
        $(this).closest("tr").addClass("row-checked");
    } else {
        $(this).closest("tr").removeClass("row-checked");
    }
});
     
     
//$(".check-row input[type=checkbox]").live("change", function() {
//    $(this).closest("tr").toggleClass("row-checked");
//}).filter(":checked").each(function() {
//    $(this).closest("tr").addClass("row-checked");
//});
//    
//     //zaznacz wszystkie
//var select_all = document.getElementById("select_all"); //select all checkbox
//var checkboxes = document.getElementsByClassName("checkbox-selectible"); //checkbox items
//
////select all checkboxes
//select_all.addEventListener("change", function(e){
//	for (i = 0; i < checkboxes.length; i++) { 
//		checkboxes[i].checked = select_all.checked;
//	}
//});
//
//
//for (var i = 0; i < checkboxes.length; i++) {
//	checkboxes[i].addEventListener('change', function(e){ //".checkbox" change 
//		//uncheck "select all", if one of the listed checkbox item is unchecked
//		if(this.checked == false){
//			select_all.checked = false;
//		}
//		//check "select all" if all checkbox items are checked
//		if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
//			select_all.checked = true;
//		}
//	});
//}
</script>  
<script>
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Usuń obrazek</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Twoja przeglądarka nie obsługuje API Plików")
  }
});
</script>
    </body>
</html>