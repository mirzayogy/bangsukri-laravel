 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
 </script>
 <script>
     var el = document.getElementById("wrapper");
     var toggleButton = document.getElementById("menu-toggle");

     toggleButton.onclick = function() {
         el.classList.toggle("toggled");
     };

     function confirmation(href) {
         if (confirm("Yakin hapus?")) {
             console.log(href)
             document.getElementById('deleteForm').action = href;
             document.getElementById('deleteForm').submit();
         }
     }
 </script>
