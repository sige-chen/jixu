<?php
return array(
    'uploads' => array(
        'course-video' => array(
            'file' => 'video',
            'path' => 'course-videos',
            'exts' => ['mp4'],
            'require' => true,
        ),
        'course-video-thumbnail' => array(
            'path' => 'course-video-thumbnails',
            'ext' => 'png',
        ),
        'course-book-online' => array(
            'file' => 'file',
            'path' => 'course-book-online',
            'exts' => ['pdf'],
            'require' => true,
        ),
    ),
);