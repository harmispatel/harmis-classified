<?php

namespace App\Traits;

trait imageRemoveTrait {

    /**
     * remove image from sotage
     * @return $this|false|string
     */
    // public function removeoldmage($path,$imgname) {
    //     $oldimage_path = public_path().$path.'/'.$imgname;
    //     if (file_exists($oldimage_path)) {
    //         unlink($oldimage_path);
    //     }
    //     return null;
    // }

    /**
     * remove multi image from sotage
     */
    // public function removeMultiImage($path,$file)
    // {
    //     $images = explode(' ,',$file);
    //     foreach ($images as $img) {
    //         $oldimage_path = public_path().'/'. $path .'/'.$img;
    //         if (file_exists($oldimage_path)) {
    //             unlink($oldimage_path);
    //         }
    //     }
    //     return null;
    // }


     /**
     * add/remove single image from sotage.
     * @return $this|false|string
     */
    public function addSingleImage($path,$file,$oldImage = null)
    {
        // remove Single image
        if ($oldImage != '') {
            $oldimage_path = public_path().'/'.$path.'/'.$oldImage;
            if (file_exists($oldimage_path)) {
                unlink($oldimage_path);
            }
        }

        // add Single image
        if ($file != '') {
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            return $filename;
        }
        return null;
    }


     /**
     * add/remove Multi image from sotage.
     * @return $this|false|string
     */
    public function addMultiImage($path,$files,$oldImage = null)
    {
        // remove multi image.
        if ($oldImage != '') {
            $images = explode(' ,', $oldImage);
            foreach ($images as $img) {
                $oldimage_path = public_path().'/'. $path .'/'.$img;
                if (file_exists($oldimage_path)) {
                    unlink($oldimage_path);
                }
            }
        }

        // add multi image.
        if ($files != '') {
            foreach ($files as $file) {
                $multiImage = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path($path), $multiImage);
                $imgData[] = $multiImage;
            }
            $multiImage = implode(" ,", $imgData);

            return $multiImage;
        }
        return null;
    }

}
