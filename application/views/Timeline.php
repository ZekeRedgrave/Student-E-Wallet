<div id="App_TimelineArea" class="d-flex flex-row" style="width:100%; height: 100%">
	<div id="TimelineView_HomeArea" class="d-flex flex-row" style="width: 100%; height: 100%">
		<div class="d-flex justify-content-center pt-5" style="width: 100%; overflow: hidden; overflow-y: scroll;">
			<div class="d-flex flex-column" style="width: 600px">
				<div class="p-0 ml-2" style="color: #7289da; min-width: 125px; font-weight: bold;">NEWS / ANNOUNCEMENT</div>
				<!-- Write Timeline -->
				<div class="d-flex flex-column rounded p-3 mb-4" style="background: #1e2124; width: 100%;">
					<h4 class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Write a post</h4>
					<textarea id="TimelineCreate_Descriptionbox" class="border-0 rounded-0 pl-4 pr-4 pt-2 pb-2" style="background: #1e2124; color: #ffffff; width: 100%; height: 150px; resize: none;" placeholder="Any Announcement, News or Update?"></textarea>
					<!-- Upload Image Display -->
					<div id="TimelineCreate_ImageLoader" class="row mt-1 ml-0 mr-0 mb-0"></div>
					<!-- End of Upload Image Display -->
					<div class="d-flex flex-row mt-1">
						<button onclick="new Timeline().Create_UploadButton()" class="material-icons border-0 rounded" style="background: #333333; color: #7289da; width: 50px; height: 45px;" title="Upload Image">add</button>
						<button onclick="new Timeline().Create_SendButton()" id="TimelineCreate_SendButton" class="material-icons border-0 rounded ml-1" style="background: #333333; color: #7289da; width: 50px; height: 45px;" title="Upload Image">send</button>
						<div style="width: 100%"></div>
						<input id="TimelineCreate_FileUpload" type="file" class="hide" multiple="multiple">
					</div>

					<div class="progress p-0 rounded-0 mt-1" style="background: #1e2124;">
						<div id="TimelineCreate_Progressbar" class="red" style="width: 0%; height: 1px;"></div>
					</div>
				</div>
				<!-- End of Write Timeline -->
				<!-- View Timeline -->
				<div class="p-0 ml-2" style="color: #7289da; min-width: 125px; font-weight: bold;">TIMELINE</div>
				<div id="TimelineView_LoaderArea">
					<h1 class="p-3">No Posting Timeline Yet!</h1>
				</div>
				<!-- End of View Timeline -->
			</div>
		</div>
	</div>
</div>

