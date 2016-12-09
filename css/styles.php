<?php

require_once
(
    dirname( __FILE__ )
  . DIRECTORY_SEPARATOR
  . '..'
  . DIRECTORY_SEPARATOR
  . 'classes'
  . DIRECTORY_SEPARATOR
  . 'Eos'
  . DIRECTORY_SEPARATOR
  . 'Css'
  . DIRECTORY_SEPARATOR
  . 'Minifier.class.php'
);

$css = new Eos_Css_Minifier();

$css->setBaseDirectory( dirname( __FILE__ ) );

$css->import( 'base.css' );
$css->import( 'layout.css' );
$css->import( 'forum.css' );
$css->import( 'comment.css' );
$css->import( 'resume.css' );
$css->import( 'exam.css' );

$css->setComment
(
    'Blood Sweat & Code (& Rock\'N\'Roll)'
  . chr( 10 )
  . 'Thanx for looking at the source code'
  . chr( 10 )
  . ''
  . chr( 10 )
  . 'eosgarden © 2010'
);

$css->output();
