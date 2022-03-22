
//resource link: https://www.allphptricks.com/demo/2018/april/create-zip-file-using-php/
public function ZipCreateAndMultipleFileDownload($files){ 

       $filearrayconvert = explode(",", $files);
       //$filearray = array("word.pdf","textfile.txt",); demo
        $zip = new ZipArchive();
        $zip_name = "WebApp_DocMS_".date("d_m_y h-i-sa").".zip"; // Zip name
        $zip->open($zip_name,  ZipArchive::CREATE);
        foreach ($filearrayconvert as $file) {
         $path = public_path('DocMS/'.$file);
        if(file_exists($path)){
        $zip->addFromString(basename($path),  file_get_contents($path));  
        }
        else{
        echo"file does not exist";
        }
        }
        $zip->close();

        return response()->download($zip_name);

    }
