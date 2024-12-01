<?php

require_once ROOT. '/request.php';

class SiteController {
	public function actionIndex()
		{   
		    function to_console($loadComments, $loadPosts) {
               echo "<script>console.log('Загружено: " . $loadPosts . " записей и " . $loadComments . " коментариев' );</script>";
            }

            if (session_status() === PHP_SESSION_NONE)
               {
                $dp = Request::DP();
			    $dbCreate = Request::CreateDB();
			    $tblCreate = Request::CreateTBL();  
			    $fileOne = "posts.json";
		        $jsonDataD = file_get_contents($fileOne);
		        $arrayPosts = json_decode($jsonDataD, true); 
		        $fileTwo = "comments.json";
		        $jsonDataC = file_get_contents($fileTwo);
		        $arrayComments = json_decode($jsonDataC, true); 
			    $dumpDataPost  = Request::DumpDataPosts($arrayPosts);
                $dumpDataComments  = Request::DumpDataComments($arrayComments);
                $loadComments = count($arrayComments);
                $loadPosts = count($arrayPosts);
                to_console($loadComments, $loadPosts);
               }
          
            if(isset($_POST['submit'])){
              $search = $_POST['call'];
               if(strlen($search) >= 3 ) {
                $search = trim((strip_tags(stripcslashes(htmlspecialchars($search)))));
                $searchResult = array();
                $searchResult = Request::Search($search);
             }else {$searchResult = "";}   
            }else {$searchResult = "";}   
             
			require_once ROOT. '/view/index.php';
			return true;
		}
	
}
?>