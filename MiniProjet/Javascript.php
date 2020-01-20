 <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
    
 <script>


 </script>

 <script>

     $(function(){
         $('#bb1').hide();
         $('#button_afficher').on('click',function(){
             $('#bb1').toggle(1000);
         });
     });
     $(function(){
         $('.valider').hide();
         $('.quant').hide();
         $('.annuler').hide();
         $('.modifier').on('click',function(){
             var typ = $(this).attr('rel');

             $('.vald .'+typ).toggle(200);
             $('.but_modifier .'+typ).toggle(200,function(){
                 $('.but_valider .'+typ).show(200) ;
             });

         });

         $('.annuler').on('click',function(){
             var typ = $(this).attr('rel');

             $('.vald .'+typ).toggle(200);
             $('.but_valider .'+typ).toggle(200,function(){
                 $('.but_modifier .'+typ).show(200) ;
             });
         });
     });
 </script>
 <script type="text/javascript">
     function getResult(valeur) {

         if (valeur.length == 0) {
             document.getElementById("result").innerHTML = "";
             return;
         } else {
             var valeur1 = document.getElementById("id_type_a");
             var xmlhttp = new XMLHttpRequest();
             xmlhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("result").innerHTML = this.responseText;
                 }
             };
             xmlhttp.open("GET","test.php?valeur="+valeur+"& valeur1="+valeur1.value,true);
             xmlhttp.send();
         }
     }
 </script>
 <script type="text/javascript">
     function getResult1(valeur) {

         if (valeur.length == 0) {
             document.getElementById("result1").innerHTML = "";
             return;
         } else {
             var valeur1 = document.getElementById("id_type_p");
             var xmlhttp = new XMLHttpRequest();
             xmlhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("result1").innerHTML = this.responseText;
                 }
             };
             xmlhttp.open("GET","test1.php?valeur="+valeur+"& valeur1="+valeur1.value,true);
             xmlhttp.send();
         }
     }
 </script>
 <script type="text/javascript">
     function getResult4(valeur) {

         if (valeur.length == 0) {
             document.getElementById("result").innerHTML = "";
             return;
         } else {
             var valeur1 = document.getElementById ("type");
             var xmlhttp = new XMLHttpRequest();
             xmlhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("result").innerHTML = this.responseText;
                 }
             };
             xmlhttp.open("GET","test5.php?valeur="+valeur+"& valeur1="+valeur1.value,true);
             xmlhttp.send();
         }
     }
 </script>
 <script type="text/javascript">
     function getResult2(valeur) {

         if (valeur.length == 0) {
             document.getElementById("result").innerHTML = "";
             return;
         } else {
             var valeur1 = document.getElementById ("id_type_a");
             var valeur2 = document.getElementById ("id_emplacement");
             var xmlhttp = new XMLHttpRequest();
             xmlhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("result").innerHTML = this.responseText;
                 }
             };
             xmlhttp.open("GET","test2.php?valeur="+valeur+"& valeur1="+valeur1.value+"& valeur2="+valeur2.value,true);
             xmlhttp.send();
         }
     }
 </script>

 <script type="text/javascript">
     function getResult3(valeur) {

         if (valeur.length == 0) {
             document.getElementById("result").innerHTML = "";
             return;
         } else {
             var xmlhttp = new XMLHttpRequest();
             xmlhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("result").innerHTML = this.responseText;
                 }
             };
             xmlhttp.open("GET","test4.php?valeur="+valeur,true);
             xmlhttp.send();
         }
     }
 </script>
 <script>
     function showUser1(str) {
         if (str == '') {
             document.getElementById("txtHint1").innerHTML = "";
             return;
         } else {
             if(window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                 xmlhttp = new XMLHttpRequest();
             } else {
                 // code for IE6, IE5
                 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
             }
             xmlhttp.onreadystatechange= function() {
                 if(this.readyState == 4 && this.status == 200) {
                     document.getElementById("txtHint1").innerHTML = this.responseText;
                 }
             };
             xmlhttp.open("GET","Articlelistes.php?id_type_a="+str,true);
             xmlhttp.send();
         }
     }
 </script>
 <script>
     function showUser2(valeur) {
         if (valeur == '') {
             document.getElementById("txtHint2").innerHTML = "";
             return;
         } else {
             if(window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                 xmlhttp = new XMLHttpRequest();
             } else {
                 // code for IE6, IE5
                 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
             }
             xmlhttp.onreadystatechange= function() {
                 if(this.readyState == 4 && this.status == 200) {
                     document.getElementById("txtHint2").innerHTML = this.responseText;
                 }
             };
             xmlhttp.open("GET","test3.php?valeur="+valeur,true);
             xmlhttp.send();
         }
     }
 </script>
 <script>
     function showUser3(valeur) {
         if (valeur == '') {
             document.getElementById("txtHint").innerHTML = "";
             return;
         } else {
             if(window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                 xmlhttp = new XMLHttpRequest();
             } else {
                 // code for IE6, IE5
                 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
             }
             xmlhttp.onreadystatechange= function() {
                 if(this.readyState == 4 && this.status == 200) {
                     document.getElementById("txtHint").innerHTML = this.responseText;
                 }
             };
             xmlhttp.open("GET","test6.php?type="+valeur,true);
             xmlhttp.send();
         }
     }
 </script>
 <script>
     function showUser4(valeur) {
         if (valeur == '') {
             document.getElementById("txtHint2").innerHTML = "";
             return;
         } else {
             if(window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                 xmlhttp = new XMLHttpRequest();
             } else {
                 // code for IE6, IE5
                 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
             }
             xmlhttp.onreadystatechange= function() {
                 if(this.readyState == 4 && this.status == 200) {
                     document.getElementById("txtHint2").innerHTML = this.responseText;
                 }
             };
             xmlhttp.open("GET","test4.php?valeur="+valeur,true);
             xmlhttp.send();
         }
     }
 </script>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
     google.charts.load('current', {'packages':['corechart']});
     google.charts.setOnLoadCallback(drawChart);
     function drawChart()
     {
         var data = google.visualization.arrayToDataTable([
             ['nom_type', 'quantite_e'],
             <?php
             while($row = $result->fetch())
             {
                 echo "['".$row["nom_type"]."', ".$row["quantite_e"]."],";
             }
             ?>
         ]);
         var options = {
            // title: '',
             is3D:true,
             pieHole: 0.4
         };
         var chart = new google.visualization.PieChart(document.getElementById('piechart'));
         chart.draw(data, options);
     }

 </script>
 <script type="text/javascript">
     google.charts.load('current', {'packages':['corechart']});
     google.charts.setOnLoadCallback(drawChart);
     function drawChart()
     {
         var data = google.visualization.arrayToDataTable([
             ['nom_type', 'quantite_e'],
             <?php
             while($row = $result1->fetch())
             {
                 echo "['".$row["nom_type"]."', ".$row["quantite_e"]."],";
             }
             ?>
         ]);
         var options = {
             is3D:false,
             pieHole: 0.4
         };
         var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
         chart.draw(data, options);
     }

 </script>