<!-- Post View Area -->
<div id="TimelineView_PostArea" class="position-fixed d-flex flex-row hide" style="top: 0; bottom: 0; left: 0; right: 0; background: #00000099; width: 100%; height: 100%">
	<!-- Load Image -->
	<div class="d-flex flex-column" style="width: 100%; height: 100%">
		<div id="PostView_ImageLoader" class="" style="width: 100%; height: 100%; overflow-y: hidden;">
			<h4 class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">No Image!</h4>
		</div>
		<div class="d-flex flex-row pt-2 pb-2 pl-4 pr-4" style="width: 100%;">
			<div class="d-flex justify-content-center" style="width: 100%;">
				<div class="d-flex flex-row">
					<a onclick="new Post().View_PreviewButton()" class="material-icons d-flex justify-content-center align-items-center rounded-circle" style="color: #7289da; background: #7289da20; min-width: 50px; max-width: 50px; height: 50px;">keyboard_arrow_left</a>
					<a onclick="new Post().View_BackButton()" class="material-icons d-flex justify-content-center align-items-center rounded-circle ml-1 mr-1" style="background: #7289da20; color: #e91e63; min-width: 50px; max-width: 50px; height: 50px;">close</a>
					<a onclick="new Post().View_ForwardButton()" class="material-icons d-flex justify-content-center align-items-center rounded-circle" style="color: #7289da; background: #7289da20; min-width: 50px; max-width: 50px; height: 50px;">keyboard_arrow_right</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End of Load Image -->
	<!-- Detail Area -->
	<div class="d-flex flex-column" style="background: #282828; min-width: 500px; max-width: 500px; height: 100%; overflow: hidden; overflow-y: scroll;">
		<div class="d-flex flex-row p-3" style="width: 100%;">
			<img id="PostView_HostImage" src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
			<div class="d-flex flex-column ml-3 mr-3" style="width: 100%">
				<h4 id="PostView_HostName" style="color: #7289da; margin: 0; font-size: 14px; font-weight: bold;">XXXXXXX [System Administrator]</h4>
				<h4 id="PostView_DateTime" style="margin: 0; font-size: 12px;">Date and Time : 2020-01-01 00:00:00</h4>

				<div id="PostView_DescriptionLoader" class="mt-3 mb-2" style="font-size: 12px;">
					<span>Add some text here!</span>
				</div>
			</div>
		</div>
		<div class="d-flex flex-column" style="background: #282828; width: 100%; height: 100%;">
			<!-- Write Comment Area -->
			<div class="d-flex flex-row p-2" style="width: 100%">
				<!-- <img id="TimelineView_UserImage" src="http://localhost/Ewallet/avatar.png" class="rounded-circle" width="50px" height="50px"> -->
				<div class="d-flex flex-row ml-2" style="width: 100%">
					<textarea id="CommentCreate_Writebox" class="rounded border-0 pl-2 pr-2" placeholder="Any Comment?" style="background: #333333; color: #ffffff; width: 100%; height: 100px; resize: none;"></textarea>
					<div class="ml-2">
						<button id="CommentCreate_SendButton" onclick="new Comment().Create_SendButton()" class="material-icons rounded border-0" style="background: #333333; color: #7289da; width: 50px; height: 50px;">send</button>
					</div>
				</div>
			</div>
			<!-- End of Write Comment Area -->
			<!-- Comment Loader Area -->
			<div id="PostView_CommentLoader" class="d-flex flex-column" style="background: #1e2124; width: 100%; height: 100%"></div>
			<!-- End of Comment Loader Area -->
		</div>
	</div>
	<!-- End of Detail Area -->
</div>
<!-- End of Post View Area -->

