<?php
    include('../../../src/class.fileuploader.php');
	
	// get custom name field
	$id_folder = isset($_POST['dir_file']) && !empty($_POST['dir_file']) ? $_POST['dir_file'] : null;

	$dir = '../../../../../files-upload/' . $id_folder . '/';
	if (!file_exists($dir)) {
	    mkdir($dir, 0777, true);
	}

	// initialize FileUploader
    $FileUploader = new FileUploader('files', array(
        'limit' => null,
        'maxSize' => null,
		'fileMaxSize' => null,
        'extensions' => null,
        'required' => false,
        'uploadDir' => $dir,
        'title' => 'name',
		'replace' => false,
        'listInput' => true,
        'files' => null
    ));
	
	// call to upload the files
    $data = $FileUploader->upload();

	// export to js
	echo json_encode($data);
	exit;
?>