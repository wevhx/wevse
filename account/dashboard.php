<?php
session_start();

if(isset($_SESSION["username"])){
	$user = $_SESSION["username"];
}
?>

<!doctype html>
<html data-n-head-ssr lang="en" data-n-head="lang">

<head data-n-head="">
    <title data-n-head="true">WEV.SE</title>
    <meta data-n-head="true" charset="utf-8">
    <meta data-n-head="true" name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="/assets/icons/32.png"/>
    
    <link data-n-head="true" rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
 <link rel="stylesheet" href="https://wev.se/assets/css/custom.css" />
    <link rel="stylesheet" href="https://wev.se/assets/css/main.css" />

    <script type="text/javascript" src="https://wev.se/assets/js/main.js"></script>
   

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>


    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>


</head>

<body onload='check()'>
    <div data-server-rendered="true" id="__nuxt">
        <div id="__layout">
            <div class="font-primary">
                <div class="transition bg-teal-800 py-3 fixed z-50 shadow w-full mt-0">
                    <div class="container">
                        <div class="flex flex-wrap justify-between items-center">
                            <style>
                               .wlogout {color: #fff;
    background-color: #e64553;}
    
    .wlogout:hover {background-color: #f96b78;}
    
     .wlogin {color: #285e61;
    background-color: #fff;}
    
    .wlogin:hover {background-color: #234e52;color:#fff;}
                                
                                
                            </style>
                            <span class="text-white font-semibold tracking-wide text-teal-200"><a href="https://wev.se">Wev.SE</a></span>
                            <div class="block lg:hidden">
                                <button class="flex items-center px-3 py-2 focus:outline-none" onclick="removeClass()">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-8 w-8 fill-current text-white">
                                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 

2H4a1 1 0 0 1 0-2z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div id="memem" class="mt-5 lg:mt-0 w-full lg:w-auto block lg:flex text-teal-200 text-sm font-medium tracking-wide hidden"><a href="https://wev.se/home" class="block px-5 py-3 mx-0 lg:mx-1 mt-1 lg:mt-0 hover:bg-teal-900 hover:text-white rounded focus:outline-none">
Home
</a>
                                <a href="#" class="block px-5 py-3 mx-0 lg:mx-1 hover:bg-teal-900 hover:text-white rounded focus:outline-none nuxt-link-exact-active  bg-teal-900">
User Panel
</a> <a href="/pages/privacy-policy" class="block px-5 py-3 mx-0 lg:mx-1 mt-1 lg:mt-0 hover:bg-teal-900 hover:text-white rounded focus:outline-none">
Privacy Policy
</a> <a href="https://wev.se/apk" class="block px-5 py-3 ml-0 lg:ml-1 mt-1 lg:mt-0 hover:bg-teal-900 hover:text-white rounded focus:outline-none">
Android APK
</a>  <div class="login-container"></div>

</div>
                        </div>
                    </div>
                </div>
                <main id="main" class="pb-10 pt-32 text-gray-600">
                    <div class="container min-h-70-screen">
                        <div class="min-h-70-screen">
                            <div class="text-center">
                              
                                
                                <?php 
				if(!isset($user)){
					echo	"You need to log-in before viewing this page!<br>
							Don't have account? you can <a href='https://wev.se/account/register'>Register here</a>.<br><br>
							or use this demo account<br>
							user : test123<br>password : test123</div></div></body></html>";
					exit;
				}
			?>
			<h1 class="text-3xl text-gray-700">Welcome <b class="font-bold"><?php echo $user ?></b></h1>
                                
                            </div>
                            <div class="mt-10 w-full lg:w-1/2 mx-auto werno">
                                <div>
                                    <label class="block cursor-pointer relative"><span class="text-gray-600 font-medium text-xs absolute bg-white px-3 pt-1 ml-2 -mt-3">Url</span>
                                        <input placeholder="Your Link" id="linkInput" class="form-input block w-full">
                                    </label>
                                </div>


                                <div class="flex -mx-2 items-center">
                                    <div class="px-2 mt-6">
                                        <label class="flex items-center cursor-pointer">
                                            <input type="checkbox" onclick="myFunction()" class="form-checkbox text-teal-700 cursor-pointer"> <span class="ml-2 text-xs font-medium">Customize Link</span> <span class="ml-2 text-xs 

font-medium font-bold text-gray-700" id="hello1" style="visibility: hidden;margin-left: 10px;">http://wev.se/</span></label>
                                    </div>
                                    <div id="hello2" style="visibility: hidden;" class="mt-6 w-full sm:w-1/2">
                                        <label class="block cursor-pointer relative">
                                            <input id="idInput" name="showthis" style="padding: .5rem .45rem;font-size: 

.75rem;height: 26px!important;width:80%" class="form-input block">
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <button id="tombol" type="submit" onclick="submit()" class="flex items-center justify-center shadow-md bg-teal-600 text-white font-medium w-full rounded py-3 
hover:bg-teal-500 focus:bg-teal-700 focus:outline-none"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-current w-6 h-6 mr-1"><path d="M6.80003 3.45C7.67003 2.93 8.62003 2.53 9.63003 2.28C9.79674 2.77655 10.1152 3.2082 10.5404 3.514C10.9657 3.81981 11.4762 3.98432 12 3.98432C12.5238 3.98432 13.0344 3.81981 13.4596 3.514C13.8849 3.2082 14.2033 2.77655 14.37 2.28C15.38 2.53 16.33 2.93 17.19 3.45C16.9519 3.92008 16.8683 4.45341 16.9513 4.9738C17.0344 5.4942 17.2797 5.97505 17.6524 6.34768C18.025 6.7203 18.5058 6.96565 19.0262 7.04868C19.5466 7.13171 20.0799 7.04817 20.55 6.81C21.07 7.67 21.47 8.61 21.72 9.63C21.2235 9.7967 20.7918 10.1152 20.486 10.5404C20.1802 10.9657 20.0157 11.4762 20.0157 12C20.0157 12.5238 20.1802 13.0343 20.486 13.4596C20.7918 13.8848 21.2235 14.2033 21.72 14.37C21.47 15.38 21.07 16.33 20.55 17.19C20.0799 16.9518 19.5466 16.8683 19.0262 16.9513C18.5058 17.0343 18.025 17.2797 17.6524 17.6523C17.2797 18.025 17.0344 18.5058 16.9513 19.0262C16.8683 19.5466 16.9519 20.0799 17.19 20.55C16.33 21.07 15.39 21.47 14.37 21.72C14.2033 21.2234 13.8849 20.7918 13.4596 20.486C13.0344 20.1802 12.5238 20.0157 12 20.0157C11.4762 20.0157 10.9657 20.1802 10.5404 20.486C10.1152 20.7918 9.79674 21.2234 9.63003 21.72C8.62003 21.47 7.67003 21.07 6.81003 20.55C7.0482 20.0799 7.13174 19.5466 7.04871 19.0262C6.96568 18.5058 6.72034 18.025 6.34771 17.6523C5.97508 17.2797 5.49423 17.0343 4.97383 16.9513C4.45344 16.8683 3.92011 16.9518 3.45003 17.19C2.91713 16.3159 2.52248 15.3646 2.28003 14.37C2.77658 14.2033 3.20823 13.8848 3.51403 13.4596C3.81984 13.0343 3.98435 12.5238 3.98435 12C3.98435 11.4762 3.81984 10.9657 3.51403 10.5404C3.20823 10.1152 2.77658 9.7967 2.28003 9.63C2.53003 8.62 2.93003 7.67 3.45003 6.81C3.92011 7.04817 4.45344 7.13171 4.97383 7.04868C5.49423 6.96565 5.97508 6.7203 6.34771 6.34768C6.72034 5.97505 6.96568 5.4942 7.04871 4.9738C7.13174 4.45341 7.0482 3.92008 6.81003 3.45H6.80003ZM12 16C13.0609 16 14.0783 15.5786 14.8285 14.8284C15.5786 14.0783 16 13.0609 16 12C16 10.9391 15.5786 9.92172 14.8285 9.17157C14.0783 8.42143 13.0609 8 12 8C10.9392 8 9.92175 8.42143 9.1716 9.17157C8.42146 9.92172 8.00003 10.9391 8.00003 12C8.00003 13.0609 8.42146 14.0783 9.1716 14.8284C9.92175 15.5786 10.9392 16 12 16Z" fill="white"></path> <path d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z" fill="white"></path></svg> Generate</button>

                                </div>

<div id="result" class="mt-8 shadow-md bg-gray-600 text-white font-medium rounded py-3 px-8 hover:bg-gray-500 focus:bg-gray-700" style="text-align: center;display:none;"><b onclick="copy()"></b>
                                <button id="copybtn" onclick="copy()">Copy</button>
                            </div>
                            
                            
                            
                            
                            
                            

                            </div>

                            <small id="error" class="form-text text-muted"></small>
                         <div id='loader'class="py-20 loader"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="fill-current w-24 mx-auto"><circle cx="50" cy="50" fill="none" stroke-linecap="round" r="30" stroke-width="6" stroke="#319795" stroke-dasharray="47.12388980384689 47.12388980384689" transform="rotate(185.631 50 50)"><animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;360 50 50" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animateTransform></circle></svg></div>





                        </div>
                        
                           
               <div style="margin-top:-80px"><div class="mt-8" align="left" style="margin-bottom: -1rem">
                            <h5 class="text-2xl font-bold text-gray-700">
Shortlink History
</h5></div>



<div class="table-responsive mt-8 form-textarea" style="overflow-x:auto;">
           <table id="usertable" class="table table-sm table-dark">
    <thead>
        <tr>
            <th scope="col" style="text-align: left;">Shorturl</th>
            <th scope="col">hits</th>
            <th scope="col">date (UTC)</th>
            <th scope="col">Opsi</th>
        </tr>
    </thead>
    <tbody>
        	<?php	//Table data, access from API
				$url = 'http://wev.se/etc/api';
				$data = array('token' => 'TOKEN', 'view' => $user);
				
				$options = array(
					'http' => array(
						'method'  => 'POST',
						'content' => http_build_query($data)
					)
				);
				$context  = stream_context_create($options);
				$result = file_get_contents($url, false, $context);

				$raw =  json_decode($result, true);
				if(!empty($raw['data'])){
					foreach($raw['data'] as $item) {
						echo '<tr><td><b><a href="'.$item['url'].'" target="_blank"> wev.se/'.$item['id'].'</a></b>';
						echo '<div class="urlori">'.$item['url'].'</div></td>';
						echo '<td align="center">'.$item['hits'].'</td>';
						echo '<td align="center">'.$item['date'].'</td>';
						echo('<td align="center"><label class="btn btn--blue" for="modal-2" style="margin-bottom:5px" data-target="#editform" onclick="editopen(\'' .$item['id']. '\', \'' .$item['url']. '\')">Edit</label>');
						echo '  ';
						echo('<label class="btn btn--red" for="modal-1" data-target="#deleteform" onclick="deleteopen(\'' .$item['id']. '\')">Delete</label></td></tr>');
						//echo('<td><button class="btn btn-danger" onclick="deletee(\'' .$item['id']. '\')">Delete</button></td></tr>');
					}
				}
			?>

    </tbody>
</table>
              </div></div>
                        
                    </div>
                    
                    
                    
                       </main>
                       
                       
                       
                       
                       
                <footer class="py-8 bg-gray-100">
                    <div class="container text-center">
                        <div class="text-sm text-gray-600"><a href="/pages/privacy-policy" class="px-2">
Privacy Policy
</a> •
                            <a href="/about" class="px-2">
About
</a> •
                            <a href="/contact" class="px-2 nuxt-link-exact-active nuxt-link-active">
Contact
</a></div>
                        <p class="text-xs text-gray-500">Copyright © <span class="text-gray-700">Wev.SE</span> 2019</p>
                    </div>
                </footer>
            </div>
        </div>
    </div>
   
  

  <input class="modal-state" id="modal-1" type="checkbox" />
<div class="modal">
  <label class="modal__bg" for="modal-1"></label>
  <div class="modal__inner-small">
    <label class="modal__close" for="modal-1"></label>
    <center><h2 id="deleteid"></h2>
    <p>Are you sure want to Delete this link?</p>
    <br>
    <label class="btn btn--grey" for="modal-1">Cancel</label>
    <label class="btn btn--red" id="deletebtn" onclick="deletee()">Delete</label></center>

  </div>
</div>

<input class="modal-state" id="modal-2" type="checkbox" />
<div class="modal">
  <label class="modal__bg" for="modal-2"></label>
  <div class="modal__inner">
    <label class="modal__close" for="modal-2"></label>
    <h2>Modify Link</h2>
    <label class="block cursor-pointer relative"><input id="idedit" class="form-input block w-full" style="background-color: #d0cfcf59;" readonly></label>
    <br>
    <label class="block cursor-pointer relative"><span class="text-gray-600 font-medium text-xs absolute bg-white px-3 pt-1 ml-2 -mt-3">Old Url</span> <input class="form-input block w-full" id="urledit"></label>
    <br>
    <span style="float:right;"><label class="btn btn--grey" for="modal-2">Cancel</label>
    <label class="btn btn--blue" id="editbtn" onclick="edit()">Save</label></span>
    <br>
    <p id="status"></p>
  </div>


    
     <!-- Core plugin JavaScript-->
  <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>
     
    <!-- Page level plugins -->
 

  <!-- Page level custom scripts -->
  

  <script type="text/javascript">
      $(document).ready(function() {
$('#usertable').dataTable({
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": false,
    "bSort": false,
    "language": {
      "emptyTable": "History Shortlinkmu masih kosong"
    },
    "bInfo": false,
  
    "bAutoWidth": true });
    
});


  </script>
 


</body>

</html>