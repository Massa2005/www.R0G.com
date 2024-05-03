<?php
class Task
{



	function read($taskid)
	{
	    $query = "SELECT * FROM task WHERE taskid=:taskid";
	    $sth = DBHandler::getPDO()->prepare($query);
		$sth->bindParam(':taskid', $taskid);
	    $sth->execute();
		$results = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}


	function create($creatorid, $descrizione, $nome, $inputList, $outputList, $nlines)
	{
	    $query = "CALL InsertTaskAndData(:creatorid, :descrizione, :nome, :inputList, :outputList, :nlines);";
        $sth = DBHandler::getPDO()->prepare($query);
        $sth->bindParam(':creatorid', $creatorid);
        $sth->bindParam(':descrizione', $descrizione);
        $sth->bindParam(':nome', $nome);
        $sth->bindParam(':inputList', $inputList);
        $sth->bindParam(':outputList', $outputList);
        $sth->bindParam(':nlines', $nlines);
        $sth->execute();
	}


	function update($coderid, $descrizione, $nome, $inputList, $outputList, $nlines, $taskid)
	{
	    $query = "CALL UpdateTaskAndData(:ownerid, :descrizione, :nome, :inputList, :outputList, :nlines, :currentTaskID);";
        $sth = DBHandler::getPDO()->prepare($query);
        $sth->bindParam(':ownerid', $coderid);
        $sth->bindParam(':descrizione', $descrizione);
        $sth->bindParam(':nome', $nome);
        $sth->bindParam(':inputList', $inputList);
        $sth->bindParam(':outputList', $outputList);
        $sth->bindParam(':nlines', $nlines);
        $sth->bindParam(':currentTaskID', $taskid);
        $sth->execute();
	}


	function delete($taskid)
	{
		$query = "CALL DeleteTaskAndData(:taskid);";
		$sth = DBHandler::getPDO()->prepare($query);
		$sth->bindParam(':taskid', $taskid);
		$sth->execute();	
	}

}

?>
