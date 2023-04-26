<?php

class Popup {

    public function create() {
        global $SITEURL;
        global $GSADMIN;
        $date = $_POST['popupdata'];
        $content = $_POST['post-content'];
        $checkbox = $_POST['popup-checkbox'];
        $nameFile = $_POST['name'];
        $title = $_POST['title'];
        $datePicker = $_POST['datePicker'];
        $showagain = $_POST['showagain'];

        $popup = array();
        $popup['settings'] = [];
        array_push($popup['settings'], array('date' => $date, 'checkbox' => $checkbox, 'title' => $title, 'datePicker' => $datePicker, 'showAgain'=>$showagain));

        $jsonMake = json_encode($popup, true);

        file_put_contents(GSPLUGINPATH . 'popup_plugin/popuplist/' . $nameFile . '.txt', $content);
        file_put_contents(GSPLUGINPATH . 'popup_plugin/popuplist/' . $nameFile . '.json', $jsonMake);

        echo '<script>window.location.replace("' . $SITEURL . $GSADMIN . '/load.php?id=popup_plugin&edit=' . $nameFile . '");</script>';
    }

    public function del() {
        global $SITEURL;
        global $GSADMIN;
        unlink(GSPLUGINPATH . 'popup_plugin/popuplist/' . $_GET['delete'] . '.json');
        unlink(GSPLUGINPATH . 'popup_plugin/popuplist/' . $_GET['delete'] . '.txt');
        echo '<script>window.location.replace("' . $SITEURL . $GSADMIN . '/load.php?id=popup_plugin");</script>';
    }
};