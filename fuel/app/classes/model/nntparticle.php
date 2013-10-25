<?php

class Model_Nntparticle extends \Model
{
	protected static $_table_name = 'nntparticles';

	protected static $_properties = array(
		'id',
		'message_id',
		'title',
		'creation_time',
		'description',
		'created_at',
		'updated_at',
	);

    public static function processArticle($header)
    {
        // have to remember what is passed in through header
        
        $message_id = $header['Message-ID'];
        $title = $header['Subject'];
        
        $time = date( 'Y-m-d H:i:s', strtotime ($header['Date']) );

        
        $description =
        "Bytes: " . $header['Bytes'] .
        " Lines: " . $header['Lines'] .
        " Path: " . $header['Path'] .
        " From: " . $header['From'] .
        " Newsgroups: " . $header['Newsgroups'] .
        " Organization: " . $header['Organization'] .
        " NNTP-Posting-Host: " . $header['NNTP-Posting-Host'] .
        " Xref: " . $header['Xref'];
        
        \DB::insert($_table_name)
            ->columns(array('message_id','title','creation_time','description'))
        ->values(array($message_id,$title,$time,$description));
        
        
    }

    public static function getNewest($limit = 50)
    {
        return \DB::select()
            ->from(self::$_table_name)
            ->order_by('creation_time', 'DESC')
            ->limit($limit)
            ->execute();
    }
}
