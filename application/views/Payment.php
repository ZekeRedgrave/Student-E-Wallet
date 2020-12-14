<div id="App_PaymentArea" class="d-flex flex-column hide" style="width:100%; height: 100%">
	<div style="width: 100%; height: 100%;">
		<!-- Payment Area -->
		<div class="d-flex flex-row companyLabel" style="width: 100%; height: 100%">
			<div class="d-flex flex-column" style="min-width: 500px; max-width: 500px;">
				<div class="d-flex flex-row pt-2 pb-2 pl-4 pr-4 shadow-sm" style="width: 100%">
					<div class="d-flex align-items-center" style="width: 100%; font-weight: bold;">PAYMENT LIST <span id="PaymentView_ItemLength">(99)</span></div>
					<button onclick="new Payment().View_RefreshButton()" class="material-icons p-2 rounded" style="min-width: 50px; max-width: 50px; height: 40px;">refresh</button>
				</div>
				<!-- View Payment Area -->
				<div id="PaymentView_ItemLoader" class="" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
					<!-- <div class="d-flex flex-row pt-3 pb-3 pl-4 pr-4 border-bottom button-hover" style="width: 100%">
						<div class="material-icons d-flex align-items-center">block</div>
						<div class="ml-4" style="width: 100%">
							<div class="" style="font-weight: bold;">Title</div>
							<div style="margin-top: -5px; font-size: 12px;">Payment Type</div>
						</div>
						<div class="d-flex align-items-center">
							<div class="d-flex flex-row">
								<button class="material-icons p-2 rounded">edit</button>
								<button class="material-icons p-2 ml-1 rounded red">delete</button>
							</div>
						</div>
					</div> -->
					<h2 class="d-flex justify-content-center align-items-center p-0 m-0" style="width: 100%; height: 100%;">Empty!</h2>
				</div>
				<!-- End of View Payment Area -->
			</div>
			<div class="d-flex flex-column" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
				<!-- View Area -->
				<div id="Payment_ViewArea" class="d-flex flex-column" style="width: 100%; height: 100%">
					<!-- Create Payment Area -->
					<div class="d-flex flex-column">
						<div class="pt-3 pb-3 pl-4 pr-4 shadow-sm" style="font-weight: bold;">CREATE PAYMENT INFO</div>
						
						<div class="p-3">
							<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Name</h6>
							<input id="PaymentCreate_Titlebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" style="width: 100%" placeholder="e.g. Tuition Fee, Old Account .....">

							<div class="d-flex flex-row mt-4 mb-4" style="width: 100%">
								<div class="mr-2" style="width: 400px;">
									<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Payment Slip Type</h6>
									<select id="PaymentCreate_TypeButton" onchange="new Payment().Create_TypeButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" style="color: #555555 !important; width: 100%; height: 40px;"></select>
								</div>
								<div class="ml-1" style="width: 100%">
									<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Write if Others (Optional)</h6>
									<div class="d-flex flex-row">
										<input id="PaymentCreate_Otherbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" style="width: 100%" placeholder="e.g. Donation, Party, ......">
									</div>
								</div>
							</div>

							<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Icon(Optional) <a href="https://material.io/resources/icons/?icon=local_grocery_store&style=baseline" style="color: #7289da">Click me to get all "List of Icon" Name from Material IO</a></h6>
							<input id="PaymentCreate_Iconbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" placeholder="(Optional)">
							<!-- Purchasable Area -->
							<h6 class="ml-2 mb-1 mt-4" style="margin: 0; font-size: 12px; font-weight: bold;">Set Price</h6>
							<input id="PaymentCreate_Pricebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" type="number" placeholder="P XXXX.XX">
							<!-- End of Purchasable Area -->

							<!-- Set if the item is Physical like Clothes, Tickets, and etc... -->
							<div class="d-flex flex-row align-items-center ml-2 mt-4 mb-2" style="width: 250px;">
								<input id="PaymentCreate_PhysicalButton" class="form-check" type="checkbox" name="" checked="checked" style="width: 50px;">
								<div class="ml-4" style="width: 100%">Is Physical Item?</div>
							</div>

							<button id="PaymentCreate_DoneButton" onclick="new Payment().Create_DoneButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4 companyBackground" style="width: 150px; font-weight: bold;">DISPLAY</button>
						</div>
					</div>
					<!-- End of Create Payment Area -->
				</div>
				<!-- End of View Area -->
				<!-- Edit Area -->
				<div id="Payment_EditArea" class="d-flex flex-column hide" style="width: 100%; height: 100%">
					<div class="d-flex flex-row pt-3 pb-3 pl-4 pr-4 shadow-sm" style="font-weight: bold;">
						<div style="width: 100%">EDIT PAYMENT INFO</div>
						<div id="PaymentEdit_StoreID" class="d-flex justify-content-end" style="width: 100%; color: #375692; font-weight: bold; ">STORE ID: #0123456789</div>
					</div>

					<div class="p-3">
						<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Name</h6>
						<input id="PaymentEdit_Titlebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" style="width: 100% width: 100%" placeholder="e.g. Tuition Fee, Old Account .....">

						<div class="d-flex flex-row mt-4 mb-4" style="width: 100%">
							<div class="mr-2">
								<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Payment Slip Type</h6>
								<select id="PaymentEdit_TypeButton" onchange="new Payment().Edit_TypeButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" style="width: 300px; height: 40px;"></select>
							</div>
							<div class="ml-1" style="width: 100%">
								<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Write if Others (Optional)</h6>
								<div class="d-flex flex-row">
									<input id="PaymentEdit_Otherbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" style="width: 100%" placeholder="e.g. Donation, Party, ......">
								</div>
							</div>
						</div>

						<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Icon(Optional) <a href="https://material.io/resources/icons/?icon=local_grocery_store&style=baseline" style="color: #7289da">Click me to get all List of Icon Name from Material IO</a></h6>
						<input id="PaymentEdit_Iconbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" placeholder="(Optional)">
						<!-- Purchasable Area -->
						<h6 class="ml-2 mb-1 mt-4" style="margin: 0; font-size: 12px; font-weight: bold;">Set Price</h6>
						<input id="PaymentEdit_Pricebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" type="number" placeholder="P XXXX.XX">
						<!-- End of Purchasable Area -->
						<!-- Set if the item is Physical like Clothes, Tickets, and etc... -->
						<div class="d-flex flex-row align-items-center ml-2 mt-4 mb-2">
							<input id="PaymentEdit_PhysicalButton" class="form-check" type="checkbox" name="" checked="checked" style="width: 50px;">
							<div class="ml-4">is Physical Item?</div>
						</div>

						<div class="d-flex flex-row">
							<button id="PaymentEdit_DoneButton" onclick="new Payment().Edit_DoneButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mr-1 companyBackground" style="width: 150px; font-weight: bold;">DISPLAY</button>
							<button id="PaymentEdit_BackButton" onclick="new Payment().Edit_BackButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 red" style="width: 150px; font-weight: bold;">BACK</button>
						</div>
					</div>

				</div>
				<!-- End of Edit Area -->
			</div>
		</div>
		<!-- End of Payment Area -->
	</div>
