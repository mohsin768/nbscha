<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function imageOnFly($location,$filename,$width='auto',$height='auto',$thumbloaction='thumb',$masterdim='width'){

    $thisCI =& get_instance();
    $thisCI->load->library('image_lib');
    if($location !='' && $filename != ''){
        $url = $location.'/'.$filename;
        $thumbFullLocation = $location.'/'.$thumbloaction;
        $thumb_url = $thumbFullLocation.'/'.$filename;
        $rotate_url = $thumbFullLocation.'/rotate_'.$filename;
        if (!is_dir($thumbFullLocation)) {
            mkdir($thumbFullLocation, 0755, TRUE);
        }
        if(!is_file($thumb_url) )
        {
            $config['source_image'] = $url;
            $rotate = false;
            $exif = exif_read_data($config['source_image']);
            if($exif && isset($exif['Orientation']))
            {
                $ort = $exif['Orientation'];
                if ($ort == 6 || $ort == 5){
                    $rotate = true;
                    $config['rotation_angle'] = '270';
                }
                if ($ort == 3 || $ort == 4){
                    $rotate = true;
                    $config['rotation_angle'] = '180';
                }
                if ($ort == 8 || $ort == 7){
                    $rotate = true;
                    $config['rotation_angle'] = '90';
                }
            }
            if($rotate){
                $config['new_image'] = $rotate_url;
                $thisCI->image_lib->initialize($config);
                $rotateStat = $thisCI->image_lib->rotate();
                $thisCI->image_lib->clear();
                $config['source_image'] = $rotate_url;
            }
            $config['new_image'] = $thumb_url;
            if($width!='auto'){
                $config['width'] = $width;
            }
            if($height!='auto'){
                $config['height'] = $height;
            }
            $config['master_dim'] = $masterdim;
            $thisCI->image_lib->initialize($config);
            $reszieStat = $thisCI->image_lib->resize();
            if($reszieStat){
                return base_url($thumb_url);
            } else {
                return base_url($url);
            }
        } else {
            return base_url($thumb_url);
        }
    } else {
        return '';
    }

}
function imageCropOnFly($location,$filename,$width,$height,$thumbloaction='thumb',$placeHolder = ''){
    if($placeHolder==''){
        $placeHolder = '';
    }
    $thisCI =& get_instance();
    $thisCI->load->library('image_lib');
    if($location !='' && $filename != ''){
        $url = $location.'/'.$filename;
        $thumbFullLocation = $location.'/'.$thumbloaction;
        $thumb_url = $thumbFullLocation.'/'.$filename;
        $rotate_url = $thumbFullLocation.'/rotate_'.$filename;
        $resize_url = $thumbFullLocation.'/resize_'.$filename;
        if (!is_dir($thumbFullLocation)) {
            mkdir($thumbFullLocation, 0755, TRUE);
        }
        if(!file_exists($url)){
            return base_url($placeHolder);
        } else {
            if(!is_file($thumb_url) )
            {
                list($source_width,$source_height) = getimagesize($url);
                $masterdim= 'auto';
                if(isset($source_width) && isset($source_height))
                {
                $dim = (intval($source_width) / intval($source_height)) - ($width / $height);
                $masterdim = ($dim > 0)? "height" : "width";
                }
                $config['source_image'] = $url;
                $rotate = false;
                $exif = exif_read_data($config['source_image']);
                if($exif && isset($exif['Orientation']))
                {
                    $ort = $exif['Orientation'];
                    if ($ort == 6 || $ort == 5){
                        $rotate = true;
                        $config['rotation_angle'] = '270';
                    }
                    if ($ort == 3 || $ort == 4){
                        $rotate = true;
                        $config['rotation_angle'] = '180';
                    }
                    if ($ort == 8 || $ort == 7){
                        $rotate = true;
                        $config['rotation_angle'] = '90';
                    }
                }
                if($rotate){
                    $config['new_image'] = $rotate_url;
                    $thisCI->image_lib->initialize($config);
                    $rotateStat = $thisCI->image_lib->rotate();
                    $thisCI->image_lib->clear();
                    $config['source_image'] = $rotate_url;
                }
                $config['new_image'] = $resize_url;
                $config['width'] = $width;
                $config['height'] = $height;
                $config['master_dim'] = $masterdim;
                $config['maintain_ratio'] = TRUE;
                $thisCI->image_lib->initialize($config);
                $reszieStat = $thisCI->image_lib->resize();
                $thisCI->image_lib->clear();
                if($reszieStat){
                $config = array();
                $config['source_image'] = $resize_url;
                $config['new_image'] = $thumb_url;
                $config['width'] = $width;
                $config['height'] = $height;
                $config['maintain_ratio'] = FALSE;
                list($resized_width,$resized_height) = getimagesize($resize_url);
                if(isset($resized_width) && isset($resized_height))
                {
                if($resized_width>$width){
                    $config['x_axis'] = ($resized_width-$width)/2;

                }
                }
                $thisCI->image_lib->initialize($config);
                $thumbStat = $thisCI->image_lib->crop();
                if(file_exists($resize_url)){
                unlink($resize_url);
                }
                }
                if($thumbStat){
                    return base_url($thumb_url);
                } else {
                    return base_url($url);
                }
            } else {
                return base_url($thumb_url);
            }
        }    
    } else {
        return '';
    }

}
