<style>
	.popnone {
		display: none;
	}

	.successPopup {
		width: 90%;
		margin: 0 auto;
		padding: 15px;
		background: green;
		border-radius: 5px;
		display: none;
	}

	.successPopupShow {
		display: block !important;
	}

	#editform {
		border: solid 1px #ddd;
		background: #fafafa;
		padding: 10px;
		box-sizing: border-box;
	}

	.date-picker {
		width: 100%;
		padding: 10px;
		background: #fff;
		display: block;
		box-sizing: border-box;
		border: solid 1px #ddd;
	}

	.this-date {
		width: 100%;
		padding: 10px;
		margin-top: 10px;
		border: solid 1px #ddd;
		box-sizing: border-box;
		border: solid 1px #ddd;
	}

	.popup-title {
		width: 100%;
		padding: 10px;
		box-sizing: border-box;
		margin-bottom: 10px;
		border: solid 1px #ddd;
	}

	.btn {
		padding: 0.4rem 0.5rem;
		background: #000;
		display: inline-block;
		color: #fff !important;
		text-decoration: none !important;
		margin-bottom: 10px;
	}
</style>

<a href="<?php echo $SITEURL . $GSADMIN . '/load.php?id=popup_plugin' ?>" class="btn"><?php echo i18n_r('popup_plugin/LANG_Back'); ?></a>

<form class="largeform" id="editform" action="#" method="post" accept-charset="utf-8">

	<h3><?php echo i18n_r('popup_plugin/LANG_Popup_Creator'); ?></h3>
	
	<label style="margin-bottom:10px; padding:0;"><?php echo i18n_r('popup_plugin/LANG_Popup_Name'); ?></label>
	<input type="text" placeholder="<?php echo i18n_r('popup_plugin/LANG_Without_Spaces'); ?>" name="name" class="popup-title" style="padding:10px;" required pattern="[a-zA-Z0-9]+" <?php if (isset($_GET['edit'])) { echo 'value="'.$_GET['edit'].'" '; };?> >

 	<label style="margin-bottom:10px; padding:0;"><?php echo i18n_r('popup_plugin/LANG_Popup_Title'); ?></label>
 	<input type="text" placeholder="<?php echo i18n_r('popup_plugin/LANG_Your_Title'); ?>" name="title" class="popup-title" 
	<?php if (isset($_GET['edit'])) { echo 'value="' . $Json['settings'][0]['title'] . '"'; };?> >

 	<div class="popuperContenter" style="width:100%;">

 		<label style="margin-bottom:5px; padding:0;"><?php echo i18n_r('popup_plugin/LANG_Popup_Expiration'); ?> </label>

 		<select class="date-picker" name="datePicker">
 			<option value="owndate"><?php echo i18n_r('popup_plugin/LANG_Custom_Date'); ?></option>
 			<option value="7days"><?php echo i18n_r('popup_plugin/LANG_7_Days'); ?></option>
 			<option value="1month"><?php echo i18n_r('popup_plugin/LANG_1_Month'); ?></option>
 			<option value="1year"><?php echo i18n_r('popup_plugin/LANG_1_Year'); ?></option>
 		</select>

 		<?php if (isset($_GET['edit'])) { echo '<script>document.querySelector(".date-picker").value = "' . $Json['settings'][0]['datePicker'] . '"</script>'; }; ?>

		<input name="popupdata" class="this-date" type="input" 
			<?php if(isset($_GET['edit'])){
				echo 'value="'.$Json['settings'][0]['date'].'" ';
			};?>
		>

 		<label style="margin-bottom:5px;padding:0;margin-top:10px;"><?php echo i18n_r('popup_plugin/LANG_Show_again'); ?></label>

 		<select name="showagain" style="width: 100%; padding: 10px; background: #fff; display: block; box-sizing: border-box; border: solid 1px #ddd;">

 			<option value="yes" <?php
									if (isset($_GET['edit'])) {
										echo ($Json['settings'][0]['showAgain'] == 'yes' ? "selected" : "");
									}; ?>><?php echo i18n_r('popup_plugin/LANG_Yes'); ?></option>
 			<option value="no" <?php
								if (isset($_GET['edit'])) {
									echo ($Json['settings'][0]['showAgain'] == 'no' ? "selected" : "");
								}; ?>><?php echo i18n_r('popup_plugin/LANG_No'); ?></option>

 		</select>
 		<br><br>
 		<label style="margin-bottom:10px;padding:0;"><?php echo i18n_r('popup_plugin/LANG_Popup_Content'); ?></label>
 		<textarea id="post-content" name="post-content">
			<?php
				if (isset($_GET['edit'])) {
					echo file_get_contents(GSPLUGINPATH . 'popup_plugin/popuplist/' . $_GET['edit'] . '.txt');
				}
			?>
		</textarea>

 		<script>
 			let date = new Date();

 			if (document.querySelector('.date-picker').value == "7days") {
 				date = new Date();
 				date.setDate(date.getDate() + 7);
 				console.log(date);
 				document.querySelector('.this-date').value = date;
 			}

 			if (document.querySelector('.date-picker').value == "1month") {
 				date = new Date();
 				date.setDate(date.getDate() + 30);
 				console.log(date);
 				document.querySelector('.this-date').value = date;
 			}

 			if (document.querySelector('.date-picker').value == "1year") {
 				date = new Date();
 				date.setDate(date.getDate() + 365);
 				console.log(date);
 				document.querySelector('.this-date').value = date;
 			}

 			document.querySelector('.date-picker').addEventListener('change', () => {

 				if (document.querySelector('.date-picker').value == "7days") {
 					date = new Date();
 					date.setDate(date.getDate() + 7);
 					console.log(date);
 					document.querySelector('.this-date').value = date;
 				}

 				if (document.querySelector('.date-picker').value == "1month") {
 					date = new Date();
 					date.setDate(date.getDate() + 30);
 					console.log(date);
 					document.querySelector('.this-date').value = date;
 				}

 				if (document.querySelector('.date-picker').value == "1year") {
 					date = new Date();
 					date.setDate(date.getDate() + 365);
 					console.log(date);
 					document.querySelector('.this-date').value = date;
 				}
 			});
 		</script>

 	</div>

 	<br>

 	<input type="submit" class="submitPopup" name="submitPopup" style="margin:15px 0;padding:10px 15px; text-transform:uppercase; background:#006600; border:none; color:#fff; letter-spacing:1px;" value="<?php echo i18n_r('popup_plugin/LANG_Save'); ?>">

