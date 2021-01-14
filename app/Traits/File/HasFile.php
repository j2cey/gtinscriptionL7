<?php

namespace App\Traits\File;

use Illuminate\Http\Request;

trait HasFile
{
    /**
     * @param Request $request
     * @param $fieldname_rqst
     * @param $fieldname_db
     * @param string $directory
     * @param string $oldimage
     * @return string|null
     */
    public function verifyAndStoreFile( Request $request, $fieldname_rqst, $fieldname_db, $directory = 'unknown', $oldimage = ' ' ) {

        if( $request->hasFile( $fieldname_rqst ) ) {

            if (!$request->file($fieldname_rqst)->isValid()) {

                flash('Fichier Invalide!')->error()->important();

                return null;//redirect()->back()->withInput();
            }

            $file_dir = config('app.' . $directory);

            // Check if the old image exists inside folder
            if (file_exists( $file_dir . '/' . $oldimage)) {
                unlink($file_dir . '/' . $oldimage);
            }

            // Set image name
            $file = $request->file($fieldname_rqst);//$request->image;
            $file_name = md5($directory . '_' . time()) . '.' . $file->getClientOriginalExtension();

            // Move image to folder
            $file->move($file_dir, $file_name);

            $this->update([$fieldname_db => $file_name]);

            return 1;
        }

        return -1;
    }
}
