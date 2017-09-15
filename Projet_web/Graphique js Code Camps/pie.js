window.onload = function() { 
	$("#chart-container").CanvasJSChart({ 
			title: { 
				text: "Nombre de cinema en Afrique",
				fontSize: 28
			},
			legend: { 
				verticalAlign: "bottom",
				horizontalAlign: "bottom",
				fontSize: 14
			}, 
			data: [ 
			{ 
				type: "pie",
				showInLegend: true,
				toolTipContent: "{label} : {y}",
				indexLabel: "{y}", 
				dataPoints: [ 
					{label: "Senegal", y: 12, legendText: "Senegal"}, 
					{label: "Ghana", y: 9, legendText: "Ghana"}, 
					{label: "Cote-d'Ivoire", y: 7, legendText: "Cote-d'Ivoire"}, 
					{label: "Mali", y: 5, legendText: "Mali"}, 
					{label: "Nigeria", y: 3, legendText: "Nigeria"}, 
					{label: "Autres", y: 24, legendText: "Autres"} 
				] 
			} 
			] 
		}); 
	}
