

<?php

class Backups extends CI_Controller {

    public function backupDb(){
        $this->load->dbutil();
        $db_name = 'backup-db-'.$this->db->database.'-on'.date("Y-m-d-H-i-s").'.sql';

        $prefs = array(
            'format' => 'zip',
            'filename' => $db_name,
            'add_insert' => TRUE,
            'foreign_key_checks' => FALSE,

        );

        $backup = $this->dbutil->backup($prefs);
        $save = 'pathtobkfolder'.$db_name;

        $this->load->helper('file');
        write_file($save,$backup);
        $this->load->helper('download');
        force_download($db_name, $backup);



    }
}
