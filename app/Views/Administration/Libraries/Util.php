<?php

namespace Modules\Profile\Libraries;

// use App\Controllers\BaseController as BaseController;
class Util
{
    private $CI;
    private $session;

    public function __construct(&$_ci)
    {
        // $this->CI =  new BaseController;
        $this->CI = $_ci;

        $this->session = \Config\Services::session();
    }

    function uploadFile($file)
    {
        $filePath = ''; // Initialize file path variable

        // Check if a file is uploaded
        if ($file) {
            // Check if the file is valid
            if ($file->isValid()) {
                // Move the uploaded file to a directory
                $filePath = 'uploads/profile/image';
                if (!is_dir($filePath)) {
                    mkdir($filePath, 0777, true);
                }
                $newFileName = $file->getRandomName();
                if ($file->move($filePath, $newFileName)) {
                    // File uploaded successfully
                    $filePath .= $newFileName; // Update file path
                } else {
                    // File upload failed
                    log_message('error', 'Failed to upload file.');
                    return false; // Return false to indicate failure
                }
            } else {
                // File is uploaded but it's invalid
                log_message('warning', 'Uploaded file is invalid.');
                // Still allow the form to submit, just set filePath to empty string
            }
        }

        return $filePath; // Return file path if upload is successful
    }



    function generateRandomString($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return trim($randomString);
    }

    function generateRandomNumber($length = 9)
    {
        $characters = '01234567899876543210';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return trim($randomString);
    }

    function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    function toast($success_info_warning_error, $msg)
    {


        $this->session->setFlashdata($success_info_warning_error, $msg);
    }

    public static function validate_email($email)
    {
        $emailIsValid = FALSE;
        if ($email != null && $email != '') {
            $domain = ltrim(stristr($email, '@'), '@') . '.';
            $user = stristr($email, '@', TRUE);
            if (
                ($user != null && $user != '') &&
                ($domain != null && $domain != '') &&
                checkdnsrr($domain)
            ) {
                $emailIsValid = TRUE;
            }
        }
        return $emailIsValid;
    }

    function reArrayFiles(&$file_post)
    {
        if (!isset($file_post['name'])) {
            return array();
        }
        $file_ary = array();
        $file_count = count($file_post['name']);
        if ($file_count <= 0) {
            return array();
        }
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary["file_" . $i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }



    function uploadImages($file_upload_name, $directory = "", $image_name = '')
    {
        $request = \Config\Services::request();
        $data = new \stdClass();
        $data->status = true;

        if ($directory == "") {
            $directory = "uploads";
        }

        $ress = FCPATH . "/" . $directory;
        if (is_dir($ress)) {
            $img = $request->getFile($file_upload_name);
            if ($img) {
                $img = $request->getFile($file_upload_name);
                if ($image_name == '') {
                    $image_name = $img->getRandomName();
                }
                $img->move($directory, $image_name, true);
                if ($img->hasMoved()) {
                    $data->status = true;
                    $data->fileName = $img->getName();
                    $data->fileExt = $img->getClientExtension();
                } else {
                    $data->error = $img->getErrorString();
                }
            } else {
                $data->error = "File was not uploaded";
            }
        } else {
            mkdir($ress, 0777, true);
            return $this->uploadImages($file_upload_name, $directory);
        }
        // }

        log_message("debug", print_r($data, true));
        // $validator->reset();
        return $data;
    }

    function validateDateFormat($dateStr, $format = 'Y-m-d')
    {

        if ($dateStr == '') return false;
        date_default_timezone_set('UTC');
        $date = \DateTime::createFromFormat($format, $dateStr);
        return $date && ($date->format($format) === trim($dateStr));
    }

    function fileType($filename)
    {
        $allowedDocType = array("mp4", "webm", "avi", "mov", "mkv", "pdf");
        $allowedImageType = array("jpg", "png", "jpeg", "gif", "gif");
        $filetypeArray = explode(".", $filename);
        $filetype = end($filetypeArray);;
        foreach ($allowedDocType as $doctype) {
            if ($doctype == $filetype) {
                return 'video';
            }
        }

        foreach ($allowedImageType as $imagetype) {
            if ($imagetype == $filetype) {
                return 'image';
            }
        }
        return '';
    }

    function get_images($directory)
    {
        $files = array_diff(scandir($directory), array('.', '..'));
        $parsed_files = array();
        foreach ($files as $file) {
            $_file = new \stdClass();
            $_file->file = $file;
            $_file->type = $this->fileType($file);
            $parsed_files[] = $_file;
        }

        return $parsed_files;
    }

    function send_mail($subject, $message, $to = "")
    {

        $email = \Config\Services::email();

        $config['protocol'] = 'sendmail';
        $config['mailPath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordWrap'] = true;
        $config['mailType'] = 'html';


        $email->initialize($config);

        $email->setFrom("notification@daydreamdarlings.com.au", 'Notification');

        if ($to !== "") {
            $email->setTo($to);
        } else {
            $email->setTo('info@daydreamdarlings.com.au');
            $email->setBCC('monique@daydreamdarlings.com.au');
            $email->setBCC('mathew@daydreamdarlings.com.au');
            $email->setBCC('testmail@daydreamdarlings.com.au');
        }
        $email->setSubject($subject);
        $email->setMessage($message);


        $email_sent = $email->send();
        log_message("debug", print_r($email->printDebugger(), true));

        return $email_sent;
    }

    function find_in_array($array, $key, $value)
    {
        $return = null;
        if (count($array)) {
            foreach ($array as $item) {
                if ($item->$key == $value) {
                    $return = $item;
                }
            }
        }
        return $return;
    }

    function find_index_in_array($array, $key, $value)
    {
        $return = null;
        if (count($array)) {
            foreach ($array as $index => $item) {
                if (trim($item->$key) === trim($value)) {
                    $return = $index;
                }
            }
        }
        return $return;
    }
}
