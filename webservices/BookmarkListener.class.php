<?php
require_once("../core/Bookmark.class.php");
require_once("WebService.class.php");

class BookmarkListener extends WebService{
	//fetch bookmark from database
	public function retrieve(){
		$type = $this->opt("type");
		if(!$type){
			$type = "single";
		}
		switch($type){
			case "single":
			$id = intval($this->req('id'));
			$obj = Bookmark::retrieve($id);
			if($obj != null){
				echo $obj->toXML();
			}
			else{
				die(err("No bookmark found"));
			}
			break;
			case "user_test":
			//check if user has given bookmark
			$url = $this->req("url");
			$r = Bookmark::userHasBookmark($this->userID, $url);
			if($this->datatype == "json"){
				printf('{"userHasBookmark": %s, "id" : %d}', ($r != -1) ? "true" : "false", $r);
			}
			else if($this->datatype == "xml"){
				printf('<userHasBookmark>%s</userHasBookmark><id>%d</id>', ($r != -1) ? "true" : "false", $r);
			}
			break;
		}
	}

	public function create(){
		$url = $this->req("url");
		$title = $this->req("title");
		$projID = $this->req("projectID");
		$note = $this->opt("note");

		$obj = new Bookmark();

		$obj->setTitle($title);
		$obj->setUrl($url);
		$obj->setUserID($this->userID);
		$obj->setProjectID($projID);
		if($note){
			$obj->setNote($note);
		}

		$obj->save();
		//return the new object
		echo $obj->toXML();
	}

	public function delete(){
		$id = intval($this->req('id'));
		$result = Bookmark::delete($id);
		if($result == 0){
			err("Nothing was deleted");
		}
		else{
			feedback("Deleted");
		}
	}

	public function update(){
		$id = intval($this->req('id'));
		$result = Bookmark::retrieve($id);
		if($result == null){
			die(err("No bookmark found with id " . $id));
		}
		if(isset($this->data['url']))
			$result->setUrl($this->data['url']);
		if(isset($this->data['title']))
			$result->setTitle($this->data['title']);
		if(isset($this->data['note']))
			$result->setNote($this->data['note']);
		if(isset($this->data['projectID']))
			$result->setProjectID($this->data['projectID']);
		
		$result->save();
		feedback("Bookmark updated");
	}
}