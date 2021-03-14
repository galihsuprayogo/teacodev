@extends('templates.master')
@section('title')
	Create Order Page
@endsection
@section('content')
<div class="mu-title">
	<span class="mu-subtitle">Create Orders</span>
</div>

<div class="container" id="panel1">
	<div class="panel panel-default">
		<div class="panel-heading">Select Menus and Klik add</div>
		<div class="panel-body">
			<div class="col-md-5 col-md-offset-0">
				<form action="" id="myform">
					{{ csrf_field() }}
					
					<div class="wrap-input102 validate-input m-b-10" data-validate = "Fullname is required">
						<label for="menu">Order Id</label>
						<input class="input102" type="text" name="oid" id="oid" value="{{$o_id}}" placeholder="xxxx" readonly="">
						<span class="focus-input102"></span>
						<span class="symbol-input102">
							<i class="fa fa-user"></i>
						</span>
					</div>
					<div class="wrap-input102 validate-input m-b-10" data-validate = "Fullname is required">
						<label for="menu">Order Date</label>
						{{-- <body onload="startTimeField()"> --}}
							<input class="input102" type="text" name="odate" id="odate"  value="{{$date}}" readonly="" >
						{{-- </body> --}}
						<span class="focus-input102"></span>
						<span class="symbol-input102">
							<i class="fa fa-user"></i>
						</span>
					</div>
					<div class="wrap-input102 m-b-10" data-validate = "">
						<label for="menu">Order Board</label>
						<select class="input102" name="oboard" id="oboard" >
							@foreach($boards  as $board)
							<option value="{{ $board->board_id}}"> {{ $board->board_id}} </option>
							@endforeach
						</select>
						<span class="focus-input100"></span>
						<span class="symbol-input102">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<div class="wrap-input102 validate-input m-b-10" data-validate = "Fullname is required">
						<label for="menu">Customer Name</label>
						<input class="input102" type="text" name="cname" id="cname" value="" placeholder="Name of Customer" >
						<span class="focus-input102"></span>
						<span class="symbol-input102">
							<i class="fa fa-user"></i>
						</span>
					</div>
					<div class="wrap-input102 m-b-10" data-validate = "">
						<label for="menupacket">Menu/Packet</label>
						<select class="input102" name="mpid" id="mpid" >
							<option value="sm" > -- select menu/packet -- </option>
							@foreach($menus  as $menu)
							<option value="{{ $menu->menu_id}}">{{ $menu->menu_name}}    </option>
							@endforeach
							@foreach($packetm  as $pm)
							<option value="{{ $pm->id}}">{{ $pm->packet_name}}    </option>
							@endforeach
						</select>
						<span class="focus-input100"></span>
						<span class="symbol-input102">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<div class="wrap-input102 m-b-10" data-validate = "">
						<label for="menu">Menu Name</label>
						<select class="input102" name="midn" id="midn" >
							
							
						</select>
						<span class="focus-input100"></span>
						<span class="symbol-input102">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					{{-- <div class="wrap-input102 m-b-10" data-validate = "">
						<label for="menu">Menu Name</label>
						<select class="input102" name="mid" id="mid" >
							<option value="sm" > -- select menu -- </option>
							@foreach($menus  as $menu)
							<option value="{{ $menu->menu_id}}">{{ $menu->menu_id}}	--	{{ $menu->menu_name}} </option>
							@endforeach
						</select>
						<span class="focus-input100"></span>
						<span class="symbol-input102">
							<i class="fa fa-lock"></i>
						</span>
					</div> --}}
					<div class="wrap-input102 m-b-10" data-validate = "" >
						<label for="menu">Menu Price</label>
						<input class="input102" type="number" name="price" id="price" placeholder="value of price" readonly="">
						<span class="focus-input100"></span>
						<span class="symbol-input102">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<div class="wrap-input102 m-b-10" data-validate = "">
						<label for="menu">Menu Stock</label>
						<input class="input102" type="number" name="stock" id="stock" placeholder="value of stock" readonly="">
						<span class="focus-input100"></span>
						<span class="symbol-input102">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<div class="wrap-input102 validate-input m-b-10" data-validate = "">
						<label for="menu">Menu Quantity</label>
						<input class="input102" type="number" min="1" name="quantity" id="quantity" placeholder="input a quantity">
						<span class="focus-input102"></span>
						<span class="symbol-input102">
							<i class="fa fa-lock"></i>
						</span>
					</div>
				</form>
				<div class="container-login100-form-btn p-t-10">
					<button class="login105-form-btn" name="addmenu" id="addmenu">
					Add
					</button>
					<button class="login105-form-btn" name="updatemenu" id="updatemenu">
					Update
					</button>
				</div>
			</div>
			<div class="col-md-6 col-md-offset-1">
				<div class="table-users" >
					<table cellspacing="0" id="resultTable">
						<tr>
							<th>Menu Id</th>
							<th>Menu Price</th>
							<th>Menu Stock</th>
							<th>Menu Quantity</th>
							<th>Delete</th>
							<th>Edit</th>
						</tr>
						<tbody id="menulist">
							
						</tbody>
						
					</table>
				</div>
				<div>
					{{-- <p style="text-align: right" id="totprice">
						
					</p> --}}
					<div class="wrap-input103 validate-input m-b-10" data-validate = "Fullname is required">
						<label for=""> Total Price</label>
						<input class="input103" type="text" name="totprice" id="totprice" readonly="" >

						{{-- <body onload="totRefund()">					
						<label for=""> Refund</label>
						<input class="input103"  type="text" name="refund" id="refund" readonly="" >
						</body> --}}
						<span class="focus-input103"></span>
					</div>
				</div>
				<div>
					<form action="{{ route('cod') }}" method = "POST" onsubmit="return paymentMethod();">
						{{ csrf_field() }}
						<div class="wrap-input103 validate-input m-b-10" data-validate = "Fullname is required">
							
							<input class="input103"  type="text" name="opay" id="opay"  placeholder="Input Payment" >
							<span class="focus-input103"></span>
							
						</div>
						<div class="container-login100-form-btn p-t-10">
							<input type="hidden" name="oidn" id="oidn">
							<input type="hidden" name="odaten" id="odaten">
							<input type="hidden" name="oboardn" id="oboardn">
							<input type="hidden" name="olist" id="olist">
							<input type="hidden" name="odlist" id="odlist">
							<button class="login106-form-btn" id="paymentbtn">
							Check Out!!
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		$('#mpid').on('change', function(e){
			var menupacket = e.target.value;
			console.log(menupacket);
				if(menupacket.includes('M')){
						$.get('/createorderrr/'+menupacket, function(data){
							$.each(data, function(index, pricesObj){
								console.log(pricesObj.menu_id);
								$('#midn').append('<option value="'+ pricesObj.menu_id +'" selected="">'+pricesObj.menu_id+" -- "+ pricesObj.menu_name +'</option>');
								$("#price").val(pricesObj.menu_price);
								$("#stock").val(pricesObj.menu_stock);
							});
						});
				}else{
					$.get('/createorde/'+menupacket, function(data){
						console.log(data);
							$.each(data, function(index, pricesObj){
								$('#midn').append('<option value="'+ pricesObj.packet_id +'" selected="">'+pricesObj.menu_id+" -- "+ pricesObj.menu_name +'</option>');
								$("#price").val(pricesObj.totalprice);
								// var sVal = 'asd';
								// var iVal = parseInt(sVal);
								$("#stock").val(pricesObj.menu_stock);		
							});
						});
				}
			$('#midn').find('option').remove();
			$("#price").val(' ');
			$("#stock").val(' ');
		});

		// $('#mid').on('change', function(e){
		// 	console.log(e);
		// 	var menu_id = e.target.value;
		// 	$.get('/createorderr/'+menu_id, function(data){
		// 		console.log(data);
		// 		$('#price').empty();
		// 		$.each(data, function(index, pricesObj){
		// 			$("#price").val(pricesObj.menu_price);
		// 		});
		// 		$('#stock').empty();
		// 		$.each(data, function(index, pricesObj){
		// 			$("#stock").val(pricesObj.menu_stock);
		// 		});
		// 	});
		// });
			var menus =
			{
				menuValues: ['oid', 'odate', 'cname', 'mid', 'price', 'stock', 'quantity']
			};
			var menulist = new Array('menulist', menus);
			var oidField = $("#oid"),
			odateField= $("#odate"),
			oboardField = $("#oboard"),
			opayField = $("#opay"),
			customerField = $("#cname"),
			midField = $("#midn"),
			priceField = $("#price"),
			stockField = $("#stock"),
			quantityField = $("#quantity"),
			totPrice = $("#totprice"),
			addBtn = $("#addmenu"),
			updateBtn = $("#updatemenu");
			addBtn.click(function(){

				if(stockField.val()==0)
				{
					alert('stock empty');
				}
				else
				{
					if(quantityField.val() > stockField.val())
					{
						alert('quantity exceeds stock');
					}

					else
					{
							if(menulist.length==2)
						{
								menulist.push({
									oid:oidField.val(),
									odate:odateField.val(),
									oboard:oboardField.val(),
									cname:customerField.val(),
									opay:opayField.val(),
									mid:midField.val(),
									price:priceField.val(),
									stock:stockField.val(),
									quantity:quantityField.val()
									});
								clearFields();
								addFields();
						}
						else
						{
								$.each(menulist, function(i, menuname){
									if(i > 1){
									if(menuname.mid == midField.val()){
										var imenu = menulist.pop('mid', midField.val());
										menulist.push({
											oid:oidField.val(),
											odate:odateField.val(),
											oboard:oboardField.val(),
											cname:customerField.val(),
											opay:opayField.val(),
											mid:midField.val(),
											price:priceField.val(),
											stock:stockField.val(),
											quantity:parseInt(menuname.quantity)+parseInt(quantityField.val())
										});
										clearFields();
										addFields();
												}
									else if(menuname.mid != midField.val() && midField.val()!=null){
											
												menulist.push({
												oid:oidField.val(),
												odate:odateField.val(),
												oboard:oboardField.val(),
												cname:customerField.val(),
												opay:opayField.val(),
												mid:midField.val(),
												price:priceField.val(),
												stock:stockField.val(),
												quantity:quantityField.val()
												});
											clearFields();
											addFields();
											
										}
									}
											});
							}
						}
				}
					
			});
			updateBtn.click(function(){
				var imenu = menulist.pop('mid', midField.val());
				menulist.push({
					oid:oidField.val(),
					odate:odateField.val(),
					oboard:oboardField.val(),
					cname:customerField.val(),
					opay:opayField.val(),
					mid:midField.val(),
					price:priceField.val(),
					stock:stockField.val(),
					quantity:quantityField.val()
				});
				clearFields();
				addFields();
			});
				
		function addFields()
		{
			$.each(menulist, function(index, menuname){
				console.log(menulist);
					if(index > 1)
					{
							$("#menulist").append('<tr><td id="mid">'+menuname.mid+'</td><td>'+menuname.price+'</td><td>'+menuname.stock+'</td><td>'+menuname.quantity+'</td><td><button class="login102-form-btn" id="del"> Delete </button></td><td><button class="login102-form-btn" id="edit"> Edit </button></td></tr>');
								totalPrice();
								
							
					}
						});
			console.log(menulist);
		}
						function paymentMethod(){
							var a = oldPrice();
							if(opayField.val() == 0 || opayField.val() == null){
								alert('payment 0');
								return false;
							}else if(opayField.val() < a){
								alert('payment less than total price');
								return false;
							}else {
								var arrorder = new Array();
								var arrdorder = new Array();
								$.each(menulist, function(i, menuname){
									if(i==2){
										arrorder.push({
										oid:menuname.oid,
										odate:menuname.odate,
										oboard:menuname.oboard,
										cname:menuname.cname,
										opay:opayField.val(),
										});
										arrdorder.push({
										mid:menuname.mid,
										price:menuname.price,
										stock:menuname.stock,
										quantity:menuname.quantity
										});
									}
									else if(i>2){
										arrdorder.push({
										mid:menuname.mid,
										price:menuname.price,
										stock:menuname.stock,
										quantity:menuname.quantity
										});
									}
										});
									var menus = JSON.stringify(arrorder);
									var detailmenus = JSON.stringify(arrdorder);
									// console.log(menus);
									// console.log(detailmenus);
									$("#oidn").val(oidField.val());
									$("#odaten").val(odateField.val());
									$('#oboardn').val(oboardField.val());
									$("#opay").val(opayField.val());
									$("#olist").val(menus);
									$("#odlist").val(detailmenus);
								return true;
							}
						}
					
							$('#resultTable').on('click', '#del', function(){
								var $row = jQuery(this).closest('tr').remove();
								var $columns = $row.find('td');
								jQuery.each($columns, function(i, item) {
								if(i==0){
									var x = String(item.innerHTML);
										$.each(menulist, function(i, menuname){
												if(i>1 && x == menuname.mid){
													menulist.splice(i,1);
													console.log(menulist);
												}
											});
								}
										});
								totalPrice();
								});
							$('#resultTable').on('click', '#edit', function(){
								var $row = jQuery(this).closest('tr');
								var $columns = $row.find('td');
								jQuery.each($columns, function(i, item) {
								if(i == 0){
										$('#midn').append('<option value="'+ item.innerHTML +'" selected="">'+item.innerHTML+'</option>');
								}
								else if(i == 1){
									$("#price").val(item.innerHTML);
								}
								else if(i == 2){
									$("#stock").val(item.innerHTML);
								}
								else if(i == 3){
									$("#quantity").val(item.innerHTML);
								}
										});
							});

		function totalPrice(){
			var pq = 0;
			var totPrice = 0;
			$.each(menulist, function(index, menuname){
				if(index > 1){
				pq = Number(menuname.quantity) * Number(menuname.price);
				totPrice += pq;
				}else if(index <= 1){
					document.getElementById("totprice").innerHTML = 0;
				}
			});
			// document.getElementById("totprice").innerHTML = totPrice;
			$("#totprice").val(idrFormat(totPrice));
		}

		function oldPrice()
		{
			var pq = 0;
			var totPrice = 0;
			$.each(menulist, function(index, menuname){
				if(index > 1){
				pq = Number(menuname.quantity) * Number(menuname.price);
				totPrice += pq;
				}else if(index <= 1){
					document.getElementById("totprice").innerHTML = 0;
				}
			});

			return totPrice;
		}

		function totRefund()
		{
			alert('hallo');
			// var op = $("#opay").val(opayField.val());
			// console.log(op);
			// $("#refund").val(100);
			 // document.getElementById("refund").innerHTML = 100;
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
								
		function clearFields()
		{
			$('#menulist').empty();
			// $('#paymentbtn').empty();
			$("#mid").val('');
			$("#price").val('');
			$("#stock").val('');
			$("#quantity").val('');
		}
		function clearFieldsEdit()
		{
			$("#mid").val('');
			$('#price').append('');
			$("#stock").val('');
			$("#quantity").val('');
		}
		
	</script>
	@endsection