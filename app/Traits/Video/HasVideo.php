<?php

namespace App\Traits\Video;

use Illuminate\Http\Request;
use Owenoj\LaravelGetId3\GetId3;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

trait HasVideo
{
    public function getVideoDuration($full_video_path)
    {
        $getID3 = new \getID3;
        $file = $getID3->analyze($full_video_path);
        //dd("getArtwork: ", $file->getArtwork(true), "file: ", $file);
        $playtime_seconds = $file['playtime_seconds'];
        $duration = date('H:i:s.v', $playtime_seconds);

        return $duration;
    }

    public function setVideoDuration($fieldname_db,$videodirectory,$videofullname) {
        $full_video_path = config('app.' . $videodirectory) . '/' . $videofullname;
        $this->update([
            $fieldname_db => $this->getVideoDuration($full_video_path),
        ]);
    }

    public function setVideoParameters(Request $request,$directory, $fieldname_rqst, $filename, $duration_field, $artwork_field) {
        //instantiate class with file
        $track = new GetId3( request()->file($fieldname_rqst) );

        $file_dir = config('app.' . $directory);

        $parameters_data = [];
        $parameters_data[$duration_field] = $track->getPlaytime();

        dd($track, $track->getPlaytime(), $track->getArtwork(true));

        dd($track->getPlaytime(), $track->getArtwork(true));

        //Optionally you can pass can pass `true` to the method to get a jpeg version. This will return an UploadedFile instance
        $file_artwork = $track->getArtwork(true);
        if ($file_artwork) {
            $file_artwork_name = explode($filename,'.')[0] . '.' . $file_artwork->getClientOriginalExtension();
            // Move image to folder
            $file_artwork_name->move($file_dir, $file_artwork_name);

            $parameters_data[$artwork_field] = $file_artwork_name;
        }

        $this->update($parameters_data);
    }

    public function setVideoParameters_old_1($directory, $filename, $duration_field, $artwork_field) {

        //dd($fieldname_field, $this->{$fieldname_field});
        $file_dir = config('app.' . $directory);
        $artwork_filname = explode($filename,'.')[0] . '.' . '.jpg';

        $ffmpeg = FFMpeg::create();
        $video = $ffmpeg->open($file_dir . $filename);
        dd($video);
        $video
            ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))
            ->save($artwork_filname);

        $parameters_data = [];
        $parameters_data[$artwork_field] = $artwork_filname;
        //$parameters_data[$duration_field] = $track->getPlaytime();

        $this->update($parameters_data);
    }

    public function setVideoParameters_old(Request $request,$directory,$fieldname_rqst, $duration_field, $artwork_field) {

        //$file = $request->file($fieldname_rqst);
        $file_name = md5($directory . '_' . time()) . '.' . $request->{$fieldname_rqst}->getClientOriginalExtension();
        $request->{$fieldname_rqst}->storeAs('fichiersvideos', $file_name);

        dd($request->{$fieldname_rqst});
        $file_dir = config('app.' . $directory);
        $artwork_filname = explode($filename,'.')[0] . '.' . '.jpg';

        FFMpeg::fromDisk('fichiersvideos')
            ->open($filename)
            ->getFrameFromSeconds(10)
            ->export()
            ->toDisk($file_dir)
            ->save($artwork_filname);

        $parameters_data = [];
        $parameters_data[$artwork_field] = $artwork_filname;
        //$parameters_data[$duration_field] = $track->getPlaytime();

        $this->update($parameters_data);
    }
}
