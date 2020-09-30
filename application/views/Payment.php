<div id="App_PaymentArea" class="d-flex flex-column hide" style="width:100%; height: 100%">
	<div class="d-flex flex-row border-bottom p-1 w-100 hide" style="width: 100%">
		<button class="form-control d-flex align-items-center mr-1" style="background-color: white;"><span class="material-icons mr-2">dashboard</span>Dashboard</button>
		<button class="form-control d-flex align-items-center mr-1" style="background-color: white;"><span class="material-icons mr-2">receipt_long</span>Payment</button>
		<button class="form-control d-flex align-items-center mr-1" style="background-color: white;"><span class="material-icons mr-2">campaign</span>Announcement</button>

		<div style="width: 100%"></div>

		<button class="form-control d-flex align-items-center mr-1" style="background-color: white;"><span class="material-icons mr-2">face</span>Account</button>
		<button class="form-control d-flex align-items-center mr-1" style="background-color: white;"><span class="material-icons mr-2">account_box</span>Registery</button>

		<div style="width: 100%"></div>

		<button class="form-control d-flex align-items-center" style="background-color: white;"><span class="material-icons mr-2">dns</span>Transaction</button>
		

	</div>
	<div style="width: 100%; height: 100%;">
		<!-- Payment Area -->
		<div class="d-flex flex-row" style="width: 100%; height: 100%">
			<div class="d-flex flex-column p-3" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
				<!-- View Area -->
				<div id="Payment_ViewArea" class="d-flex flex-column" style="width: 100%; height: 100%">
					<!-- View Payment Area -->
					<div>
						<h4>Store</h4>

						<div id="PaymentView_ItemLoader" class="row pl-3 pr-3">
							<?php

								if($isStoreEmpty == true) echo '<div id="PaymentView_ItemDisplay" class="d-flex align-items-center justify-content-center mt-5 mb-5" style="min-width: 100px; height: 100%"><h4>Nope! No Item Added Here.</h4></div>';
								else {
									foreach ($Store as $value) {
										echo '<div id="PaymentView_ItemID' .$value['StoreID']. '" class="d-flex flex-row mr-3 mb-3">
												<div class="d-flex flex-column border rounded mr-1" style="width: 175px; min-height: 125px;">
													<div class="material-icons d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">' .$value['StoreIcon']. '</div>
													<div class="d-flex justify-content-center p-2" style="font-size: 12px; font-weight: bold;">' .$value['StoreTitle']. '</div>
												</div>
												<div class="d-flex flex-column">
													<button class="form-control material-icons p-1 border mb-1" onclick="new Payment().View_EditButton(' .$value['StoreID']. ')" style="width: 35px; height: 35px; font-size: 15px;" onclick="">edit</button>
													<button class="form-control material-icons p-1 border" style="width: 35px; height: 35px; font-size: 15px;" onclick="new Payment().View_RemoveButton(' .$value['StoreID']. ')">delete</button>
												</div>
											</div>';
										
									}
								}

							?>
						</div>
					</div>
					<!-- End of View Payment Area -->
					<!-- Create Payment Area -->
					<div class="mt-4">
						<h4>Create Payment Info</h4>
						<h6 style="margin: 0; font-size: 12px; font-weight: bold;">Title</h6>
						<input id="PaymentCreate_Titlebox" class="form-control" placeholder="e.g. Tuition Fee, Old Account .....">

						<div class="d-flex flex-row" style="width: 100%">
							<div class="mr-2" style="width: 100%">
								<h6 class="mt-3" style="margin: 0; font-size: 12px; font-weight: bold;">Payment Slip Type</h6>
								<select id="PaymentCreate_TypeButton" onchange="new Payment().Create_TypeButton()" class="form-control custom-select" style="width: 100%">
									<?php
									
										foreach (json_decode($SlipType) as $value) echo '<option value="' .$value->StoreType_ID. '">' .$value->StoreType_Name. '</option>';

									?>
								</select>
							</div>
							<div class="ml-2" style="width: 100%">
								<h6 class="mt-3" style="margin: 0; font-size: 12px; font-weight: bold;">Write if Payment Slip Type not Exist</h6>
								<div class="d-flex flex-row">
									<input id="PaymentCreate_Typebox" class="form-control">
									<button id="PaymentCreate_AddButton" onclick="new Payment().Create_AddButton()" class="form-control ml-1 d-flex align-items-center" style="background-color: white;"><span class="material-icons mr-2">add</span>Add</button>
								</div>
							</div>
						</div>
						<!-- Others Area -->
						<div id="PaymentCreate_OtherArea" class="hide ml-4 mr-4">
							<h6 class="mt-3" style="margin: 0; font-size: 12px; font-weight: bold;">Others</h6>

							<div class="d-flex flex-row align-items-center ml-2">
								<input id="PaymentCreate_PurchasableButton" class="form-check" type="checkbox" name="" checked="checked">
								<div class="ml-4">is Purchasable?</div>
							</div>
							<div class="d-flex flex-row align-items-center ml-2">
								<input id="PaymentCreate_PhysicalButton" class="form-check" type="checkbox" name="" checked="checked">
								<div class="ml-4">is Physical Item?</div>
							</div>
							<!-- Purchasable Area -->
							<div>
								<h6 class="mt-3" style="margin: 0; font-size: 12px; font-weight: bold;">Price</h6>
								<input id="PaymentCreate_Pricebox" class="form-control" type="number" name="">
							</div>
							<!-- End of Purchasable Area -->
						</div>
						<!-- End of Others Area -->

						<h6 class="mt-4" style="margin: 0; font-size: 12px; font-weight: bold;">Icon(Optional) <a href="https://material.io/resources/icons/?icon=local_grocery_store&style=baseline">Click me to get all List of Icon Name from Material IO</a></h6>
						<input id="PaymentCreate_Iconbox" class="form-control" placeholder="(Optional)">

						<button id="PaymentCreate_DoneButton" onclick="new Payment().Create_DoneButton()" class="form-control d-flex align-items-center mt-5 mb-5" style="background-color: white;"><span class="material-icons mr-2">create</span>Create</button>
					</div>
					<!-- End of Create Payment Area -->
				</div>
				<!-- End of View Area -->
				<!-- Edit Area -->
				<div id="Payment_EditArea" class="d-flex flex-column hide" style="width: 100%; height: 100%">
					<div class="d-flex flex-row mb-5">
						<div id="PaymentEdit_BackButton" onclick="new Payment().Edit_BackButton()" class="d-flex flex-row form-control" style="width: 150px; cursor: pointer;">
							<div class="material-icons mr-3">arrow_back</div>
							<div class="d-flex align-items-center" style="font-size: 12px; font-weight: bold;">Back</div>
						</div>

						<div class="d-flex align-items-center ml-4" style="width: 100%; font-size: 12px; font-weight: bold; ">Store ID #0123456789</div>
					</div>

					<h6 style="margin: 0; font-size: 12px; font-weight: bold;">Title</h6>
					<input id="PaymentEdit_Titlebox" class="form-control" placeholder="e.g. Tuition Fee, Old Account .....">

					<div class="d-flex flex-row" style="width: 100%">
						<div class="mr-2" style="width: 100%">
							<h6 class="mt-3" style="margin: 0; font-size: 12px; font-weight: bold;">Payment Slip Type</h6>
							<select id="PaymentEdit_TypeButton" onchange="new Payment().Edit_TypeButton()" class="form-control custom-select" style="width: 100%">
								<?php
									
									foreach (json_decode($SlipType) as $value) echo '<option value="' .$value->StoreType_ID. '">' .$value->StoreType_Name. '</option>';

								?>
							</select>
						</div>
						<div class="ml-2" style="width: 100%">
							<h6 class="mt-3" style="margin: 0; font-size: 12px; font-weight: bold;">Write if Payment Slip Type not Exist</h6>
							<div class="d-flex flex-row">
								<input id="PaymentEdit_Typebox" class="form-control">
								<button id="PaymentEdit_AddButton" onclick="new Payment().Edit_AddButton()" class="form-control ml-1 d-flex align-items-center" style="background-color: white;"><span class="material-icons mr-2">add</span>Add</button>
							</div>
						</div>
					</div>
					<!-- Others Area -->
					<div id="PaymentEdit_OtherArea" class="hide ml-4 mr-4">
						<h6 class="mt-3" style="margin: 0; font-size: 12px; font-weight: bold;">Others</h6>

						<div class="d-flex flex-row align-items-center ml-2">
							<input id="PaymentEdit_PurchasableButton" class="form-check" type="checkbox" name="" checked="checked">
							<div class="ml-4">is Purchasable?</div>
						</div>
						<div class="d-flex flex-row align-items-center ml-2">
							<input id="PaymentEdit_PhysicalButton" class="form-check" type="checkbox" name="" checked="checked">
							<div class="ml-4">is Physical Item?</div>
						</div>
						<!-- Purchasable Area -->
						<div>
							<h6 class="mt-3" style="margin: 0; font-size: 12px; font-weight: bold;">Price</h6>
							<input id="PaymentEdit_Pricebox" class="form-control" type="number" name="">
						</div>
						<!-- End of Purchasable Area -->
					</div>
					<!-- End of Others Area -->

					<h6 class="mt-4" style="margin: 0; font-size: 12px; font-weight: bold;">Icon(Optional) <a href="https://material.io/resources/icons/?icon=local_grocery_store&style=baseline">Click me to get all List of Icon Name from Material IO</a></h6>
					<input id="PaymentEdit_Iconbox" class="form-control" placeholder="(Optional)">

					<button id="PaymentEdit_DoneButton" onclick="new Payment().Edit_DoneButton()" class="form-control d-flex align-items-center mt-5 mb-5" style="background-color: white;"><span class="material-icons mr-2">done</span>Done</button>
				</div>
				<!-- End of Edit Area -->
			</div>
			
			<div class="border-left" style="width: 500px; height: 100%;">
				<h5 class="p-2 border-bottom" style="margin: 0">History</h5>
				<div style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
					<?php

						if($isStoreEmpty == true) echo '<div class="d-flex align-items-center justify-content-center" style="min-width: 100px; height: 100%"><h4>Empty!</h4></div>';
						else {
							foreach ($Store as $value) {

								echo '<div class="d-flex flex-row form-control border-left-0 border-right-0 border-top-0 rounded-0" style="width: 100%; height: 69px">
									<img src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
									<div class="ml-3">
										<div style="font-size: 12px; font-weight: bold">Z. Redgrave -> Added a new Payment Item "' . $value['StoreTitle']. '"</div>
										<div style="font-size: 12px">Date and Time: ' . $value['TimeRegister']. ' ' . $value['DateRegister']. '</div>
									</div>
								</div>
								';
								
							}
						}

					?>

				</div>
			</div>
		</div>
		<!-- End of Payment Area -->
		<!-- Payment Area -->
		<div class="d-flex flex-row hide" style="width: 100%; height: 100%">
			
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

	})

	function Payment() {
		this.View_EditButton = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Payment/View_EditButton?StoreID=" +id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						$("#Payment_ViewArea").addClass('hide')
						$("#Payment_EditArea").removeClass('hide')
						$("#PaymentEdit_DoneButton").attr('onclick', 'new Payment().Edit_DoneButton('+ id +')')

						$("#PaymentEdit_Titlebox").val(data.StoreTitle)
						$('#PaymentEdit_TypeButton option[value=' + data.StoreType + ']').attr('selected', true)
						$("#PaymentEdit_PurchasableButton").attr('checked', data.isPurchasable)
						$("#PaymentEdit_PhysicalButton").attr('checked', data.isPurchasable)
						$("#PaymentEdit_Pricebox").val(data.StorePrice)
						$("#PaymentEdit_Iconbox").val(data.StoreIcon)
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this.View_RemoveButton = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Payment/View_RemoveButton?StoreID=" +id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						if(!data.isEmpty) {
							$("#PaymentView_ItemID"+ id).remove()
							$("#PaymentView_ItemDisplay").addClass('hide')
						}
						else {
							$("#PaymentView_ItemID"+ id).remove()
							$("#PaymentView_ItemDisplay").removeClass('hide')
						}
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})	
		}

		this.Create_TypeButton = function() {
			var PaymentCreate_TypeButton = $("#PaymentCreate_TypeButton option:selected")
			var PaymentCreate_OtherArea = $("#PaymentCreate_OtherArea")

			if(PaymentCreate_TypeButton.text().toLowerCase() == "others" || PaymentCreate_TypeButton.text().toLowerCase() == "other") PaymentCreate_OtherArea.removeClass('hide')
			else PaymentCreate_OtherArea.addClass('hide')
		}

		this.Create_AddButton = function() {
			$(document).ready(function() {
				var PaymentCreate_Typebox = $("#PaymentCreate_Typebox")
				var PaymentCreate_AddButton = $("#PaymentCreate_AddButton")

				if(PaymentCreate_Typebox.val() != "") {
					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/Payment/Create_AddButton", 
						method: 'POST',
						data: {
							Name: PaymentCreate_Typebox.val()
						},
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								PaymentCreate_TypeButton.append('<option value="' +data.Value+ '">' +data.Name+ '</option>')
								PaymentCreate_Typebox.val('')
								PaymentCreate_AddButton.removeClass('hide')
							}
							else {
								alert(data.ErrorDisplay)

								PaymentCreate_AddButton.removeClass('hide')
							}
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))

					 		PaymentCreate_AddButton.removeClass('hide')
						},
						beforeSend: function() {
							PaymentCreate_AddButton.addClass('hide')
						}
					})
				}
			})
		}

		this.Create_DoneButton = function() {
			$(document).ready(function() {
				var PaymentCreate_Titlebox = $("#PaymentCreate_Titlebox")
				var PaymentCreate_TypeButton = $("#PaymentCreate_TypeButton option:selected")
				var PaymentCreate_DoneButton = $("#PaymentCreate_DoneButton")
				var PaymentCreate_PurchasableButton = $("#PaymentCreate_PurchasableButton")
				var PaymentCreate_PhysicalButton = $("#PaymentCreate_PhysicalButton")
				var PaymentCreate_Pricebox = $("#PaymentCreate_Pricebox")
				var PaymentCreate_Iconbox = $("#PaymentCreate_Iconbox")

				var PaymentView_ItemLoader = $("#PaymentView_ItemLoader")
				var PaymentView_ItemDisplay = $("#PaymentView_ItemDisplay")

				if(PaymentCreate_Titlebox.val() != "") {
					var data = {}

					if(PaymentCreate_TypeButton.text().toLowerCase() == "others" || PaymentCreate_TypeButton.text().toLowerCase() == "other") {
						data = {
							Titlebox: PaymentCreate_Titlebox.val(),
						 	SlipType: {
						 		"Number": PaymentCreate_TypeButton.val(),
						 		"Text": PaymentCreate_TypeButton.text()
						 	},
						 	isOther: true,
						 	isPurchasable: PaymentCreate_PurchasableButton.is(":checked"),
						 	isPhysical: PaymentCreate_PhysicalButton.is(":checked"),
						 	Price: PaymentCreate_Pricebox.val(),
						 	Icon: PaymentCreate_Iconbox.val()
						}
					}
					else {
						data = {
							Titlebox: PaymentCreate_Titlebox.val(),
						 	SlipType: {
						 		"Number": PaymentCreate_TypeButton.val(),
						 		"Text": PaymentCreate_TypeButton.text()
						 	},
						 	isOther: false,
						 	isPurchasable: true,
						 	isPhysical: true,
						 	Price: 0,
						 	Icon: PaymentCreate_Iconbox.val()
						}
					}

					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/Payment/Create_DoneButton", 
						method: 'POST',
						data: {
							Package: JSON.stringify(data)
						},
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								var HTML = `

									<div id="PaymentView_ItemID` +data.StoreID+ `" class="d-flex flex-row mr-3 mb-3">
										<div class="d-flex flex-column border rounded mr-1" style="width: 175px; min-height: 125px;">
											<div class="material-icons d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">` +data.StoreIcon+ `</div>
											<div class="d-flex justify-content-center p-2" style="font-size: 12px; font-weight: bold;">` +data.StoreTitle+ `</div>
										</div>
										<div class="d-flex flex-column">
											<button class="form-control material-icons p-1 border mb-1" style="width: 35px; height: 35px; font-size: 15px;" onclick="new Payment().View_EditButton(` +data.StoreID+ `)">edit</button>
											<button class="form-control material-icons p-1 border" style="width: 35px; height: 35px; font-size: 15px;" onclick="new Payment().View_RemoveButton(` +data.StoreID+ `)">delete</button>
										</div>
									</div>

								`
								PaymentView_ItemLoader.append(HTML)
								PaymentCreate_DoneButton.removeClass('hide')
								PaymentView_ItemDisplay.addClass('hide')
								PaymentCreate_Titlebox.val('')
							}
							else {
								alert(data.ErrorDisplay)

								PaymentCreate_DoneButton.removeClass('hide')
							}
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))

					 		PaymentCreate_DoneButton.removeClass('hide')
						},
						beforeSend: function() {
							PaymentCreate_DoneButton.addClass('hide')
						}
					})
				}
				else alert("Error: Title is Empty!")
			})
		}

		this.Edit_TypeButton = function() {
			var PaymentEdit_TypeButton = $("#PaymentEdit_TypeButton option:selected")
			var PaymentEdit_OtherArea = $("#PaymentEdit_OtherArea")

			if(PaymentEdit_TypeButton.text().toLowerCase() == "others" || PaymentEdit_TypeButton.text().toLowerCase() == "other") PaymentEdit_OtherArea.removeClass('hide')
			else PaymentEdit_OtherArea.addClass('hide')
		}

		this.Edit_AddButton = function() {
			var PaymentEdit_Typebox = $("#PaymentEdit_Typebox")
			var PaymentEdit_AddButton = $("#PaymentEdit_AddButton")

			if(PaymentEdit_Typebox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Payment/Edit_AddButton", 
					method: 'POST',
					data: {
						Name: PaymentEdit_Typebox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							PaymentCreate_TypeButton.append('<option value="' +data.Value+ '">' +data.Name+ '</option>')
							PaymentEdit_Typebox.val('')
							PaymentEdit_AddButton.removeClass('hide')
						}
						else {
							alert(data.ErrorDisplay)

							PaymentEdit_AddButton.removeClass('hide')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		PaymentEdit_AddButton.removeClass('hide')
					},
					beforeSend: function() {
						PaymentEdit_AddButton.addClass('hide')
					}
				})
			}
		}

		this.Edit_DoneButton = function(id) {
			var PaymentEdit_Titlebox = $("#PaymentEdit_Titlebox")
			var PaymentEdit_TypeButton = $("#PaymentEdit_TypeButton option:selected")
			var PaymentEdit_DoneButton = $("#PaymentEdit_DoneButton")
			var PaymentEdit_PurchasableButton = $("#PaymentEdit_PurchasableButton")
			var PaymentEdit_PhysicalButton = $("#PaymentEdit_PhysicalButton")
			var PaymentEdit_Pricebox = $("#PaymentEdit_Pricebox")
			var PaymentEdit_Iconbox = $("#PaymentEdit_Iconbox")

			var PaymentView_ItemLoader = $("#PaymentView_ItemLoader")

			if(PaymentEdit_Titlebox.val() != "") {
				var data = {}

				if(PaymentEdit_TypeButton.text().toLowerCase() == "others" || PaymentEdit_TypeButton.text().toLowerCase() == "other") {
					data = {
						Titlebox: PaymentEdit_Titlebox.val(),
					 	SlipType: {
					 		"Number": PaymentEdit_TypeButton.val(),
					 		"Text": PaymentEdit_TypeButton.text()
					 	},
					 	isOther: true,
					 	isPurchasable: PaymentEdit_PurchasableButton.is(":checked"),
					 	isPhysical: PaymentEdit_PhysicalButton.is(":checked"),
					 	Price: PaymentEdit_Pricebox.val(),
					 	Icon: PaymentEdit_Iconbox.val()
					}
				}
				else {
					data = {
						Titlebox: PaymentEdit_Titlebox.val(),
					 	SlipType: {
					 		"Number": PaymentEdit_TypeButton.val(),
					 		"Text": PaymentEdit_TypeButton.text()
					 	},
					 	isOther: false,
					 	isPurchasable: true,
					 	isPhysical: true,
					 	Price: 0,
					 	Icon: PaymentEdit_Iconbox.val()
					}
				}

				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Payment/Edit_DoneButton?StoreID=" +id, 
					method: 'POST',
					data: {
						Package: JSON.stringify(data)
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							$("#PaymentView_ItemID"+ data.StoreID).remove()

							var HTML = `

								<div id="PaymentView_ItemID` +data.StoreID+ `" class="d-flex flex-row mr-3 mb-3">
									<div class="d-flex flex-column border rounded mr-1" style="width: 175px; min-height: 125px;">
										<div class="material-icons d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">` +data.StoreIcon+ `</div>
										<div class="d-flex justify-content-center p-2" style="font-size: 12px; font-weight: bold;">` +data.StoreTitle+ `</div>
									</div>
									<div class="d-flex flex-column">
										<button class="form-control material-icons p-1 border mb-1" style="width: 35px; height: 35px; font-size: 15px;" onclick="new Payment().View_EditButton(` +data.StoreID+ `)">edit</button>
										<button class="form-control material-icons p-1 border" style="width: 35px; height: 35px; font-size: 15px;" onclick="new Payment().View_RemoveButton(` +data.StoreID+ `)">delete</button>
									</div>
								</div>

							`
							PaymentView_ItemLoader.append(HTML)
							PaymentEdit_DoneButton.removeClass('hide')
							PaymentEdit_Titlebox.val('')

							$("#Payment_ViewArea").removeClass('hide')
							$("#Payment_EditArea").addClass('hide')
						}
						else {
							alert(data.ErrorDisplay)

							PaymentEdit_DoneButton.removeClass('hide')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		PaymentEdit_DoneButton.removeClass('hide')
					}
				})
			}
			else alert("Error: Title is Empty!")
		}

		this.Edit_BackButton = function() {
			$("#Payment_ViewArea").removeClass('hide')
			$("#Payment_EditArea").addClass('hide')
		}
	}
</script>