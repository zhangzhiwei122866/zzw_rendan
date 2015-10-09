<?php
/**
     * 数据库备份与恢复
     * @author hjq
     * @version 2013-5-30
 */
class BakAction extends Action {
    public function bak() {
        $DataDir = "../databak/";
        if (!empty($_GET['Action'])) {
            import("@.ORG.MySQLReback");
            $config = array(
                'host' => C('DB_HOST'),
                'port' => C('DB_PORT'),
                'userName' => C('DB_USER'),
                'userPassword' => C('DB_PWD'),
                'dbprefix' => C('DB_PREFIX'),
                'charset' => 'UTF8',
                'path' => $DataDir,
                'isCompress' => 0, //是否开启gzip压缩
                'isDownload' => 0  
            );
            
            $mr = new MySQLReback($config);
            $mr->setDBName(C('DB_NAME'));
            if ($_GET['Action'] == 'backup') {
                $mr->backup();                
                $this->success( '数据库备份成功！');
            } else if ($_GET['Action'] == 'RL') {
                $mr->recover($_GET['File']);                
                $this->success( '数据库还原成功！');
            } else if ($_GET['Action'] == 'Del') {
                if (@unlink($DataDir . $_GET['File'])) {
                    $this->success('删除成功！');
                } else {                    
                    $this->error('删除失败！');
                }
            }
            if ($_GET['Action'] == 'dow') {
                function DownloadFile($fileName) {
                    ob_end_clean();
                    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Length: ' . filesize($fileName));
                    header('Content-Disposition: attachment; filename=' . basename($fileName));
                    readfile($fileName);
                }
                DownloadFile($DataDir . $_GET['file']);
                exit();
            }
        }
        
        $this->display();
    }
}