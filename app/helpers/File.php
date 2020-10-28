<?php

	class File
	{	
		private $_file;
		private $_ok_file_extension = ['jpeg' , 'jpg' , 'png' , 'bitmap','csv' , 'xls' ,'xlsx'];
		private $_ok_file_extension_office = ['csv' , 'xls' ,'xlsx'];
		private $_dir;

		private $_errors = array();
		
		private $_prefix = '';

		public function setOfficeFile($file = null)
		{
			try
			{
				if(!empty($file['error']))
				{
					throw new Exception("Error found on uploading");	
				}
				if(empty($file['name']))
				{
					throw new Exception("No File Found");
				}
				else
				{
					$this->_file = $file;
					$this->tmp_name = $file['tmp_name'];
					$this->name = $file['name'];
					
					//Extract extension on file name;
					$ext = explode('.', $this->name);
					//set file extension
					$this->ext = strtolower(end($ext));

					return $this;
				}
			}catch(Exception $e)
			{
				echo $e->getMessage();
			}
		}
		public function setFile($file = null)
		{
			try
			{
				if(!empty($file['error']))
				{
					throw new Exception("Error found on uploading");	
				}
				if(empty($file['name']))
				{
					throw new Exception("No File Found");
				}
				else
				{
					$this->_file = $file;
					$this->tmp_name = $file['tmp_name'];
					$this->name = $file['name'];
					
					//Extract extension on file name;
					$ext = explode('.', $this->name);
					//set file extension
					$this->ext = strtolower(end($ext));

					return $this;
				}
			}catch(Exception $e)
			{
				return $e->getMessage();
			}
		}

		public function setDIR($dir)
		{
			$this->_dir = $dir;
			return $this;
		}

		public function upload()
		{
			try{
				if(is_null($this->_file))
				{
					$this->addErrors('No file uploaded');
					throw new Exception('File is null');
				}else
				{
					//check if extension is valid
					if($this->isValidExtension())
					{
						$this->uploadFile();
					}	
				}

			}catch(Exception $e)
			{
				return $e->getMessage();	
			}
		}
		public function setPrefix($_prefix)
		{
			$this->_prefix = $_prefix;
			return $this;
		}
		public function getNewName()
		{
			return $this->newname;
		}

		public function getName()
		{
			return $this->name;
		}
		private function isValidExtension()
		{
			if(in_array(strtolower($this->ext),$this->_ok_file_extension))
			{
				return true;
			}else
			{
				$this->addErrors('Invalid Extension : ' .$this->ext);
			}
			return false;
		}
		private function uploadFile()
		{
			$newName = $this->generateName();
			if(move_uploaded_file($this->tmp_name,$this->_dir.'/'.$newName))
			{
				return true;
			}else{
				$this->addErrors('THE FILE IS NOT UPLOADED');
				return false;
			}

		}

		private function generateName()
		{
			return $this->newname = strtolower($this->_prefix.''.random_gen().'.'.$this->ext);
		}

		private function addErrors($err)
		{
			array_push($this->_errors, $err);
		}

		public function errors()
		{
			return implode(',', $this->_errors);
		}
	}