<?php
return array(
    'uploads' => array(
        'course-thumbnail' => array(
            'file' => 'file',
            'path' => 'course-thumbnails',
            'exts' => ['png','jpg'],
            'require' => true,
        ),
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
        'course-book-attachment' => array(
            'file' => 'file',
            'path' => 'course-book-attachments',
            'exts' => ['pdf','doc','zip'],
            'require' => true,
        ),
        'advertisement-image' => array(
            'file' => 'file',
            'path' => 'advertisement-images',
            'exts' => ['png','jpg'],
            'require' => true,
        ),
        'article-thumbnail' => array(
            'file' => 'file',
            'path' => 'article-thumbnails',
            'exts' => ['png','jpg'],
            'require' => true,
        ),
        'partner-logo' => array(
            'file' => 'file',
            'path' => 'partner-logos',
            'exts' => ['png','jpg'],
            'require' => true,
        ),
    ),
);