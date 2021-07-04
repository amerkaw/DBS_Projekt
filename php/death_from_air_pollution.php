<html>
<head>
    <meta charset="utf-8" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="http://cdn.jsdelivr.net/jquery.flot/0.8.3/jquery.flot.min.js" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <style>
        .form-group {
            height:150px;
             overflow-y: scroll;
        }
    </style>
</head>
<body>
    
    <div id="header">
		<h2> Number of death per million due to air pollution</h2>
	</div>
 
    <div class="card">
		<div class="card-header">In countries China, India and United States</div>
	</div>

	<div id="placeholder" style="width: 1000px ; height:450px"></div>

</body>


</html>





<script >


    var ajax1= new XMLHttpRequest();
    var method ="GET";
    var url = "death_from_air_pollution_data1.php";
    var asynchronous =true;

    ajax1.open(method, url,asynchronous);
    ajax1.send();

    ajax1.onreadystatechange=function(){

        if(this.readyState=4 && this.status == 200){
           
            var data1 = JSON.parse(this.responseText);


            var Count1=[];

            for(var i= 0; i< data1.length; i++){

                Count1.push ([parseInt(data1[i].Year),parseInt(data1[i].Count_of_death)]);       
            }

            var ajax2= new XMLHttpRequest();
            var method ="GET";
            var url = "death_from_air_pollution_data2.php";
            var asynchronous =true;

            ajax2.open(method, url,asynchronous);
            ajax2.send();

            ajax2.onreadystatechange=function(){
                
                if(this.readyState=4 && this.status == 200){
                    var data2 = JSON.parse(this.responseText);
                    console.log(data2);

                    var Count2=[];

                    for(var i= 0; i< data2.length; i++){

                        Count2.push ([parseInt(data2[i].Year),parseInt(data2[i].Count_of_death)]);       
                     }   
                    console.log(Count2);
                     
                    var ajax3= new XMLHttpRequest();
                    var method ="GET";
                    var url = "death_from_air_pollution_data3.php";
                    var asynchronous =true;

                    ajax3.open(method, url,asynchronous);
                    ajax3.send();

                    ajax3.onreadystatechange=function(){
                
                        if(this.readyState=4 && this.status == 200){
                            var data3 = JSON.parse(this.responseText);


                            var Count3=[];

                             for(var i= 0; i< data3.length; i++){

                                Count3.push ([parseInt(data3[i].Year),parseInt(data3[i].Count_of_death)]);       
                             }


           
           
                            $(function() {
                                var plot;

           
                                var data = [
                                    {color: "red",lines: {show: true, lineWidth:2}, data: Count1, label: "China"},
                                    {color: "forestgreen",lines: {show: true, lineWidth:2}, data: Count2, label: "India"},
                                    {color: "indigo",lines: {show: true, lineWidth:2}, data: Count3, label: "United States"},


                                ];
    
 
    
                                setupGraph();
    
                                function setupGraph() {
                                    plot = $.plot($("#placeholder"), data , {
                                    legend: {
                                    position: "ne",
                                    show: true,
                                    noColumns: 2,
                                    },
                                    series: {
                                    lines: {
                                    show: false
                                    }
                                   },
                                    zoom: {
                                    interactive: true
                                    },
                                    pan: {
                                    interactive: true
                                    }       
                                    });
                                }
    
                            });


                        }
                    }
                }
            }
        }
    }

</script>