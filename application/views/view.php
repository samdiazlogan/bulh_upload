<?php
date_default_timezone_set("Asia/Kolkata");
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>View Files</title>
        <style>
            body{
                margin: 0;
                padding: 0;
            }
            .wrapper{
                width: 1000px;
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <h2>Uploaded Files</h2>
            <table border="1" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>File Name</th>
                        <th>File Type</th>
                        <th>Uploaded On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $targetDir = FCPATH . "uploads";
                        $dir=$targetDir;
                        $slno=0;
                        if (is_dir($dir)){
                            if ($dh = opendir($dir)){
                                while (($file = readdir($dh)) !== false){
                                    $filetype=filetype($dir.$file);
                                    if($filetype=='file'){
                                        $slno++;
                                        $time=filemtime($dir.$file);
                    ?>
                    <tr>
                        <td align="center"><?php echo $slno; ?></td>
                        <td align="center"><a href="<?php echo $dir.$file; ?>"><?php echo $file; ?></a></td>
                        <td align="center"><?php echo mime_content_type($dir.$file); ?></td>
                        <td align="center"><?php echo date('d-m-Y H:i:s',$time); ?></td>
                    </tr>
                    <?php  
                                    }
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>