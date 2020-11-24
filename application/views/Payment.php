<div id="App_PaymentArea" class="d-flex flex-column hide" style="width:100%; height: 100%">
	<div style="width: 100%; height: 100%;">
		<!-- Payment Area -->
		<div class="d-flex flex-row" style="width: 100%; height: 100%">
			<div class="d-flex flex-column p-3" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
				<!-- View Area -->
				<div id="Payment_ViewArea" class="d-flex flex-column" style="width: 100%; height: 100%">
					<!-- View Payment Area -->
					<div>
						<div class="mb-1 ml-2" style="color: #7289da; font-weight: bold;">STORE ITEM</div>

						<div id="PaymentView_ItemLoader" class="row pl-3 pr-3">
							<?php

								if($isStoreEmpty == true) echo '<div id="PaymentView_ItemDisplay" class="d-flex align-items-center justify-content-center mt-5 mb-5" style="min-width: 100px; height: 100%"><h4>Nope! No Item Added Here.</h4></div>';
								else {
									foreach ($Store as $value) {
										if($value['StoreIcon'] != "") echo '<div id="PaymentView_ItemID' .$value['StoreID']. '" class="d-flex flex-row mr-3 mb-3">
												<div class="d-flex flex-column rounded mr-1" style="width: 175px; min-height: 125px; background: #333333">
													<div class="material-icons d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">' .$value['StoreIcon']. '</div>
													<div class="d-flex justify-content-center p-2" style="font-size: 12px; font-weight: bold;">' .$value['StoreTitle']. '</div>
												</div>
												<div class="d-flex flex-column">
													<button class="material-icons border-0 rounded p-0 mb-1" onclick="new Payment().View_EditButton(' .$value['StoreID']. ')" style="width: 35px; height: 35px; font-size: 15px; background: #333333; color: #7289da;" onclick="">edit</button>
													<button class="material-icons border-0 rounded p-0 border" style="width: 35px; height: 35px; font-size: 15px; background: #333333; color: #e91e63;" onclick="new Payment().View_RemoveButton(' .$value['StoreID']. ')">delete</button>
												</div>
											</div>';
										else echo '<div id="PaymentView_ItemID' .$value['StoreID']. '" class="d-flex flex-row mr-3 mb-3">
												<div class="d-flex flex-column rounded mr-1" style="width: 175px; min-height: 125px; background: #333333">
													<div class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">Not Icon Yet!</div>
													<div class="d-flex justify-content-center p-2" style="font-size: 12px; font-weight: bold;">' .$value['StoreTitle']. '</div>
												</div>
												<div class="d-flex flex-column">
													<button class="material-icons border-0 rounded p-0 mb-1" onclick="new Payment().View_EditButton(' .$value['StoreID']. ')" style="width: 35px; height: 35px; font-size: 15px; background: #333333; color: #7289da;" onclick="">edit</button>
													<button class="material-icons border-0 rounded p-0 border" style="width: 35px; height: 35px; font-size: 15px; background: #333333; color: #e91e63;" onclick="new Payment().View_RemoveButton(' .$value['StoreID']. ')">delete</button>
												</div>
											</div>';
									}
								}

							?>
						</div>
					</div>
					<!-- End of View Payment Area -->
					<!-- Create Payment Area -->
					<div class="d-flex flex-column mt-5">
						<div class="ml-2 mb-4" style="color: #7289da; font-weight: bold;">CREATE PAYMENT INFO</div>
						<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Name</h6>
						<input id="PaymentCreate_Titlebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" placeholder="e.g. Tuition Fee, Old Account .....">

						<div class="d-flex flex-row mt-4 mb-4" style="width: 100%">
							<div class="mr-2" style="width: 400px;">
								<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Payment Slip Type</h6>
								<select id="PaymentCreate_TypeButton" onchange="new Payment().Create_TypeButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%; height: 40px;">
									<?php
									
										foreach (json_decode($SlipType) as $value) echo '<option value="' .$value->StoreType_ID. '">' .$value->StoreType_Name. '</option>';

									?>
								</select>
							</div>
							<div class="ml-1" style="width: 100%">
								<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Write if Others (Optional)</h6>
								<div class="d-flex flex-row">
									<input id="PaymentCreate_Otherbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" placeholder="e.g. Donation, Party, ......">
								</div>
							</div>
						</div>

						<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Icon(Optional) <a href="https://material.io/resources/icons/?icon=local_grocery_store&style=baseline" style="color: #7289da">Click me to get all "List of Icon" Name from Material IO</a></h6>
						<input id="PaymentCreate_Iconbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff;" placeholder="(Optional)">
						<!-- Purchasable Area -->
						<h6 class="ml-2 mb-1 mt-4" style="margin: 0; font-size: 12px; font-weight: bold;">Set Price</h6>
						<input id="PaymentCreate_Pricebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff;" type="number" placeholder="P XXXX.XX">
						<!-- End of Purchasable Area -->

						<!-- Set if the item is Physical like Clothes, Tickets, and etc... -->
						<div class="d-flex flex-row align-items-center ml-2 mt-4 mb-2">
							<input id="PaymentCreate_PhysicalButton" class="form-check" type="checkbox" name="" checked="checked">
							<div class="ml-4">Is Physical Item?</div>
						</div>

						<button id="PaymentCreate_DoneButton" onclick="new Payment().Create_DoneButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4" style="background: #333333; color: #7289da; width: 150px; font-weight: bold;">DISPLAY</button>
					</div>
					<!-- End of Create Payment Area -->
				</div>
				<!-- End of View Area -->
				<!-- Edit Area -->
				<div id="Payment_EditArea" class="d-flex flex-column hide" style="width: 100%; height: 100%">
					<div id="PaymentEdit_StoreID" class="d-flex align-items-center ml-2 mb-5" style="color: #7289da; width: 100%; font-weight: bold; ">STORE ID: #0123456789</div>

					<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Name</h6>
					<input id="PaymentEdit_Titlebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" placeholder="e.g. Tuition Fee, Old Account .....">

					<div class="d-flex flex-row mt-4 mb-4" style="width: 100%">
						<div class="mr-2">
							<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Payment Slip Type</h6>
							<select id="PaymentEdit_TypeButton" onchange="new Payment().Edit_TypeButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 300px; height: 40px;">
								<?php
									
									foreach (json_decode($SlipType) as $value) echo '<option value="' .$value->StoreType_ID. '">' .$value->StoreType_Name. '</option>';

								?>
							</select>
						</div>
						<div class="ml-1" style="width: 100%">
							<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Write if Others (Optional)</h6>
							<div class="d-flex flex-row">
								<input id="PaymentEdit_Otherbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" placeholder="e.g. Donation, Party, ......">
							</div>
						</div>
					</div>

					<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Icon(Optional) <a href="https://material.io/resources/icons/?icon=local_grocery_store&style=baseline" style="color: #7289da">Click me to get all List of Icon Name from Material IO</a></h6>
					<input id="PaymentEdit_Iconbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff;" placeholder="(Optional)">
					<!-- Purchasable Area -->
					<h6 class="ml-2 mb-1 mt-4" style="margin: 0; font-size: 12px; font-weight: bold;">Set Price</h6>
					<input id="PaymentEdit_Pricebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff;" type="number" placeholder="P XXXX.XX">
					<!-- End of Purchasable Area -->
					<!-- Set if the item is Physical like Clothes, Tickets, and etc... -->
					<div class="d-flex flex-row align-items-center ml-2 mt-4 mb-2">
						<input id="PaymentEdit_PhysicalButton" class="form-check" type="checkbox" name="" checked="checked">
						<div class="ml-4">is Physical Item?</div>
					</div>

					<div class="d-flex flex-row">
						<button id="PaymentEdit_DoneButton" onclick="new Payment().Edit_DoneButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mr-1" style="background: #333333; color: #7289da; width: 150px; font-weight: bold;">DISPLAY</button>
						<button id="PaymentEdit_BackButton" onclick="new Payment().Edit_BackButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #e91e63; width: 150px; font-weight: bold;">BACK</button>
					</div>

				</div>
				<!-- End of Edit Area -->
			</div>
			
			<div class="border-left hide" style="width: 500px; height: 100%;">
				<div class="pt-2 pb-2 pl-4 pr-4" style="background: #1e2124; color: #7289da; font-weight: bold;">HISTORY</div>
				<div class="hideScrollbar pb-5" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
					<?php

						if($isStoreEmpty == true) echo '<div class="d-flex align-items-center justify-content-center" style="min-width: 100px; height: 100%"><h4>Empty!</h4></div>';
						else {
							$changeColor = '';

							foreach ($Store as $value) {
								if($changeColor == '') $changeColor = '#36393e';
								else $changeColor = '';
								echo '<div class="d-flex flex-row pt-2 pb-2 pl-3 pr-3" style="background: ' .$changeColor. ';width: 100%; height: 69px">
									<img src="http://localhost/Ewallet/avatar/' .$value['Image']. '" class="rounded-circle" width="50px" height="50px">
									<div class="ml-3">
										<div style="font-size: 12px; font-weight: bold">' .$value['Name']. ' -> Added a new Payment Item "' . $value['StoreTitle']. '"</div>
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
						$("#PaymentEdit_StoreID").text("STORE ID: "+ data.StoreID)
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

		this.Create_DoneButton = function() {
			$(document).ready(function() {
				var PaymentCreate_Titlebox = $("#PaymentCreate_Titlebox")
				var PaymentCreate_TypeButton = $("#PaymentCreate_TypeButton option:selected")
				var PaymentCreate_DoneButton = $("#PaymentCreate_DoneButton")
				var PaymentCreate_PhysicalButton = $("#PaymentCreate_PhysicalButton")
				var PaymentCreate_Pricebox = $("#PaymentCreate_Pricebox")
				var PaymentCreate_Iconbox = $("#PaymentCreate_Iconbox")

				var PaymentView_ItemLoader = $("#PaymentView_ItemLoader")
				var PaymentView_ItemDisplay = $("#PaymentView_ItemDisplay")

				var PaymentCreate_Otherbox = $("#PaymentCreate_Otherbox")

				if(PaymentCreate_Titlebox.val() != "" && PaymentCreate_Pricebox.val() != "") {
					var data = {}

					PaymentCreate_DoneButton.attr('disabled', 'disabled')

					if(PaymentCreate_TypeButton.text().toLowerCase() == "others" || PaymentCreate_TypeButton.text().toLowerCase() == "other") {
						data = {
							Titlebox: PaymentCreate_Titlebox.val(),
						 	SlipType: {
						 		"Number": PaymentCreate_TypeButton.val(),
						 		"Text": PaymentCreate_TypeButton.text()
						 	},
						 	isOther: true,
						 	Otherbox: PaymentCreate_Otherbox.val(),
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
						 	Otherbox: PaymentCreate_Otherbox.val(),
						 	isPhysical: PaymentCreate_PhysicalButton.is(":checked"),
						 	Price: PaymentCreate_Pricebox.val(),
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
								if(data.StoreIcon != "") var HTML = `
									<div id="PaymentView_ItemID` +data.StoreID+ `" class="d-flex flex-row mr-3 mb-3">
										<div class="d-flex flex-column rounded mr-1" style="width: 175px; min-height: 125px; background: #333333">
											<div class="material-icons d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">` +data.StoreIcon+ `</div>
											<div class="d-flex justify-content-center p-2" style="font-size: 12px; font-weight: bold;">` +data.StoreTitle+ `</div>
										</div>
										<div class="d-flex flex-column">
											<button class="material-icons border-0 rounded p-0 mb-1" style="width: 35px; height: 35px; font-size: 15px; background: #333333; color: #7289da;" onclick="new Payment().View_EditButton(` +data.StoreID+ `)">edit</button>
											<button class="material-icons border-0 rounded p-0 mb-1" style="width: 35px; height: 35px; font-size: 15px; background: #333333; color: #e91e63;" onclick="new Payment().View_RemoveButton(` +data.StoreID+ `)">delete</button>
										</div>
									</div>
								`
								else var HTML = `
									<div id="PaymentView_ItemID` +data.StoreID+ `" class="d-flex flex-row mr-3 mb-3">
										<div class="d-flex flex-column rounded mr-1" style="width: 175px; min-height: 125px; background: #333333">
											<div class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">No Icon Yet!</div>
											<div class="d-flex justify-content-center p-2" style="font-size: 12px; font-weight: bold;">` +data.StoreTitle+ `</div>
										</div>
										<div class="d-flex flex-column">
											<button class="material-icons border-0 rounded p-0 mb-1" style="width: 35px; height: 35px; font-size: 15px; background: #333333; color: #7289da;" onclick="new Payment().View_EditButton(` +data.StoreID+ `)">edit</button>
											<button class="material-icons border-0 rounded p-0 mb-1" style="width: 35px; height: 35px; font-size: 15px; background: #333333; color: #e91e63;" onclick="new Payment().View_RemoveButton(` +data.StoreID+ `)">delete</button>
										</div>
									</div>
								`
								PaymentView_ItemLoader.append(HTML)
								PaymentView_ItemDisplay.addClass('hide')
								PaymentCreate_Titlebox.val('')
								PaymentCreate_Otherbox.val('')
								PaymentCreate_Pricebox.val('')
								PaymentCreate_DoneButton.removeAttr('disabled')
							}
							else {
								alert(data.ErrorDisplay)

								PaymentCreate_DoneButton.removeAttr('disabled')
							}
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))

					 		PaymentCreate_DoneButton.removeAttr('disabled')
						}
					})
				}
				else {
					var ErrorDisplay = ''

					if(PaymentCreate_Titlebox.val() == "") ErrorDisplay += "(Name) "
					if(PaymentCreate_Pricebox.val() == "") ErrorDisplay += "(Price) "

					alert(ErrorDisplay + "is Empty!")

					ErrorDisplay = ''
				}
			})
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

			var PaymentEdit_Otherbox = $("#PaymentEdit_Otherbox")

			if(PaymentEdit_Titlebox.val() != "" && PaymentEdit_Pricebox.val() != "") {
				var data = {}

				PaymentEdit_DoneButton.attr('disabled', 'disabled')

				if(PaymentEdit_TypeButton.text().toLowerCase() == "others" || PaymentEdit_TypeButton.text().toLowerCase() == "other") {
					data = {
						Titlebox: PaymentEdit_Titlebox.val(),
					 	SlipType: {
					 		"Number": PaymentEdit_TypeButton.val(),
					 		"Text": PaymentEdit_TypeButton.text()
					 	},
					 	isOther: true,
					 	Otherbox: PaymentEdit_Pricebox.val(),
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
					 	Otherbox: PaymentEdit_Pricebox.val(),
					 	isPhysical: PaymentEdit_PhysicalButton.is(":checked"),
					 	Price: PaymentEdit_Pricebox.val(),
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

							if(data.StoreIcon != "") var HTML = `
								<div id="PaymentView_ItemID` +data.StoreID+ `" class="d-flex flex-row mr-3 mb-3">
									<div class="d-flex flex-column rounded mr-1" style="width: 175px; min-height: 125px; background: #333333">
										<div class="material-icons d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">` +data.StoreIcon+ `</div>
										<div class="d-flex justify-content-center p-2" style="font-size: 12px; font-weight: bold;">` +data.StoreTitle+ `</div>
									</div>
									<div class="d-flex flex-column">
										<button class="material-icons border-0 rounded p-0 mb-1" style="width: 35px; height: 35px; font-size: 15px; background: #333333; color: #7289da;" onclick="new Payment().View_EditButton(` +data.StoreID+ `)">edit</button>
										<button class="material-icons border-0 rounded p-0 mb-1" style="width: 35px; height: 35px; font-size: 15px; background: #333333; color: #e91e63;" onclick="new Payment().View_RemoveButton(` +data.StoreID+ `)">delete</button>
									</div>
								</div>
							`
							else var HTML = `
								<div id="PaymentView_ItemID` +data.StoreID+ `" class="d-flex flex-row mr-3 mb-3">
									<div class="d-flex flex-column rounded mr-1" style="width: 175px; min-height: 125px; background: #333333">
										<div class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">No Icon Yet!</div>
										<div class="d-flex justify-content-center p-2" style="font-size: 12px; font-weight: bold;">` +data.StoreTitle+ `</div>
									</div>
									<div class="d-flex flex-column">
										<button class="material-icons border-0 rounded p-0 mb-1" style="width: 35px; height: 35px; font-size: 15px; background: #333333; color: #7289da;" onclick="new Payment().View_EditButton(` +data.StoreID+ `)">edit</button>
										<button class="material-icons border-0 rounded p-0 mb-1" style="width: 35px; height: 35px; font-size: 15px; background: #333333; color: #e91e63;" onclick="new Payment().View_RemoveButton(` +data.StoreID+ `)">delete</button>
									</div>
								</div>
							`

							PaymentView_ItemLoader.append(HTML)
							PaymentEdit_DoneButton.removeAttr('disabled')
							PaymentEdit_Titlebox.val('')
							PaymentEdit_Otherbox.val('')
							PaymentEdit_Pricebox.val('')

							$("#Payment_ViewArea").removeClass('hide')
							$("#Payment_EditArea").addClass('hide')
						}
						else {
							alert(data.ErrorDisplay)

							PaymentEdit_DoneButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		PaymentEdit_DoneButton.removeAttr('disabled')
					}
				})
			}
			else {
				var ErrorDisplay = ''

				if(PaymentEdit_Titlebox.val() == "") ErrorDisplay += '(Name) '
				if(PaymentEdit_Pricebox.val() == "") ErrorDisplay += '(Price) '

				alert(ErrorDisplay+ "is Empty!")
			}
		}

		this.Edit_BackButton = function() {
			$("#Payment_ViewArea").removeClass('hide')
			$("#Payment_EditArea").addClass('hide')
		}
	}
</script>