// const axios = require("../../js/axios");

$(function(e) {


});

function getData(obj,attr){
	var data =  {};
	data.labels = [];
	data.data = [];
	obj.map(function(o){
		   ressource.crimes.map(function(c){
			   if (c.localite_apprehension.id == o.id){
				   data.labels.push(o[attr]);
				   data.data.push(o.crimes.labels);
			   }
		   })
	   });
	   return data;
   }
 function statpays(id){
	axios.get('http://localhost:8000/uinc/api/stats',function(err,res){

		if (err){
			return
		}
		alert(res.data.data);
		var pays;
		var localites = [];
		var ressource = res.data.data; 
		ressource.pays.map(function(p){
			if (p.id == id){
				pays = p;
				localites =  pays.localites;
			}
		})
		if ($('#canvasDoughnut').length) {
			var ctx = document.getElementById("canvasDoughnut").getContext("2d");
			new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: getData(localites,'designation').labels,
					datasets: [{
						data: getData(localites,'designation').data,
						backgroundColor: ['#525ce5', '#9c52fd', '#24e4ac', "#ffa70b", "#ec5444"],
						borderColor:'transparent',
					}]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 65,
				}
			});
		}
	 });
}
 
  

 
