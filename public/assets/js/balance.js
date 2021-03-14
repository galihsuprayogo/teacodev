
function showBalance(){
	// var id=14;
	$.get('/createbalancee', function(data){
			$.each(data, function(index, pricesObj){
				console.log(pricesObj);
				var balancen = idrFormat(pricesObj.balance);
				document.getElementById('s').innerHTML = "Balance: "+balancen;
			});
	});
}

function idrFormat(t)
		{
			var newPrice = accounting.formatMoney(t, { 
				  symbol   : "Rp. ",
				  thousand : ".",
				  decimal  : ",",
				});

			return newPrice;
		}
