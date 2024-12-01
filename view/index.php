<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
    <link href="view/style.css" rel="stylesheet">
</head>

<body>
    <div id="header">
        <div id="topbar">
            <img id="searchbarimage" src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" />
            <form id="searchbar" type="text" method="post" action="">
              
                <input id="searchbartext"  name="call" type="text" value="" />
                <button id="searchbarbutton" name="submit" >
                    <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                        </path>
                    </svg>
                </button>
             
            </div>
        </div>
        <div id="optionsbar">
            <ul id="optionsmenu1">
                <li id="optionsmenuactive">All</li>
                <li>Posts</li>
                <li>Comments</li>
            </ul>

             
        </div>
    </div>
    <div id="searchresultsarea">
          <?php if($searchResult):?>
            <?php foreach ($searchResult as $search): ?>                     
          <div class="searchresult">
            <h2><?php echo $search['title'];?> </h2>
             
            <p><?php echo $search['body'];?></p>            
          </div>
            <?php endforeach; ?>
          <?endif; ?>
 
         
    </div>

     
</body>

</html>
 