<script type="text/javascript">
	var TimelineCreate_UploadForm = []
	var TimelineView_PagePrevious = 0
	var TimelineView_PageNext = 10

	var PostView_ImageCurrent = 0
	var PostView_ImageLast = 0

	$(document).ready(TimelineLoad())

	function TimelineLoad() {
		var TimelineView_LoaderArea = $("#TimelineView_LoaderArea")

		$.ajax({
			url: window.location.href.replace("/Access", "/Timeline/View_PostLoad"), 
			method: 'POST',
			dataType: 'json',
			success: function(data) {
				if(!data.isError) {
					if(data.TimelineCount != 0) {
						TimelineView_LoaderArea.html('')

						for(var value of data.TimelineArray) {
							if(<?php echo $AccountID; ?> == value.AccountID) TimelineView_LoaderArea.append(`
								<div id="TimelineView_ItemID`+ value.TimelineID +`" class="d-flex flex-row p-3 mb-1" style="background: #1e2124; width: 100%">
									<img id="TimelineView_ImageID`+ value.TimelineID +`" src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
									<div class="d-flex flex-column ml-4 mr-4" style="width: 100%">
										<h4 id="TimelineView_UsernameID`+ value.TimelineID +`" style="color: #7289da; margin: 0; font-size: 18px; font-weight: bold;"></h4>
										<h4 id="TimelineView_DateTimeID`+ value.TimelineID +`" style="margin: 0; font-size: 12px;"></h4>

										<div id="TimelineView_DescriptionID`+ value.TimelineID +`" class="mt-3 mb-3"></div>
										<div id="TimelineView_LoaderID`+ value.TimelineID +`"></div>

										<div class="d-flex flex-row mt-1">	
											<a onclick="new Timeline().View_PostButton(`+ value.TimelineID +`)" class="material-icons mr-4 d-flex align-items-center justify-content-center" style="color: #7289da">comment</a>
											<a onclick="new Timeline().View_DeleteButton(`+ value.TimelineID +`)" class="material-icons mr-1 d-flex align-items-center justify-content-center red-text">delete</a>
										</div>
									</div>
								</div>
							`)
							else TimelineView_LoaderArea.append(`
								<div id="TimelineView_ItemID`+ value.TimelineID +`" class="d-flex flex-row p-3 mb-1" style="background: #1e2124; width: 100%">
									<img id="TimelineView_ImageID`+ value.TimelineID +`" src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
									<div class="d-flex flex-column ml-4 mr-4" style="width: 100%">
										<h4 id="TimelineView_UsernameID`+ value.TimelineID +`" style="color: #7289da; margin: 0; font-size: 18px; font-weight: bold;"></h4>
										<h4 id="TimelineView_DateTimeID`+ value.TimelineID +`" style="margin: 0; font-size: 12px;"></h4>

										<div id="TimelineView_DescriptionID`+ value.TimelineID +`" class="mt-3 mb-3"></div>
										<div id="TimelineView_LoaderID`+ value.TimelineID +`"></div>

										<div class="d-flex flex-row mt-1">	
											<a onclick="new Timeline().View_PostButton(`+ value.TimelineID +`)" class="material-icons mr-4 d-flex align-items-center justify-content-center" style="color: #7289da">comment</a>
										</div>
									</div>
								</div>
							`)
						}
						for(var value of data.TimelineArray) new Timeline().View_ItemLoad(value.TimelineID)
					}
				}
				else alert(!data.ErrorDisplay)
			},
			error: function(ex) {
		 		console.log('Error: ' + JSON.stringify(ex, null, 2))
			}
		})
	}

	function Timeline() {
		this.View_ItemLoad = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Timeline/View_ItemLoad?TimelineID="+id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						var DescriptionTemp = JSON.parse(data.TimelineDescription).Text.split("\n")
						var ImageTemp = JSON.parse(data.TimelineDescription).Image

						$("#TimelineView_ImageID"+ id).attr('src', 'http://localhost/Ewallet/avatar/'+ data.TimelineImage)
						$("#TimelineView_UsernameID"+ id).text(data.TimelineName)
						$("#TimelineView_DateTimeID"+ id).text("Date and Time : "+ data.DateRegister +" "+ data.TimeRegister)

						for(var splitter of JSON.parse(data.TimelineDescription).Text.split("\n")) {
							if(splitter != "") $("#TimelineView_DescriptionID"+ id).append('<div style="word-break: break-all;">'+ splitter +'</div>')
							else $("#TimelineView_DescriptionID"+ id).append('<br />')
						}

						if(JSON.parse(data.TimelineDescription).Image.length != 0) for(var image of JSON.parse(data.TimelineDescription).Image) {
							$("#TimelineView_LoaderID"+ id).append('<img class="rounded mb-1" src="'+ window.location.href.replace("/index.php/Access", "/storage/")+ image +'" width="100%">')
						}
						
					}	
					else new Timeline().View_ItemLoad(id)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		// new Timeline().View_ItemLoad(id)
				}
			})
		}

		this.View_PostButton = function(id) {
			var TimelineView_PostArea = $("#TimelineView_PostArea")

			var PostView_ImageLoader = $("#PostView_ImageLoader")
			var PostView_HostName = $("#PostView_HostName")
			var PostView_HostImage = $("#PostView_HostImage")
			var PostView_DateTime = $("#PostView_DateTime")
			var PostView_DescriptionLoader = $("#PostView_DescriptionLoader")

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Timeline/View_PostButton?TimelineID=" +id, 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						TimelineView_PostArea.removeClass('hide')

						PostView_DescriptionLoader.html('')
						PostView_ImageLoader.html('')

						PostView_HostName.text(data.PostHostname)
						PostView_HostImage.attr('src', window.location.href.replace("/index.php/Access", "")+ "/avatar/" +data.PostHostimage)
						PostView_DateTime.text("Date and Time : "+ data.PostDT)

						for(var splitter of data.PostText.split("\n")) {
							if(splitter != "") PostView_DescriptionLoader.append('<div style="word-break: break-all;">'+ splitter +'</div>')
							else PostView_DescriptionLoader.append('<br />')
						}

						if(data.PostImage.length != 0) {
							data.PostImage.forEach(function(element, index) {
								PostView_ImageLoader.append('<div id="PostView_HostImageID' +index+ '" class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%"><img src="' +window.location.href.replace("/index.php/Access", "/storage/"+ data.PostImage[index])+ '" width="100%" /></div>')
							})

							PostView_ImageLast = data.PostImage.length
						}
						else PostView_ImageLoader.html('<h4 class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">No Image!</h4>')

						$("#CommentCreate_SendButton").attr('onclick', 'new Comment().Create_SendButton(' +data.PostID+ ')')

						new Post().View_CommentLoad(data.PostID)
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Error: Unexpected Error Occur!\n Please Try Again!")
				}
			})
		}

		this.View_DeleteButton = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Timeline/View_DeleteButton?TimelineID="+id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						$("#TimelineView_ItemID"+ id).remove() 
						$("#StoreView_ItemID"+ id).remove() 
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Error: Unexpected Error Occur\nPlease Try Again!")
				}
			})
		}

		this.Create_UploadButton = function() {
			var TimelineCreate_FileUpload = $("#TimelineCreate_FileUpload")
			var TimelineCreate_Progressbar = $("#TimelineCreate_Progressbar")
			var TimelineCreate_ImageLoader = $("#TimelineCreate_ImageLoader")
			var TimelineCreate_SendButton = $("#TimelineCreate_SendButton")
			var UploadForm = new FormData()

			TimelineCreate_FileUpload.click().change(function(event) {
				if(TimelineCreate_FileUpload.prop("files").length != 0) {
					TimelineCreate_FileUpload.prop("files").forEach(function(element, index) {
						UploadForm.append('TimelineImage[]', TimelineCreate_FileUpload.prop("files")[index])
					})

					TimelineCreate_SendButton.addClass('hide')
					TimelineCreate_FileUpload.val('')

					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/Timeline/Create_UploadButton", 
						method: 'POST',
						data: UploadForm,
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								TimelineCreate_ImageLoader.html('')
								TimelineCreate_SendButton.removeClass('hide')
								TimelineCreate_Progressbar.removeClass('green').addClass('red').css('width', '0%')

								TimelineCreate_UploadForm = data.TimelineImage

								data.TimelineImage.forEach(function(element, index) {
									var HTML = `<div id="TimelineCreate_ImageID`+ index +`" class="d-flex justify-content-end border rounded mr-1 mb-1" style="background: center no-repeat url('http://localhost/ewallet/storage/`+ data.TimelineImage[index] +`'); background-size: 50px 50px; width: 50px; height: 50px;">
											<button onclick="new Timeline().TimelineCreate_DeleteButton(`+ index +`)" class="material-icons form-control border-0 m-0 p-0 rounded-circle mt-1 mr-1 red" title="Delete Button" style="width: 18px; color: white; height: 18px; font-size: 12px; font-weight: bold">delete</button>
										</div>`

									TimelineCreate_ImageLoader.append(HTML)
								})

								for(var key of UploadForm.keys()) UploadForm.delete(key)

								console.log(data)
							}
							else {
								alert(data.ErrorDisplay)

								TimelineCreate_SendButton.removeClass('hide')
								TimelineCreate_Progressbar.removeClass('green').addClass('red').css('width', '0%')

								for(var key of UploadForm.keys()) UploadForm.delete(key)
							}
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))

					 		TimelineCreate_SendButton.removeClass('hide')
						},
						beforeSend: function() {
							
						},
						xhr: function() {
							var xhr = new XMLHttpRequest()
					
							xhr.upload.addEventListener("progress", function(e){
								if(e.lengthComputable) {
									var current = e.loaded
									var total = e.total
									var progressBar = parseInt((current / total) * 100)

									console.log(progressBar)
					
									if(progressBar == 100) TimelineCreate_Progressbar.removeClass('red').addClass('green').css('width', '100%')
									else TimelineCreate_Progressbar.removeClass('green').addClass('red').css('width', progressBar+ '%') 
								}
							}, false)
					
							return xhr
						},
						contentType: false,
						cache: false,
						processData: false
					})
				}
				else {
					for(var key of UploadForm.keys()) UploadForm.delete(key)

					TimelineCreate_ImageLoader.html('')

					TimelineCreate_UploadForm = []
				}
			})
		}

		this.TimelineCreate_DeleteButton = function(i) {
			TimelineCreate_UploadForm[i] = ""

			$("#TimelineCreate_ImageID"+ i).remove()
		}

		this.Create_SendButton = function() {
			var TimelineCreate_Descriptionbox = $("#TimelineCreate_Descriptionbox")
			var TimelineCreate_SendButton = $("#TimelineCreate_SendButton")
			var TimelineCreate_ImageLoader = $("#TimelineCreate_ImageLoader")
			var TimelineView_LoaderArea = $("#TimelineView_LoaderArea")

			if(TimelineCreate_Descriptionbox.val() != "") {
				TimelineCreate_SendButton.addClass('hide')

				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Timeline/Create_SendButton", 
					method: 'POST',
					data: {
						Package: JSON.stringify({
								TimelineDescription: TimelineCreate_Descriptionbox.val(),
								TimelineImage: TimelineCreate_UploadForm
						})
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							TimelineCreate_SendButton.removeClass('hide')
							TimelineCreate_ImageLoader.html('')
							TimelineCreate_Descriptionbox.val('')

							TimelineLoad()

							TimelineCreate_UploadForm = []
						}
						else {
							alert(data.ErrorDisplay)

							TimelineCreate_SendButton.removeClass('hide')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		TimelineCreate_SendButton.removeClass('hide')
					}
				})
			}
			else alert("Error: Postbox is Empty!")
		}
	}

	function Post() {
		this.View_CommentLoad = function(id) {
			var PostView_CommentLoader = $("#PostView_CommentLoader")

			PostView_CommentLoader.html('')

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Timeline/View_CommentLoad?TimelineID="+ id,
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError){
						if(data.CommentArray.length != 0) {
							for(var x of data.CommentArray) PostView_CommentLoader.append( `
								<div id="CommentView_ItemID` +x.CommentID+ `" class="d-flex flex-row p-3" style="width: 100%;">
									<img id="CommentView_ImageID` +x.CommentID+ `" src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
									<div class="d-flex flex-column ml-3 mr-3" style="width: 100%">
										<div class="d-flex flex-row" style="width: 100%">
											<h4 id="CommentView_NameID` +x.CommentID+ `" style="color: #7289da; width: 100%; margin: 0; font-size: 14px; font-weight: bold;">Zeke S. Redgrave [System Administrator]</h4>
											<a id="CommentView_DeleteButtonID` +x.CommentID+ `" onclick="new Comment().View_DeleteButton(` +x.CommentID+ `)" class="material-icons red-text ml-2">delete</a>
										</div>

										<div id="CommentView_LoaderID` +x.CommentID+ `" class="mt-3 mb-3"></div>
									</div>
								</div>
							`)

							for(var x of data.CommentArray) new Comment().View_ItemLoad(x.CommentID)
						}
						else PostView_CommentLoader.append('<h4 class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">No Comment Yet!</h4>')
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		// new Post().View_CommentLoad(id)
				}
			})
		}

		this.View_BackButton = function() {
			$("#TimelineView_PostArea").addClass('hide')
			$("#TimelineView_HomeArea").removeClass('hide')
		}

		this.View_PreviewButton = function() {
			PostView_ImageCurrent -= 1 
			if(PostView_ImageCurrent == -1) PostView_ImageCurrent = PostView_ImageLast - 1
			

			$("#PostView_HostImageID"+ PostView_ImageCurrent)[0].scrollIntoView({
			    behavior: "smooth",
				block: "start"
			})
		}

		this.View_ForwardButton = function() {
			PostView_ImageCurrent += 1
			if(PostView_ImageCurrent == PostView_ImageLast) PostView_ImageCurrent = 0

			$("#PostView_HostImageID"+ PostView_ImageCurrent)[0].scrollIntoView({
			    behavior: "smooth", // or "auto" or "instant"
				block: "start" // or "end"
			})
		}
	}

	function Comment() {
		this.View_ItemLoad = function(id) {
			var CommentView_ItemID = $("#CommentView_ItemID"+ id)
			var CommentView_NameID = $("#CommentView_NameID"+ id)
			var CommentView_ImageID = $("#CommentView_ImageID"+ id)
			var CommentView_MentionButtonID = $("#CommentView_MentionButtonID"+ id)
			var CommentView_DeleteButtonID = $("#CommentView_DeleteButtonID"+ id)

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Comment/View_ItemLoad?CommentID=" +id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						for(var splitter of data.CommentText.split("\n")) {
							if(splitter != "") {
								var HTML = ''

								for(var space of splitter.split(" ")) {
									if(space.split('@').length == 2) {
										if(<?php echo $AccountID; ?> == space.split('#')[0].split("@")[1]) CommentView_ItemID.addClass('blue').css('color', 'white');
									}

									HTML += "<span class='mr-1'>" +space+ "</span>"
								}
								

								$("#CommentView_LoaderID"+ id).append('<div style="font-size: 12px; word-break: break-all;">'+ HTML +'</div>') 
							}
							else $("#CommentView_LoaderID"+ id).append('<br />')
						}

						CommentView_NameID.text(data.CommentMention + data.CommentName)
						CommentView_ImageID.attr('src', window.location.href.replace("/index.php/Access", "")+ "/avatar/"+ data.CommetImage)
						CommentView_MentionButtonID.attr('onclick', "new Comment().View_MentionButton('"+ data.CommentMention +"')")
						CommentView_DeleteButtonID.attr('onclick', 'new Comment().View_DeleteButton('+ data.CommentID +')')

					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		new Comment().View_ItemLoad(id)
				}
			})
		}

		this.View_MentionButton = function(id) {
			$("#CommentCreate_Writebox").append(id)
		}

		this.View_DeleteButton = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Comment/View_DeleteButton?CommentID="+ id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) $("#CommentView_ItemID"+ id).remove()
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Error: Unexpected Error Occur\nPlease Try Again!")
				}
			})
		}

		this.Create_SendButton = function(id) {
			var CommentCreate_Writebox = $("#CommentCreate_Writebox")
			var PostView_CommentLoader = $("#PostView_CommentLoader")

			if(CommentCreate_Writebox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Comment/Create_SendButton?TimelineID=" +id,
					method: 'POST',
					data: {
				 		CommentDescription:CommentCreate_Writebox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							CommentCreate_Writebox.val('')

							new Timeline().View_PostButton(id)
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))
					}
				})
			}
			else alert("Error: Commentbox is empty!")
		}

		this.Create_ReplyButton = function(id) {

		}
	}
</script>