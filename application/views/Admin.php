<div id="App_AdminArea" class="d-flex flex-column hide" style="width:100%; height: 100%">
	<div class="d-flex flex-row border-bottom p-1 w-100" style="width: 100%">
		<button class="form-control d-flex align-items-center mr-1" style="background-color: white;"><span class="material-icons mr-2">dashboard</span>Dashboard</button>
		<button class="form-control d-flex align-items-center mr-1" style="background-color: white;"><span class="material-icons mr-2">receipt_long</span>Payment</button>
		<button class="form-control d-flex align-items-center mr-1" style="background-color: white;"><span class="material-icons mr-2">campaign</span>Announcement</button>

		<div style="width: 100%"></div>

		<button class="form-control d-flex align-items-center mr-1" style="background-color: white;"><span class="material-icons mr-2">face</span>Account</button>
		<button class="form-control d-flex align-items-center mr-1" style="background-color: white;"><span class="material-icons mr-2">account_box</span>Registery</button>

		<div style="width: 100%"></div>

		<button class="form-control d-flex align-items-center" style="background-color: white;"><span class="material-icons mr-2">dns</span>Transaction</button>
		

	</div>
	<div style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
		<div class="d-flex flex-row" style="width: 100%; height: 100%">
			<div class="d-flex flex-column p-3" style="width: 100%; min-width: 250px;">
				<h4>Create Payment Info</h4>
				<h6 style="margin: 0; font-size: 12px; font-weight: bold;">Title</h6>
				<input id="PaymentSlip_Titlebox" class="form-control" placeholder="e.g. Tuition Fee, Old Account .....">

				<h6 class="mt-3" style="margin: 0; font-size: 12px; font-weight: bold;">Payment Slip Type</h6>
				<select id="PaymentSlip_TypeButton" onchange="new Payment().Slip_TypeButton()"  class="form-control custom-select">
					<option value="1">Basic Education Payment Slip</option>
					<option value="2">College Payment Slip</option>
					<option value="3">Vocationally Slip</option>
					<option value="4">Others</option>
				</select>
				<!-- Others Area -->
				<div id="PaymentSlip_OtherArea" class="hide ml-4 mr-4">
					<h6 class="mt-3" style="margin: 0; font-size: 12px; font-weight: bold;">Others</h6>

					<div class="d-flex flex-row align-items-center ml-2">
						<input id="PaymentSlip_PurchasableButton" class="form-check" type="checkbox" name="" checked="checked">
						<div class="ml-4">is Purchasable?</div>
					</div>
					<div class="d-flex flex-row align-items-center ml-2">
						<input id="PaymentSlip_PhysicalButton" class="form-check" type="checkbox" name="" checked="checked">
						<div class="ml-4">is Physical Item?</div>
					</div>
					<!-- Purchasable Area -->
					<div>
						<h6 class="mt-3" style="margin: 0; font-size: 12px; font-weight: bold;">Price</h6>
						<input id="PaymentSlip_Pricebox" class="form-control" type="number" name="">
					</div>
					<!-- End of Purchasable Area -->
				</div>
				<!-- End of Others Area -->
				<button id="PaymentSlip_CreateButton" onclick="new Payment().Slip_CreateButton()" class="form-control d-flex align-items-center mt-5" style="background-color: white;"><span class="material-icons mr-2">create</span>Create</button>
			</div>
			<div class="" style="min-width: 600px; height: 100%">
				<div class="d-flex align-items-center justify-content-center" style="min-width: 100px; height: 100%">
					<h4>Empty!</h4>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

	})

	function Payment() {
		this.Slip_TypeButton = function() {
			$(document).ready(function() {
				var PaymentSlip_TypeButton = $("#PaymentSlip_TypeButton option:selected")
				var PaymentSlip_OtherArea = $("#PaymentSlip_OtherArea")

				if(PaymentSlip_TypeButton.val() == 4) PaymentSlip_OtherArea.removeClass('hide')
				else PaymentSlip_OtherArea.addClass('hide')
			})
		}

		this.Slip_CreateButton = function() {
			$(document).ready(function() {
				var PaymentSlip_Titlebox = $("#PaymentSlip_Titlebox")
				var PaymentSlip_TypeButton = $("#PaymentSlip_TypeButton option:selected")
				var PaymentSlip_CreateButton = $("#PaymentSlip_CreateButton")
				var PaymentSlip_PurchasableButton = $("#PaymentSlip_PurchasableButton")
				var PaymentSlip_PhysicalButton = $("#PaymentSlip_PhysicalButton")
				var PaymentSlip_Pricebox = $("#PaymentSlip_Pricebox")

				if(PaymentSlip_Titlebox.val() != "") {
					console.log(PaymentSlip_PurchasableButton.is(":checked"))

					// $.ajax({
					// 	url: window.location.href.replace("/Access", "")+ "/Payment", 
					// 	method: 'POST',
					// 	data: {
					//  		Titlebox: PaymentSlip_Titlebox.val(),
					//  		SlipType: {
					//  			"Number": PaymentSlip_TypeButton.val(),
					//  			"Text": PaymentSlip_TypeButton.text()
					//  		}
					//  		isPurchasable:
					// 	},
					// 	dataType: 'json',
					// 	success: function(data) {
					// 		console.log(data)

					// 		if(!data.isError) {
					// 			PaymentSlip_CreateButton.removeClass('hide')

					// 			PaymentSlip_Titlebox.val('')
					// 		}
					// 		else {
					// 			alert(data.ErrorDisplay)

					// 			PaymentSlip_CreateButton.removeClass('hide')
					// 		}
					// 	},
					// 	error: function(ex) {
					//  		console.log('Error: ' + JSON.stringify(ex, null, 2))

					//  		PaymentSlip_CreateButton.removeClass('hide')
					// 	},
					// 	beforeSend: function() {
					// 		PaymentSlip_CreateButton.addClass('hide')
					// 	}
					// })
				}
				else alert("Error: Title is Empty!")
			})
		}
	}
</script>