</form>

<div class="successPopup">
	<p style="color:#fff; text-align:center; padding:0; margin:0;"><?php echo i18n_r('popup_plugin/LANG_Updated'); ?></p>
</div>

<script type="text/javascript" src="template/js/ckeditor/ckeditor.js?t=3.3.15"></script>
<script type="text/javascript">
	CKEDITOR.timestamp = '3.3.15';
	var editor = CKEDITOR.replace('post-content', {
		skin: 'getsimple',
		forcePasteAsPlainText: true,
		entities: false,
		// uiColor : '#FFFFFF',
		height: '250px',
		baseHref: '<?php echo $SITEURL;?>',
		tabSpaces: 10,
		filebrowserBrowseUrl: 'filebrowser.php?type=all',
		filebrowserImageBrowseUrl: 'filebrowser.php?type=images',
		filebrowserWindowWidth: '730',
		filebrowserWindowHeight: '500',
		toolbar: 'advanced'
	});

	CKEDITOR.instances["post-content"].on("instanceReady", InstanceReadyEvent);

	function InstanceReadyEvent(ev) {
 		_this = this;
 		this.document.on("keyup", function() {
 			$('#editform #post-content').trigger('change');
 			_this.resetDirty();
 		});

 		this.timer = setInterval(function() {
 			trackChanges(_this)
 		}, 500);
 	}

 	/**
 	 * keep track of changes for editor
 	 * until cke 4.2 is released with onchange event
 	 */
 	function trackChanges(editor) {
 		// console.log('check changes');
 		if (editor.checkDirty()) {
 			$('#editform #post-content').trigger('change');
 			editor.resetDirty();
 		}
 	};
</script>