</div>

<script type="text/javascript">
	new Payment().View_ItemLoader()

	function Payment() {
		this.View_ItemLoader = function() {
			var PaymentView_ItemLoader = $("#PaymentView_ItemLoader")
			var PaymentView_ItemLength = $("#PaymentView_ItemLength")
			var PaymentCreate_TypeButton = $("#PaymentCreate_TypeButton")
			var PaymentEdit_TypeButton = $("#PaymentEdit_TypeButton")

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Payment/View_ItemLoader", 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						if(!data.isEmpty) {
							PaymentView_ItemLoader.html("")
						
							for(var x in data.PaymentArray) {
								if(data.PaymentArray[x].StoreIcon == "") PaymentView_ItemLoader.append(`
									<div id="PaymentView_ItemID` +data.PaymentArray[x].StoreID+ `" class="d-flex flex-row pt-3 pb-3 pl-4 pr-4 border-bottom button-hover" style="width: 100%">
										<div class="material-icons d-flex align-items-center">block</div>
										<div class="ml-4" style="width: 100%">
											<div class="" style="font-weight: bold;">` +data.PaymentArray[x].StoreTitle+ `</div>
											<div style="margin-top: -5px; font-size: 12px;">` +data.PaymentArray[x].StoreType+ `</div>
										</div>
										<div class="d-flex align-items-center">
											<div class="d-flex flex-row">
												<button id="PaymentView_EditButtonID` +data.PaymentArray[x].StoreID+ `" onclick="new Payment().View_EditButton(` +data.PaymentArray[x].StoreID+ `)" class="material-icons p-2 rounded" title="Edit Button">edit</button>
												<button id="PaymentView_RemoveButtonID` +data.PaymentArray[x].StoreID+ `" onclick="new Payment().View_RemoveButton(` +data.PaymentArray[x].StoreID+ `)" class="material-icons p-2 ml-1 rounded red" title="Delete Button">delete</button>
											</div>
										</div>
									</div>
								`)
								else PaymentView_ItemLoader.append(`
									<div id="PaymentView_ItemID` +data.PaymentArray[x].StoreID+ `" class="d-flex flex-row pt-3 pb-3 pl-4 pr-4 border-bottom button-hover" style="width: 100%">
										<div class="material-icons d-flex align-items-center">` +data.PaymentArray[x].StoreIcon+ `</div>
										<div class="ml-4" style="width: 100%">
											<div class="" style="font-weight: bold;">` +data.PaymentArray[x].StoreTitle+ `</div>
											<div style="margin-top: -5px; font-size: 12px;">` +data.PaymentArray[x].StoreType+ `</div>
										</div>
										<div class="d-flex align-items-center">
											<div class="d-flex flex-row">
												<button id="PaymentView_EditButtonID` +data.PaymentArray[x].StoreID+ `" onclick="new Payment().View_EditButton(` +data.PaymentArray[x].StoreID+ `)" class="material-icons p-2 rounded" title="Edit Button">edit</button>
												<button id="PaymentView_RemoveButtonID` +data.PaymentArray[x].StoreID+ `" onclick="new Payment().View_RemoveButton(` +data.PaymentArray[x].StoreID+ `)" class="material-icons p-2 ml-1 rounded red" title="Delete Button">delete</button>
											</div>
										</div>
									</div>
								`)

								$("#PaymentView_EditButtonID" +data.PaymentArray[x].StoreID).tooltip()
								$("#PaymentView_RemoveButtonID" +data.PaymentArray[x].StoreID).tooltip()
							}

							PaymentView_ItemLength.text('(' +data.PaymentArray.length+ ')')
						}
						else {
							PaymentView_ItemLoader.html('<h2 class="d-flex justify-content-center align-items-center p-0 m-0" style="width: 100%; height: 100%;">Empty!</h2>')
							PaymentView_ItemLength.text('(0)')
						}

						PaymentCreate_TypeButton.html('')
						PaymentEdit_TypeButton.html('')

						if(data.Payment_TypeArray.length != 0) {
							var ID = 0
							var Name = ""

							for(var x in data.Payment_TypeArray) {
								var temp = data.Payment_TypeArray[x].StoreType_Name.toLowerCase()

								if(temp == "others" || temp == "other") {
									ID = data.Payment_TypeArray[x].StoreType_ID
									Name = data.Payment_TypeArray[x].StoreType_Name
								}
								else {
									PaymentCreate_TypeButton.append('<option value="' +data.Payment_TypeArray[x].StoreType_ID+ '">' +data.Payment_TypeArray[x].StoreType_Name+ '</option>')
									PaymentEdit_TypeButton.append('<option value="' +data.Payment_TypeArray[x].StoreType_ID+ '">' +data.Payment_TypeArray[x].StoreType_Name+ '</option>')
								}
							}

							PaymentCreate_TypeButton.append('<option value="' +ID+ '">' +Name+ '</option>')
							PaymentEdit_TypeButton.append('<option value="' +ID+ '">' +Name+ '</option>')
						}
						else {
							PaymentCreate_TypeButton.append('<option value="0">Others</option>')
							PaymentEdit_TypeButton.append('<option value="0">Others</option>')
						}
					}
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this.View_EditButton = function(id) {
			var PaymentEdit_PhysicalButton = $("#PaymentEdit_PhysicalButton")
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
						$('#PaymentEdit_TypeButton').val(data.StoreType)

						if(data.isPhysical) PaymentEdit_PhysicalButton.attr('checked', data.isPhysical)
						else PaymentEdit_PhysicalButton.removeAttr('checked')

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

		this.View_RefreshButton = function() {
			new Payment().View_ItemLoader()
		}

		this.View_RemoveButton = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Payment/View_RemoveButton?StoreID=" +id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						$("#PaymentView_ItemID"+ id).remove()

						new Payment().View_ItemLoader()
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
								new Payment().View_ItemLoader()

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
					 	Otherbox: PaymentEdit_Otherbox.val(),
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
					 	Otherbox: PaymentEdit_Otherbox.val(),
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
							new Payment().View_ItemLoader()

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