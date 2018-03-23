
		function generarGrafica(datos){
			var ctx = document.getElementById('canvas1').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'line',
				data: datos,
				options: {
					title: {
						display: true,
						text: 'Temperatura interna y externa'
					},
					tooltips: {
						mode: 'index',
						intersect: false
					},
					responsive: true
			
				}
			});

		}



		window.onload = function() {
		
			//generarGrafica(barChartData);


		};


		$( document ).ready(function() {
			$("#llamada").on("click",function (){

				var colores=['#cc0000','#3366ff'];


				 $.ajax( "querys.php" )
				.done(function(response) {
					var data=$.parseJSON(response);
					console.log(data);
					var datasets = [];
					for (var i = 0; i < data.length; i++) {
						var obj = {
							label: 'Dataset',
							borderColor: colores[i],
							data: [],
							fill: false
						};
						obj.label = data[i].name; 
						obj.data = data[i].data;
						console.log(obj);
						datasets.push(obj); 
					}
					var barChartData = {
						labels: ['Minuto 1', 'Día 2','Día 3', 'Día 4','Día 2','Día 3', 'Día 4'],
						datasets: datasets
					};
					console.log(datasets);
					generarGrafica(barChartData);
				})
				.fail(function() {
					alert( "error" );
				})
				.always(function() {
				
				});


				});
		});
		

		document.getElementById('randomizeData').addEventListener('click', function() {
			barChartData.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});
			window.myBar.update();
		});