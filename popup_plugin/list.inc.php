<style>
    .list-item {
        display: grid;
        grid-template-columns: 200px 1fr 120px;
        width: 100%;
        background: #fafafa;
        box-sizing: border-box;
        border: solid 1px #ddd;
        padding: 5px;
    }

    .carList {
        width: 100%;
        box-sizing: border-box;
        margin: 0 !important;
        padding: 0 !important;
    }

    .btn {
        padding: 0.4rem 0.5rem;
        background: #000;
        display: inline-block;
        color: #fff !important;
        text-decoration: none !important;
    }

    .btn-list {
        margin-bottom: 10px;
    }
</style>

<h3>Popup List 🎈</h3>

<div class=" btn-list ">
    <a href="<?php echo $SITEURL . $GSADMIN . '/load.php?id=popup_plugin&addnew'; ?>" class="btn btn-add"><?php echo i18n_r('popup_plugin/LANG_Add_New'); ?></a>
</div>

<ul class="col-md-12 carList">

    <li class="list-item">
        <div class="title">
            <b><?php echo i18n_r('popup_plugin/LANG_Name'); ?> </b>
        </div>
        <div class="shortcode" style="text-align:center;">
            <b><?php echo i18n_r('popup_plugin/LANG_Shortcode'); ?> </b>
        </div>
        <div class="list-btn" style="text-align:center;">
            <b><?php echo i18n_r('popup_plugin/LANG_Manage'); ?> </b>
        </div>
    </li>

    <?php

    foreach (glob(GSPLUGINPATH . 'popup_plugin/popuplist/*.json') as $item) {
        $name = pathinfo($item)['filename'];

        echo '
		<li class="list-item">
			<div class="title">
				<b>' . $name . '</b>
			</div>
			<div class="shortcode">
				<p style="text-align:center;"> <b>'.i18n_r('popup_plugin/LANG_Editor').':</b> <span style="font-size:small; color:green;">[% popup=' . $name . ' %] </span><br> <b>'.i18n_r('popup_plugin/LANG_Template').':</b> <span style="font-size:small; color:blue;">&#60;?php showPopup("' . $name . '");?&#62;</span></p>
			</div>

			<div class="list-btn" style="text-align:center;">
				<a href="' . $SITEURL . $GSADMIN . '/load.php?id=popup_plugin&edit=' . $name . '" class="btn btn-edit" style="background:orange;">'.i18n_r('popup_plugin/LANG_Edit').'</a>
				<a href="' . $SITEURL . $GSADMIN . '/load.php?id=popup_plugin&delete=' . $name . '" onclick="return confirm(`'.i18n_r('popup_plugin/LANG_Are_you_sure').'`);"  class="btn btn-del" style="background:red;"> ✕ </a>
			</div>
		</li>';
    }; ?>

</ul>