<?php

/*
  -------------------------------------------------------------------------
  Credits: Bit Repository, modified by Amarjeet Singh Rai
  URL: http://www.bitrepository.com/web-programming/php/download-image.html
  -------------------------------------------------------------------------
 */

class GetImage {

    var $source;
    var $save_to;
    var $filename;

    function download() {
        $info = @GetImageSize($this->source);
        $save_to = $this->save_to . $this->filename . '.jpg';
        $save_image = $this->LoadImageCURL($save_to);

        return $save_image;
    }

    function LoadImageCURL($save_to) {
        $ch = curl_init($this->source);
        $fp = fopen($save_to, "wb");

        // set URL and other appropriate options
        $options = array(CURLOPT_FILE => $fp,
            CURLOPT_HEADER => 0,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_TIMEOUT => 60); // 1 minute timeout (should be enough)

        curl_setopt_array($ch, $options);

        $save = curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        return $save;
    }

}

?>