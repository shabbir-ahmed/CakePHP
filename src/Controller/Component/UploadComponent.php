<?php
namespace App\Controller\Component;

use\Cake\Component\Controller;
use\Cake\Controller\ComponentRegistry;
use\Cake\Network\Exception\InternalErrorException;
use\Cake\Utility\Text;
use\Cake\ORM\TableRegistry;

class UploadComponent extends Component
{
	public $max_files = 3; 

	public function send($data)
	{
		if (!empty($data)) 
		{
			throw new InternalErrorException("Error Processing Request {$this->max_files}", 1);
			
		}
		foreach ($data as $file) 
		{
			$filename = $file['name'];
			$file_tmp_name = $filename['tmp_name'];
			$dir = WWW_ROOT.'img'.DS.'uploads';
			$allowed = array('png','jpg','jpeg' );
			if (!in_array(substr(strrchr($filename,'.'),1),$allowed)) 
			{
				throw new InternalErrorException("Error Processing Request", 1);
			}
			elseif(is_uploaded_file($file_tmp_name))
			{
				$filename = Text::uuid().'-'.$filename;
				$fileDB = TableRegistry::get('shop');
				$entity = $fileDB->newEntity();
				$entity->filename = $filename;
				$fileDB->save($entity);
				move_uploaded_file($file_tmp_name, $dir.DS.$filename);
			}
		}
	}
}
?>