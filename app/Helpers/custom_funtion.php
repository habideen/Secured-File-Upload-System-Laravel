<?php


use \Firebase\JWT\JWT;


function configureCookie($data, $cookie_name)
{
    require_once('../jwt/vendor/autoload.php');    

    $cookie = JWT::encode( json_encode( $data ), env('JWT_SECRET') );

    setcookie($cookie_name, $cookie, time() + 3600, '/');
}


function getCookie($cookie)
{
    require_once('../jwt/vendor/autoload.php');

    if (isset($_COOKIE[ $cookie ]))
      return json_decode( 
                JWT::decode(
                    $_COOKIE[ $cookie ], 
                    env('JWT_SECRET'), 
                    array('HS256')
                ) 
            );

    else
        return null;
}


function getCookie_raw($cookie)
{
    if (isset($_COOKIE[ $cookie ]))
        return $_COOKIE[ $cookie ];

    else
        return null;
}


function removeCookie($cookie)
{
    if (isset($_COOKIE[$cookie])) {
        unset($_COOKIE[$cookie]); 
        setcookie($cookie, null, -1, '/'); 
        return true;
    }
}



function catcheFile($file_path, $use_path)
{
    if ( file_exists($file_path) )
        return $use_path . '?h=' .File::lastModified($file_path);

    return '';
}


function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_()'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}


function get_url_code()
{
    //this code appears in the URL for added security
    return random_str(50);
}


function get_transfer_token()
{
    //this code appears in the URL for added security
    return random_str(6, '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ');
}





function zipFolder_trash($inputFolder, $outputFile) {
	// Get real path for our folder
	$rootPath = realpath($inputFolder);

	// Initialize archive object
	$zip = new ZipArchive();
	$zip->open($outputFile, ZipArchive::CREATE | ZipArchive::OVERWRITE);

	// Create recursive directory iterator
	/** @var SplFileInfo[] $files */
	$files = new RecursiveIteratorIterator(
	    new RecursiveDirectoryIterator($rootPath),
	    RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach ($files as $name => $file)
	{
	    // Skip directories (they would be added automatically)
	    if (!$file->isDir())
	    {
	        // Get real and relative path for current file
	        $filePath = $file->getRealPath();
	        $relativePath = substr($filePath, strlen($rootPath) + 1);

	        // Add current file to archive
	        $zip->addFile($filePath, $relativePath);
	    }
	}

	// Zip archive will be created only after closing object
	$zip->close();
}





function zipFolder($inputFolder, $outputFile) {
	$rootPath = realpath($inputFolder);

	// Initialize archive object
	$zip = new ZipArchive();
	$zip->open($outputFile, ZipArchive::CREATE | ZipArchive::OVERWRITE);

	$files= scandir($inputFolder);
    
    unset($files[0],$files[1]);

	foreach ($files as $name => $file)
	{
	        $filePath = $inputFolder . '/' . $file;
	        $relativePath = substr($filePath, strlen($rootPath) + 1);

	        // Add current file to archive
	        $zip->addFile($filePath, $relativePath);
	}

	// Zip archive will be created only after closing object
	$zip->close();
}




function upload_link_email($first_name, $last_name, $token, $home, $link)
{
return <<<"EOD"
<!DOCTYPE html>
<html>
<head>
<style>
body{background-color:#d9d9d9;font-family: Arial, Helvetica, sans-serif;}
.main{padding:6em 2em;border-radius:15px;background-color:#fff;
    box-shadow:1px 1px 20px #aaa;max-width:500px;margin-left:auto;margin-right:auto;}
.center{text-align:center;}
p{line-height:1.7em;color:#222;margin-bottom:0px;}
.c-btn{padding:10px 15px;border-radius:3px;border:none}
.c-btn-primary{background-color:#1F3BB3;color:#fff;}
.c-btn-primary:hover{background-color:#334FC8;}
.c-btn-primary:focus{background-color:#1F3Ba0;}
a{text-decoration:none;}
</style>
</head>
<body>
<div class='main'>
    <div style='margin-bottom:2.5em;text-align:center;background-color:#f1f1f1;padding:20px;'><a href='{$home}'><img src='{$home}/images/favicon.png' alt='Logo' /></a></div>
    <div style='margin-bottom:40px;'><img src='{$home}/images/transfer-illustration.png' alt='Illustration' style='width:100%' /></div>
    <p>Hi $last_name $first_name. How do you do?</p>

    <p>Please use the information below to upload your file in our server.</p>

    <p>Enter your email address in the field provided and the token below for a successful transfer</p>

    <p><b style='margin-right:10px;'>Token:</b>$token</p>

    <p style='margin-top:40px;'><a href="$link" class="c-btn c-btn-primary">Click here to transfer your file</a></p>
</div>
</body>
EOD;
}//upload_link_email()




